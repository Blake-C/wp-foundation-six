import gulp from 'gulp';
import gulpLoadPlugins from 'gulp-load-plugins';
import browserSync from 'browser-sync';
import del from 'del';

const $ = gulpLoadPlugins();
const reload = browserSync.reload;

// Paths for source and distribution files
const paths = {
	src: 'theme_components/',
	build: 'build/'
};

// BrowserSync Dev URL to reload
const proxy_target = 'foundation-six-gulpify';

gulp.task('styles', () => {
	return gulp.src(paths.src + 'sass/**/*.scss')
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.sass.sync({
			outputStyle: 'compact',
			precision: 10,
			includePaths: ['.']
		})
		.on('error', $.sass.logError))
		.pipe($.autoprefixer({browsers: ['> 1%', 'last 4 versions', 'Firefox ESR']}))
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.cssnano())
		.pipe($.sourcemaps.write('.'))
		.pipe(gulp.dest(paths.build + 'css'))
		.pipe(reload({stream: true}));
});

gulp.task('scripts', () => {
	return gulp.src(paths.src + '/js/**/*.js')
		.pipe($.plumber())
		.pipe($.sourcemaps.init())
		.pipe($.babel())
		.pipe($.rename({ suffix: '.min' }))
		.pipe($.uglify())
		.pipe($.sourcemaps.write('.'))
		.pipe(gulp.dest(paths.build + 'js'))
		.pipe(reload({stream: true}));
});

gulp.task('images', () => {
	return gulp.src(paths.src + '/images/**/*')
		.pipe($.imageoptim.optimize())
		.pipe(gulp.dest(paths.build + 'images'));
});

gulp.task('fonts', () => {
	return gulp.src(paths.src + '/fonts/**/*')
		.pipe(gulp.dest(paths.build + 'fonts'));
});

gulp.task('serve', ['styles', 'scripts', 'fonts'], () => {
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

	gulp.watch([paths.src + 'sass/**/*'], ['styles']);
	gulp.watch([paths.src + 'js/**/*'], ['scripts']);
	gulp.watch([paths.src + 'fonts/**/*'], ['fonts']);
	gulp.watch([paths.src + 'images/**/*'], ['images']);
});

gulp.task('watch', ['styles', 'scripts', 'fonts'], () => {
	gulp.watch([paths.src + 'sass/**/*'], ['styles']);
	gulp.watch([paths.src + 'js/**/*'], ['scripts']);
	gulp.watch([paths.src + 'fonts/**/*'], ['fonts']);
	gulp.watch([paths.src + 'images/**/*'], ['images']);
});

gulp.task('clean', () => {
	return del([
		paths.build
	]);
});

gulp.task('build', ['scripts', 'styles', 'fonts', 'images'], () => {
	return gulp.src(paths.build + '**/*')
		.pipe($.size({title: 'build', gzip: true}))
		.pipe(gulp.dest( paths.build ))
		.pipe($.notify({ message: 'Build task complete', onLast: true }));
});

gulp.task('default', ['clean'], () => {
	gulp.start('build');
});
