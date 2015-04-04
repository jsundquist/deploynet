angular.module('deployNet.customerWorkOrderService', ['ngResource'])
    .service('customerWorkOrderService', ['$resource', function ($resource) {
        return $resource('/api/customers/:id/orders/:locationId', {}, {
            update: {method: 'PUT'}
        });
    }]);