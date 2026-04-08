export async function initVisitorChart(apiUrl, labels, data) {
    const ctx = document.getElementById('visitorChart');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pengunjung Per Hari',
                data: data,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    const indicator = document.getElementById('live-indicator');

    async function updateChart() {
        try {
            const res = await fetch(apiUrl, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!res.ok) throw new Error("Request failed");

            const newData = await res.json();
            chart.data.labels = newData.map(d => d.visit_date);
            chart.data.datasets[0].data = newData.map(d => d.total);
            chart.update();

            indicator.textContent = "Server APIs Connected";
            indicator.classList.remove('text-red-500');
            indicator.classList.add('text-green-500');
        } catch {
            indicator.textContent = "Connection lost ⚠️";
            indicator.classList.remove('text-green-500');
            indicator.classList.add('text-red-500');
        }
    }

    setInterval(updateChart, 5000);
}