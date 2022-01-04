# README #


## API ##

### Criar .env dentro da pasta api com os dados abaixo ###

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=trabalhe-na-mad
DB_USERNAME=postgres
DB_PASSWORD=1234

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu@email
MAIL_PASSWORD=sua@senha // Deve ser um hash gerado a partir das configuracoes do email 
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

### Após ter certeza que o projeto está devidamente configurado com banco, rodar os comandos abaixo ###

* php artisan migrate
* php artisan db:seed
* php artisan serve

## APP ##

### Entrar na pasta app e executar o comando abaixo ###

* npm install
* npm start