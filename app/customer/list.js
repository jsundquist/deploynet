'use strict';

angular.module('myApp.customerList', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/customerlist', {
            templateUrl: 'customer/list.html',
            controller: 'CustomerListCtrl'
        });
    }])

    .controller('CustomerListCtrl', [function() {

    }]);