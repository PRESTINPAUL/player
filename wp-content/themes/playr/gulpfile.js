var gulp = require('gulp');
var postcss = require('gulp-postcss');
var browserSync  = require('browser-sync').create(); // Asynchronous browser loading on .scss file changes
var reload = browserSync.reload;
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('autoprefixer');
var mqpacker = require('css-mqpacker');
var imagemin = require('gulp-imagemin');
var concat = require('gulp-concat');
var watch = require('gulp-watch');

var postCssPlugins = [
    autoprefixer({browsers: ['last 5 versions'], cascade: false}),
    mqpacker()
];

gulp.task('sass',function(){
return gulp.src('./sass/{,*/}*.{sass,scss}')
    .pipe(sourcemaps.init())
    .pipe(sass({errLogToConsole: true}))
    .pipe(postcss(postCssPlugins))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./css/'))
    .pipe(reload({ stream: true }));
});

gulp.task('watch', function () {
  gulp.watch('./sass/{,*/}*.{scss,sass}',['sass']);
  gulp.watch('./*.html').on('change', reload);
  // gulp.watch('./js/{,*/}*.js', ['scripts']).on('change', reload);
});
