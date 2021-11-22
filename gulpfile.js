const gulp = require('gulp');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();

function style() {
	//1. where is my scss file
	return gulp.src('./assets/scss/**/*.scss')
	//2. pass that file through sass compiler
	.pipe(sass())
	//3. where do i save the compiled css?
	.pipe(gulp.dest('./assets/css'))
	//4. stream changes to all browser
	.pipe(browserSync.stream());
}

function watch() {
	browserSync.init({
		server: {
			baseDir: './'
		}
	});
	gulp.watch('./assets/scss/**/*.scss', style);
	gulp.watch('./*.html').on('change', browserSync.reload);
	gulp.watch('./assets/js/**/*.js').on('change', browserSync.reload);
}

exports.style = style;
exports.watch = watch;