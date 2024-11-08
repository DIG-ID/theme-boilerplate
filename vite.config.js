import { defineConfig } from 'vite';
import liveReload from 'vite-plugin-live-reload';

export default defineConfig({
  plugins: [
    liveReload(['./**/*.php']), // Reload on PHP file changes
  ],
  root: './', // Set the root to your theme directory
  build: {
    outDir: 'dist', // Build the output in a "dist" folder
    assetsDir: '', // No subdirectory for assets
    manifest: true,
    rollupOptions: {
      input: [
        'src/js/main.js',
        'src/sass/main.js',
      ]
    }
  },
  server: {
    watch: {
      usePolling: true, // Enable polling for file watchers
    },
    port: 3000,
    open: true,
    proxy: {
      // Proxying WordPress to avoid CORS issues
      'http://theme-starter.digid': 'http://localhost:8000',  // Adjust if needed
    },
    /*proxy: {
      // Proxy requests to your local WordPress domain
      '/': {
        target: 'http://teste-theme.local',
        changeOrigin: true,
      },
    }*/
  }
});