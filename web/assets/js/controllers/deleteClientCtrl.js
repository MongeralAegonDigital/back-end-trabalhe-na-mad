/**
 * Controller to delete a client.
 */
app.controller('deleteClientCtrl', ['$scope', '$location', 'client', 'Flash', function($scope, $location, client, Flash) {
    $scope.client = client;
    $scope.isSaving = false;
    
    // delete the client
    $scope.delete = function(client) {
        $scope.isSaving = true;
        
        client.$delete(function(m) {
            Flash.create('success', '<strong>Muito bem!</strong> O cliente foi deletado com sucesso!');
            
            $location.path('/clientes');
            $location.replace();
        }, function(response) {
            if (response.status === 400) {
                Flash.create('danger', '<strong>Ooops!</strong> Ocorreu um erro ao deletar o cliente. Tente novamente.');
            }
            $scope.isSaving = false;
        });
    };
}]);