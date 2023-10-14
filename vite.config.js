import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import { resolve } from 'path'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  server: {
    origin: 'http://127.0.0.1:8005',
  },
  build: {
    rollupOptions: {
      input: {
        app: resolve(__dirname, 'views/src/entries/mainBundle.js')
      }
    }
  },
  resolve: {
    alias: {
        vue: 'vue/dist/vue.esm-bundler.js',
    },
  }
})
