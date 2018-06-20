var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var rename = require("gulp-rename");
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');


gulp.task('sass', function(){
    return gulp.src('./css/*.scss')
        .pipe(sourcemaps.init())
        .pipe(rename({suffix: '.dist'}))
        .pipe(sass())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('../assets/css'));
});

gulp.task('sass-min', function(){
    return gulp.src('./css/*.scss')
        .pipe(rename({suffix: '.dist'}))
        .pipe(sass())
        .pipe(cleanCSS())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('../assets/css'));
});

gulp.task('js-pack', function () {
    return gulp.src(['./js/*/*.js', './js/*.js'])
        .pipe(sourcemaps.init())
        .pipe(concat('base-theme.dist.js'))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('../assets/js'));
});

gulp.task('js-pack-min', function () {
    return gulp.src(['./js/*/*.js', './js/*.js'])
        .pipe(concat('base-theme.dist.min.js'))
        .pipe(uglify().on('error', function(e){
            console.log(e);
        }))
        .pipe(gulp.dest('../assets/js'));
});

gulp.task('watch', function () {
    gulp.watch("./**/*", ['sass']);
    gulp.watch("./**/*", ['sass-min']);
    gulp.watch("./**/*", ['js-pack']);
    gulp.watch("./**/*", ['js-pack-min']);
});

gulp.task("default", ['sass', 'sass-min', 'js-pack', 'js-pack-min']);