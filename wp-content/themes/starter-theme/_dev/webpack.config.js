const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const ExtraneousFileCleanupPlugin = require('webpack-extraneous-file-cleanup-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

const production = (process.env.NODE_ENV === 'production');

let config = {
    entry: {
        theme: [
            './js/theme.js',
            './css/theme.scss',
        ],
        editor: [
            './css/editor.scss'
        ],
        print: [
            './css/print.scss'
        ]
    },
    output: {
        path: path.resolve(__dirname, '../assets/js'),
        filename: '[name].js'
    },
    module: {
        rules: [
            {
                test: /\.js/,
                loader: 'babel-loader'
            },
            {
                test: /\.scss$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [
                        {
                            loader: 'css-loader',
                            options: {
                                minimize: production,
                                sourceMap: !production
                            }
                        },
                        {
                            loader: 'postcss-loader',
                            options: {
                                sourceMap: 'inline'
                            }
                        },
                        {
                            loader: 'sass-loader',
                            options: {
                                sourceMap: !production
                            }
                        },
                    ]
                })
            },
            {
                test: /.(png|jpg|gif|woff(2)?|eot|ttf|otf|svg)(\?[a-z0-9=\.]+)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '../[path][name].[ext]'
                        }
                    }
                ]
            },
            {
                test : /\.css$/,
                use: ['style-loader', 'css-loader', 'postcss-loader']
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            }
        ]
    },
    externals: {
        $: '$',
        jquery: 'jQuery'
    },
    plugins: [
        new ExtractTextPlugin(path.join('..', 'css', '[name].css')),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: !production,
            compress: {
                sequences: production,
                conditionals: production,
                booleans: production,
                if_return: production,
                join_vars: production,
                drop_console: production
            },
            output: {
                comments: !production
            },
            minimize: production
        }),
        new ExtraneousFileCleanupPlugin({
            extensions: ['.js']
        }),
        new VueLoaderPlugin()
    ]
};


module.exports = config;
