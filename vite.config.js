import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  root: './', // Set the root to your theme directory
  build: {
    outDir: 'dist', // Build the output in a "dist" folder
    assetsDir: '', // No subdirectory for assets
    rollupOptions: {
      input: {
        main: path.resolve(__dirname, 'assets/js/main.js'), // Entry point for your main JavaScript file
      }
    }
  },
  server: {
    watch: {
      usePolling: true, // Enable polling for file watchers
    }
  }
});