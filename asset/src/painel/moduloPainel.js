/**
 * Created by Henrique Brandão on 22/03/2016.
 */
'use strict';

angular.module('moduloPainel', ['servicePainel'])
    .controller('InicioPainel', InicioPainel);

function InicioPainel($filter, $rootScope, $scope, $interval, GetProjetos, GetRanking) {
    $scope.list_projetos = [];
    $scope.ranking = [];
    $scope.projeto = {};
    $scope.projeto_atual = 0;

    GetProjetos.query({}, function (resul) {
        $scope.list_projetos = resul.projetos;
        $scope.ultimo_projeto = $scope.list_projetos.length - 1;
        $scope.get_projeto();
    });

    $scope.get_projeto = function () {
        GetRanking.query({pro_codigo: $scope.list_projetos[$scope.projeto_atual].pro_codigo}, function (resul) {
            $scope.ranking = resul.ranking;
            $scope.projeto = resul.projeto;
        });
    };

    $scope.altera_projeto = function () {
        if ($scope.projeto_atual < $scope.ultimo_projeto) {
            $scope.projeto_atual = $scope.projeto_atual + 1;
        } else {
            $scope.projeto_atual = 0;
        }
        $scope.get_projeto();
    };

    $interval(function () {
        $scope.altera_projeto();
    }, 20000);

}