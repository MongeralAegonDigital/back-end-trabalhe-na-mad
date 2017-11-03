# To run project #
1. Inside api folder
1.1 composer install
1.2 cp .env.example .env
1.3 php artisan key:generate
1.4 create database
1.5 php artisan migrate
2. Inside front folder
2.1 npm install

---
# Teste para Back-end #
---
### Baseado no conceito S.P.A. (Single Page Application), construa uma aplicação escolhendo uma das opções abaixo:

#### Teste 1

1. Dados do cliente: CPF (identificador do cliente no sistema), Senha, Nome, Telefone, E-mail, Data de Nascimento.
2. Endereço do cliente: CEP, Logradouro, Número, Complemento, Bairro, Cidade, Estado.
3. Dados pessoais e profissionais do cliente: RG, Número, Data Expedição, Órgão Expedidor, Estado Civil, Categoria (Empregado, Empregador, Autônomo, Outros), Empresa em que trabalha (opcional), Profissão, Renda Bruta.
4. Enviar um email para o cliente  após o cadastro.

> Para ajudar nosso usuário, no momento que ele terminar o digitar o CEP, preencha os campos do formulário utilizando uma API. Aqui vai algumas sugestões de API's disponíveis para serem usadas:
>[PostMon](http://postmon.com.br/) | [Cep](http://cep.correiocontrol.com.br/XXXXXXXX.json) | [BuscaCep](http://www.buscacep.correios.com.br/sistemas/buscacep/)

#### Teste 2

1.  Cria um cadastro de produtos com : Nome, data de fabicação, tamanho, largura, peso e categoria.
2.  O produto pode ter uma ou mais categorias.
3.  Criar um filtro que traga os produtos pelo campos que foram pedidos no item um e ter um sort por colunas.

### Teste 3

1. Criar uma API com controle de acesso OAuth2.
2. Criar um cadastro de clientes de acesso a API.
3. Criar recursos com diferentes níveis de acesso autenticado.

### Obs: Escolha o teste de sua preferência.

#### Requisitos ####

#### Júnior ####
* Utilize **PHP >= 7.* ** e MySQL como tecnologias
* Uso de um Framework (MVC/MVVM)
* RestFull

#### Pleno/Sênior ####
*  Todos os anteriores
*  Teste unitário (ex. TDD)
*  Uso de Design Patterns

***Diferencial***
*   SOLID

### O que será avaliado
1. *Domínio da linguagem PHP*
2. *Domínio do uso de Webservices*
3. *Organização do código*
4. *Raciocínio para construir a solução solicitada*

### Importante 
O teste tem que ser feito em 3 dias após o fork.

## Dicas :) 
>   Seria muito legal você mostrar suas 'skills' com tecnologias de front-end como:
>>   * Algum framework Javascript (Angular, React, Vue.js e etc…)
>>   * Pré-Processadores (sass, less e etc...)
>>   * Task Runner (webpack, gulp, grunt e etc...)
>>   * ES6/7
