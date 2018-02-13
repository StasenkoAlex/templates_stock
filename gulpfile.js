var gulp = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    bs	 = require('browser-sync').create(),
    path = 'design/default_2/'; //обазятально указать свой путь

/*задача для эму
ляции сервера*/

gulp.task('bs', function() {
  bs.init({
    proxy: 'test',
    port: 433,
    notify: false
  });
});


/*задача для компиляции css*/
gulp.task('sass', function(){
  return gulp.src(path+'sass/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    /*.pipe(sourcemaps.write({includeContent: false}))
    .pipe(sourcemaps.init({loadMaps: true}))*/
    .pipe(autoprefixer({
      browsers: ['> 5%', 'last 2 versions', 'ie >= 10']
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(path+'css'))
    .pipe(bs.reload({stream: true}));
});

gulp.task('watch', ['sass', 'bs'], function(){
  gulp.watch(path+'sass/*.scss', ['sass']);
  gulp.watch(path+'js/**/*.js').on('change', bs.reload);
  gulp.watch(path+'html/*.tpl').on('change', bs.reload);
  gulp.watch('compiled/**/*.php').on('change', bs.reload);
});

gulp.task('default', ['bs', 'sass', 'watch']);