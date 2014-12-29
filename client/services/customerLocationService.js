angular.module('myApp.customerLocationService', ['ngResource'])
    .service('customerLocationService', ['$resource', function ($resource) {
        return $resource('/api/customers/:id/locations/:locationId', {}, {
            update: {method: 'PUT'}
        });
    }]);