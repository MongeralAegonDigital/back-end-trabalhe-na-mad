angular.module("Mongeral").controller("ClientController",function(e,c,n){e.client={},e.cepSearch=function(){void 0!==e.client.endereco&&n.execute(e.client.endereco.cep).success(function(n,r){200===r&&c.addInfoCep(e,n)}).error(function(){c.clearInfoCep(e)})},e.submit=function(){var n=angular.copy(e.client);c.execute(n,e).success(function(n,r){200===r&&(e.createClienteSuccess=!0,e.createClienteError=!1),c.clearForm(e)}).error(function(){e.createClienteSuccess=!1,e.createClienteError=!0})}});
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
        ClientService.execute(params, $scope).success(function(data, status){
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
angular.module("Mongeral").factory("CepSearch",function(e){var r=function(r){var n="http://api.postmon.com.br/v1/cep/",o=t(r),a=n+o;return e.get(a)},t=function(e){return void 0!==e&&/\d{5}\-\d{3}/.test(e)?e.replace(/\.|\-/g,""):""};return{execute:r}});
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
angular.module("Mongeral").factory("ClientService",function(e,n){var o=function(o,r){r.sending=!0;var c=n+"/client";return o=t(o),e.post(c,o)},r=function(e,n){e.client.endereco.logradouro=n.logradouro,e.client.endereco.bairro=n.bairro,e.client.endereco.cidade=n.cidade,e.client.endereco.uf=n.estado,void 0!==n.complemento&&(e.client.endereco.complemento=n.complemento),e.cepIncorreto=!1,e.cepValido=!0},c=function(e){e.cepIncorreto=!0,e.cepValido=!1,e.client.endereco={}},t=function(e){return e.dataNascimento=i(e.dataNascimento),e.dataRg=i(e.dataRg),e.endereco.numero=a(e.endereco.numero),e.endereco.complemento=l(e.endereco.complemento),e.cpf=d(e.cpf),e.renda=u(e.renda),e.categoria=f(e.categoria),e},i=function(e){return new Date(e).toISOString()},a=function(e){return void 0===e&&(e="S/N"),e},d=function(e){return e.replace(/\.|\-/g,"")},u=function(e){return e.replace(/\./g,"")},l=function(e){return void 0===e&&(e="S/C"),e},f=function(e){return void 0===e&&(e="Outros"),e},m=function(e){e.sending=!1,e.client={}};return{execute:o,addInfoCep:r,clearInfoCep:c,clearForm:m}});
angular.module('Mongeral')
.factory('ClientService', function ($http, HOST) {
    var _execute = function(params, $scope){
        $scope.sending = true;
        
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
        client.categoria = _verifyCategory(client.categoria);
        return client;
    };

    var _formatDate = function(data){
        return new Date(data).toISOString();
    };
    
    var _verifyNumber = function(numero){
        if(numero === undefined)
            numero = 'S/N';
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

    var _verifyCategory = function (categoria) {
        if(categoria === undefined)
            categoria = 'Outros';
        return categoria;
    };
    
    var _clearForm = function($scope){
        $scope.sending = false;
        $scope.client = {};
    };

    return {
        execute: _execute,
        addInfoCep: _addInfoCep,
        clearInfoCep: _clearInfoCep,
        clearForm: _clearForm
    };
});
function mascara(e,r){v_obj=e,v_fun=r,setTimeout("execmascara()",1)}function execmascara(){v_obj.value=v_fun(v_obj.value)}function mcep(e){return e=e.replace(/\D/g,""),e=e.replace(/^(\d{5})(\d)/,"$1-$2")}function mtel(e){return e=e.replace(/\D/g,""),e=e.replace(/^(\d{2})(\d)/g,"($1) $2"),e=e.replace(/(\d)(\d{4})$/,"$1-$2")}function mcpf(e){return e=e.replace(/\D/g,""),e=e.replace(/(\d{3})(\d)/,"$1.$2"),e=e.replace(/(\d{3})(\d)/,"$1.$2"),e=e.replace(/(\d{3})(\d{1,2})$/,"$1-$2")}function mdata(e){return e=e.replace(/\D/g,""),e=e.replace(/(\d{2})(\d)/,"$1/$2"),e=e.replace(/(\d{2})(\d)/,"$1/$2"),e=e.replace(/(\d{2})(\d{2})$/,"$1$2")}function mrg(e){return e=e.replace(/\D/g,""),e=e.replace(/(\d)(\d{7})$/,"$1.$2"),e=e.replace(/(\d)(\d{4})$/,"$1.$2"),e=e.replace(/(\d)(\d)$/,"$1-$2")}function mnum(e){return e=e.replace(/\D/g,"")}function mvalor(e){return e=e.replace(/\D/g,""),e=e.replace(/(\d)(\d{2})$/,"$1,$2")}
/* Máscaras ER */
function mascara(o,f){
    v_obj=o;
    v_fun=f;
    setTimeout("execmascara()",1);
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value);
}
function mcep(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/^(\d{5})(\d)/,"$1-$2");
    return v;
}
function mtel(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}

function mcpf(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return v;
}

function mdata(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");

    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");
    return v;
}

function mrg(v){
    v=v.replace(/\D/g,""); 
    v=v.replace(/(\d)(\d{7})$/,"$1.$2");
    v=v.replace(/(\d)(\d{4})$/,"$1.$2");
    v=v.replace(/(\d)(\d)$/,"$1-$2");
    return v;
}
function mnum(v){
    v=v.replace(/\D/g,"");
    return v;
}
function mvalor(v){
    v=v.replace(/\D/g,"");
    //v=v.replace(/(\d)(\d{8})$/,"$1.$2");
    //v=v.replace(/(\d)(\d{5})$/,"$1.$2");

    v=v.replace(/(\d)(\d{2})$/,"$1,$2");
    return v;
}