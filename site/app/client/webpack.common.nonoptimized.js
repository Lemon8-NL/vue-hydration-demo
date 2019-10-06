const path = require('path');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { VueLoaderPlugin } = require('vue-loader');


module.exports = {
    entry: {
        aboutuspage: './bundles/AboutUsPage1.js',
        contentpage: './bundles/ContentPage1.js',
        contactpage: './bundles/ContactPage1.js',
        homepage: './bundles/HomePage1.js',
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
                test: /\.js$/,
                // Ensure that your source code files are still in their ES module form
                // when loaded by Babel to optimize code splitting/bundling
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
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
            // This indicates which chunks will be selected for optimization. When a string is provided, valid
            // values are all, async, and initial. Providing all can be particularly powerful, because it means
            // that chunks can be shared even between async and non-async chunks.
            chunks: 'initial',
            minSize: 0,
            maxSize: 0,
            minChunks: 6,
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
        })
    ]
};
