<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-12">
        <h3 ng-bind="pageTitle"></h3>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        Definições do Gamer
                    </div>
                    <div class="col-12">
                        <form class="mt-1 mb-2">
                            <div class="form-group">
                                <label for="conf_tempo_projeto">Tempo de troca dos projetos</label>
                                <input type="text" required class="form-control" ng-model="configuracao.conf_tempo_projeto" id="conf_tempo_projeto" aria-describedby="tempo_sync" placeholder="Segundos">
                                <small class="form-text text-muted">Em segundos</small>
                            </div>
                            <div class="form-group">
                                <label for="conf_tempo_sync">Tempo de sincronização</label>
                                <input type="text" required class="form-control" ng-model="configuracao.conf_tempo_sync" id="conf_tempo_sync" aria-describedby="tempo_sync" placeholder="Minutos">
                                <small class="form-text text-muted">Em minutos</small>
                            </div>
                            <button ng-disabled="!configuracao.conf_tempo_projeto || !configuracao.conf_tempo_projeto" type="button" ng-click="salva_definicao()" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


