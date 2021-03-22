const webpack = require('webpack');
const path = require('path');
//const MiniCssExtractPlugin = require('mini-css-extract-plugin')

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
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '../css/[name].css',
                        }
                    },
                    {
                        loader: 'extract-loader'
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: [
                                    [
                                        "autoprefixer",
                                        {
                                            // Options
                                        },
                                    ],
                                ],
                            },
                        },
                    },
                    {
                        loader: 'sass-loader'
                    }
                ]
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
                test: /\.css$/,
                use: ['style-loader', 'css-loader', 'postcss-loader']
            },
        ]
    },
    plugins: [
        /*new MiniCssExtractPlugin({
            filename: '[name].css',
            chunkFilename: '[id].css',
        }),*/
    ],
    externals: {
        $: '$',
        jquery: 'jQuery'
    },
};


module.exports = config;
