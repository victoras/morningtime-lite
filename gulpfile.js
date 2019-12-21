  /**
   *  gulpfile.js For Version Gulp 4.0
   *
   *  Available tasks:
   *   `gulp`
   *   `gulp watch`
   *   `gulp clean`
   *   `gulp styles`
   *   `gulp vendorStyles`
   *   `gulp vendorScripts`
   *   `gulp copyFonts`
   *   `gulp scripts`
   *
   *  Modules:
   *   gulp                       : The streaming build system.
   *   del                        : Delete files and folders.
   *   gulp-jshint                : JSHint plugin for Gulp.
   *   gulp-sass                  : Gulp plugin for sass.
   *   gulp-sourcemaps            : Source map support for Gulp.js.
   *   gulp-uglify                : Minify files with UglifyJS.
   *   gulp-autoprefixer          : Prefix CSS.
   *   gulp-cache                 : A temp file based caching proxy task for gulp.
   *   gulp-concat                : This will concat files by your operating systems newLine.
   *   gulp-clean-css             : Minify CSS, using clean-css
   *   gulp-notify                : Send messages to Mac Notification Center,
   *   gulp-rename                : Provides simple file renaming methods
   *   gulp-rigger                : Include any type of text file (css, js, hmtl)
   *   gulp-combine-mq            : Combine matching media queries into one media query definition
   *   gulp-plumber               : Briefly it replaces pipe method and removes standard onerror
									handler on error event, which unpipes streams on error by default.
   */

// include gulp and gulp plug-ins
var gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	cache = require('gulp-cache'),
	concat = require('gulp-concat'),
	del = require('del'),
	jshint = require('gulp-jshint'),
	cleancss = require('gulp-clean-css'),
	notify = require('gulp-notify'),
	plumber = require('gulp-plumber'),
	rename = require('gulp-rename'),
	rigger = require('gulp-rigger'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	wpPot = require('gulp-wp-pot'),
	uglify = require('gulp-uglify');
	cssbeautify = require('gulp-cssbeautify');

var paths = {
	home: './',
	assets_css: './assets/styles/',
	assets_js: './assets/javascripts/',
	assets_font: './assets/webfonts/',
	assets_images: './assets/images/',
	lang_folder: './languages/',
	src_css_fe: './src/sass/',
	src_js: './src/javascripts/',
};

var onError = function(err) {
	console.log(err);
}

function clean() {
	return del( [paths.assets_css, paths.assets_js, paths.lang_folder, paths.assets_images]);
}

// Vendors
function vendorStyles() {
	return gulp
	.src([ paths.src_css_fe + 'custom-editor-style.scss'])
	.pipe(plumber({errorHandler: onError}))
	.pipe(sourcemaps.init())
	.pipe(sass({ style: 'expanded', errLogToConsole: true }))
	.pipe(autoprefixer({ cascade: true }))
	.pipe(gulp.dest(paths.assets_css))
	.pipe(rename({ suffix: '.min' }))
	.pipe(cleancss())
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest(paths.assets_css))
	//.pipe(notify({ message: 'vendorStyles task complete: <%= file.relative %>!' }));
}

// Main CSS Task
function styles() {
	return gulp
	.src([paths.src_css_fe + 'style.scss'])
	.pipe(plumber({errorHandler: onError}))
	.pipe(sourcemaps.init())
	.pipe(sass({ style: 'expanded', errLogToConsole: true }))
	.pipe(autoprefixer({ cascade: true }))
	.pipe(cssbeautify({
		indent: '	',
		openbrace: 'end-of-line',
		autosemicolon: false
	}))
	.pipe(sourcemaps.write('.'))
	.pipe(gulp.dest(paths.home))
	//.pipe(notify({ message: 'Styles task complete: <%= file.relative %>!' }));
}

// Scripts Task
function scripts() {
	return gulp
	.src( paths.src_js + '*.js')
	.pipe(rigger())
	.pipe(gulp.dest(paths.assets_js))
	.pipe(rename({ suffix: '.min' }))
	.pipe(uglify())
	.pipe(gulp.dest(paths.assets_js))
	//.pipe(notify({ message: 'Scripts task complete: <%= file.relative %>!' }));
}


// Copy Fonts
function copyFonts() {
	return gulp
	.src('./node_modules/@fortawesome/fontawesome-free/webfonts/*')
	.pipe(gulp.dest(paths.assets_font))
	//.pipe(notify({ message: 'Copy Fonts: <%= file.relative %>!' }));
}

// Copy vendorScripts
function vendorScripts() {
	return gulp
	.src([
		'./node_modules/fastclick/lib/fastclick.js',
		'./node_modules/jquery-placeholder/jquery.placeholder.js',
	])
	.pipe(gulp.dest(paths.assets_js))
	//.pipe(notify({ message: 'Copy Vendor Scripts: <%= file.relative %>!' }));
}

// Copy Images
function copyImages() {
	return gulp
	.src([
		'./src/images/**/*',
	])
	.pipe(gulp.dest(paths.assets_images))
}

// Generate Pot File
function genPot() {
	return gulp
	.src('**/*.php')
	.pipe(wpPot( {
		domain: 'morningtime-lite',
		package: 'MorningTime Lite WordPress Theme'
	} ))
	.pipe(gulp.dest('languages/morningtime-lite.pot'))
	//.pipe(notify({ message: 'Generated -> Pot File!' }));
}

function watch() {
	gulp.watch(paths.src_js, scripts);
	gulp.watch(paths.src_css_fe, styles);
	gulp.watch(paths.src_css_fe, vendorStyles);
}

var build = gulp.series(clean, gulp.parallel(styles, vendorStyles, scripts, copyFonts, vendorScripts, genPot, copyImages));

exports.clean = clean;
exports.styles = styles;
exports.vendorStyles = vendorStyles;
exports.scripts = scripts;
exports.vendorScripts = vendorScripts;
exports.copyFonts = copyFonts;
exports.genPot = genPot;
exports.copyImages = copyImages;
exports.watch = watch;
exports.build = build;
exports.default = build;
