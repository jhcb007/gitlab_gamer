'use strict';

angular.module("GitlabGamerPainel").value("config", {
    baseURL: "http://app_gamer.test/index.php/api/",
    nomeAPP: "",
});

$(document).ajaxSend(function () {
    //NProgress.start();
});

$(document).ajaxComplete(function () {
    //NProgress.done();
});
