import { defineConfig } from 'vite';

export default defineConfig({
  root: './', // Set the root to your theme directory
  build: {
    outDir: 'dist', // Build the output in a "dist" folder
    assetsDir: '', // No subdirectory for assets
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
    }
  }
});