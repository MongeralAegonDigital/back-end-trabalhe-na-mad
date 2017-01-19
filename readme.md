Teste 1 - DEV BACK-END MONGERAL

Tentei ser o mais simples possível com o pouco que pude aprender sobre o Laravel nesse período do teste,
A aplicação está simples porém funcional.

========Etapas do teste========

1 - Dados do cliente: CPF (identificador do cliente no sistema), Senha, Nome, Telefone, E-mail, Data de Nascimento
2 - Endereço do cliente: CEP, Logradouro, Número, Complemento, Bairro, Cidade, Estado
3 - Dados pessoais e profissionais do cliente: RG, Número, Data Expedição, Órgão Expedidor, Estado Civil, Categoria (Empregado, Empregador, Autônomo, Outros), Empresa em que trabalha (opcional), Profissão, Renda Bruta
4 - Enviar um email para o cliente apos o cadastro.

========Instalação=======

1: Executar o comando "composer update"
2: Criar a base de dados no mysql: mongeral (a configuração está para o user: root)
3: Executar o comando "php artisan migrate:install"
4: Executar o comando "php artisan migrate" para criar a tabela de clientes.
5: Executar o comando "php artisan serve" para iniciar o servidor de testes do Laravel.
6: A rota para a aplicação é a seguinte: "http://localhost:8000/person"

