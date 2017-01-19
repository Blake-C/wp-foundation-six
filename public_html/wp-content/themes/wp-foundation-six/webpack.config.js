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
import validaate from 'webpack-validator';
import scripts_list from './theme_components/js/scripts-list.js';

const webpackConfig = validaate({
	context: path.resolve(__dirname, './'),
	entry: scripts_list,
	output: {
		filename: 'bundle.[name].js'
	},
	externals: {
		jquery: "jQuery"
	},
	devtool: 'source-map',
	eslint: {
		failOnWarning: false,
		failOnError: true
	},

	/**
	 * Modules
	 *
	 */
	module: {
		preLoaders: [
			{
				test: /\.jsx?$/,
				loader: 'eslint-loader',
				exclude: /(node_modules|bower_components')/
			}
		],
		loaders: [
			{
				test: /\.jsx?$/,
				loader: 'babel',
				exclude: /(node_modules|bower_components)/
			}
		]
	},

	/**
	 * Plugins
	 *
	 * List of Modernizr feature detects can be found here:
	 * @link https://github.com/Modernizr/Modernizr/blob/master/lib/config-all.json
	 */
	plugins: [
		new webpack.optimize.DedupePlugin(),
		new webpack.optimize.OccurenceOrderPlugin(),
		new webpack.optimize.UglifyJsPlugin({
			compress: {
				screw_ie8: false,
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
				'css/transitions',
				'ie8compat'
			]
		})
	]
})

export default webpackConfig;