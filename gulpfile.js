/**
 * Created by papabear on 4/27/2015.
 */
var gulp        = require('gulp'),
    concat      = require('gulp-concat'),
    rename      = require('gulp-rename'),
    uglify      = require('gulp-uglify'),
    minify      = require('gulp-minify-css'),
    watch       = require('gulp-watch');


/* TASKS */
gulp.task('js', function () {
    return gulp.src(['public/assets/js/src/main.js', 'public/assets/js/src/helpers/*',
        'public/assets/js/src/models/*', 'public/assets/js/src/collections/*',
        'public/assets/js/src/views/*/*', 'public/assets/js/src/views/maintenance/*/*',
        'public/assets/js/src/routers.js'])
        .pipe(concat('app.js'))
        .pipe(gulp.dest('public/assets/js/'))
        .pipe(uglify())
        .pipe(rename('app.min.js'))
        .pipe(gulp.dest('public/assets/js/'));
});
//
//gulp.task('css', function () {
//    return gulp.src(['firstproject/style/style.css'])
//        .pipe(minify())
//        .pipe(rename('style.min.css'))
//        .pipe(gulp.dest('firstproject/style'));
//});

gulp.task('default', ['js']);