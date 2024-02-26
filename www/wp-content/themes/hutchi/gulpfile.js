var browserSync = require('browser-sync').create();
var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var sass = require('gulp-sass')(require('sass'));
var sourcemaps = require('gulp-sourcemaps');
var uglify = require("gulp-uglify");

var paths = {
    styles: {
        src: ['./scss/*.scss', '!./scss/bootstrap.scss', '!./scss/variables.scss', '!./scss/fonts.scss'],
        dest: './'
    },
    scripts: {
        src: 'src/*.js',
        dest: './js/'
    }
};


/*
 * Define our tasks using plain functions
 */
function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
            overrideBrowserslist: ['last 2 versions']
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(browserSync.stream());
}

function scripts() {
    return gulp.src(paths.scripts.src, {sourcemaps: true})
        .pipe(concat('custom.js'))
        .pipe(gulp.dest(paths.scripts.dest));
}

function scriptCompress() {
    return gulp.src(paths.scripts.src)
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.scripts.dest))
        .pipe(browserSync.stream());
}


// Move the javascript files [& their associated .map files to avoid filling up the DB with missing file errors!] into our js folder
function copyScripts() {
    return gulp.src(['node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js.map',
        'node_modules/@popperjs/core/dist/umd/popper.min.js',
        'node_modules/@popperjs/core/dist/umd/popper.min.js.map',
        'node_modules/slick-carousel/slick/slick.min.js'
    ])
        .pipe(gulp.dest("js"))
        .pipe(browserSync.stream());
}

function serve() {
    browserSync.init({
        proxy: "http://hutchi.localhost",
    });

    gulp.watch(['node_modules/bootstrap/scss/bootstrap.scss', './scss/*.scss', './scss/*/*.scss'], styles);
    gulp.watch([paths.scripts.src], scriptCompress);
    gulp.watch(['node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js.map',
        'node_modules/@popperjs/core/dist/umd/popper.min.js',
        'node_modules/@popperjs/core/dist/umd/popper.min.js.map'
    ], copyScripts);
}

function watch() {
    gulp.watch(paths.scripts.src, scriptCompress);
    gulp.watch(paths.styles.src, styles);
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.parallel(styles, scripts);

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.serve = serve;
exports.build = build;
exports.copyScripts = copyScripts;
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = serve;
