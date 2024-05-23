<h1 align='center'>
    Projeto - Biblioteca Online
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
  
## Funcionamento

#### Clone o repositório

```
git clone https://github.com/CaioPortante/Library.git
```
#### Instale as dependências

```
composer install
```
#### Gerar banco de dados

```
php artisan migrate || php artisan migrate:fresh
```
#### Adicionar linhas iniciais no banco de dados

```
php artisan db:seed
```
#### Rodar servidor Laravel

```
php artisan serve
```
