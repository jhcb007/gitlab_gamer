<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="pt_BR" ng-app="GitlabGamerPainel">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
        body {
            background-image: url("<?= asset_url() ?>img/background.png");
            background-repeat: no-repeat;
            min-height: 100vh;
            border: 5px solid #22d0eb;
            overflow: hidden;
        }

        .grid-container {
            display: grid;
            height: 100%;
            grid-template-columns: 1.4fr 1fr 0.8fr 1.4fr;
            grid-template-rows: 0.2fr 0.9fr 1.1fr;
            grid-template-areas: "header_dev header_dev header_dev header_project" "dev_list dev_list dev_list project_detalhe" "dev_list dev_list dev_list project_detalhe";
        }

        .header_dev {
            grid-area: header_dev;
            border-bottom: 1.5px solid #22d0eb;
            border-right: 1.5px solid #22d0eb;
        }

        .header_project {
            grid-area: header_project;
            border-bottom: 1.5px solid #22d0eb;
        }

        .dev_list {
            grid-area: dev_list;
            min-height: 90vh;
            border-right: 1.5px solid #22d0eb;
        }

        .project_detalhe {
            display: grid;
            grid-area: project_detalhe;
        }

        .text_head {
            color: #22d0eb;
            font-weight: bold;
            font-size: 3vw;
        }

        .text_title {
            color: #fdcd06;
            font-weight: normal;
            letter-spacing: 6px;
            font-size: 2vw;
        }

        .card_dev {
            border-radius: 4rem;
            border: 1px solid rgba(255, 255, 255, 0.35);
            background-color: #082d3e;
        }

        .text_dev_title {
            font-weight: bold;
            font-size: 1.8vw;
            color: #F2FBFF;
            margin-left: 5px;
        }

        .text_dev_pontuacao_total {
            font-weight: bold;
            font-size: 2.4vw;
            color: #36FECA;
            margin-left: 5px;
        }

        .text_dev_pontuacao_detalhe {
            font-weight: bold;
            font-size: 1.3vw;
            color: #F2FBFF;
            margin-left: -50px;
        }

        .text_project_title {
            font-weight: bold;
            font-size: 4vw;
            color: #fdcd06;
            margin-left: 5px;
            text-transform: uppercase;
        }

        .circle-chart {
            position: absolute;
        }

        .circle-chart__circle {
            animation: circle-chart-fill 2s reverse; /* 1 */
            transform: rotate(-90deg); /* 2, 3 */
            transform-origin: center; /* 4 */
        }

        .circle-chart__info {
            animation: circle-chart-appear 2s forwards;
            opacity: 0;
            transform: translateY(0.3em);
        }

        @keyframes circle-chart-fill {
            to {
                stroke-dasharray: 0 100;
            }
        }

        @keyframes circle-chart-appear {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <title>Hello, world!</title>
</head>
<body>
<div ng-controller="InicioPainel" class="grid-container">
    <div class="header_dev">
        <div class="row">
            <div class="col-2 text-center mt-md-2">
                <span class="align-bottom"><img src="<?= asset_url() ?>img/developer.svg" style="width: 35%"></span>
            </div>
            <div class="col-8 text-center">
                <span class="align-middle text_head">DEVELOPERS</span>
            </div>
            <div class="col-2 text-center mt-md-2">
                <span class="align-bottom"><img src="<?= asset_url() ?>img/descending.svg" style="width: 35%"></span>
            </div>
        </div>
    </div>
    <div class="header_project">
        <div class="row">
            <div class="col-12 text-center">
                <span class="align-middle text_head">PROJECT</span>
            </div>
        </div>
    </div>
    <div class="dev_list">
        <div class="row mt-2">
            <div class="col-12 text-center">
                <span class="align-middle text_title">RANKING</span>
            </div>
        </div>

        <div class="row mt-3">
            <div ng-repeat="(key, r) in ranking" class="col-5 ml-2 mb-4">
                <div class="card card_dev">
                    <div class="row no-gutters">
                        <div class="col-3">
                            <section>
                                <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="120" height="120">
                                    <circle class="circle-chart__background"
                                            stroke="#001F2A"
                                            stroke-width="2"
                                            fill="none"
                                            cx="16.91549431"
                                            cy="16.91549431"
                                            r="15.91549431"/>
                                    <circle class="circle-chart__circle"
                                            stroke="#36FECA"
                                            stroke-width="2"
                                            stroke-dasharray="{{r.progresso}},100"
                                            stroke-linecap="round"
                                            fill="none"
                                            cx="16.91549431"
                                            cy="16.91549431"
                                            r="15.91549431"/>
                                    <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5"
                                              alignment-baseline="central" text-anchor="middle" font-size="8">
                                            <img ng-src="{{r.dev_avatar}}" width="120" class="rounded-circle">
                                        </text>
                                    </g>
                                </svg>
                            </section>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-12 text-center mt-2">
                                    <span class="align-middle text_dev_title">{{r.dev_name}}</span>
                                </div>
                                <div class="col-12 text-center">
                                    <span class="text_dev_pontuacao_total">{{r.total_total | number:2}}<span><img src="<?= asset_url() ?>img/star.svg" style="width: 15%; margin-top: -2%"></span><span ng-if="key === 0" ><img src="<?= asset_url() ?>img/crown.svg" style="width: 15%; margin-top: -5%"></span></span>
                                </div>
                                <div class="col-12 text-center ml-3">
                                    <span class="text_dev_pontuacao_detalhe"><i class="fas fa-code-branch"></i> <span style="color: #4caf50"> {{r.total_additions}}<i class="fas fa-plus"></i></span>  <span style="color: #f44336">{{r.total_deletions}}<i class="fas fa-minus"></i></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project_detalhe">
        <div class="col-12">
            <div class="row">
                <div class="col-12 text-center mt-5">
                    <span class="align-middle text_project_title">{{projeto.pro_name}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <span class="align-middle text_project_title">{{projeto.pro_visibility}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <span class="align-middle text_project_title">{{projeto.pro_data | sqltodata}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center mt-2">
                    <span class="align-middle text_project_title">Peso: {{projeto.pro_peso}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?= asset_url() ?>painel.min.js"></script>

</body>
</html>
