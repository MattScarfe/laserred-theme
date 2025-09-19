import { defineConfig } from 'vite'
import legacy from '@vitejs/plugin-legacy'

export default defineConfig({
  plugins: [
    legacy({
      targets: ['defaults', 'not IE 11'],
    }),
  ],
  css: {
    postcss: './postcss.config.js',
  },
  build: {
    // Output directory for production build
    outDir: 'dist',
    // Generate manifest.json in outDir
    manifest: true,
    rollupOptions: {
      input: 'src/js/main.js',
      output: {
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: '[ext]/[name].[ext]'
      }
    }
  },
  server: {
    // Local development server settings
    host: 'localhost',
    port: 3003,
    strictPort: true,
    cors: true,
    origin: 'http://localhost:3003',
    hmr: {
      protocol: 'ws',
      host: 'localhost',
    },
    headers: {
      'Access-Control-Allow-Origin': '*'
    }
  }
})