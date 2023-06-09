const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true,
  devServer: {
    proxy: {
      '/V1': {
        target: 'http://localhost:8888',
        changeOrigin: true,
        pathRewrite: {
          '^/V1': ''
        }
      },
      'api': {
        target: process.env.VUE_APP_BACKEND,
        changeOrigin: true,
        pathRewrite: {
          '^/V2': ''
        }
      },

    }
  }
})
