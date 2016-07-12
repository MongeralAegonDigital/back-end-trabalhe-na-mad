angular.module('Mongeral')
.factory('CepSearch', function($http){
    
    var _execute = function(cep){
        var hostCep = 'http://api.postmon.com.br/v1/cep/';

        var cepZanitized = _cepValidation(cep);

        var url = hostCep + cepZanitized;

        return $http.get(url);
    };

    var _cepValidation = function(cep) {
        if (cep !== undefined && /\d{5}\-\d{3}/.test(cep))
            return cep.replace(/\.|\-/g, '');
        else
            return "";
    };
    
    return {
        execute: _execute
    };
    
});