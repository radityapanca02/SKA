import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');

    return {
        plugins: [
            laravel({
                input: ["resources/css/app.css", "resources/ts/app.ts", "resources/js/admin-pagination.js"],
                refresh: true,
            }),
        ],
        server: {
            host: env.VITE_HOST || 'localhost',
            port: Number.parseInt(env.VITE_PORT) || 5173,
            watch: {
                usePolling: true,
                interval: 500,
            },
            hmr: {
                host: env.VITE_HOST || 'localhost',
                protocol: 'ws',
                port: Number.parseInt(env.VITE_PORT) || 5173,
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
