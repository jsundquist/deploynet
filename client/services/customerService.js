angular.module('myApp.customerService', ['ngResource'])
    .service('customerService', ['$resource', function($resource) {
        return $resource('/api/customers/:id', {}, {
            update: { method: 'PUT'}
        });
    }]);