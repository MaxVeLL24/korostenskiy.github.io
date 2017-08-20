const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const pump = require('pump');

var concatCss = require('gulp-concat-css');

gulp.task('concatCss', function () {
    return gulp.src('css/*.css')
        .pipe(concatCss("main.css"))
        .pipe(gulp.dest('css/'));
});
gulp.task('uglify', function (cb) {
    pump([
            gulp.src('js/*.js'),
            uglify(),
            gulp.dest('js/')
        ],
        cb
    );
});

// gulp.task('concat', function() {
//     return gulp.src('js/*.js')
//         .pipe(concat('global.js'))
//         .pipe(gulp.dest('js'));
// });

gulp.task('sass', function () {
    return gulp.src('sass/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('css/'))
});

gulp.task('watch', function () {
    gulp.watch('sass/*.scss', ['sass']);
});

gulp.task('autoprefixer', function () {
    gulp.src('sass/*.scss')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('sass/'))
});

gulp.task('default', function () {
    gulp.start('sass', 'uglify', 'autoprefixer');
    gulp.watch(['js/global.js'], ['uglify']);
    gulp.watch(['sass/*.scss'], ['sass']);
    gulp.watch(['css/style.css'], ['autoprefixer']);
});
