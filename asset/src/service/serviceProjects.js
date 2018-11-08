'use strict';

//
angular.module('serviceProjects', ['ngResource'])
    .factory('GetProject', function ($resource, config) {
        return $resource(config.baseURL + 'projeto/:id', {}, {
            save: {
                method: 'POST'
            },
            query: {
                method: 'GET',
                params: {id: 'id'},
                isArray: false
            }
        });
    })
    .factory('ListProjects', function ($resource, config) {
        return $resource(config.baseURL + 'projetos/all', {}, {
            query: {
                method: 'GET',
                isArray: false
            }
        });
    })
    .factory('ListProjectsUsers', function ($resource, config) {
        return $resource(config.baseURL + 'projects/:id/users/?private_token=6abpZCaGrwLJphicE4eU', {}, {
            query: {
                method: 'GET',
                params: {id: 'id'},
                isArray: false
            }
        });
    })
    .factory('ListProjectsRepository', function ($resource, config) {
        return $resource(config.baseURL + 'projects/:id/repository/tree?per_page=100&private_token=6abpZCaGrwLJphicE4eU', {}, {
            query: {
                method: 'GET',
                params: {id: 'id'},
                isArray: false
            }
        });
    });