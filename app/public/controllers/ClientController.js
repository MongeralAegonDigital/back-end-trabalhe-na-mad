angular.module('Mongeral')
.controller('ClientController', function($scope, ClientService, CepSearch){
    $scope.client = {};
    
    $scope.cepSearch = function(){
        if($scope.client.endereco === undefined) return;

        CepSearch.execute($scope.client.endereco.cep).success(function(data, status){
            if(status === 200){
                ClientService.addInfoCep($scope, data);
            }
        }).error(function () {
            ClientService.clearInfoCep($scope);
        });
    };

    $scope.submit = function(){
        var params = angular.copy($scope.client);
        ClientService.execute(params).success(function(data, status){
            if(status === 200){
                $scope.createClienteSuccess = true;
                $scope.createClienteError = false;
            }

            ClientService.clearForm($scope);
        }).error(function () {
            $scope.createClienteSuccess = false;
            $scope.createClienteError = true;
        });
    };


});