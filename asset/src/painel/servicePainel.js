'use strict';

angular.module('servicePainel', ['ngResource'])
    .factory('GetProjetos', function ($resource, config) {
        return $resource(config.baseURL + 'painel/projetos', {}, {
            query: {
                method: 'GET',
                isArray: false
            }
        });
    })
    .factory('GetRanking', function ($resource, config) {
        return $resource(config.baseURL + 'painel/ranking/:pro_codigo', {}, {
            query: {
                method: 'GET',
                params: {pro_codigo: 'pro_codigo'},
                isArray: false
            }
        });
    });