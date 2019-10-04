const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
//const ProvidePlugin = require('webpack/lib/ProvidePlugin');
const { VueLoaderPlugin } = require('vue-loader');
const FontminPlugin = require('fontmin-webpack');


module.exports = {
    entry: {
        //aboutuspage: './bundles/AboutUsPage1.js',
        //contentpage: './bundles/ContentPage1.js',
        aboutuspage: './bundles/AboutUsPage2.js',
        contentpage: './bundles/ContentPage2.js',
    },
    output: {
        path: path.resolve('../../public/resources/app'),
        filename: 'js/[name].bundle.js',
        chunkFilename: 'js/[name].bundle.js',
        publicPath: '/resources/app/',
    },
    watchOptions: {
        poll: 300,
        ignored: /node_modules/
    },
    context: path.resolve(__dirname),
    module: {
        rules: [
            {
                test: /.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                use: [{
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]',
                        outputPath: 'fonts', // where the fonts will go
                        publicPath: '/resources/app/fonts' // override the default path
                    }
                }]
            },
            {
                test:/\.css$/,
                use:[
                    { loader: 'style-loader', options: { singleton: true, sourceMap: false } },
                    'css-loader'
                ]
            },
            {
                test: /\.(sa|sc|c)ss$/,
                    use: [
                            {
                                loader: MiniCssExtractPlugin.loader,
                                options: {
                                    publicPath: '/resources/app/css/'
                                }
                            },
                            "css-loader",
                            {
                                loader: 'postcss-loader',
                                options: {
                                    config: {
                                        path: 'postcss.config.js'
                                    }
                                }
                            },
                            { loader: "sass-loader", options: { outputStyle: 'expanded' } }
                        ]

            },
            {
                test: /\.(gif|png|jpg)$/,
                loader: 'url-loader'
            },
            {
                test: /\.vue$/,
                use: 'vue-loader'
            }
        ]
    },
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        },
        modules: [
            path.resolve('./client'),
            path.resolve('./node_modules')
        ]
    },
    optimization: {
            splitChunks: {
                chunks: 'initial',
                minSize: 0,
                maxSize: 0,
                minChunks: 8,
                name: 'common'
            }
    },
    plugins: [
        // clean up crew: clear all previous output from webpack (dangerouslyAllow is needed because we're using the /public/ folder)
        new CleanWebpackPlugin({
            verbose: true,
            dry: false,
            cleanOnceBeforeBuildPatterns: ['css','js'],
            dangerouslyAllowCleanPatternsOutsideProject: true,
        }),
        // loader for vue plugins
        new VueLoaderPlugin(),
        // here we tell the plugin where to dump the css bundles and how to name them
        new MiniCssExtractPlugin({
            filename: "css/[name].css",
            chunkFilename: "css/[name].css",
        }),
        //removes all unused parts of the font-awesome font files
        new FontminPlugin({
            autodetect: true, // automatically pull unicode characters from CSS
        })
    ]
};
