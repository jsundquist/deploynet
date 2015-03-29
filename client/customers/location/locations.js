angular
    .module('myApp.locations', ['ngRoute'])
    .config(['$routeProvider', function ($routeProvider) {
        $routeProvider.when('/customer/location/$locationId/details', {
            templateUrl: 'customers/location.html',
            controller: 'CustomerLocationCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/edit', {
            templateUrl: 'customers/location/edit_form.html',
            controller: 'CustomerLocationEditCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/contacts', {
            templateUrl: 'customers/location/contacts.html',
            controller: 'CustomerContactsCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/contact/add', {
            templateUrl: 'customers/location/contact_form.html',
            controller: 'CustomerLocationContactFormCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/contact/$contactId/edit', {
            templateUrl: 'customers/location/contact_form.html',
            controller: 'CustomerLocationContactFormCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/projects', {
            templateUrl: 'customers/location/projects.html',
            controller: 'CustomerLocationProjectsCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/workorders', {
            templateUrl: 'customers/location/orders.html',
            controller: 'CustomerLocationWorkOrdersCtrl'
        });

        $routeProvider.when('/customer/location/$locationId/documents', {
            templateUrl: 'customers/location/documents.html',
            controller: 'CustomerLocationDocumentsCtrl'
        });
    }])
    .controller('CustomerLocationCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', function ($scope, $routeParams, customerService, customerLocationService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});
    }])

    .controller('CustomerLocationEditCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', function ($scope, $routeParams, customerService, customerLocationService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});
    }])

    .controller('CustomerLocationContactsCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', 'customerContactService', function ($scope, $routeParams, customerService, customerLocationService, customerContactService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});

        $scope.contacts = customerContactService.query({id: $routeParams.id, locationId: $routeParams.locationId});
    }])

    .controller('CustomerLocationContactFormCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', 'customerContactService', function ($scope, $routeParams, customerService, customerLocationService, customerContactService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});

        $scope.contact = {
            id: null,
            customer_id: $routeParams.id,
            location_id: $routeParams.locationId,
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
                    $location.path('/customer/location/' + $routeParams.locationId + '/contacts');
                }

                customerService.save($scope.contact);
                $location.path('/customers/contacts/' + $routeParams.locationId + '/contacts');
            }
        };
    }])

    .controller('CustomerLocationProjectsCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', 'customerProjectService', function ($scope, $routeParams, customerService, customerLocationService, customerProjectService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});

        $scope.projects = customerProjectService.query({id: $routeParams.id, locationId: $routeParams.locationId})
    }])

    .controller('CustomerLocationWorkOrdersCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', 'customerWorkOrderService', function ($scope, $routeParams, customerService, customerLocationService, customerWorkOrderService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});

        $scope.wordOrders = customerWorkOrderService.query({id: $routeParams.id, locationId: $routeParams.locationId});
    }])

    .controller('CustomerLocationDocumentsCtrl', ['$scope', '$routeParams', 'customerService', 'customerLocationService', function ($scope, $routeParams, customerService, customerLocationService) {
        $scope.customer = customerService.get({id: $routeParams.id});

        $scope.location = customerLocationService.get({id: $routeParams.id, locationId: $routeParams.locationId});
    }]);