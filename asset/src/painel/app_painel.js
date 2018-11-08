'use strict';

// Declare app_painel level module which depends on views, and components
var app_painel = angular.module('GitlabGamerPainel', ['angular-filters', 'moduloPainel']);

app_painel.filter('sqltodata', function ($filter) {
    return function (input) {
        if (input == null) {
            return "";
        }
        var _date = $filter('date')(new Date(input), 'dd/MM/yyyy');
        return _date;
    }
});