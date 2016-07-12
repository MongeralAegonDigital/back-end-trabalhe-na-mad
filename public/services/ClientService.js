angular.module('Mongeral')
.factory('ClientService', function ($http, HOST) {
    var _execute = function(client){
        var url = HOST + '/client';

        console.log(client);

        return $http.post(url, client);
    };

    var _addInfoCep = function($scope, data){
        $scope.client.endereco.logradouro = data.logradouro;
        $scope.client.endereco.bairro = data.bairro;
        $scope.client.endereco.cidade = data.cidade;
        $scope.client.endereco.uf = data.estado;

        if(data.complemento!==undefined) $scope.client.endereco.complemento = data.complemento;
        $scope.cepIncorreto = false;
        $scope.cepValido = true;
    };

    var _clearInfoCep = function($scope){
        $scope.cepIncorreto = true;
        $scope.cepValido = false;
        $scope.client.endereco = {};
    };

    return {
        execute: _execute,
        addInfoCep: _addInfoCep,
        clearInfoCep: _clearInfoCep
    };
});