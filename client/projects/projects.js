'use strict';

angular.module('deployNet.projects', ['ngRoute'])
    .config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/projects', {
            templateUrl: 'projects/projects.html',
            controller: 'ProjectsCtrl'
        });
    }])
    .controller('ProjectsCtrl', ['$scope', function ($scope) {

    }]);