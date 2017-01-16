/**
 * Route Configuration.
 */
app.config(['$routeProvider', function($routeProvider){
    $routeProvider
    
    .when('/', {
        templateUrl: 'templates/homepage.html'
    })
    
    .when('/api', {
        templateUrl: 'templates/api.html',
    })
    
    .when('/cadastro', {
        templateUrl: 'templates/clients/create.html',
        controller: 'createClientCtrl'
    })
    
    .when('/clientes', {
        templateUrl: 'templates/clients/list.html',
        controller: 'listClientCtrl',
        resolve: {
            clients: ['$route', 'Client', function ($route, Client) {
                return Client.query().$promise;
            }]
        }
    })
    
    .when('/clientes/:id/editar', {
        templateUrl: 'templates/clients/update.html',
        controller: 'updateClientCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/clientes/:id/editar-senha', {
        templateUrl: 'templates/clients/update_password.html',
        controller: 'updateClientPasswordCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/clientes/:id/deletar', {
        templateUrl: 'templates/clients/delete.html',
        controller: 'deleteClientCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/clientes/:id', {
        templateUrl: 'templates/clients/read.html',
        controller: 'readClientCtrl',
        resolve: {
            client: ['$route', 'Client', function ($route, Client) {
                return Client.get({
                    id: $route.current.params.id
                }).$promise;
            }]
        }
    })
    
    .when('/404', {
        templateUrl: 'templates/errors/404.html'
    })
    
    .when('/500', {
        templateUrl: 'templates/errors/500.html'
    })
    
    .otherwise({
        redirectTo: '404'
    })
    
    ;
}]);