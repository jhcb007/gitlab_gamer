/**
 * Created by Henrique Brandão on 22/03/2016.
 */
'use strict';

angular.module('moduloAdministrador', ['serviceProjects'])
    .controller('ListProjetos', ListProjetos)
    .controller('ProjetoCtrl', ProjetoCtrl)
    .controller('Configuracao', Configuracao);


function ListProjetos($filter, $scope, ListProjects) {
    $scope.list_projetos = [];

    $scope.pageTitle = 'Projetos';

    ListProjects.query({}, function (resul) {
        $scope.list_projetos = resul.conteudo;
    });
}

function ProjetoCtrl($filter, $scope, GetProject) {
    $scope.contribuicao = [];
    $scope.devs = [];
    $scope.projeto = {};
    $scope.repositorios = [];

    GetProject.query({id: 52}, function (resul) {
        $scope.contribuicao = resul.contribuicao.conteudo;
        $scope.devs = resul.devs.conteudo;
        $scope.projeto = resul.projeto.conteudo;
        $scope.repositorios = resul.repositorios.conteudo;
        $scope.pageTitle = $scope.projeto.name;
        console.log(resul);
    });
}

function Configuracao($filter, $scope) {
    $scope.pageTitle = 'Minhas Viagens';
}