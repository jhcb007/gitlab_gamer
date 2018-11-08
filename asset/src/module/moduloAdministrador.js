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

function ProjetoCtrl($filter, $scope, $routeParams, GetProject) {
    $scope.contribuicao = [];
    $scope.devs = [];
    $scope.projeto = {};
    $scope.repositorios = [];
    $scope.dados_projeto = {};

    GetProject.query({id: $routeParams.id}, function (resul) {
        $scope.contribuicao = resul.contribuicao.conteudo;
        $scope.devs = resul.devs.conteudo;
        $scope.projeto = resul.projeto.conteudo;
        $scope.dados_projeto = resul.dados_projeto;
        $scope.dados_projeto.ativo_exibir = ($scope.dados_projeto.pro_ativo === 'S');
        $scope.pageTitle = $scope.projeto.name;
    });

    $scope.salva_definicao = function () {
        if ($scope.dados_projeto.ativo_exibir) {
            $scope.dados_projeto.pro_ativo = 'S';
        } else {
            $scope.dados_projeto.pro_ativo = 'N';
        }
        $scope.dados_projeto.id = $scope.dados_projeto.pro_codigo;
        GetProject.save({}, $scope.dados_projeto, function (resul) {
            if (resul.status) {
                $.notify({
                    title: '<strong>GitLab Gamer</strong>',
                    message: resul.mensagem
                }, {
                    type: 'success',
                    allow_dismiss: true,
                    delay: 4000,
                    placement: {
                        from: 'bottom',
                        align: 'left'
                    }
                });
            } else {
                $.notify({
                    title: '<strong>GitLab Gamer</strong>',
                    message: resul.mensagem
                }, {
                    type: 'danger',
                    allow_dismiss: true,
                    delay: 4000,
                    placement: {
                        from: 'bottom',
                        align: 'left'
                    }
                });
            }
        });
    };

}

function Configuracao($filter, $scope) {
    $scope.pageTitle = 'Configurações';
    $scope.configuracao = {
        conf_tempo_projeto: 1,
        conf_tempo_sync: 60
    };
}