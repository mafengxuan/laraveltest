var gulp = require('gulp'),
    _ = require('lodash');
    webpack = require('webpack'),
    cleanCSS = require('gulp-clean-css'),
    plugins = require('gulp-load-plugins')(),
    hash = require('gulp-hash');

//拷贝 favicon.ico
gulp.task('move:app',function(){
    var stream = gulp.src('./dist/**/*')
        .pipe(gulp.dest('./public/dist'));
    return stream;
})

gulp.task('build_vue',function(callback){
  webpack(_.merge(require('./webpack.config.js')('production'),{}),function(err, stats){
    if (err) {
      console.error(err.stack || err);
      if (err.details) {
          console.error(err.details);
      }
      return;
    }
    var info = stats.toJson();

    if (stats.hasErrors()) {
      console.error(info.errors);
    }
    if (stats.hasWarnings()) {
      console.warn(info.warnings);
    }
    console.log(stats.toString({
      colors: true,
      modules: false,
      children: false,
      chunks: false,
      chunkModules: false
    }));
    callback();
  })
})

gulp.task('dev_vue',function(callback){
  webpack(_.merge(require('./webpack.config.js')(),{}),function(err, stats){
    if (err) {
      console.error(err.stack || err);
      if (err.details) {
          console.error(err.details);
      }
      return;
    }
    var info = stats.toJson();

    if (stats.hasErrors()) {
      console.error(info.errors);
    }
    if (stats.hasWarnings()) {
      console.warn(info.warnings);
    }
    console.log(stats.toString({
      colors: true,
      modules: false,
      children: false,
      chunks: false,
      chunkModules: false
    }));
    callback();
  })
})

//开发环境
gulp.task('dev',['dev_vue'], function(callback) {
    // 将你的默认的任务代码放在这
    var stream = gulp.src('./dist/**/*')
        .pipe(gulp.dest('./public/dist'));
    return stream;
});

//默认生成环境任务
gulp.task('default',['build_vue'], function(callback) {
    // 将你的默认的任务代码放在这
    var stream = gulp.src('./dist/**/*')
        .pipe(gulp.dest('./public/dist'));
    return stream;
});

//拷贝admin
gulp.task('move:admin',function(){
    var stream = gulp.src('./admin/dist/*.*')
        .pipe(gulp.dest('./public/admin/'));
    var statics = gulp.src('./admin/dist/static/**')
        .pipe(gulp.dest('./public/static/'));
});
