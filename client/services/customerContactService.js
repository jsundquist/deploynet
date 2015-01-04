angular.module('myApp.customerContactService', ['ngResource'])
    .service('customerContactService', ['$resource', function ($resource) {
        return $resource('/api/customers/:id/contacts/:contactId', {}, {
            update: {method: 'PUT'}
        });
    }]);