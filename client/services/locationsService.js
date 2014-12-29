angular.module('myApp.locationsService', ['ngResource'])
    .service('locationsService', ['$resource', function ($resource) {
        return $resource('/api/locations/:id', {}, {
            update: {method: 'PUT'}
        });
    }]);