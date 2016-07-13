angular.module('Mongeral')
.factory('ClientService', function ($http, HOST) {
    var _execute = function(client){
        var url = HOST + '/client';

        client = _clientValidation(client);

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

    var _clientValidation = function(client){
        client.dataNascimento = _formatDate(client.dataNascimento);
        client.dataRg = _formatDate(client.dataRg);
        client.endereco.number = _verifyNumber(client.endereco.number);
        return client;
    };

    var _formatDate = function(data){
        return new Date(data).toISOString();
    };
    
    var _verifyNumber = function(number){
        if(number === undefined){
            number = 'S/N';
        }
        return number;
    };

    return {
        execute: _execute,
        addInfoCep: _addInfoCep,
        clearInfoCep: _clearInfoCep
    };
});