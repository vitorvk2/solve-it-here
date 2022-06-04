# ResolveAqui
> Requisitos: **PHP** versão superior a 7.9 e **Composer**


### Objetivos
Intermediar conflitos, criando um ambiente próspero para a resolução dos mesmos por meio da comunicação entre diversas pessoas.

### Instalação
+ Ambiente
```bash
$ git clone (esse projeto) em qualquer diretório

$ composer update

Copie e cole o .env.example renomeando-o para .env
```
+ Configurações e Criação das Tabelas
```bash
Dentro do diretório 'Api/database' crie o arquivo database.sqlite

Rode o comando para criar as tabelas e popular automaticamente:
$ php artisan migrate --seed               
```
+ Rodando o ambiente
```bash
$ php artisan serve
```

Tudo pronto, meu rei. ✔️
