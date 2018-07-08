module.exports = function () {
  $.gulp.task('watch', function () {
    $.gulp.watch('builder/pug/**/*.pug', $.gulp.series('pug'))
    $.gulp.watch('creation/php/*.php', $.gulp.series('pug'))
    $.gulp.watch('builder/include/css/**/*.styl', $.gulp.series('style'))
  });
};
