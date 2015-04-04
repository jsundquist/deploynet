'use strict';

angular.module('deployNet.shippingMethods', ['ngRoute'])

    .config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/configuration/shippingMethod/:methodId?', {
            templateUrl: 'configuration/shippingMethods/shipping_method_form.html',
            controller: 'ShippingMethodsFormCtrl'
        });

        $routeProvider.when('/configuration/shippingMethods', {
            templateUrl: 'configuration/shippingMethods/shipping_methods.html',
            controller: 'ShippingMethodsCtrl'
        });
    }])

    .controller('ShippingMethodsCtrl', [function () {

    }])
    .controller('ShippingMethodsFormCtrl', ['$scope', '$routeParams', function($scope, $routeParams){
        $scope.route = 'form';
        $scope.params = $routeParams;
    }]);