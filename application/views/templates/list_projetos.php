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
        <div class="card-deck mb-3 text-center">
            <div ng-repeat="p in list_projetos" class="col-4">
                <div class="card mb-4 box-shadow">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">{{p.name}} <span ng-show="p.visibility == 'private'" class="badge badge-danger">Privado</span> <span ng-show="p.visibility == 'public'" class="badge badge-success">Público</span></h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">Commits
                            <small class="text-muted">{{p.statistics.commit_count}}</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Criado: {{p.created_at | date:'dd/MM/yyyy HH:mm:ss'}}</li>
                            <li>Atualização: {{p.last_activity_at | date:'dd/MM/yyyy HH:mm:ss'}}</li>
                            <li>Tamanho: {{p.statistics.storage_size | bytes}}</li>
                            <li><a href="{{p.web_url}}" target="_blank">Repositório</a></li>
                        </ul>
                        <a href="#!/projeto/{{p.id}}" class="btn btn-lg btn-block btn-outline-primary">Gerenciar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


