'use strict';

angular.module('myApp.products', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/configuration/products', {
            templateUrl: 'configuration/products/products.html',
            controller: 'ProductsCtrl'
        });
        $routeProvider.when('/configuration/product/:id?', {
            templateUrl: 'configuration/products/product_form.html',
            controller: 'ProductCtrl'
        });
    }])

    .controller('ProductsCtrl', ['$scope','productService',function($scope, productService) {
        $scope.products = productService.query({'filter[include]': 'manufacturers'});
    }])
    .controller('ProductCtrl', ['$scope', 'productService','$routeParams', '$location',function($scope,productService,$routeParams,$location) {
        $scope.product = {
            part_number: '',
            alt_part_number: '',
            description: '',
            manufacturer: '',
            id: 0
        };

        if ($routeParams.id) {
            $scope.product = productService.get({id: $routeParams.id});
        }

        $scope.submit = function() {
            if($scope.product.part_number) {
                if($scope.product.id) {
                    productService.update($scope.product);
                } else {
                    productService.save($scope.product);
                }

                $location.path('/configuration/products');
            }
        }

    }]);