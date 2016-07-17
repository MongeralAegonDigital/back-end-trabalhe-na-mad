var gulp = require('gulp');
var minifyJs = require('gulp-minify');
var minifyCss = require('gulp-clean-css');
var concat = require('gulp-concat');

var scripts = [
	'./js/app.js',
	'./js/config/*.js',
	'./js/services/*.js',
	'./js/controllers/*.js'
];

gulp.task('minify-js', function(){
	gulp.src(scripts)
		.pipe(concat('main.js'))
		.pipe(minifyJs())
		.pipe(gulp.dest('./js/dist/'));
});

gulp.task('minify-css', function(){
	gulp.src('./css/*.css')
		.pipe(concat('main.min.css'))
		.pipe(minifyCss())
		.pipe(gulp.dest('./css/'));
});

gulp.task('watch', function(){
	gulp.watch(scripts, ['minify-js']);
});

gulp.task('default', ['minify-css', 'minify-js', 'watch']);