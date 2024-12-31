import { defineConfig } from "vite";

export default defineConfig({
  server: {
    // Serve Vite on a port other than XAMPP to avoid conflicts
    port: 3000,
    proxy: {
      // Proxy API requests to your PHP backend
      "/api": {
        target: "http://localhost", // URL of your PHP app
        changeOrigin: true,
        rewrite: (path) => path.replace(/^\/api/, ""),
      },
    },
  },
  build: {
    // Output the build files into a folder that PHP can serve
    outDir: "dist",
  },
});
