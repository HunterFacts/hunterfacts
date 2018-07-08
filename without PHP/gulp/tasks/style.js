module.exports = function () {
  $.gulp.task('style', function () {
    return $.gulp.src('builder/include/css/main.styl')
      .pipe($.gulpplugins.stylus())
      .pipe($.gulpplugins.autoprefixer({
              browsers: ['last 10 versions']
      }))
      .on("error", $.gulpplugins.notify.onError({
          message: "Error: <%= error.message %>",
          title: "Error Style"
      }))
      .pipe($.gulpplugins.csso())
      .pipe($.gulp.dest('creation/css/'))
      .pipe($.browserSync.reload({
        stream:true
      }));
  });
};
