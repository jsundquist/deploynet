'use strict';

angular.module('myApp.customers', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/customers', {
            templateUrl: 'customers/customers.html',
            controller: 'CustomersCtrl'
        });

        $routeProvider.when('/customers/add', {
            templateUrl: 'customers/add.html',
            controller: 'CustomerFormCtrl'
        });

        $routeProvider.when('/customer/details/:id', {
            templateUrl: 'customers/details.html',
            controller: 'CustomerDetailsCtrl'
        });
        
        $routeProvider.when('/customer/locations/:id', {
            templateUrl: 'customers/locations.html',
            controller: 'CustomerDetailsCtrl'
        });
        
        $routeProvider.when('/customer/contacts/:id', {
            templateUrl: 'customers/contacts.html',
            controller: 'CustomerDetailsCtrl'
        });
        
        $routeProvider.when('/customer/projects/:id', {
            templateUrl: 'customers/projects.html',
            controller: 'CustomerDetailsCtrl'
        });
        
        $routeProvider.when('/customer/orders/:id', {
            templateUrl: 'customers/orders.html',
            controller: 'CustomerDetailsCtrl'
        });
        
        $routeProvider.when('/customer/documents/:id', {
            templateUrl: 'customers/documents.html',
            controller: 'CustomerDetailsCtrl'
        });

        $routeProvider.when('/customer/details/:id/edit', {
            templateUrl: 'customers/edit.html',
            controller: 'CustomerFormCtrl'
        });
    }])

    .controller('CustomersCtrl', ['$scope',function($scope) {

    }])
    .controller('CustomerDetailsCtrl', ['$scope', '$routeParams', '$location',function($scope, $routeParams, $location){
        $scope.customer = {};
    }])
    .controller('CustomerFormCtrl', ['$scope', '$routeParams', '$location',function($scope, $routeParams, $location){
        $scope.customer = {};
        
        if ($routeParams.id) {
            $scope.customer = {};
        }
        
        $scope.submit = function() {
            if ($scope.customer) {
                $location.path('/customer/details/' + 123456);
            }
        };
    }]);