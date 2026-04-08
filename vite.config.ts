import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

// Function untuk detect base URL dynamically
const getBaseUrl = () => {
    if (process.env.NODE_ENV === "development") {
        return "http://smkpgri3mlg.jh-beon.cloud:5173/";
    }

    // Untuk production, gunakan relative path
    return "/build/";
};

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/ts/app.ts"],
            refresh: true,
        }),
    ],
    server: {
        host: "0.0.0.0",
        port: 5173,
        allowedHosts: [
            "smkpgri3mlg.jh-beon.cloud",
            "smkpgri3mlg.web.id",
            "www.smkpgri3mlg.web.id",
        ],
        hmr: {
            host: "smkpgri3mlg.jh-beon.cloud",
        },
    },
    // PASTIKAN base adalah relative path
    base: "/build/",
    build: {
        minify: "terser",
        cssCodeSplit: true,
        assetsDir: "assets",
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ["swiper"],
                },
            },
        },
    },
});
