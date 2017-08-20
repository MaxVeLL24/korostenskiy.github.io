const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleanCSS = require('clean-css');
const pump = require('pump');

gulp.task('minify-css', function() {
    return gulp.src('css/*.css')
        .pipe(gulp.dest('css/'));
});

gulp.task('uglify', function (cb) {
    pump([
            gulp.src('js/global.js'),
            uglify(),
            gulp.dest('js/')
        ],
        cb
    );
});

gulp.task('concat', function() {
    return gulp.src('js/*.js')
        .pipe(concat('global.js'))
        .pipe(gulp.dest('js'));
});

gulp.task('sass', function() {
    return gulp.src('sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('css/'))
});

gulp.task('watch', function(){
    gulp.watch('sass/*.scss', ['sass']);
});

gulp.task('default', function() {
    gulp.src('css/*.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('css/'))
});
