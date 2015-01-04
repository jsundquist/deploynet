angular.module('myApp.customerWorkOrderService', ['ngResource'])
    .service('customerWorkOrderService', ['$resource', function ($resource) {
        return $resource('/api/customers/:id/orders/:locationId', {}, {
            update: {method: 'PUT'}
        });
    }]);