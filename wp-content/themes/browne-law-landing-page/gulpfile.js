const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const autoprefixer = require('gulp-autoprefixer');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');

/* Compile styles
-------------------------------------------------------------- */
gulp.task('sass', function () {
  return gulp.src('./src/scss/main.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('./dist'));
});

gulp.task('default', gulp.series('sass'));

/* Compile javascript
-------------------------------------------------------------- */
gulp.task('js', function () {
  return gulp.src('./src/js/main.js')
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(uglify())
    .pipe(gulp.dest('./dist'));
});

/* Watch for changes
-------------------------------------------------------------- */
gulp.task('watch', function () {
  gulp.watch('./src/scss/**/*.scss', gulp.series('sass'));
  gulp.watch('./src/js/**/*.js', gulp.series('js'));
});

/* Default task
-------------------------------------------------------------- */
gulp.task('default', gulp.parallel('sass', 'js', 'watch'));
