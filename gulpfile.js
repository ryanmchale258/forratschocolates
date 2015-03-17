var gulp = require('gulp'),
	gutil = require('gulp-util'),
	concat = require('gulp-concat'),
	browserify = require('gulp-browserify'),
	compass = require('gulp-compass'),
	livereload = require('gulp-livereload');

var env,
	jsSources,
	sassSources,
	markupSources,
	outputDir;

env = process.env.NODE_ENV || 'development';

if(env === 'production') {
	outputDir = 'builds/production/';
}else{
	outputDir = 'builds/development/';
}

jsSources = ['components/scripts/jqloader.js',
					'components/scripts/custom/*.js'];
sassSources = ['components/sass/style.scss'];
markupSources = ['builds/development/application/controllers/**',
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
		.pipe(gulp.dest(outputDir + 'js'))
		.pipe(livereload());
});

gulp.task('compass', function(){
	gulp.src(sassSources)
		.pipe(compass({
			sass: 'components/sass',
			css: outputDir + 'css',
			image: outputDir + 'images',
			style: 'expanded',
			require: ['susy', 'breakpoint']
		})
		.on('error', gutil.log))
		.pipe(livereload());
});

gulp.task('watch', function(){
	livereload.listen();
	gulp.watch(markupSources, ['markup']);
	gulp.watch(jsSources, ['js']);
	gulp.watch(['components/sass/*.scss', 'components/sass/modules/*.scss'], ['compass']);
})

gulp.task('default', ['markup', 'js', 'compass', 'watch']);