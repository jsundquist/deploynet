'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp', [
    'ngRoute',
    'ngResource',
    'myApp.dashboard',
    'myApp.configuration',
    'myApp.shippingMethods',
    'myApp.manufacturers',
    'myApp.products',
    'myApp.version',
    'myApp.manufacturerService'
]).
    config(['$routeProvider', function ($routeProvider) {
        $routeProvider.otherwise({redirectTo: '/dashbaord'});
    }]);
