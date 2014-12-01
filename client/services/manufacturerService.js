angular.module('myApp.manufacturerService', ['ngResource'])
    .service('manufacturerService', ['$resource', function($resource) {
        return $resource('/api/manufacturers/:id', {}, {
            update: { method: 'PUT'}
        });
    }]);