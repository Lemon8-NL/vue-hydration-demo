const common = require('./webpack.common.js');
const merge = require('webpack-merge');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

module.exports = merge(common, {
    mode: 'development',
    plugins: [
        new BundleAnalyzerPlugin({analyzerMode:'static'})
    ]
});
