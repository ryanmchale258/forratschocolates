var gulp = require('gulp'),
	gutil = require('gulp-util'),
	concat = require('gulp-concat'),
	browserify = require('gulp-browserify'),
	compass = require('gulp-compass'),
	browserSync = require('browser-sync').create(),
	reload = browserSync.reload;

var env,
	jsSources,
	sassSources,
	markupSources,
	outputDir;

env = 'development';

if(env === 'production') {
	outputDir = 'builds/production/';
}else{
	outputDir = 'builds/development/';
}

jsSources = ['components/scripts/*.js',
					'components/scripts/custom/*.js'];
sassSources = ['components/sass/style.scss', 'components/sass/*.scss', 'components/sass/**/*.scss'];
markupSources = ['builds/development/application/controllers/**',
					'builds/development/application/models/**',
						'builds/development/application/views/**',
							'builds/development/index.php'];

gulp.task('js', function(){
	gulp.src(jsSources)
		.pipe(concat('script.js'))
		.pipe(browserify())
		.pipe(gulp.dest(outputDir + 'js'));
});

gulp.task('compass', function(){
	gulp.src('components/sass/style.scss')
		.pipe(compass({
			sass: 'components/sass',
			css: outputDir + 'css',
			image: outputDir + 'images',
			style: 'expanded',
			require: ['susy', 'breakpoint']
		})
		.on('error', gutil.log));
});

gulp.task('watch', function(){
	gulp.watch(markupSources, ['serve']);
});

gulp.task('serve', function() {
    browserSync.init({
    	browser: "google chrome",
        proxy: "localhost/forrats/builds/development"
    });

    gulp.watch([sassSources], ['compass']);
    gulp.watch([jsSources], ['js']);
});

gulp.task('default', ['serve']);