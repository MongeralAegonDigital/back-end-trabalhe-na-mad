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
        ClientService.execute($scope.client).success(function(data, status){
            console.log(data);
            console.log(status);
        }).error(function (data, status) {
            console.log(data);
            console.log(status);
        });
    };


});