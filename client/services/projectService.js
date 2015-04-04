angular.module('deployNet.projectService', ['ngResource'])
    .service('projectService', ['$resource', function ($resource) {
        return $resource('/api/projects/:id', {}, {
            update: {method: 'PUT'}
        });
    }]);