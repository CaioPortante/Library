<h1 align='center'>
    Biblioteca Online
</h1>

O projeto consiste em uma Biblioteca Online, para controle de aluguel de Livros

A aplicação deve ser capaz de: 
- Ter um sistema de login capaz de identificar o nivel de acesso do usuário
- Permitir o usuário se registrar no sistema
- Permitir o usuário alugar um livro
- Permitir o usuário buscar um livro através de um campo de busca
- Permitir o administrador controlar a quantidade de livros e quais livros existem em estoque

## Setup

- PHP 8.3
- Laravel 11.7
- Tailwind
- MariaDB
- Composer 2.7
- Node 22.2
  
## Funcionamento

#### Clone o repositório

```
git clone https://github.com/CaioPortante/Library.git
```
#### Instale as dependências

```
composer install
```
```
npm install
```
#### Configuração inicial do ambiente (.env)

```
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[nome do banco de dados]
DB_USERNAME=[usuário do banco de dados]
DB_PASSWORD=[senha do usuário]
```
#### Gerar Key de funcionamento

```
php artisan key:generate
```
#### Gerar banco de dados

```
php artisan migrate
```
ou
```
php artisan migrate:fresh
```
#### Adicionar linhas iniciais no banco de dados

```
php artisan db:seed
```
#### Rodar servidor Laravel

```
php artisan serve
```

## Outros
#### Rodar Tailwind 
```
npx tailwindcss -i ./resources/css/app.css -o ./public/css/app.css --watch
```
