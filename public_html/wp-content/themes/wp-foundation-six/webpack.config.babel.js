/**
 * Webpack Config
 *
 * @link http://css-max.com/getting-started-with-webpack/
 * @link https://shellmonger.com/2016/01/26/using-eslint-with-webpack/
 *
 * Eslint config for module loaders:
 * @link https://github.com/eslint/eslint/issues/4787
 */
import path from 'path'
import scriptsList from './theme_components/js/scripts-list.js'

const webpackConfig = env => {
	return {
		mode: 'production',
		entry: scriptsList,
		output: {
			path: path.resolve(__dirname, env.output), // eslint-disable-line no-undef
			filename: 'bundle.[name].js',
		},
		externals: {
			jquery: 'jQuery',
			modernizr: 'Modernizr',
		},
		devtool: 'source-map',
		stats: {
			/**
			 * @link https://webpack.js.org/configuration/stats/
			 */
			assets: true,
			builtAt: false,
			entrypoints: false,
			hash: false,
			modules: false,
		},
		module: {
			rules: [
				{
					/**
					 * @link https://github.com/webpack/webpack/issues/3017#issuecomment-285954512
					 * @link https://github.com/jquery/jquery-migrate/issues/273
					 */
					parser: { amd: false },
				},
				{
					test: /\.(js|jsx)$/,
					enforce: 'pre',
					exclude: /(node_modules)/,
					use: [
						{
							loader: 'eslint-loader',
							options: {
								failOnWarning: false,
								failOnError: true,
							},
						},
					],
				},
				{
					test: /\.(js|jsx)$/,
					loader: 'babel-loader',
					exclude: /node_modules/,
					options: {
						presets: [
							[
								'@babel/preset-env',
								{
									targets: {
										browsers: [
											'last 3 versions',
											'ie >= 11',
										],
									},
									modules: false,
								},
							],
						],
					},
				},
			],
		},
	}
}

export default webpackConfig
