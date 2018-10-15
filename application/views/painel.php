<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            grid-template-areas: ". ." ". .";
        }

        .text_head {
            color: #22d0eb;
            font-weight: bold;
            font-size: 3vw;
        }

        .text_title {
            color: #cdb765;
            font-weight: normal;
            letter-spacing: 6px;
            font-size: 2vw;
        }

        .card_dev {
            border-radius: 4rem;
            border: 1px solid #484845;
            background-color: #082d3e;
        }

        .text_dev_title {
            font-weight: bold;
            font-size: 1.5vw;
            color: #F2FBFF;
            margin-left: 5px;
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
<div class="grid-container">
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
            <div class="col-6 ml-2">
                <div class="card card_dev">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <section>
                                <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="120"
                                     height="120">
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
                                            stroke-dasharray="75,100"
                                            stroke-linecap="round"
                                            fill="none"
                                            cx="16.91549431"
                                            cy="16.91549431"
                                            r="15.91549431"/>
                                    <g class="circle-chart__info">
                                        <text class="circle-chart__percent" x="16.91549431" y="15.5"
                                              alignment-baseline="central" text-anchor="middle" font-size="8">
                                            <img src="//placehold.it/120" class="rounded-circle">
                                        </text>
                                    </g>
                                </svg>
                            </section>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center mt-2">
                                <span class="align-middle text_dev_title">Henrique Brandão</span>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="project_detalhe">
        <br>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
</body>
</html>
