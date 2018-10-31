"use strict";

var gulp = require('gulp');
var sass = require('gulp-sass');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var csso = require('gulp-csso');
var imagemin = require('gulp-imagemin');
var webp = require('gulp-webp');
var svgstore = require('gulp-svgstore');
var posthtml = require('gulp-posthtml');
var include = require('posthtml-include');
var del = require('del');
var server = require('browser-sync').create();
var concat = require('gulp-concat');
var includejs = require('gulp-include');
var uglify = require('gulp-uglify');
var htmlmin = require('gulp-htmlmin');

gulp.task('minifyhtml', function () {
  return gulp.src('build/*.html')
    .pipe(htmlmin({ collapseWhitespace: false }))
    .pipe(gulp.dest('build'));
});

gulp.task('concat-scripts', function() {
  return gulp.src('source/js/main.js')
    .pipe(includejs({
      extensions: 'js',
    includePaths: [__dirname]
    }))
      .on('error', console.log)
    .pipe(rename('app.js'))
    .pipe(gulp.dest('build/js'));
});

gulp.task('compressjs', function () {
  return gulp.src('build/js/app.js')
  .pipe(uglify())
  .pipe(rename('app.min.js'))
  .pipe(gulp.dest('build/js'))
});

gulp.task('js', gulp.series('concat-scripts', 'compressjs'));

gulp.task('images', function () {
  return gulp.src('source/img/**/*.{png,jpg,svg}')
    .pipe(imagemin([
      imagemin.optipng({optimizationLevel: 3}),
      imagemin.jpegtran({progressive: true}),
      imagemin.svgo()
    ]))
  .pipe(gulp.dest('source/img'));
});

gulp.task('webp', function () {
  return gulp.src('source/img/**/*.{png,jpg}')
    .pipe(webp({quality: 90}))
    .pipe(gulp.dest('source/img'));
});

gulp.task('sprite', function () {
  return gulp.src('source/img/{icon-*,htmlacademy}.svg')
    .pipe(svgstore({
      inlineSvg: true
    }))
    .pipe(rename('sprite.svg'))
    .pipe(gulp.dest('build/img'));
});

gulp.task('html', function () {
  return gulp.src('source/*.html')
    .pipe(posthtml([
      include()
    ]))
    .pipe(gulp.dest('build'));
});

gulp.task('copy', function () {
  return gulp.src([
      'source/fonts/**/*.{woff,woff2}',
      'source/img/**',
      'source/js/**'
    ], {
      base: 'source'
    })
    .pipe(gulp.dest('build'));
});

gulp.task('clean', function () {
 return del('build');
});

gulp.task('css', function () {
  return gulp.src('source/sass/style.scss')
    .pipe(plumber())
    .pipe(sass({includePaths: require('node-normalize-scss').includePaths}))
    .pipe(postcss([autoprefixer()]))
    .pipe(gulp.dest('build/css'))
    .pipe(csso())
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('build/css'))
    .pipe(server.stream());
});

gulp.task('server', function () {
  server.init({
    server: 'build/',
    notify: false,
    open: true,
    cors: true,
    ui: false
  });
  gulp.watch('source/sass/**/*.{scss,sass}', gulp.series("css"));
  gulp.watch('source/js/*.js', gulp.series('js', 'html', 'minifyhtml', 'refresh'));
  gulp.watch('source/img/icon-*.svg', gulp.series('sprite', 'html', 'minifyhtml', 'refresh'));
  gulp.watch('source/*.html', gulp.series('html', 'minifyhtml', 'refresh'));
});

gulp.task('refresh', function (done) {
  server.reload();
  done();
});

gulp.task('img', gulp.series('webp', 'images'));
gulp.task('build', gulp.series('clean', 'copy', 'css', 'sprite', 'js', 'html', 'minifyhtml'));
gulp.task('start', gulp.series('build', 'server'));
