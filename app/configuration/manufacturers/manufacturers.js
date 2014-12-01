'use strict';

angular.module('myApp.manufacturers', ['ngRoute'])

    .config(['$routeProvider', function($routeProvider) {
        $routeProvider.when('/configuration/manufacturers', {
            templateUrl: 'configuration/manufacturers/manufacturers.html',
            controller: 'ManufacturersCtrl'
        });
        $routeProvider.when('/configuration/manufacturer/:id?', {
            templateUrl: 'configuration/manufacturers/manufacturer_form.html',
            controller: 'ManufacturerCtrl'
        });
    }])

    .controller('ManufacturersCtrl', ['$scope',function($scope) {
        $scope.manufacturers = [{
            name: 'test1',
            id: 1
        },{
            name: 'test2',
            id: 2
        },{
            name: 'test4',
            id: 3
        },{
            name: 'test5',
            id: 4
        },{
            name: 'test3',
            id: 5
        }];
    }])
    .controller('ManufacturerCtrl', ['$scope','$routeParams', '$location',function($scope,$routeParams,$location) {
        $scope.manufacturer = {
            name: '',
            id: 0
        };
        if ($routeParams.id) {
            $scope.manufacturer = {
                name: 'Some test manufacturer',
                id: $routeParams.id
            };
        }
        $scope.submit = function() {
            if($scope.manufacturer.name) {
                $location.path('/configuration/manufacturers')
            }
        }
    }]);