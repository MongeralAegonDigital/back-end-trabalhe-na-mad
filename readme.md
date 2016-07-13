# Teste para Mongeral Aegon

#### Teste 1

1. Dados do cliente: CPF (identificador do cliente no sistema), Senha, Nome, Telefone, E-mail, Data de Nascimento
2. Endereço do cliente: CEP, Logradouro, Número, Complemento, Bairro, Cidade, Estado
3. Dados pessoais e profissionais do cliente: RG, Número, Data Expedição, Órgão Expedidor, Estado Civil, Categoria (Empregado, Empregador, Autônomo, Outros), Empresa em que trabalha (opcional), Profissão, Renda Bruta
4. Enviar um email para o cliente  apos o cadastro.

> Para ajudar nosso usuário, no momento que ele terminar o digitar o CEP, preencha os campos do formulário utilizando uma API. Aqui vai algumas sugestões de API's disponíveis para serem usadas:
>[PostMon](http://postmon.com.br/) | [Cep](http://cep.correiocontrol.com.br/XXXXXXXX.json) | [BuscaCep](http://www.buscacep.correios.com.br/sistemas/buscacep/)


## Passos para instalação da aplicação

1. *Clone o projeto*
2. *Acesse o diretório "api" e instale os pacotes executando o comando: [compser install]*
3. *Acesse o arquivo .env dentro do diretório "api" e insira as informações do banco de dados*
4. *Crie as tabelas no banco de dados executando o seguinte comando: [php artisan migrate]*
5. *Acesse o diretório "app" e instale as dependências executando o comando: [npm install && bower install]*
6. *Ainda no diretório "app", execute o automatizador de tarefas com o comando[gulp]*
7. *Acesse o diretório raiz da aplicação e inicie o servidor do PHP com o comando [php -S localhost:8000]*
8. *Abra o formulário acssando (http://localhost:8000/app/public/#/)*


