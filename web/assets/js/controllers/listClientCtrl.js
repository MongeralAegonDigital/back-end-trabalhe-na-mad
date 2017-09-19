/**
 * Controller to list all the clients.
 */
app.controller('listClientCtrl', ['$scope', 'clients', function($scope, clients) {
    $scope.clients = clients;
    $scope.nbClients = clients.length;
}]);