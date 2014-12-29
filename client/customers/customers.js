'use strict';

angular.module('myApp.customers', ['ngRoute'])

    .config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/customers', {
            templateUrl: 'customers/customers.html',
            controller: 'CustomersCtrl'
        });

        $routeProvider.when('/customers/add', {
            templateUrl: 'customers/add.html',
            controller: 'CustomerFormCtrl'
        });

        $routeProvider.when('/customer/details/:id', {
            templateUrl: 'customers/details.html',
            controller: 'CustomerDetailsCtrl'
        });

        $routeProvider.when('/customer/locations/:id', {
            templateUrl: 'customers/locations.html',
            controller: 'CustomerLocationsCtrl'
        });

        $routeProvider.when('/customer/locations/:id/add', {
            templateUrl: 'customers/locations.html',
            controller: 'CustomerLocationsCtrl'
        });

        $routeProvider.when('/customer/contacts/:id', {
            templateUrl: 'customers/contacts.html',
            controller: 'CustomerDetailsCtrl'
        });

        $routeProvider.when('/customer/projects/:id', {
            templateUrl: 'customers/projects.html',
            controller: 'CustomerDetailsCtrl'
        });

        $routeProvider.when('/customer/orders/:id', {
            templateUrl: 'customers/orders.html',
            controller: 'CustomerDetailsCtrl'
        });

        $routeProvider.when('/customer/documents/:id', {
            templateUrl: 'customers/documents.html',
            controller: 'CustomerDetailsCtrl'
        });

        $routeProvider.when('/customer/details/:id/edit', {
            templateUrl: 'customers/form.html',
            controller: 'CustomerFormCtrl'
        });
    }])

    .controller('CustomersCtrl', ['$scope', 'customerService', function ($scope, customerService) {
        $scope.customers = customerService.query();
    }])

    .controller('CustomerDetailsCtrl', ['$scope', '$routeParams', '$location', 'customerService', function ($scope, $routeParams, $location, customerService) {
        $scope.customer = customerService.get({id: $routeParams.id});
    }])

    .controller('CustomerLocationsCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', function ($scope, $routeParams, customerService, customerLocationService) {
        $scope.customer = customerService.get({id: $routeParams.id});
        $scope.locations = customerLocationService.query({id: $routeParams.id});
    }])

    .controller('CustomerFormCtrl', ['$scope', '$routeParams', '$location', 'customerService', function ($scope, $routeParams, $location, customerService) {
        $scope.customerForm = {
            "name": "",
            "address1": "",
            "address2": "",
            "city": "",
            "state": 0,
            "postalcode": "",
            "active": "",
            "pimarycontact": "",
            "phone": 0,
            "fax": 0,
            "id": 0
        };

        if ($routeParams.id) {
            var customer = customerService.get({id: $routeParams.id});
            $scope.customer = customer;
            $scope.customerForm = customer;
        }

        $scope.submit = function () {
            if ($scope.customer.name) {
                if ($scope.product.id) {
                    customerService.update($scope.customerForm);
                    $location.path('/customer/details/' + $routeParams.id);
                }
                customerService.save($scope.customerForm);
                $location.path('/customers/');
            }
        };
    }]);