# Prova DAW2

## Instruçoes para rodar o projeto

- Instalar pacotes: `composer install`
- Criar `.env`: `cp .env.example .env`
- Gerar chave da aplicação: `php artisan key:generate`
- Configurar campos de conexão com o banco de dados no `.env`
- Rodar migrations: `php artisan migrate`
- Popular posições com seed: `php artisan db:seed`
- Criar link do storage das imagens: `php artisan storage:link`
- Rodar aplicação: `php artisan serve`