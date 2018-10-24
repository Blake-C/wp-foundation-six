import gulp from 'gulp'
import gulpLoadPlugins from 'gulp-load-plugins'

const $ = gulpLoadPlugins({ pattern: ['*'] })
const argv = $.yargs.argv

function reload(done) {
	$.browserSync.reload()

	done()
}

// Paths for source and distribution files
function directory_list() {
	const directory_list = {
		theme_components: 'theme_components',
		build_dir: '../wp-foundation-six-build',
	}

	if (argv.build) {
		directory_list.assets = '../wp-foundation-six-build/assets'
	} else {
		directory_list.assets = 'assets'
	}

	return directory_list
}

const dir = directory_list()

// Fetch command line arguments
// @link https://www.sitepoint.com/pass-parameters-gulp-tasks/
const arg = (argList => {
	let arg = {}
	let a
	let opt
	let thisOpt
	let curOpt

	for (a = 0; a < argList.length; a++) {
		thisOpt = argList[a].trim()
		opt = thisOpt.replace(/^-+/, '')

		if (opt === thisOpt) {
			// argument value
			if (curOpt) arg[curOpt] = opt
			curOpt = null
		} else {
			// argument name
			curOpt = opt
			arg[curOpt] = true
		}
	}

	return arg
})(process.argv) // eslint-disable-line no-undef

gulp.task(
	'prettier-js',
	$.shell.task(
		'./node_modules/prettier/bin-prettier.js --write --loglevel warn "./**/*.js"'
	)
)

gulp.task(
	'prettier-scss',
	$.shell.task(
		'./node_modules/prettier/bin-prettier.js --write --loglevel warn "./**/*.scss"'
	)
)

gulp.task(
	'phpcs',
	$.shell.task(
		`../../../vendor/bin/phpcs --standard=phpcs.xml --colors ${
			arg.f ? arg.f : ''
		}`,
		{
			verbose: true,
			ignoreErrors: true,
		}
	)
)

gulp.task(
	'phpfix',
	$.shell.task(
		`../../../vendor/bin/phpcbf --standard=phpcs.xml --colors ${
			arg.f ? arg.f : ''
		}`,
		{
			verbose: true,
			ignoreErrors: true,
		}
	)
)

gulp.task(
	'modernizr',
	$.shell.task(
		`./node_modules/modernizr/bin/modernizr -c modernizr-config.json -d ${
			dir.assets
		}/js/vendors/modernizr.js`,
		{
			verbose: true,
			ignoreErrors: true,
		}
	)
)

gulp.task(
	'webpack',
	$.shell.task(
		`'./node_modules/webpack-cli/bin/cli.js' --env.output ${dir.assets}/js`,
		{
			verbose: true,
			ignoreErrors: true,
		}
	)
)

gulp.task(
	'scripts',
	gulp.series(gulp.parallel('prettier-js', 'modernizr'), 'webpack')
)

function jquery_task() {
	// Sets up modern jQuery for WordPress to use in functions.php
	return gulp
		.src('./node_modules/jquery/dist/jquery.js')
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe(gulp.dest(`${dir.assets}/js/vendors`))
}

gulp.task('scripts:jquery', gulp.series(jquery_task))

function style_lint() {
	return gulp
		.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe(
			$.sassLint({
				config: './.sass-lint.yml',
			})
		)
		.pipe($.sassLint.format())
		.pipe($.sassLint.failOnError())
}

gulp.task('lint:sass', gulp.series('prettier-scss', style_lint))

function styles_task() {
	return gulp
		.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe(
			$.sass
				.sync({
					outputStyle: 'compact',
					precision: 10,
					includePaths: ['node_modules'],
				})
				.on('error', $.sass.logError)
		)
		.pipe(
			$.postcss([
				$.autoprefixer({
					browsers: [
						'last 3 versions',
						'ie >= 8',
						'Android >= 2.3',
						'ios >= 7',
					],
				}),
				$.cssnano(),
			])
		)
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe(
			$.size({
				title: 'Styles: ',
				gzip: true,
				pretty: true,
			})
		)
		.pipe(gulp.dest(`${dir.assets}/css`))
		.pipe($.if(!argv.build, $.browserSync.stream({ match: '**/*.css' })))
}

gulp.task('styles', gulp.series('lint:sass', styles_task))

function images_task() {
	// TODO: Improve with SVG/PNG sprite generator
	// TODO: Added Favicon/App Icon generator
	return gulp
		.src(`${dir.theme_components}/images/**/*`)
		.pipe($.newer(`${dir.assets}/images`))
		.pipe(
			$.imagemin({
				progressive: true,
				interlaced: true,
				svgoPlugins: [
					{
						// don't remove IDs from SVGs, they are often used
						// as hooks for embedding and styling
						cleanupIDs: false,
					},
				],
				use: [
					$.imageminPngquant({
						quality: '65-80',
						speed: 4,
					}),
				],
			}).on('error', () => {
				this.end()
			})
		)
		.pipe(gulp.dest(`${dir.assets}/images`))
}

gulp.task('images', gulp.series(images_task))

function font_task() {
	return gulp
		.src(`${dir.theme_components}/fonts/**/*`)
		.pipe(gulp.dest(`${dir.assets}/fonts`))
}

gulp.task('fonts', gulp.series(font_task))

function icons_task() {
	return gulp
		.src(`${dir.theme_components}/icons/**/*`)
		.pipe(gulp.dest(`${dir.assets}/icons`))
}

gulp.task('icons', gulp.series(icons_task))

function serve_task() {
	const files = ['**/*.php']
	const location = dir.theme_components

	$.browserSync(files, {
		proxy: {
			target: 'localhost',
		},
		open: false,
		browser: 'google chrome',
		notify: false,
	})

	gulp.watch(`${location}/sass/**/*`, gulp.series('styles'))
	gulp.watch(`${location}/js/**/*`, gulp.series('scripts', reload))
	gulp.watch(`${location}/fonts/**/*`, gulp.series('fonts', reload))
	gulp.watch(`${location}/images/**/*`, gulp.series('images', reload))
}

gulp.task(
	'serve',
	gulp.series(
		gulp.parallel(
			'styles',
			'scripts',
			'scripts:jquery',
			'images',
			'fonts',
			'icons'
		),
		serve_task
	)
)

function watch_task() {
	gulp.watch(`${dir.theme_components}/sass/**/*`, gulp.series('styles'))
	gulp.watch(`${dir.theme_components}/js/**/*`, gulp.series('scripts'))
	gulp.watch(`${dir.theme_components}/fonts/**/*`, gulp.series('fonts'))
	gulp.watch(`${dir.theme_components}/images/**/*`, gulp.series('images'))
}

gulp.task(
	'watch',
	gulp.series(
		gulp.parallel(
			'styles',
			'scripts',
			'scripts:jquery',
			'images',
			'fonts',
			'icons'
		),
		watch_task
	)
)

function watch_code_task() {
	gulp.watch(`${dir.theme_components}/sass/**/*`, gulp.series('styles'))
	gulp.watch(`${dir.theme_components}/js/**/*`, gulp.series('scripts'))
}

gulp.task(
	'watch:code',
	gulp.series(gulp.parallel('styles', 'scripts'), watch_code_task)
)

gulp.task('clean', $.del.bind(null, [dir.build_dir, 'assets'], { force: true }))

function copy_task() {
	return gulp
		.src([
			'./**/*',
			'!./bower_components{,/**}',
			'!./node_modules{,/**}',
			'!./theme_components{,/**}',
			'!./codesniffer.ruleset.xml',
			'!./phpcs.xml',
			'!./gulpfile.babel.js',
			'!./webpack.config.js',
			'!./webpack.config.babel.js',
			'!./package.json',
			'!./yarn.lock',
			'!./package-lock.json',
			'!./.babelrc',
			'!./.sass-lint.yml',
			'!./.eslintrc.json',
			'!./.prettierignore',
			'!./.prettierrc',
			'!./modernizr-config.json',
		])
		.pipe($.if(argv.build, gulp.dest(dir.build_dir)))
}

gulp.task(
	'build',
	gulp.series(
		gulp.parallel(
			'styles',
			'scripts',
			'scripts:jquery',
			'images',
			'fonts',
			'icons',
			copy_task
		)
	)
)

gulp.task('build:code', gulp.series(gulp.parallel('styles', 'scripts')))

gulp.task('default', gulp.series('clean', 'build'))
