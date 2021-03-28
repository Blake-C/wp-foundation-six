/* global module require */
const cssnano = require('cssnano')
const autoprefixer = require('autoprefixer')

module.exports = {
	plugins: [
		autoprefixer({
			add: true,
			supports: true,
			flexbox: true,
			grid: 'autoplace',
		}),
		cssnano({
			preset: 'advanced',
		}),
	],
}
