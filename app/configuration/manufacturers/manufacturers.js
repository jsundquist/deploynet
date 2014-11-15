'use strict';

angular.module('myApp.manufacturers', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/configuration/manufacturers', {
            templateUrl: 'configuration/manufacturers/manufacturers.html',
            controller: 'ManufacturersCtrl'
        });
        $routeProvider.when('/configuration/manufacturer/:id?', {
            templateUrl: 'configuration/manufacturers/manufacturer_form.html',
            controller: 'ManufacturersCtrl'
        });
    }])

    .controller('ManufacturersCtrl', [function() {

    }])
    .controller('ManufacturerCtrl', [function() {

    }]);