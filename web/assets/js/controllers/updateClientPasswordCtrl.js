/**
 * Controller to update a client password.
 */
app.controller('updateClientPasswordCtrl', ['$scope', '$location', 'client', 'Flash', function($scope, $location, client, Flash) {
    $scope.clientCurName = client.name;
    $scope.client = client;
    $scope.isSaving = false;
        
    // saves the client
    function save(client) {
        $scope.isSaving = true;
        
        client.$save(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> A senha foi alterada com sucesso!');
            
            $location.path('/clientes/' + m.client.id);
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao salvar a nova senha. Tente novamente.');
            }
            $scope.isSaving = false;
        });
    };
    
    // handle form submission
    $scope.handleSubmit = function(clientForm, client) {
        if (clientForm.$valid) {
            save(client);
        }
    };
}]);