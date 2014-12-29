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
    'myApp.customers',
    'myApp.version',
    'myApp.manufacturerService',
    'myApp.productService',
    'myApp.customerService',
    'myApp.customerLocationService',
    'myApp.customerContactService',
]).
    config(['$routeProvider', function ($routeProvider) {
        $routeProvider.otherwise({redirectTo: '/dashbaord'});
    }]);
