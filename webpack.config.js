const path = require('path');
const extractCss = require('mini-css-extract-plugin');

module.exports = {
    entry:path.resolve(__dirname,'resources/index.js'),
    output:{
        path:path.resolve(__dirname,'public'),
        filename:'bundle.js'
    },
    module: {
      rules: [
        {
          test: /\.(js)$/,
          exclude: /node_modules/,
          use: {
            loader: "babel-loader"
          }
        },
        /**
         * css loader
         */
        {
            test:/\.(sa|sc|c)ss$/,
            use:[
                {
                    loader:extractCss.loader
                },
                {
                    loader:'css-loader'
                },
                {
                    loader:'sass-loader',
                    options:{
                        implementation:require('sass')
                    }
                }
            ]
        },
        {
            test: /\.(png|jpe?g|gif)$/i,
            use: [
              {
                loader: 'file-loader',
              },
            ],
        }
      ]
    },
    plugins:[
        new extractCss({
            filename:'app.css'
        })
    ],
    mode:'development'
  };