const gulp     = require('gulp'),
	  watch    = require('gulp-watch'),
	  concat   = require('gulp-concat'),
	  cssmin   = require('gulp-cssmin'),
	  postcss  = require("gulp-postcss"),
	  atimport = require('postcss-import'),
	  plumber  = require("gulp-plumber"),
	  babel    = require("gulp-babel"),
	  webpack  = require('webpack-stream'),
	  tailwind = require("tailwindcss"),
	  uglify   = require("gulp-uglify"),
	  browser  = require('browser-sync').create();

const build_path = { //assets folders
	js: 'js',
	css: 'css',
};
const src_path = { //watch source folders
	js: 'js/src',
	css: 'css/src'
};
const conf_path = {
	config: "./tailwind.config.js",
	pdf_config: "./tailwind.pdf.config.js"
};

gulp.task('js:build', async () => {
	gulp // build js
		.src([
			`${src_path.js}/main.js`
		])
		.pipe(
			webpack({
				mode: 'production', // or development
			})
		)
		.pipe(plumber())
		.pipe(
			babel({
				presets: ["@babel/preset-env"],
				targets: {
					browsers: "last 2 versions, not dead, not IE 11",
				}
			})
		)
		.pipe(concat('build.js'))
		.pipe(gulp.dest(`${build_path.js}`));
});

gulp.task('js:concat', async () => {
	gulp // concat and minify
		.src([
			`${build_path.js}/vendor/flash.min.js`,
			`${build_path.js}/build.js`,
		])
		.pipe(uglify())
		.pipe(concat('app.js'))
		.pipe(gulp.dest(build_path.js));
});

gulp.task('css', async () => {
	return gulp
		.src([
			`${src_path.css}/app.css`
		])
		.pipe(postcss([
			atimport(),
			tailwind(conf_path.config),
			require("autoprefixer")
		]))
		.pipe(concat('style.css'))
		.pipe(cssmin())
		.pipe(gulp.dest(build_path.css));
});

gulp.task('pdf', async () => {
	return gulp
		.src([
			`${src_path.css}/pdf.css`
		])
		.pipe(postcss([
			atimport(),
			tailwind(conf_path.pdf_config),
			require("autoprefixer")
		]))
		.pipe(concat('pdf.css'))
		.pipe(gulp.dest(build_path.css));
});

gulp.task('js', gulp.series(
	'js:build',
	'js:concat',
));

gulp.task('build', gulp.series(
	'js',
	'css'
));

gulp.task('watch', gulp.series(
	'js',
	'css',
	browsersyncServer,
	watchTask
));

function browsersyncServer(cb) {
	browser.init({
		proxy: "127.0.0.1:8000" // local domain
	});
	cb();
}

function browsersyncReload(cb) {
	browser.reload();
	cb();
}

function watchTask() {
	watch('frontend/**/*.php', gulp.series(browsersyncReload));
	watch(src_path.css, gulp.series('css', browsersyncReload));
	watch(src_path.js, gulp.series('js', browsersyncReload));
}