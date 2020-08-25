# SuperTests

## :ballot_box_with_check: Repositório do projeto testesweb.com

Este projeto é um portal de testes interativo com integração com o Facebook

<p align="center">
  <img src="public/upload/o-que-o-coelhinho-da-pascoa-vai-trazer-para-voce/coelinho230317.jpg" />
</p>

### Instalação
Para instalar este projeto, é necessário rodar o composer através do comando abaixo:
```
composer install
```

Após instalar as dependências, configure os dados de acesso no arquivo .env

Após configurar os dados de acesso ao banco, execute a migration:
```
php artisan migrate
```

### Execução
Para executar, você pode rodar o serve pelo artisan usando o comando abaixo:
```
php artisan serve
```