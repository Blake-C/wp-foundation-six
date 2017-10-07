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
import modernizrFeatureDetects from './theme_components/js/modernizr-feature-detects.js';

const webpackConfig = {
	entry: scriptsList,
	output: {
		path: path.resolve(__dirname, './assets/js'), // eslint-disable-line no-undef
		filename: 'bundle.[name].js'
	},
	externals: {
		jquery: 'jQuery',
		modernizr: 'Modernizr'
	},
	devtool: 'source-map',
	module: {
		rules: [{
			/**
			 * @link https://github.com/webpack/webpack/issues/3017#issuecomment-285954512
			 * @link https://github.com/jquery/jquery-migrate/issues/273
			 */
			parser: { amd: false }
		}, {
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
			exclude: /(node_modules)/,
			options: {
				'presets': [
					['env', {
						'targets': {
							'browsers': ['last 3 versions', 'ie >= 9']
						},
						'modules': false
					}]
				]
			}
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
				'html5printshiv',
				'html5shiv',
				'prefixed',
				'setClasses'
			],
			'feature-detects': modernizrFeatureDetects
		})
	]
};

export default webpackConfig;
