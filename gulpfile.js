'use strict';

var cssOutputStyle = ''; // '' (default) or 'compressed'
var jsSource = './assets/js/src/*.js';
var jsSourceDir = './assets/js/src/';
var jsDest = './assets/js/';
var cssSource = './assets/scss/styles.scss';
var cssSourceDir = './assets/scss/';
var cssDest = './assets/css/';
var imgSource = './assets/images/src/**/*';
var imgDest = './assets/images/';
var localHost = 'http://wp.local';

var path = require('path');
var gulp = require('gulp');
var bsync = require('browser-sync');
var autoprefixer = require('autoprefixer');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var cssnano = require('cssnano');
var imagemin = require('gulp-imagemin');
var webpack = require('webpack-stream');

var webpackConfig = {
  context: path.resolve(__dirname),
   entry: {
    main: jsSourceDir + 'main.js',
    vendor: jsSourceDir + 'vendor.js'
  },
  externals: {
    jquery: 'jQuery'
  },
  resolve: {
    alias: {
      node_modules:  path.resolve(__dirname, 'node_modules'),
      bootstrap: path.resolve(__dirname, 'node_modules/bootstrap/dist/js/bootstrap.bundle.js')
  }},
  output: {
    path: path.resolve(__dirname, jsDest),
    filename: '[name].js',
  },
  devtool: '#source-map',
  module: {
    rules: [{
      test: /\.js$/,
      exclude: /(node_modules)/,
      loader: 'babel-loader',
      query: {
        presets: ['es2015-ie', 'babili']
      }
    }]
  }
};



gulp.task('js', function() {
  return gulp.src(jsSource)
    .pipe(webpack(webpackConfig))
    .pipe(gulp.dest(jsDest))
    .pipe(bsync.reload({stream: true}));
});

gulp.task('styles', function () {
  var browsers = [
    '> 1%',
    'last 2 versions',
    'Firefox ESR',
    'Opera 12.1'
  ];
  var sassOptions = {
    includePaths: [
      'node_modules/bootstrap/scss/',
    ],
    outputStyle: cssOutputStyle
  };
  var plugins = [
    autoprefixer({browsers: browsers})
  ];
  return gulp.src(cssSource)
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(postcss(plugins))
    .pipe(gulp.dest(cssDest))
    .pipe(bsync.reload({stream: true}));
});

gulp.task('images', function() {
  return gulp.src(imgSource)
    .pipe(imagemin())
    .pipe(gulp.dest(imgDest));
});

gulp.task('browser-sync', function() {
	bsync.init({
		proxy: localHost,
		watchEvents: [ 'change', 'add', 'unlink', 'addDir', 'unlinkDir' ]
	});
});

var build = gulp.parallel('styles', 'images', 'js');

gulp.task('build', build);

gulp.task('watch', gulp.series('build', function() {
  gulp.watch(jsSourceDir+'*', gulp.series('js'));
  gulp.watch(imgSource, gulp.series('images'));
  gulp.watch(cssSourceDir+'*', gulp.series('styles'));
}));

gulp.task('default',
	gulp.series('build',
		gulp.parallel('watch', 'browser-sync')));
