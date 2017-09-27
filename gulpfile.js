var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var cleanCss = require('gulp-clean-css');
var browserSync = require('browser-sync').create();

var sassSources = 'resources/scss/**/*.scss';

gulp.task('sass-prod', function(){
    return gulp.src(sassSources)
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCss({rebase: false}))
        .pipe(gulp.dest('public/assets/'));
});

gulp.task('sass-dev', function(){
    return gulp.src(sassSources)
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCss({rebase: false}))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('public/assets/'))
        .pipe(browserSync.stream());
});

gulp.task('default', ['sass-prod']);

gulp.task('serve', ['sass-dev'], function() {
    gulp.watch(sassSources, ['sass-dev']);
    gulp.watch("resources/views/**/*.blade.php").on("change", browserSync.reload);

    browserSync.init({
        proxy: "127.0.0.1:8000"
    });
});
