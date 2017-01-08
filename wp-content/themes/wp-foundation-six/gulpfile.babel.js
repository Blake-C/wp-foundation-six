import gulp from 'gulp';
import gulpLoadPlugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import del from 'del';
import yargs from 'yargs';
import pngquant from 'imagemin-pngquant';
import webpackConfig from "./webpack.config.js";

const $ = gulpLoadPlugins({pattern: ["*"]});
const reload = browserSync.reload;
const argv = yargs.argv;

// Paths for source and distribution files
const dir = {
	theme_components: 'theme_components',
	dev: 'assets',
	build: '../wp-foundation-six-build',
	build_assets: '../wp-foundation-six-build/assets'
};

// BrowserSync Dev URL to reload
const proxy_target = 'wp-foundation-six';

gulp.task('styles', ['lint:sass'], () => {
	return gulp.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.sassGlob())
		.pipe($.sass.sync({
			outputStyle: 'compact',
			precision: 10
		}).on('error', $.sass.logError))
		.on('error', $.notify.onError({ message: 'Error: <%= error.message %>', onLast: true }))
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
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/css`), gulp.dest(`${dir.dev}/css`)))
		.pipe($.if(!argv.build, browserSync.stream({match: '**/*.css'})))
		.pipe($.notify({ message: 'Styles Task Completed.', onLast: true }));
});

gulp.task('lint:sass', function() {
	return gulp.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe($.sassLint({
			config: './.sass-lint.yml'
		}))
		.pipe($.sassLint.format())
		.pipe($.sassLint.failOnError())
});

gulp.task('scripts', () => {
	return gulp.src([`${dir.theme_components}/js/global-scripts.js`])
		.pipe($.plumber())
		.pipe($.webpackStream(webpackConfig, $.webpack))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js`), gulp.dest(`${dir.dev}/js`)))
		.pipe(reload({stream: true}))
		.pipe($.notify({ message: 'Scripts Task Completed.', onLast: true }));
});

gulp.task('scripts:vendors', ['scripts:ie', 'scripts:jquery', 'scripts:rem']);

gulp.task('scripts:ie', () => {
	// Combines all the IE8 fallback scripts to be called in footer
	return gulp.src([
			'./node_modules/nwmatcher/src/nwmatcher.js',
			'./theme_components/js/vendors-legacy/selectivizr.js', // not on npm, saved in project for now
			'./node_modules/Respond.js/dest/respond.src.js'
		])
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.concat('ie-scripts.js'))
		.pipe($.if(argv.build, $.uglify()))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors`), gulp.dest(`${dir.dev}/js/vendors`)));
});

/**
 * Removed jquery legacy reference. The only legacy jquery will be referenced from a CDN sourse.
 */

gulp.task('scripts:jquery', () => {
	// Sets up modern jQuery for WordPress to use in functions.php
	return gulp.src('./node_modules/jquery/dist/jquery.js')
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors/jquery`), gulp.dest(`${dir.dev}/js/vendors/jquery`)));
});

gulp.task('scripts:rem', () => {
	// Sets up rem unit polyfill for WordPress to use in functions.php
	return gulp.src('./node_modules/rem/js/rem.js')
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.if(argv.build, $.uglify()))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors`), gulp.dest(`${dir.dev}/js/vendors`)));
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
			use: [pngquant({quality: '65-80', speed: 4})],
		})
		.on('error', function (err) {
			console.log(err);
			this.end();
		}))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/images`), gulp.dest(`${dir.dev}/images`)));
});

gulp.task('fonts', () => {
	// Copy fonts out of theme_components into build directory
	return gulp.src(`${dir.theme_components}/fonts/**/*`)
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/fonts`), gulp.dest(`${dir.dev}/fonts`)));
});

gulp.task('icons', () => {
	// Copy fonts out of theme_components into build directory
	return gulp.src(`${dir.theme_components}/icons/**/*`)
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/icons`), gulp.dest(`${dir.dev}/icons`)));
});


/**
 * Action Tasks
 *
 *
*/
gulp.task('serve', ['styles', 'scripts', 'scripts:vendors', 'images', 'fonts', 'icons'], () => {
	var files = [
		'**/*.php'
	];

	browserSync(files, {
		proxy: {
			target: proxy_target
		},
		browser: 'google chrome',
		notify: false
	});

	gulp.watch([`${dir.theme_components}/sass/**/*`], ['styles']);
	gulp.watch([`${dir.theme_components}/js/**/*`], ['scripts']).on('change', reload);
	gulp.watch([`${dir.theme_components}/fonts/**/*`], ['fonts']).on('change', reload);
	gulp.watch([`${dir.theme_components}/images/**/*`], ['images']).on('change', reload);
});

gulp.task('watch', ['styles', 'scripts', 'scripts:vendors', 'images', 'fonts', 'icons'], () => {
	gulp.watch([`${dir.theme_components}/sass/**/*`], ['styles']);
	gulp.watch([`${dir.theme_components}/js/**/*`], ['scripts']);
	gulp.watch([`${dir.theme_components}/fonts/**/*`], ['fonts']);
	gulp.watch([`${dir.theme_components}/images/**/*`], ['images']);
});

gulp.task('clean',
	del.bind(null, [dir.build, dir.dev], {force : true})
);

gulp.task('copy', () => {
	return gulp.src([
		'./**/*',
		'!./bower_components{,/**}',
		'!./node_modules{,/**}',
		'!./theme_components{,/**}',
		'!./codesniffer.ruleset.xml',
		'!./gulpfile.babel.js',
		'!./webpack.config.js',
		'!./yarn.lock',
		'!./{,*}.json'
	])
	.pipe($.if(argv.build, gulp.dest(dir.build)));
})

gulp.task('build', ['styles', 'scripts', 'scripts:vendors', 'images', 'fonts', 'icons', 'copy'], () => {
	return gulp.src(dir.build_assets + '/**/*')
		.pipe($.size({title: 'build', gzip: true}))
		.pipe(gulp.dest( dir.build_assets ))
		.pipe($.notify({ message: 'Build Task Completed.', onLast: true }));
});

gulp.task('default', ['clean'], () => {
	gulp.start('build');
});
