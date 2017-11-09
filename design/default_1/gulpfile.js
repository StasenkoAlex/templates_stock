var gulp = require('gulp');

var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');

var browserSync = require('browser-sync').create();

gulp.task('browser-sync', ['styles'], function() {
	browserSync.init({
		proxy: 'Alexandra',
		notify: false
	});
});

gulp.task('styles', function() {
	gulp.src("sass/style.scss")
   .pipe(sass())
   .pipe(autoprefixer({
   	  browsers: ["last 2 version", "ie 10"]
   }))
   .pipe(rename('style.css'))
	 .pipe(gulp.dest("css"));
});


gulp.task('watch', function () {
	gulp.watch('sass/**/*.scss', ['styles']);
	gulp.watch('js/*.js').on("change", browserSync.reload);
	gulp.watch('html/**/*.tpl').on('change', browserSync.reload);
});

gulp.task('default', ['browser-sync', 'watch']);