<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="pt-br" ng-app="Gitlabgamer">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GitLab Gamer</title>
    <link href="<?= asset_url() ?>app.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">GitLab Gamer</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#!/projetos">Projetos</a>
    </nav>
    <a class="btn btn-outline-primary" href="#">Sair</a>
</div>

<div class="container-fluid">
    <div ng-view></div>
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt=""
                     width="24" height="24">
                <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>
            </div>
        </div>
    </footer>
</div>

<script src="<?= asset_url() ?>lib.min.js"></script>
<script src="<?= asset_url() ?>app.min.js"></script>
</body>
</html>

