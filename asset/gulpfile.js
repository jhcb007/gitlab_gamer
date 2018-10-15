var js_lib = [
    './bower_components/jquery/dist/jquery.min.js',
    './bower_components/html5-boilerplate/dist/js/vendor/modernizr-2.8.3.min.js',
    //'./bower_components/popper/dist/popper.min.js',
    './node_modules/bootstrap/dist/js/bootstrap.min.js',
    './bower_components/angular/angular.min.js',
    './bower_components/ng-filters/dist/ng-filters.js',
    './bower_components/angular-route/angular-route.min.js',
    './bower_components/angular-resource/angular-resource.min.js'
];

var js = [
    './src/service/*',
    './src/module/*',
    './src/app.js',
    './src/config.js'
];

var css = [
    './bower_components/html5-boilerplate/dist/css/normalize.css',
    './bower_components/html5-boilerplate/dist/css/main.css',
    './node_modules/bootstrap/dist/css/bootstrap.min.css',
    './src/style.css'
];

// Núcleo do Gulp
var gulp = require('gulp');

// Transforma o javascript em formato ilegível para humanos
var uglify = require("gulp-uglify");

// Agrupa todos os arquivos em um
var concat = require("gulp-concat");

var concatCss = require('gulp-concat-css');

var cssmin = require('gulp-cssmin');

gulp.task('lib', function () {
    gulp.src(js_lib)                        // Arquivos que serão carregados, veja variável 'js' no início
        .pipe(concat('lib.min.js'))        // Arquivo único de saída
        .pipe(uglify({mangle: false}))     // Transforma para formato ilegível
        .pipe(gulp.dest('./dist/'));
});

gulp.task('app', function () {
    gulp.src(js)                        // Arquivos que serão carregados, veja variável 'js' no início
        .pipe(concat('app.min.js'))     // Arquivo único de saída
        .pipe(uglify({mangle: false}))  // Transforma para formato ilegível
        .pipe(gulp.dest('./dist/'));
});

gulp.task('css', function () {
    gulp.src(css)
        .pipe(concatCss("app.min.css"))
        .pipe(cssmin({keepSpecialComments: 0}))
        .pipe(gulp.dest('./dist/'));
});

// Tarefa padrão quando executado o comando GULP

gulp.task('default', ['app']);

gulp.task('dev', ['lib', 'app', 'css']);
