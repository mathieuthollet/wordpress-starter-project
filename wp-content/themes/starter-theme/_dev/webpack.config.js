const webpack = require('webpack');
const path = require('path');

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
        filename: '[name].js',
        assetModuleFilename: '../[path][name][ext]'
    },
    module: {
        rules: [
            {
                test: /\.js/,
                loader: 'babel-loader'
            },
            {
                test: /\.(png|svg|jpg|jpeg|gif)$/i,
                type: 'asset/resource',
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf)$/i,
                type: 'asset/resource',
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
                        loader: 'sass-loader'
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
                ]
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader', 'postcss-loader']
            },
        ]
    },
    externals: {
        $: '$',
        jquery: 'jQuery'
    },
};


module.exports = config;
