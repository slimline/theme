var $        = require('gulp-load-plugins')();
var argv     = require('yargs').argv;
var browser  = require('browser-sync');
var gulp     = require('gulp');
var panini   = require('panini');
var rimraf   = require('rimraf');
var sequence = require('run-sequence');
var sherpa   = require('style-sherpa');

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATHS = {
  sass: [
    'bower_components/foundation-sites/scss',
    'bower_components/motion-ui/src/'
  ],
  javascript: [
    'bower_components/jquery/dist/jquery.js',
    'bower_components/what-input/what-input.js',
    'bower_components/foundation-sites/js/foundation.core.js',
    'bower_components/foundation-sites/js/foundation.util.*.js',
    // Paths to individual JS components defined below
    'bower_components/foundation-sites/js/foundation.abide.js',
    'bower_components/foundation-sites/js/foundation.accordion.js',
    'bower_components/foundation-sites/js/foundation.accordionMenu.js',
    'bower_components/foundation-sites/js/foundation.drilldown.js',
    'bower_components/foundation-sites/js/foundation.dropdown.js',
    'bower_components/foundation-sites/js/foundation.dropdownMenu.js',
    'bower_components/foundation-sites/js/foundation.equalizer.js',
    'bower_components/foundation-sites/js/foundation.interchange.js',
    'bower_components/foundation-sites/js/foundation.magellan.js',
    'bower_components/foundation-sites/js/foundation.offcanvas.js',
    'bower_components/foundation-sites/js/foundation.orbit.js',
    'bower_components/foundation-sites/js/foundation.responsiveMenu.js',
    'bower_components/foundation-sites/js/foundation.responsiveToggle.js',
    'bower_components/foundation-sites/js/foundation.reveal.js',
    'bower_components/foundation-sites/js/foundation.slider.js',
    'bower_components/foundation-sites/js/foundation.sticky.js',
    'bower_components/foundation-sites/js/foundation.tabs.js',
    'bower_components/foundation-sites/js/foundation.toggler.js',
    'bower_components/foundation-sites/js/foundation.tooltip.js',
    'src/js/!(scripts.js)**/*.js',
    'src/js/scripts.js'
  ]
};

/*
gulp.task('styleguide', function(cb) {
  sherpa('src/styleguide/index.md', {
    output: 'dist/styleguide.html',
    template: 'src/styleguide/template.html'
  }, cb);
});
*/

// Compile Sass into CSS
// In production, the CSS is compressed
gulp.task('style', function() {

  // var uncss = $.uncss({
  //   html: ['src/**/*.html'],
  //   ignore: [
  //     new RegExp('^meta\..*'),
  //     new RegExp('^\.is-.*')
  //   ]
  // });

  return gulp.src('src/scss/style.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    // .pipe(uncss)
    .pipe(gulp.dest('./'))
    // .pipe($.sourcemaps.write())
    .pipe($.minifyCss())
    .pipe($.extname('min.css'))
    .pipe(gulp.dest('./'));
});

gulp.task('css', function() {

  return gulp.src(['src/scss/*.scss','!src/scss/style.scss'])
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    .pipe(gulp.dest('./css'))
    // .pipe($.sourcemaps.write())
    .pipe($.minifyCss())
    .pipe($.extname('min.css'))
    .pipe(gulp.dest('./css'));
});

// Combine JavaScript into one file
// In production, the file is minified
gulp.task('js', function() {
  var uglify = $.uglify()
    .on('error', function (e) {
      console.log(e);
    });

  return gulp.src(PATHS.javascript)
    .pipe($.sourcemaps.init())
    .pipe($.concat('scripts.js'))
    .pipe(gulp.dest('./js'))
    // .pipe($.sourcemaps.write())
    .pipe(uglify)
    .pipe($.extname('min.js'))
    .pipe(gulp.dest('./js'));
});

// Copy images to the "dist" folder
// In production, the images are compressed
gulp.task('img', function() {
  var imagemin = $.imagemin({
    progressive: true
  });

  return gulp.src('src/img/**/*')
    .pipe(imagemin)
    .pipe(gulp.dest('./img'));
});

// // Build the "dist" folder by running all of the above tasks
// gulp.task('build', function(done) {
//   sequence('clean', ['style', 'css', 'js', 'img'], 'styleguide', done);
// });

// // Start a server with LiveReload to preview the site in
// gulp.task('server', ['build'], function() {
//   browser.init({
//     server: 'dist', port: PORT
//   });
// });

// Build the site, run the server, and watch for file changes
gulp.task('default', function() {
  gulp.watch(['src/scss/*.scss'], ['style']);
  gulp.watch(['src/scss/*.scss'], ['css']);
  gulp.watch(['src/js/*.js'], ['js']);
  gulp.watch(['src/img/*'], ['img']);
  // gulp.watch(['src/styleguide/**'], ['styleguide']);
});
