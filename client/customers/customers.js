'use strict';

angular.module('deployNet.customers', ['ngRoute'])

    .config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/customers', {
            templateUrl: 'customers/customers.html',
            controller: 'CustomersCtrl'
        });

        $routeProvider.when('/customers/add', {
            templateUrl: 'customers/form.html',
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
            templateUrl: 'customers/location/form.html',
            controller: 'CustomerLocationFormCtrl'
        });

        $routeProvider.when('/customer/locations/:id/edit/:locationId', {
            templateUrl: 'customers/location/form.html',
            controller: 'CustomerLocationFormCtrl'
        });

        $routeProvider.when('/customer/contacts/:id', {
            templateUrl: 'customers/contacts.html',
            controller: 'CustomerContactsCtrl'
        });

        $routeProvider.when('/customer/contacts/:id/add', {
            templateUrl: 'customers/contact_form.html',
            controller: 'CustomerContactFormCtrl'
        });

        $routeProvider.when('/customer/contacts/:id/edit/:contactId', {
            templateUrl: 'customers/contact_form.html',
            controller: 'CustomerContactFormCtrl'
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
    }])

    .controller('CustomerContactsCtrl', ['$scope', '$routeParams', 'customerService', 'customerContactService', function ($scope, $routeParams, customerService, customerContactService) {
        $scope.customer = customerService.get({id: $routeParams.id});
        $scope.contacts = customerContactService.query({id: $routeParams.id, filter: { where: {location_id: null}}});
    }])
    
    .controller('CustomerContactFormCtrl', ['$scope', '$routeParams', '$location', 'customerService', 'customerContactService', function ($scope, $routeParams, $location, customerService, customerContactService) {
        $scope.customer = customerService.get({id: $routeParams.id});
        
        $scope.contact = {
            id: null,
            customer_id: $routeParams.id,
            location_id: null,
            first_name: '',
            last_name: '',
            address1: '',
            address2: null,
            address3: null,
            city: '',
            state_id: 0,
            postal_code: '',
            phone: null,
            fax: null,
            cell_phone: null,
            extension: null,
            email: '',
            time_zone_id: ''
        };
        
        if ($routeParams.contactId) {
            $scope.contact = customerContactService.get({id: $routeParams.contactId});
        }
        
         $scope.submit = function () {
            if ($scope.contact.first_name) {

                if ($scope.contact.id) {
                    customerService.update($scope.contact);
                    $location.path('/customer/contacts/' + $routeParams.id);
                }

                customerService.save($scope.contact);
                $location.path('/customers/contacts/' + $routeParams.id);
            }
        };
    }]);

