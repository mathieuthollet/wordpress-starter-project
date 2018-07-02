/**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const ExtraneousFileCleanupPlugin = require('webpack-extraneous-file-cleanup-plugin');

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
                test: /.(png|woff(2)?|eot|ttf|otf|svg)(\?[a-z0-9=\.]+)?$/,
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
            }
        ]
    },
    externals: {
        prestashop: 'prestashop',
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
        })
    ]
};


module.exports = config;