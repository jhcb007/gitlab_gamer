'use strict';

// Declare app_painel level module which depends on views, and components
var app = angular.module('Gitlabgamer', ['ngRoute', 'angular-filters', 'moduloAdministrador']);

app.config(['$locationProvider', '$routeProvider', function ($locationProvider, $routeProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider
        .when('/configuracao', {
            templateUrl: '../index.php/templante/configuracao',
            controller: 'Configuracao'
        })
        .when('/projetos', {
            templateUrl: '../index.php/templante/list_projetos',
            controller: 'ListProjetos'
        })
        .when('/projeto/:id', {
            templateUrl: '../index.php/templante/projeto',
            controller: 'ProjetoCtrl'
        })
        .otherwise({
            redirectTo: '/projetos'
        });
}]);

app.run(function (config) {
});

app.directive('listRepositorio', function ($compile) {
    return {
        restrict: 'AE',
        link: function (scope, element, attrs) {
            element.on('click', function (event) {
                var html = '<ul><li ng-repeat="r in repositorios" id="{{r.id}}" class="list-group-item"><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="{{r.id}}-Checkbox" value="option1"><label class="form-check-label" style="cursor: pointer" for="{{r.id}}-checkbox">{{r.name}}</label></div><button type="button" class="ml-1 btn btn-outline-info btn-sm">+</button></li></ul>';
                var compiledElement = $compile(html)(scope);
                var pageElement = angular.element(document.getElementById(attrs.pai));
                pageElement.append(compiledElement);
            });
        }
    }
});

