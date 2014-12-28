angular.module('myApp.productService', ['ngResource'])
    .service('productService', ['$resource', function($resource) {
        return $resource('/api/products/:id', {}, {
            update: { method: 'PUT'}
        });
    }]);