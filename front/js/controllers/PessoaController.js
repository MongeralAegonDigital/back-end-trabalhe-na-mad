'use strict';

function getObjPessoa(){

    return {

    pessoa: {
            cpf: null,
            rg: null,
            rgDataEmissao: null,
            rgOrgaoEmissor: null,
            nome: null,
            sexo: '',
            dataNascimento: '',
            estadoCivil: '',
            categoria: '',
            empresa: null,
            profissao: null,
            email: null,
            password: null,
            renda: null,
            telefone: null,
            endereco: {
                    cep: null,
                    logradouro: null,
                    numero: null,
                    complemento: null,
                    bairro: null,
                    uf: null,
                    estado: null,
                    cidade: null
            }
    }
    };
}

.controller('PessoaCtrl', ['$scope','Model', 'Config', function( $scope, Model, Config) {

        $scope.setPessoa = function(pes, data){

                pes.pessoa.cpf = data.nome;
                pes.pessoa.rg = data.cpf;
                pes.pessoa.rgDataEmissao = data.strNascimento;
                pes.pessoa.rgOrgaoEmissor = data.sexo;
                pes.pessoa.nome = data.estadoCivil;
                pes.pessoa.sexo = data.email;
                pes.pessoa.dataNascimento = data.rg;
                pes.pessoa.estadoCivil = data.rg;
                pes.pessoa.categoria = data.rg;
                pes.pessoa.empresa = data.rg;
                pes.pessoa.profissao = data.rg;
                pes.pessoa.email = data.rg;
                pes.pessoa.password = data.rg;
                pes.pessoa.renda = data.rg;
                pes.pessoa.telefone = data.rg;
                

                pes.pessoa.endereco.cep = data.endereco.cep;
                pes.pessoa.endereco.lastCepVerified = data.enderecoComercial.cep;
                pes.pessoa.endereco.logradouro = data.endereco.logradouro;
                pes.pessoa.endereco.numero = data.endereco.numero;
                pes.pessoa.endereco.complemento = data.endereco.complemento;
                pes.pessoa.endereco.bairro = data.endereco.bairro;
                pes.pessoa.endereco.estado = data.endereco.estado;
                pes.pessoa.endereco.cidade = data.endereco.cidade;
                pes.pessoa.endereco.uf = data.endereco.estado.sigla;

                pes.pessoa.endereco.loadCidade = true;

                $scope.$parent.getCidadesByUf(pes.pessoa.endereco.uf, function(data){

                        pes.pessoa.endereco.loadCidade = false;
                        pes.lists.cidades = data.cidades;

                }, function(erro){
                        pes.pessoa.endereco.loadCidade = false;
                });
        }

        $scope.checkCPF = function (form, pes){

                var pessoa = pes.pessoa;

                // Se o pessoa for o aluno, nao preciso buscar os dados
                if(pessoa.aluno_e_pessoa){ return false; }

                if(!form.cpf.$valid ||  $.trim(pessoa.cpf) === "" ||  pessoa.lastCpfVerified == pessoa.cpf){
                        return false;
                }

                $scope.$parent.checkCPF(pessoa.cpf, 'util/pessoa-por-cpf/',

                        function(data){ // success

                                pessoa.lastCpfVerified = pessoa.cpf;

                                //console.log(data, 'pessoa encontrado');

                                if(angular.isDefined(data.data.pessoa)){

                                        $scope.setPessoa(pes, data.data.pessoa);
                                        pes.is_user = data.data.isUser;
                                        if(pes.is_user) {
                                                pes.isEditavel = false;
                                        }
                                }


                        }, function(erro){}
                );

        }

        $scope.loadCiadesToForm = function(data, tipoEndereco){

                $scope.urlCidades = 'util/cidades/' + data.pessoa[tipoEndereco].estado + '/id';

                data.pessoa[tipoEndereco].uf = data.pessoa[tipoEndereco].estado;
                $scope.loadCidades(data, tipoEndereco, function(){
                        data.pessoa[tipoEndereco].cidade = '';
                });
        }

        $scope.loadCidades = function (dataPessoa, tipoEndereco, callbackSuccess){

                try {

                        Header.hideAlert();

                        dataPessoa.pessoa[tipoEndereco].cidade = '';

                        if(angular.isUndefined(dataPessoa.pessoa[tipoEndereco].uf) || dataPessoa.pessoa[tipoEndereco].uf === ''){
                                dataPessoa.lists.cidades = [];
                                return false;
                        }

                        dataPessoa.pessoa[tipoEndereco].loadCidade = true;

                        var token = tokenHandler.getCredentials(dataAuth.username, dataAuth.secret);

                        Model.get($scope.urlCidades, {}, token)

                                .then(function(data) {

                                        dataPessoa.pessoa[tipoEndereco].loadCidade = false;

                                        if(tipoEndereco == 'endereco') {
                                                dataPessoa.lists.cidades = data.cidades;
                                        } else {
                                                dataPessoa.lists.cidadesComercial = data.cidades;
                                        }

                                        if(angular.isDefined(callbackSuccess)) callbackSuccess();

                                },
                                function(error) {
                                        dataPessoa.pessoa[tipoEndereco].loadCidade = false;
                                });

                } catch (err) {}
        }

        $scope.getEndereco = function (dataPessoa, tipoEndereco){

                Header.hideAlert();

                if(dataPessoa.pessoa[tipoEndereco].lastCepVerified == dataPessoa.pessoa[tipoEndereco].cep || dataPessoa.pessoa[tipoEndereco].cep.length != 8){return false}

                dataPessoa.pessoa[tipoEndereco].loadCEP = true;

                $scope.$parent.getEnderecoByCEP(dataPessoa.pessoa[tipoEndereco].cep, function(data){

                        dataPessoa.pessoa[tipoEndereco].lastCepVerified = dataPessoa.pessoa[tipoEndereco].cep;

                        if(data.resultado == '1' || data.resultado == '2'){

                                dataPessoa.pessoa[tipoEndereco].uf = data.uf;
                                $scope.urlCidades = 'util/cidades/' + dataPessoa.pessoa[tipoEndereco].uf;

                                $scope.loadCidades(dataPessoa, tipoEndereco, function(){
                                        dataPessoa.pessoa[tipoEndereco].cidade = $scope.getCidadeIdByName(dataPessoa, data.cidade, tipoEndereco);
                                        dataPessoa.pessoa[tipoEndereco].estado = $scope.$parent.getEstadoIdByUf(dataPessoa.pessoa[tipoEndereco].uf);
                                        dataPessoa.pessoa[tipoEndereco].loadCEP = false;
                                });

                                dataPessoa.pessoa[tipoEndereco].bairro = data.bairro;
                                dataPessoa.pessoa[tipoEndereco].logradouro = data.logradouro;

                        } else {

                                dataPessoa.pessoa[tipoEndereco].uf = "";
                                dataPessoa.pessoa[tipoEndereco].cidade = "";
                                dataPessoa.pessoa[tipoEndereco].bairro = "";
                                dataPessoa.pessoa[tipoEndereco].logradouro = "";

                                dataPessoa.pessoa[tipoEndereco].loadCEP = false;
                        }

                }, function(erro){
                        dataPessoa.pessoa[tipoEndereco].loadCEP = false;
                });
        }

        $scope.getCidadeIdByName = function(pessoa, nome, tipoEndereco){
                var id = "",
                        cidades = [];

                if(tipoEndereco == 'endereco') {
                        cidades = pessoa.lists.cidades;
                } else {
                        cidades = pessoa.lists.cidadesComercial;
                }

                angular.forEach(cidades, function(value, idx) {
                        if(removeSpecialCharacter(value.nome.toLowerCase()) === removeSpecialCharacter(nome.toLowerCase())){ id = value.id;}
                });
                return id;
        }
        
        $scope.save = function() {
            
            $scope.setPessoa($scope.pessoa ,data)

            Model.post('pessoa', $scope.pessoa)

                .then(function(data) {

                    if(data.status == 'sucesso') {
                            alert("Cadastro feito com sucesso");
                    } else {
                            alert("Ocorreu um erro durante a execução");
                    }

                },
                function(error) {
                });

    }
}]);


