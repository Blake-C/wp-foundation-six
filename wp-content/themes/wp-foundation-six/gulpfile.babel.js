import gulp from 'gulp';
import gulpLoadPlugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import del from 'del';
import yargs from 'yargs';
import pngquant from 'imagemin-pngquant';

const $ = gulpLoadPlugins();
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

gulp.task('styles', () => {
	return gulp.src(`${dir.theme_components}/sass/**/*.scss`)
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.sass.sync({
			outputStyle: 'compact',
			precision: 10,
			includePaths: ['.']
		})
		.on('error', $.sass.logError))
		.on('error', $.notify.onError({ message: 'Error: <%= error.message %>', onLast: true }))
		.pipe($.autoprefixer({browsers: ['last 4 versions', 'Firefox ESR', 'IE 8-11']}))
		.pipe($.cssnano({ autoprefixer: false }))
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

gulp.task('scripts', () => {
	// Compiles custom scripts with exception to partials that are being included in main script files
	return gulp.src([`${dir.theme_components}/js/**/*.js`, `!${dir.theme_components}/js/partials/**/*.js`])
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.babel())
		.on('error', $.notify.onError({ message: 'Error: <%= error.message %>', onLast: true }))
		.pipe($.eslint())
		.pipe($.eslint.format())
		.pipe($.eslint.failAfterError())
		.on('error', $.notify.onError({ message: 'Error: <%= error.message %>', onLast: true }))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.uglify())
		.pipe($.sourcemaps.write('.'))
		.pipe($.size({
			title: 'Scripts: ',
			gzip: true,
			pretty: true
		}))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js`), gulp.dest(`${dir.dev}/js`)))
		.pipe($.if(!argv.build, reload({stream: true})))
		.pipe($.notify({ message: 'Scripts Task Completed.', onLast: true }));
});

gulp.task('scripts:vendors', ['scripts:ie', 'scripts:jquery-legacy', 'scripts:jquery', 'scripts:foundation', 'scripts:rem', 'scripts:modernizr']);

gulp.task('scripts:ie', () => {
	// Combines all the IE8 fallback scripts to be called in footer
	return gulp.src([
			'./bower_components/nwmatcher/src/nwmatcher.js',
			'./bower_components/selectivizr/selectivizr.js',
			'./bower_components/respond/dest/respond.src.js'
		])
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.concat('ie-scripts.js'))
		.pipe($.if(argv.build, $.uglify()))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors`), gulp.dest(`${dir.dev}/js/vendors`)));
});

gulp.task('scripts:jquery-legacy', () => {
	// Sets up legacy jQuery for WordPress to use in functions.php
	return gulp.src('./bower_components/jquery-legacy/dist/jquery.js')
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors/jquery-legacy`), gulp.dest(`${dir.dev}/js/vendors/jquery-legacy`)));
});

gulp.task('scripts:jquery', () => {
	// Sets up modern jQuery for WordPress to use in functions.php
	return gulp.src('./bower_components/jquery/dist/jquery.js')
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.uglify())
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors/jquery`), gulp.dest(`${dir.dev}/js/vendors/jquery`)));
});

gulp.task('scripts:modernizr', () => {
	// Sets up modern jQuery for WordPress to use in functions.php
	return gulp.src('./bower_components/modernizr/modernizr.js')
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.if(argv.build, $.uglify()))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors`), gulp.dest(`${dir.dev}/js/vendors`)));
});

gulp.task('scripts:rem', () => {
	// Sets up modern jQuery for WordPress to use in functions.php
	return gulp.src('./bower_components/REM-unit-polyfill/js/rem.js')
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.if(argv.build, $.uglify()))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors`), gulp.dest(`${dir.dev}/js/vendors`)));
});

gulp.task('scripts:foundation', () => {
	// Sets up foundation scripts for WordPress to use in functions.php
	return gulp.src('./bower_components/foundation-sites/js/**/*')
		.pipe($.plumber())
		.pipe($.include()).on('error', console.log)
		.pipe($.sourcemaps.init())
		.pipe($.babel())
		.pipe($.if(argv.build, $.uglify()))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.sourcemaps.write('.'))
		.pipe($.if(argv.build, gulp.dest(`${dir.build_assets}/js/vendors/foundation`), gulp.dest(`${dir.dev}/js/vendors/foundation`)));
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
