'use strict';

angular.module('myApp.customers', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/customers', {
            templateUrl: 'customers/customers.html',
            controller: 'CustomersCtrl'
        });

        $routeProvider.when('/customers/customer/add', {
            templateUrl: 'customers/add.html',
            controller: 'CustomersCtrl'
        });

        $routeProvider.when('/customers/customer/:id', {
            templateUrl: 'customers/details.html',
            controller: 'CustomersCtrl'
        });

        $routeProvider.when('/customers/customer/:id/edit', {
            templateUrl: 'customers/edit.html',
            controller: 'CustomersCtrl'
        });
    }])

    .controller('CustomersCtrl', [function() {

    }]);