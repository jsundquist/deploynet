'use strict';

angular.module('myApp.main', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/main', {
            templateUrl: 'main/index.html',
            controller: 'MainCtrl'
        });
    }])

    .controller('MainCtrl', [function() {

    }]);