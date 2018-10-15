'use strict';

angular.module("Gitlabgamer").value("config", {
    baseURL: "http://app_gamer.test/index.php/api/",
    nomeAPP: "",
});

$(document).ajaxSend(function () {
    //NProgress.start();
});

$(document).ajaxComplete(function () {
    //NProgress.done();
});
