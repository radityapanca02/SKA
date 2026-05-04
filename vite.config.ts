import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');

    return {
        plugins: [
            laravel({
                input: ["resources/css/app.css", "resources/css/landing.css", "resources/js/landing.js", "resources/ts/app.ts", "resources/js/admin-pagination.js"],
                refresh: true,
            }),
        ],
        server: {
            host: 'localhost',
            port: 5173,
            strictPort: true,
            watch: {
                usePolling: true,
                interval: 500,
            },
            hmr: {
                protocol: 'wss',
                host: env.VITE_HOST,
                clientPort: 443,
            },
        },
        build: {
            minify: 'terser',
            cssCodeSplit: true,
            rollupOptions: {
                output: {
                    manualChunks: {
                        vendor: ['swiper'],
                    },
                },
            },
        },
    };
});
