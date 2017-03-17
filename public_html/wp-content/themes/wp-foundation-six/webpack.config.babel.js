/**
 * Webpack Config
 *
 * @link http://css-max.com/getting-started-with-webpack/
 * @link https://shellmonger.com/2016/01/26/using-eslint-with-webpack/
 *
 * Eslint config for module loaders:
 * @link https://github.com/eslint/eslint/issues/4787
*/
import path from 'path';
import webpack from 'webpack';
import ModernizrWebpackPlugin from 'modernizr-webpack-plugin';
import scriptsList from './theme_components/js/scripts-list.js';

const webpackConfig = {
	entry: scriptsList,
	output: {
		path: path.resolve(__dirname, './assets/js'),
		filename: 'bundle.[name].js'
	},
	externals: {
		jquery: "jQuery",
		modernizr: "Modernizr"
	},
	devtool: 'source-map',
	module: {
		rules: [{
			test: /\.(js|jsx)$/,
			enforce: 'pre',
			loader: 'eslint-loader',
			exclude: /(node_modules)/,
			options: {
				failOnWarning: false,
				failOnError: true
			}
		}, {
			test: /\.(js|jsx)$/,
			loader: 'babel-loader',
			exclude: /(node_modules)/
		}]
	},
	plugins: [
		new webpack.optimize.UglifyJsPlugin({
			sourceMap: true,
			compress: {
				screw_ie8: true,
				warnings: false
			}
		}),
		new ModernizrWebpackPlugin({
			filename: 'vendors/bundle.modernizr.js',
			minify: {
				output: {
					comments: false,
					beautify: false
				}
			},
			'options': [
				'setClasses',
				'html5shiv',
				'html5printshiv'
			],
			'feature-detects': [
				'svg',
				'css/transforms',
				'css/transforms3d',
				'css/transitions'
			]
		})
	]
};

export default webpackConfig;
