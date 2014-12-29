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
            controller: 'CustomerLocationFormCtrl'
        });

        $routeProvider.when('/customer/locations/:id/edit/:locationId', {
            templateUrl: 'customers/locations.html',
            controller: 'CustomerLocationFormCtrl'
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
            "primarycontact": "",
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
            if ($scope.customerForm.name) {
                if ($scope.customerForm.id) {
                    customerService.update($scope.customerForm);
                    $location.path('/customer/details/' + $routeParams.id);
                }
                customerService.save($scope.customerForm);
                $location.path('/customers/');
            }
        };
    }])

    .controller('CustomerLocationFormCtrl', ['$scope', '$routeParams', '$location', 'customerService', 'customerLocationService', function ($scope, $routeParams, $location, customerService, customerLocationService) {
        $scope.location = {
            "customer_id": 0,
            "name": "",
            "address1": "",
            "address2": "",
            "city": "",
            "state_id": 0,
            "postal_code": "",
            "active": "",
            "primary_contact": "",
            "phone": 0,
            "fax": 0,
            "id": 0
        };

        $scope.customer = customerService.get({id: $routeParams.id});

        if ($routeParams.locationId) {
            $scope.location = customerLocationService.get({id: $routeParams.locationId})
        }

        $scope.submit = function () {
            if ($scope.location.name) {

                if ($scope.location.id) {
                    customerService.update($scope.location);
                    $location.path('/customer/location/' + $routeParams.id + '/details/' + $routeParams.locationId);
                }

                customerService.save($scope.location);
                $location.path('/customers/locations/' + $routeParams.id);
            }
        };
    }]);