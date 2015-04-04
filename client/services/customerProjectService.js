angular.module('deployNet.customerProjectService', ['ngResource'])
    .service('customerProjectService', ['$resource', function ($resource) {
        return $resource('/api/customers/:id/projects/:locationId', {}, {
            update: {method: 'PUT'}
        });
    }]);