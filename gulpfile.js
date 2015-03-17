var gulp = require('gulp'),
	gutil = require('gulp-util'),
	concat = require('gulp-concat'),
	browserify = require('gulp-browserify'),
	compass = require('gulp-compass'),
	livereload = require('gulp-livereload');

var jsSources = ['components/scripts/jqloader.js',
					'components/scripts/custom/*.js'];
var sassSources = ['components/sass/style.scss'];
var markupSources = ['builds/development/application/controllers/**',
					'builds/development/application/models/**',
						'builds/development/application/views/**',
							'builds/development/index.php'];

gulp.task('markup', function(){
	gulp.src(markupSources)
	.pipe(livereload());
});

gulp.task('js', function(){
	gulp.src(jsSources)
		.pipe(concat('script.js'))
		.pipe(browserify())
		.pipe(gulp.dest('builds/development/js'))
		.pipe(livereload());
});

gulp.task('compass', function(){
	gulp.src(sassSources)
		.pipe(compass({
			sass: 'components/sass',
			image: 'builds/development/images',
			style: 'expanded',
			require: ['susy', 'breakpoint']
		}))
		.on('error', gutil.log)
		.pipe(gulp.dest('builds/development/css'))
		.pipe(livereload());
});

gulp.task('watch', function(){
	livereload.listen();
	gulp.watch(markupSources, ['markup']);
	gulp.watch(jsSources, ['js']);
	gulp.watch('components/sass/*.scss', ['compass']);
})

gulp.task('default', ['markup', 'js', 'compass', 'watch']);