var gulp = require('gulp'),
	gutil = require('gulp-util'),
	concat = require('gulp-concat'),
	browserify = require('gulp-browserify'),
	compass = require('gulp-compass');

var jsSources = ['components/scripts/*.js'];
var sassSources = ['components/sass/style.scss'];
var phpSources = ['builds/development/application/controllers/*',
					'builds/development/application/models/*',
						'builds/development/application/views/*'];

gulp.task('js', function(){
	gulp.src(jsSources)
		.pipe(concat('script.js'))
		.pipe(browserify())
		.pipe(gulp.dest('builds/development/js'));
});

gulp.task('compass', function(){
	gulp.src(sassSources)
		.pipe(compass({
			sass: 'components/sass',
			images: 'builds/development/images',
			style: 'expanded',
			require: ['susy', 'breakpoint']
		}))
		.on('error', gutil.log)
		.pipe(gulp.dest('builds/development/css'));
});

gulp.task('watch', function(){
	gulp.watch(jsSources, ['js']);
	gulp.watch('components/sass/*.scss', ['compass']);
})

gulp.task('default', ['js', 'compass', 'watch']);