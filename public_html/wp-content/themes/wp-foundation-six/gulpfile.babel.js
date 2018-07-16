import gulp from 'gulp';
import gulpLoadPlugins from 'gulp-load-plugins';
import webpackConfig from './webpack.config.babel.js';
import os from 'os';

const $ = gulpLoadPlugins({pattern: ['*']});
const reload = $.browserSync.reload;
const argv = $.yargs.argv;
const notifyOn = os.platform() !== 'linux' ? true : false;

// Paths for source and distribution files
function directory_list() {
	const directory_list = {
		theme_components: 'theme_components',
		build_dir: '../wp-foundation-six-build',
	};

	if ( argv.build ) {
		directory_list.assets = '../wp-foundation-six-build/assets';
	} else {
		directory_list.assets = 'assets';
	}

	return directory_list;
}

const dir = directory_list();

// BrowserSync Dev URL to reload
const proxy_target = 'localhost';

gulp.task('scripts', () => {
	return gulp.src([`${dir.theme_components}/js/global-scripts.js`])
		.pipe($.plumber())
		.pipe($.webpackStream(webpackConfig, $.webpack))
		.pipe(gulp.dest(`${dir.assets}/js`))
		.pipe(reload({stream: true}))
		.pipe($.if(notifyOn, $.notify({ message: 'Scripts Task Completed.', onLast: true })));
});

gulp.task('scripts:jquery', () => {
	// Sets up modern jQuery for WordPress to use in functions.php
	return gulp.src('./node_modules/jquery/dist/jquery.js')
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe(gulp.dest(`${dir.assets}/js/vendors`));
});

gulp.task('styles', ['lint:sass'], () => {
	return gulp.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.sass.sync({
			outputStyle: 'compact',
			precision: 10,
			includePaths: [
				'node_modules'
			]
		}).on('error', $.sass.logError))
		.pipe($.postcss([
			$.autoprefixer({ browsers: [
				'last 3 versions',
				'ie >= 8',
				'Android >= 2.3',
				'ios >= 7'
			]}),
			$.cssnano()
		]))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.size({
			title: 'Styles: ',
			gzip: true,
			pretty: true
		}))
		.pipe(gulp.dest(`${dir.assets}/css`))
		.pipe($.if(!argv.build, $.browserSync.stream({match: '**/*.css'})))
		.pipe($.if(notifyOn, $.notify({ message: 'Styles Task Completed.', onLast: true })));
});

gulp.task('lint:sass', () => {
	return gulp.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe($.sassLint({
			config: './.sass-lint.yml'
		}))
		.pipe($.sassLint.format())
		.pipe($.sassLint.failOnError());
});

gulp.task('images', () => {
	// Optimize all images to be used on the site using imageoptim
	// TODO: Improve with SVG/PNG sprite generator
	// TODO: Added Favicon/App Icon generator
	return gulp.src(`${dir.theme_components}/images/**/*`)
		.pipe($.imagemin({
			progressive: true,
			interlaced: true,
			// don't remove IDs from SVGs, they are often used
			// as hooks for embedding and styling
			svgoPlugins: [{cleanupIDs: false}],
			use: [$.imageminPngquant({quality: '65-80', speed: 4})],
		}).on('error', function (err) {
			console.log(err); // eslint-disable-line no-console
			this.end();
		}))
		.pipe(gulp.dest(`${dir.assets}/images`));
});

gulp.task('fonts', () => {
	// Copy fonts out of theme_components into build directory
	return gulp.src(`${dir.theme_components}/fonts/**/*`)
		.pipe(gulp.dest(`${dir.assets}/fonts`));
});

gulp.task('icons', () => {
	// Copy fonts out of theme_components into build directory
	return gulp.src(`${dir.theme_components}/icons/**/*`)
		.pipe(gulp.dest(`${dir.assets}/icons`));
});


/**
 * Action Tasks
 *
 *
*/
gulp.task('serve', ['styles', 'scripts', 'scripts:jquery', 'images', 'fonts', 'icons'], () => {
	var files = [
		'**/*.php'
	];

	$.browserSync(files, {
		proxy: {
			target: proxy_target
		},
		open: false,
		browser: 'google chrome',
		notify: false
	});

	gulp.watch([`${dir.theme_components}/sass/**/*`], ['styles']);
	gulp.watch([`${dir.theme_components}/js/**/*`], ['scripts']).on('change', reload);
	gulp.watch([`${dir.theme_components}/fonts/**/*`], ['fonts']).on('change', reload);
	gulp.watch([`${dir.theme_components}/images/**/*`], ['images']).on('change', reload);
});

gulp.task('watch', ['styles', 'scripts', 'scripts:jquery', 'images', 'fonts', 'icons'], () => {
	gulp.watch([`${dir.theme_components}/sass/**/*`], ['styles']);
	gulp.watch([`${dir.theme_components}/js/**/*`], ['scripts']);
	gulp.watch([`${dir.theme_components}/fonts/**/*`], ['fonts']);
	gulp.watch([`${dir.theme_components}/images/**/*`], ['images']);
});

gulp.task('watch:code', ['styles', 'scripts'], () => {
	gulp.watch([`${dir.theme_components}/sass/**/*`], ['styles']);
	gulp.watch([`${dir.theme_components}/js/**/*`], ['scripts']);
});

gulp.task('clean',
	$.del.bind(null, [dir.build_dir, 'assets'], { force : true })
);

gulp.task('copy', () => {
	return gulp.src([
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
	]).pipe($.if(argv.build, gulp.dest(dir.build_dir)));
});

gulp.task('build', ['styles', 'scripts', 'scripts:jquery', 'images', 'fonts', 'icons', 'copy'], () => {
	return gulp.src('./')
		.pipe($.if(
			notifyOn,
			$.notify({
				message: 'Build Task Completed.',
				onLast: true
			})
		));
});

gulp.task('build:code', ['styles', 'scripts']);

gulp.task('default', ['clean'], () => {
	gulp.start('build');
});
