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
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Definições
                    </div>
                    <div class="col-12">
                        <form class="mt-1 mb-2">
                            <div class="form-check mt-2 mb-2">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Ativo (Exibir no Painel)</label>
                            </div>
                            <div class="form-group">
                                <label for="peso_incluida">Peso das linhas incluídas e excluídas</label>
                                <input type="number" min="1" max="100" required class="form-control" id="peso_incluida" aria-describedby="emailHelp" placeholder="Informe o valor">
                                <small class="form-text text-muted">Valor entre 1 a 100</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Contribuições
                    </div>
                    <ul class="list-group list-group-flush">
                        <li ng-repeat="c in contribuicao" class="list-group-item">{{c.name}} - {{c.commits}} commits
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        Devs
                    </div>
                    <ul class="list-group list-group-flush" style="width: 100%; height: 300px; overflow-y: scroll;">
                        <li ng-repeat="d in devs" class="list-group-item">
                            <div class="text-left">
                                <img width="62" ng-src="{{d.avatar_url}}" class="rounded">@{{d.username}}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


