const common = require('./webpack.common.js');
const merge = require('webpack-merge');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

// included babelminify instead of TerserJSPlugin due to the following info:
//https://fontawesome.com/how-to-use/with-the-api/other/tree-shaking
const BabelMinifyPlugin = require('babel-minify-webpack-plugin');


module.exports = merge(common, {
    mode: 'production',
    optimization: {
        minimizer: [
            new OptimizeCssAssetsPlugin({
                    cssProcessor: require("cssnano"),
                    cssProcessorPluginOptions: {
                        preset: ["default", { discardComments: { removeAll: true } }]
                    }
            }),
            new BabelMinifyPlugin()
        ]
    }
});
