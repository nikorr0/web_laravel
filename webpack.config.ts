import path from 'path';
import webpack from 'webpack';
// const path = require('path');


const sharedConfig: webpack.Configuration =  {
    entry: './resources/script.js',
    mode: 'development',
    watch: true,
    output: {
        filename: 'main.js',
        path: path.resolve(__dirname, './public'), //path.resolve(__dirname, './resources/js'),
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

// compiles in resources/js
const configResources: webpack.Configuration = {
  ...sharedConfig,
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'resources/js'),
  },
};

// compiles in public/
const configPublic: webpack.Configuration = {
  ...sharedConfig,
  output: {
    filename: 'main.js',
    path: path.resolve(__dirname, 'public'),
  },
};

export default [configResources, configPublic];