'use strict';

// Declare app level module which depends on views, and components
angular.module('deployNet', [
    'ngRoute',
    'ngResource',
    'deployNet.dashboard',
    'deployNet.configuration',
    'deployNet.shippingMethods',
    'deployNet.manufacturers',
    'deployNet.products',
    'deployNet.customers',
    'deployNet.locations',
    'deployNet.version',
    'deployNet.manufacturerService',
    'deployNet.productService',
    'deployNet.customerService',
    'deployNet.customerLocationService',
    'deployNet.customerContactService',
    'deployNet.customerProjectService',
    'deployNet.customerWorkOrderService'
]).
    config(['$routeProvider', function ($routeProvider) {
        $routeProvider.otherwise({redirectTo: '/dashbaord'});
    }]);
