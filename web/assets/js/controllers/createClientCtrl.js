/**
 * Controller to create a client.
 */
app.controller('createClientCtrl', ['$scope', '$location', 'Client', 'Flash', function($scope, $location, Client, Flash) {
    $scope.client = new Client();
    $scope.isSaving = false;
        
    // saves the client
    function save(client) {
        $scope.isSaving = true;
        
        client.$save(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> O cliente foi adicionado com sucesso!');
            
            $location.path('/clientes/' + m.client.id);
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao salvar o cliente. Tente novamente.');
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