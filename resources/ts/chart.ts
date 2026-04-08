import Chart from "chart.js/auto";
import ChartDataLabels from "chartjs-plugin-datalabels";

// Plugin custom untuk panah di ujung garis
const arrowPlugin = {
    id: "arrowPlugin",
    afterDraw(chart: any) {
        const ctx = chart.ctx;
        chart.data.datasets.forEach((dataset: any, i: number) => {
            const meta = chart.getDatasetMeta(i);
            if (!meta.hidden) {
                const points = meta.data;
                if (points.length < 2) return;

                const last = points[points.length - 1];
                const prev = points[points.length - 2];

                const { x: x1, y: y1 } = prev.tooltipPosition();
                const { x: x2, y: y2 } = last.tooltipPosition();

                const angle = Math.atan2(y2 - y1, x2 - x1);
                const arrowLength = 12;

                ctx.fillStyle = dataset.borderColor;
                ctx.beginPath();
                ctx.moveTo(x2, y2);
                ctx.lineTo(
                    x2 - arrowLength * Math.cos(angle - Math.PI / 6),
                    y2 - arrowLength * Math.sin(angle - Math.PI / 6)
                );
                ctx.lineTo(
                    x2 - arrowLength * Math.cos(angle + Math.PI / 6),
                    y2 - arrowLength * Math.sin(angle + Math.PI / 6)
                );
                ctx.closePath();
                ctx.fill();
            }
        });
    },
};

// Register Chart.js plugins
Chart.register(ChartDataLabels);

export interface DepartmentStats {
    elektro: number;
    otomotif: number;
    pemesinan: number;
    tik: number;
}

export class JurusanChartManager {
    private chart: Chart | null = null;
    private stats: DepartmentStats = {
        elektro: 0,
        otomotif: 0,
        pemesinan: 0,
        tik: 0,
    };
    private sectionTimers: { [key: string]: NodeJS.Timeout } = {};
    private sectionViewTime: { [key: string]: number } = {};
    private lastVisibleTime: { [key: string]: number } = {};
    private currentActiveSection: string | null = null;

    constructor() {
        this.loadStatsFromServer();
        this.loadStatsFromLocalStorage();
        this.initializeChart();
        this.setupEventListeners();
        this.setupIntersectionObserver();

        // Retry failed requests saat init
        this.retryFailedRequests();
    }

    public async initializeAsync(): Promise<void> {
        // Load stats from server and retry any failed requests after construction
        await this.loadStatsFromServer();
        await this.retryFailedRequests();

        // Ensure chart/UI reflect any updated stats
        this.updateChart();
        this.updateTotalClicks();
    }

    private async loadStatsFromServer(): Promise<void> {
        try {
            const response = await fetch("/jurusan/get-stats");
            if (!response.ok) throw new Error("Failed to fetch stats");

            const result = await response.json();
            if (result.success) {
                // 🔴 FIX: Convert string ke number
                this.stats = {
                    elektro: Number(result.data.elektro) || 0,
                    otomotif: Number(result.data.otomotif) || 0,
                    pemesinan: Number(result.data.pemesinan) || 0,
                    tik: Number(result.data.tik) || 0,
                };

                // Sync dengan localStorage
                this.saveStatsToLocalStorage();
            }
        } catch (error) {
            console.error("❌ Failed to load stats from server:", error);
            // Fallback ke localStorage
            this.loadStatsFromLocalStorage();
        }
    }

    // Load statistik dari localStorage
    private loadStatsFromLocalStorage(): void {
        const savedStats = localStorage.getItem("jurusanClickStats");
        if (savedStats) {
            try {
                const localStats = JSON.parse(savedStats);
                // 🔴 FIX: Convert semua values ke number
                this.stats = {
                    elektro: Number(localStats.elektro) || 0,
                    otomotif: Number(localStats.otomotif) || 0,
                    pemesinan: Number(localStats.pemesinan) || 0,
                    tik: Number(localStats.tik) || 0,
                };
            } catch (error) {
                console.error("Error loading stats from localStorage:", error);
            }
        }
    }

    // Save statistik ke localStorage
    private saveStatsToLocalStorage(): void {
        localStorage.setItem("jurusanClickStats", JSON.stringify(this.stats));
    }

    // 🔴 FIX: Method untuk increment yang proper
    private incrementStat(
        sectionId: keyof DepartmentStats,
        type: "click" | "view" = "click"
    ): void {
        // Pastikan value adalah number sebelum di-increment
        const currentValue = Number(this.stats[sectionId]) || 0;
        this.stats[sectionId] = currentValue + 1;

        this.saveStatsToLocalStorage();
        this.updateChart();
        this.updateTotalClicks();
        this.sendStatsToServer(sectionId, type);
    }

    // Inisialisasi chart
    private initializeChart(): void {
        const canvas = document.getElementById(
            "jurusanPieChart"
        ) as HTMLCanvasElement;
        if (!canvas) {
            return;
        }

        const { labels, data, colors, total } = this.prepareChartData();

        if (this.chart) {
            this.chart.destroy();
        }

        this.chart = new Chart(canvas, {
            type: "pie",
            data: {
                labels: labels,
                datasets: [
                    {
                        data: data,
                        backgroundColor: colors,
                        borderColor: colors.map((color) =>
                            color.replace("0.8", "1")
                        ),
                        borderWidth: 2,
                        hoverBorderWidth: 3,
                        hoverOffset: 8,
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 20,
                        bottom: 20,
                        left: 10,
                        right: 10,
                    },
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: (context) => {
                                const label = context.label || "";
                                const value = context.raw as number;
                                const total =
                                    context.chart.data.datasets[0].data.reduce(
                                        (a: number, b: number) => a + b,
                                        0
                                    );
                                // 🔴 FIX: Percentage calculation di tooltip
                                const percentage =
                                    total > 0 ? (value / total) * 100 : 0;
                                const percentageText =
                                    percentage > 0
                                        ? percentage.toFixed(1)
                                        : "0.0";
                                return `${label}: ${value} (${percentageText}%)`;
                            },
                        },
                    },
                    datalabels: {
                        color: "#ffffff",
                        font: {
                            size: 11,
                            weight: "bold",
                        },
                        textAlign: "center",
                        formatter: (value: number, context: any) => {
                            const label =
                                context.chart.data.labels[context.dataIndex];
                            const total =
                                context.chart.data.datasets[0].data.reduce(
                                    (a: number, b: number) => a + b,
                                    0
                                );
                            // 🔴 FIX: Percentage calculation di chart
                            const percentage =
                                total > 0 ? (value / total) * 100 : 0;
                            const percentageText =
                                percentage > 0 ? percentage.toFixed(1) : "0.0";

                            return `${label}\n${percentageText}%`;
                        },
                        display: (context: any) => {
                            const value = context.dataset.data[
                                context.dataIndex
                            ] as number;
                            const total =
                                context.chart.data.datasets[0].data.reduce(
                                    (a: number, b: number) => a + b,
                                    0
                                );
                            const percentage =
                                total > 0 ? (value / total) * 100 : 0;
                            return percentage > 5;
                        },
                    },
                },
                animation: {
                    animateScale: true,
                    animateRotate: true,
                    duration: 800,
                },
            },
        });

        this.updateChartLegend();
        this.updateTotalClicks();
    }

    // Siapkan data untuk chart
    private prepareChartData() {
        const labels = Object.keys(this.stats).map((key) => {
            const nameMap: { [key: string]: string } = {
                elektro: "ELEKTRO",
                otomotif: "OTOMOTIF",
                pemesinan: "PEMESINAN",
                tik: "TIK",
            };
            return nameMap[key] || key.toUpperCase();
        });

        // 🔴 FIX: Pastikan data adalah number
        const data = Object.values(this.stats).map((val) => Number(val) || 0);
        const total = data.reduce((sum, value) => sum + value, 0);

        const colors = [
            "rgb(249, 115, 22, 0.8)",
            "rgb(239, 68, 68, 0.8)",
            "rgb(59, 130, 246, 0.8)",
            "rgb(139, 92, 246, 0.8)",
        ];

        return { labels, data, colors, total };
    }

    private updateChartLegend(): void {
        const legendContainer = document.getElementById("chartLegend");
        if (!legendContainer) return;

        const { labels, data, colors, total } = this.prepareChartData();

        legendContainer.innerHTML = "";

        if (total === 0) {
            legendContainer.innerHTML =
                '<div class="no-data-message">Belum ada data kunjungan</div>';
            return;
        }

        labels.forEach((label, i) => {
            const value = data[i];
            // 🔴 FIX: Percentage calculation yang benar
            const percentage = total > 0 ? (value / total) * 100 : 0;
            const percentageText =
                percentage > 0 ? percentage.toFixed(1) : "0.0";

            const item = document.createElement("div");
            item.className = "legend-item";
            item.style.borderLeftColor = colors[i];
            item.innerHTML = `
            <span class="legend-color" style="background-color:${colors[i]}"></span>
            <div>
                <div class="font-semibold text-gray-800">${label}</div>
                <div class="text-sm text-gray-600">${percentageText}% dikunjungi</div>
            </div>
        `;
            legendContainer.appendChild(item);
        });
    }

    // Update total clicks display
    private updateTotalClicks(): void {
        const totalElement = document.getElementById("total-clicks");
        if (!totalElement) return;

        const total = Object.values(this.stats).reduce(
            (sum, value) => sum + value,
            0
        );
        totalElement.textContent = total.toString();
    }

    // Setup event listeners untuk tombol departemen
    private setupEventListeners(): void {
        const buttons = document.querySelectorAll(".btn-dept");

        buttons.forEach((button) => {
            button.addEventListener("click", (e) => {
                e.preventDefault();

                const targetId = button.getAttribute(
                    "data-target"
                ) as keyof DepartmentStats;

                if (targetId && this.stats.hasOwnProperty(targetId)) {
                    this.incrementStat(targetId, "click"); // 🔴 Pakai method baru
                    this.scrollToSection(targetId);
                }
            });
        });
    }

    // Setup intersection observer untuk deteksi section di tengah layar
    private setupIntersectionObserver(): void {
        const sections = ["elektro", "otomotif", "pemesinan", "tik"];

        const observer = new IntersectionObserver(
            (entries) => {
                let mostVisibleSection: string | null = null;
                let highestVisibility = 0;

                entries.forEach((entry) => {
                    const sectionId = entry.target.id as keyof DepartmentStats;
                    const visibilityScore =
                        this.calculateVisibilityScore(entry);
                    if (
                        visibilityScore > highestVisibility &&
                        visibilityScore > 0.3
                    ) {
                        highestVisibility = visibilityScore;
                        mostVisibleSection = sectionId;
                    }
                });

                if (mostVisibleSection) {
                    this.handleSectionActivation(mostVisibleSection);
                } else {
                    this.handleSectionDeactivation();
                }
            },
            {
                threshold: 0.1,
                rootMargin: "0px",
            }
        );

        sections.forEach((sectionId) => {
            const section = document.getElementById(sectionId);
            if (section) {
                observer.observe(section);
            } else {
                //
            }
        });

        // Scroll listener untuk deteksi real-time
        window.addEventListener(
            "scroll",
            this.throttle(() => {
                this.checkCenteredSection();
            }, 100)
        );
    }

    // Hitung score visibility berdasarkan posisi tengah
    private calculateVisibilityScore(entry: IntersectionObserverEntry): number {
        const rect = entry.boundingClientRect;
        const viewportHeight = window.innerHeight;
        const viewportWidth = window.innerWidth;

        const sectionCenterY = rect.top + rect.height / 2;
        const sectionCenterX = rect.left + rect.width / 2;

        const viewportCenterY = viewportHeight / 2;
        const viewportCenterX = viewportWidth / 2;

        const distanceFromCenterY = Math.abs(sectionCenterY - viewportCenterY);
        const distanceFromCenterX = Math.abs(sectionCenterX - viewportCenterX);

        const normalizedDistanceY = distanceFromCenterY / viewportHeight;
        const normalizedDistanceX = distanceFromCenterX / viewportWidth;

        const totalDistance =
            normalizedDistanceY * 0.7 + normalizedDistanceX * 0.3;
        const centerScore = Math.max(0, 1 - totalDistance);
        const finalScore = centerScore * entry.intersectionRatio;

        return finalScore;
    }

    // Check centered section secara manual
    private checkCenteredSection(): void {
        const sections = ["elektro", "otomotif", "pemesinan", "tik"];
        let bestSection: string | null = null;
        let bestScore = 0;

        sections.forEach((sectionId) => {
            const section = document.getElementById(sectionId);
            if (section) {
                const rect = section.getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                const viewportWidth = window.innerWidth;

                const visibleHeight =
                    Math.min(rect.bottom, viewportHeight) -
                    Math.max(rect.top, 0);
                const visibleWidth =
                    Math.min(rect.right, viewportWidth) -
                    Math.max(rect.left, 0);

                if (visibleHeight > 0 && visibleWidth > 0) {
                    const sectionCenterY = rect.top + rect.height / 2;
                    const viewportCenterY = viewportHeight / 2;
                    const distanceFromCenter = Math.abs(
                        sectionCenterY - viewportCenterY
                    );

                    const centerScore = Math.max(
                        0,
                        1 - distanceFromCenter / viewportHeight
                    );
                    const visibilityScore =
                        (visibleHeight / rect.height) *
                        (visibleWidth / rect.width);
                    const totalScore = centerScore * visibilityScore;

                    if (totalScore > bestScore && totalScore > 0.4) {
                        bestScore = totalScore;
                        bestSection = sectionId;
                    }
                }
            }
        });

        if (bestSection && bestSection !== this.currentActiveSection) {
            //
            this.handleSectionActivation(bestSection);
        } else if (!bestSection && this.currentActiveSection) {
            this.handleSectionDeactivation();
        }
    }

    private handleSectionActivation(sectionId: string): void {
        if (this.currentActiveSection === sectionId) return;

        // Deactivate previous section
        if (this.currentActiveSection) {
            this.stopViewTimeTracking(
                this.currentActiveSection as keyof DepartmentStats
            );
            this.lastVisibleTime[this.currentActiveSection] = 0;
            this.sectionViewTime[this.currentActiveSection] = 0;
        }

        // Activate new section
        this.currentActiveSection = sectionId;
        this.lastVisibleTime[sectionId] = Date.now();
        this.showViewingNotification(sectionId);
        this.startViewTimeTracking(sectionId as keyof DepartmentStats);
    }

    private handleSectionDeactivation(): void {
        if (this.currentActiveSection) {
            this.stopViewTimeTracking(
                this.currentActiveSection as keyof DepartmentStats
            );
            this.lastVisibleTime[this.currentActiveSection] = 0;
            this.sectionViewTime[this.currentActiveSection] = 0;
            this.hideViewingNotification();
            this.currentActiveSection = null;
        }
    }

    // Notifikasi "Sedang Melihat"
    private showViewingNotification(sectionId: string): void {
        const existing = document.querySelector(
            `.viewing-notification[data-section="${sectionId}"]`
        );
        if (existing) existing.remove();

        const notification = document.createElement("div");
        notification.className =
            "viewing-notification fixed top-4 right-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg z-50";
        notification.setAttribute("data-section", sectionId);
        notification.innerHTML = `
            <div class="flex items-center gap-2">
                <span>👁️</span>
                <span>Melihat <strong>${sectionId.toUpperCase()}</strong></span>
            </div>
        `;

        document.body.appendChild(notification);
        console.log(`📢 Notifikasi: Sedang melihat ${sectionId}`);
    }

    private hideViewingNotification(): void {
        const existing = document.querySelectorAll(".viewing-notification");
        existing.forEach((notif) => notif.remove());
        console.log("📢 Semua notifikasi viewing dihapus");
    }

    private startViewTimeTracking(sectionId: keyof DepartmentStats): void {
        this.stopViewTimeTracking(sectionId);

        this.sectionTimers[sectionId] = setInterval(() => {
            if (this.lastVisibleTime[sectionId]) {
                const currentTime = Date.now();
                const elapsed = currentTime - this.lastVisibleTime[sectionId];
                this.sectionViewTime[sectionId] = elapsed;

                if (Math.round(elapsed / 1000) % 2 === 0 && elapsed < 8000) {
                    console.log(
                        `⏰ ${sectionId}: ${Math.round(elapsed / 1000)}s`
                    );
                }

                if (elapsed >= 8000) {
                    console.log(`🎯 AUTO-INCREMENT untuk: ${sectionId}`);

                    this.incrementStat(sectionId, "view"); // 🔴 Pakai method baru

                    this.showAutoIncrementNotification(sectionId);

                    this.stopViewTimeTracking(sectionId);
                    this.lastVisibleTime[sectionId] = 0;
                    this.sectionViewTime[sectionId] = 0;
                }
            }
        }, 1000);
    }

    private stopViewTimeTracking(sectionId: keyof DepartmentStats): void {
        if (this.sectionTimers[sectionId]) {
            clearInterval(this.sectionTimers[sectionId]);
            delete this.sectionTimers[sectionId];
        }
    }

    // Notifikasi auto-increment
    private showAutoIncrementNotification(
        sectionId: string,
        isDebug: boolean = false
    ): void {
        if (isDebug) {
            const existing = document.querySelector(
                ".auto-increment-notification"
            );
            if (existing) existing.remove();

            const notification = document.createElement("div");
            notification.className =
                "auto-increment-notification fixed top-16 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50";
            notification.innerHTML = `
            <div class="flex items-center gap-2">
                <span>🎯</span>
                <span>+1 <strong>${sectionId.toUpperCase()}</strong></span>
            </div>
        `;

            document.body.appendChild(notification);
            console.log(`✅ Auto-increment: +1 untuk ${sectionId}`);

            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 3000);
        }
    }

    private scrollToSection(sectionId: string): void {
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            const sectionTop = targetSection.offsetTop;
            const sectionHeight = targetSection.offsetHeight;
            const windowHeight = window.innerHeight;
            const scrollPosition =
                sectionTop - windowHeight / 2 + sectionHeight / 2;

            window.scrollTo({
                top: scrollPosition,
                behavior: "smooth",
            });
        } else {
            console.warn(`❌ Section ${sectionId} not found for scrolling`);
        }
    }

    private async sendStatsToServer(
        departemen: keyof DepartmentStats,
        type: "click" | "view"
    ): Promise<void> {
        try {
            // Dapatkan CSRF token dari meta tag
            const csrfToken =
                document
                    .querySelector('meta[name="csrf-token"]')
                    ?.getAttribute("content") || "";

            const response = await fetch("/jurusan/increment-stats", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({
                    departemen,
                    type,
                }),
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const result = await response.json();
        } catch (error) {
            console.error("❌ Gagal mengirim statistik:", error);
            this.queueFailedRequest(departemen, type);
        }
    }

    private getCsrfToken(): string {
        // Coba beberapa cara untuk mendapatkan CSRF token
        const metaTag = document.querySelector('meta[name="csrf-token"]');
        if (metaTag) {
            return metaTag.getAttribute("content") || "";
        }

        // Fallback: cari token dari input hidden
        const csrfInput = document.querySelector('input[name="_token"]');
        if (csrfInput) {
            return (csrfInput as HTMLInputElement).value;
        }

        // Fallback: cari dari header
        const csrfHeader = document.querySelector('meta[name="csrf-token"]');
        if (csrfHeader) {
            return csrfHeader.getAttribute("content") || "";
        }

        console.warn("⚠️ CSRF token tidak ditemukan");
        return "";
    }

    private queueFailedRequest(
        departemen: keyof DepartmentStats,
        type: "click" | "view"
    ): void {
        try {
            const failedRequests = JSON.parse(
                localStorage.getItem("failedStatsRequests") || "[]"
            );
            failedRequests.push({
                departemen,
                type,
                timestamp: Date.now(),
            });
            localStorage.setItem(
                "failedStatsRequests",
                JSON.stringify(failedRequests)
            );
        } catch (error) {
            console.error("Gagal menyimpan failed request:", error);
        }
    }

    private async retryFailedRequests(): Promise<void> {
        try {
            const failedRequests = JSON.parse(
                localStorage.getItem("failedStatsRequests") || "[]"
            );
            if (failedRequests.length === 0) return;

            const successful: any[] = [];
            const failed: any[] = [];

            for (const request of failedRequests) {
                try {
                    await this.sendStatsToServer(
                        request.departemen,
                        request.type
                    );
                    successful.push(request);
                } catch (error) {
                    failed.push(request);
                }
            }

            // Simpan ulang yang gagal
            localStorage.setItem("failedStatsRequests", JSON.stringify(failed));
        } catch (error) {
            console.error("Error retrying failed requests:", error);
        }
    }

    // Utility function untuk throttle
    private throttle<T extends (...args: any[]) => any>(
        func: T,
        limit: number
    ): T {
        let inThrottle: boolean;
        return ((...args: any[]) => {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => (inThrottle = false), limit);
            }
        }) as T;
    }

    // Update chart dengan data baru
    public updateChart(): void {
        // 🔴 DEBUG: Log current stats
        console.log("🔢 Current stats:", this.stats);
        console.log("🔢 Stats types:", {
            elektro: typeof this.stats.elektro,
            otomotif: typeof this.stats.otomotif,
            pemesinan: typeof this.stats.pemesinan,
            tik: typeof this.stats.tik,
        });

        if (!this.chart) {
            this.initializeChart();
            return;
        }

        const { labels, data, colors, total } = this.prepareChartData();

        this.chart.data.labels = labels;
        this.chart.data.datasets[0].data = data;
        this.chart.data.datasets[0].backgroundColor = colors;
        this.chart.data.datasets[0].borderColor = colors.map((color) =>
            color.replace("0.8", "1").replace("0.6", "1")
        );

        this.chart.update("none");
        this.updateChartLegend();
        this.updateTotalClicks();
    }

    // Destroy chart
    public destroy(): void {
        if (this.chart) {
            this.chart.destroy();
            this.chart = null;
        }

        Object.values(this.sectionTimers).forEach((timer) => {
            clearInterval(timer);
        });
        this.sectionTimers = {};

        this.hideViewingNotification();
        const autoNotification = document.querySelector(
            ".auto-increment-notification"
        );
        if (autoNotification) autoNotification.remove();
    }
}

// Fungsi utama chart gabungan (existing)
export async function initChartGabungan(): Promise<void> {
    const canvas = document.getElementById(
        "chartGabungan"
    ) as HTMLCanvasElement | null;
    if (!canvas) {
        return;
    }

    try {
        const response = await fetch("/api/chart-data");
        const chartData = await response.json();

        new Chart(canvas, {
            type: "line",
            data: {
                labels: chartData.labels,
                datasets: [
                    {
                        label: "Pendaftar",
                        data: chartData.pendaftar,
                        borderColor: "#f97316",
                        backgroundColor: "rgba(249, 115, 22, 0.1)",
                        borderWidth: 3,
                        fill: true,
                        tension: 0,
                        pointRadius: 0,
                        pointHitRadius: 10,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#f97316",
                    },
                    {
                        label: "Peserta Diterima",
                        data: chartData.diterima,
                        borderColor: "#3b82f6",
                        backgroundColor: "rgba(59, 130, 246, 0.1)",
                        borderWidth: 3,
                        fill: true,
                        tension: 0,
                        pointRadius: 0,
                        pointHitRadius: 10,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "#3b82f6",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: "nearest",
                    intersect: false,
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 250,
                        ticks: {
                            stepSize: 50,
                        },
                        grid: {
                            color: "rgba(0,0,0,0.05)",
                        },
                        title: {
                            display: true,
                            text: "Jumlah Siswa",
                            color: "#374151",
                            font: {
                                size: 18,
                                weight: "bold",
                            },
                        },
                    },
                    x: {
                        grid: {
                            color: "rgba(0,0,0,0.05)",
                        },
                        title: {
                            display: true,
                            text: "Tahun",
                            color: "#374151",
                            font: {
                                size: 18,
                                weight: "bold",
                            },
                        },
                    },
                },
                plugins: {
                    tooltip: {
                        enabled: true,
                        backgroundColor: "#111827",
                        titleColor: "#fff",
                        bodyColor: "#f3f4f6",
                        padding: 10,
                        displayColors: false,
                    },
                    legend: {
                        labels: {
                            usePointStyle: true,
                        },
                    },
                },
            },
            plugins: [arrowPlugin],
        });
    } catch (error) {
        console.error("❌ Error initializing chart gabungan:", error);
    }
}

// Export instance manager
export let jurusanChartManager: JurusanChartManager;

// Initialize function untuk jurusan chart
export async function initJurusanChart(): Promise<void> {
    jurusanChartManager = new JurusanChartManager();
    await jurusanChartManager.initializeAsync();
}
