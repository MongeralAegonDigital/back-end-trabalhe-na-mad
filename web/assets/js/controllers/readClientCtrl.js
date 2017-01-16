/**
 * Controller to show details of a client.
 */
app.controller('readClientCtrl', ['$scope', 'client', function($scope, client) {
    $scope.client = client;
}]);