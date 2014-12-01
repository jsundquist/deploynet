angular.service('myApp.manufacturerService', ['$resource', function($resource){
    return $resource('/api/manufacturers/:id', {}, {
        update: { method: 'PUT'}
    });
}]);