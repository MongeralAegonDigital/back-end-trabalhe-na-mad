angular.module('Mongeral', ['ngRoute'])

    .constant('HOST', 'http://localhost:8000/api/public')
    
    .config(function($routeProvider) {
        $routeProvider
            .when("/", {
                templateUrl : "assets/templates/clientManager.html",
                controller: 'ClientController'
            });
    });
