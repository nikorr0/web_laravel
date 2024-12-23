import path from 'path';
import webpack from 'webpack';
// const path = require('path');


const config: webpack.Configuration =  {
    entry: './resources/script.js',
    mode: 'development',
    watch: true,
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, './public'),
    },
    module:{
        rules: [{
            test: /\.(scss)$/,
            use: [{
                // inject CSS to page
                loader: 'style-loader'
            }, {
                // translates CSS into CommonJS modules
                loader: 'css-loader'
            }, {
                // Run postcss actions
                loader: 'postcss-loader',
                options: {
                    postcssOptions: {
                        // postcss plugins, can be exported to postcss.config.js
                        plugins: function () {
                            return [
                                require('autoprefixer')
                            ];
                        }
                    }
                }
            }, {
                // compiles Sass to CSS
                loader: 'sass-loader'
            }]
        }]
    }
};


export default config;
