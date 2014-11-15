'use strict';

angular.module('myApp.products', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/products', {
            templateUrl: 'products/products.html',
            controller: 'ProductsCtrl'
        });

        $routeProvider.when('/products/product/add', {
            templateUrl: 'products/add.html',
            controller: 'ProductsCtrl'
        });

        $routeProvider.when('/products/product/:id', {
            templateUrl: 'products/details.html',
            controller: 'ProductsCtrl'
        });

        $routeProvider.when('/products/product/:id/edit', {
            templateUrl: 'products/edit.html',
            controller: 'ProductsCtrl'
        });
    }])

    .controller('ProductsCtrl', [function() {

    }]);