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

    .controller('ManufacturersCtrl', ['$scope','manufacturerService',function($scope, manufacturerService) {
        $scope.manufacturers = manufacturerService.query();
    }])
    .controller('ManufacturerCtrl', ['$scope', 'manufacturerService','$routeParams', '$location',function($scope,manufacturerService,$routeParams,$location) {
        $scope.manufacturer = {
            name: '',
            id: 0
        };
        if ($routeParams.id) {
            $scope.manufacturer = manufacturerService.get({id: $routeParams.id});
        }
        $scope.submit = function() {
            if($scope.manufacturer.name) {
                if($scope.manufacturer.id) {
                    manufacturerService.update($scope.manufacturer);
                } else {
                    manufacturerService.save($scope.manufacturer);
                }

                $location.path('/configuration/manufacturers');
            }
        }
    }]);