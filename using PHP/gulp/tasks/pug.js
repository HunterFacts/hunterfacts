module.exports = function () {
  $.gulp.task('pug', function () {
    return $.gulp.src('builder/pug/pages/*.pug')
      .pipe($.gulpplugins.pug({
        pretty:true
      }))
      .pipe($.gulpplugins.rename(function (path) {
      path.extname = ".php"
      }))
      .on("error", $.gulpplugins.notify.onError({
          message: "Error: <%= error.message %>",
          title: "Error Pug"
      }))
      .pipe($.gulp.dest('creation/'))
      .on('end',$.browserSync.reload);
  });
};
