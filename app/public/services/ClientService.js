angular.module('Mongeral')
.factory('ClientService', function ($http, HOST) {
    var _execute = function(params){
        var url = HOST + '/client';

        params = _clientValidation(params);

        return $http.post(url, params);
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
        client.endereco.numero = _verifyNumber(client.endereco.numero);
        client.endereco.complemento = _verifyExist(client.endereco.complemento);
        client.cpf = _formatCpf(client.cpf);
        client.renda = _formatCurrency(client.renda);
        return client;
    };

    var _formatDate = function(data){
        return new Date(data).toISOString();
    };
    
    var _verifyNumber = function(numero){
        if(numero === undefined){
            numero = 'S/N';
        }
        return numero;
    };

    var _formatCpf = function(cpf){
        return cpf.replace(/\.|\-/g, '');
    };

    var _formatCurrency = function(renda){
        return renda.replace(/\./g, '');
    };

    var _verifyExist = function(complemento){
        if(complemento === undefined)
            complemento = 'S/C';
        return complemento;
    };
    
    var _clearForm = function($scope){
        $scope.client = {};
    };

    return {
        execute: _execute,
        addInfoCep: _addInfoCep,
        clearInfoCep: _clearInfoCep,
        clearForm: _clearForm
    };
});