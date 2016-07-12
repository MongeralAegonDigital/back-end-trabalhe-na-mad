angular.module('Mongeral')
.controller('ClientController', function($scope, ClientService, CepSearch){
    $scope.cepValido = false;
    $scope.client = {};
    
    $scope.cepSearch = function(){
        console.log($scope.client);

        CepSearch.execute($scope.client.cep).success(function(data, status){
            console.log(status);
        });
    };
});