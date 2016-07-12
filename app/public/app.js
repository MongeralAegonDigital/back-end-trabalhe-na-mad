angular.module('Mongeral', ['ngRoute'])

    .constant('HOST', 'http://localhost:8000')
    
    .config(function($routeProvider) {
        $routeProvider
            .when("/", {
                templateUrl : "assets/templates/clientManager.html",
                controller: 'ClientController'
            });
    });
/*
    .config(function($stateProvider, $urlRouterProvider) {
        $stateProvider

            .state('clientManager', {
                url: '/',
                templateUrl: 'assets/templates/clientManager.html',
                controller: 'ClientController'
            });


        // if none of the above states are matched, use this as the fallback
        $urlRouterProvider.otherwise('/');
    });*/