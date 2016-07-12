var gulp = require('gulp');
var jshint = require('gulp-jshint');
var clean = require('gulp-clean');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var htmlmin = require('gulp-htmlmin');
var runSequence = require('run-sequence');
var watch = require('gulp-watch');
var batch = require('gulp-batch');


// limpar a pasta de origem para nao dar conflito
gulp.task('clean', function(){
    return gulp.src('public/assets/')
        .pipe(clean({force: true}));
});


// Verificar erro de sintaxe no JS
gulp.task('jshint', function(){
    return gulp.src(['public/**/*.js'])
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});


// concatenar todos os JS
// uglificar todos os JS
gulp.task('uglify', function(){
    return gulp.src(['public/**/*.js'])
        .pipe(concat('all.js'))
        .pipe(uglify())
        .pipe(gulp.dest('public/assets/js/'));
});


// copiar o AngularJS
gulp.task('addAngular', function(){
    return gulp.src(['bower_components/angular/angular.min.js'])
        .pipe(gulp.dest('public/assets/js/'));
});


// copiar o Angular-route
gulp.task('addAngularRoute', function(){
    return gulp.src(['bower_components/angular-route/angular-route.min.js'])
        .pipe(gulp.dest('public/assets/js/'));
});


// copiar o Bootstrap
gulp.task('addBootstrap', function(){
    return gulp.src('bower_components/bootstrap/dist/css/bootstrap.min.css')
        .pipe(gulp.dest('public/assets/css/'));
});


// retirar os espacos de todos os arquivos html
gulp.task('htmlmin', function(){
    return gulp.src('public/templates/**/*.html')
        .pipe(htmlmin( {collapseWhitespace: true} ))
        .pipe(gulp.dest('public/assets/templates/'));
});


gulp.task('watch', function () {
    watch(['public/app.js', 'public/services/**/*.js', 'public/templates/**/*.html', 'public/controllers/**/*.js'],
        batch(function (events, done) {
        gulp.start(['htmlmin'], done);
    }));
});


gulp.task('default', function(cb){
    return runSequence('clean', ['jshint', 'uglify', 'addAngular', 'addAngularRoute', 'addBootstrap', 'htmlmin'], cb);
});