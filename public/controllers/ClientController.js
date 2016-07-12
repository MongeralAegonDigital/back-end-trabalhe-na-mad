angular.module('Mongeral')
.controller('ClientController', function($scope, ClientService, CepSearch){
    $scope.cepValido = false;
    $scope.client = {};
    
    $scope.cepSearch = function(){
        $scope.cepIncorreto = false;

        if($scope.client.endereco === undefined){
            return;
        }

        CepSearch.execute($scope.client.endereco.cep).success(function(data, status){
            console.log(status);
            if(status === 200){
                addInfoCep(data);
            }
        }).error(function () {
            $scope.cepIncorreto = true;
            clearInfoCep();
        });
    };

    $scope.submit = function(){
        ClientService.execute($scope.client).success(function(data, status){

        });
    };

    var addInfoCep = function(data){
        $scope.client.endereco.logradouro = data.logradouro;
        $scope.client.endereco.bairro = data.bairro;
        $scope.client.endereco.cidade = data.cidade;
        $scope.client.endereco.uf = data.estado;

        if(data.complemento!==undefined) $scope.client.endereco.complemento = data.complemento;
        $scope.cepValido = true;
    };
    
    var clearInfoCep = function(){
        $scope.cepValido = false;
        $scope.client.endereco = {};
    };
});