# Example_App
Desafio/teste de sistema de criação de CRUD de produtos e tags.

Projeto criado para avaliar habilidades de desenvolvimento Back-End e Front-End em uma etapa de seleção de candidatura.


## Techs utilizadas
- Wampserver 3.2.6 - 64bit
- PHP 7.4.26
- MySql 5.7.36
- [Framework Laravel 8.77.1](https://laravel.com/docs/8.x).

## Como usar
- Possui __wamp__ instalado na máquina.
- Iniciar o Wamp na máquina
- Possuir __composer__ instalado na máquina 
- Clonar o repository com __git clone__
- Na pasta clonada, rodar o comando __composer install__ para garantir que as dependências do projeto sejam devidamente instaladas.
- Criar no MySql o banco de dados com o nome __example_appbd__
- Garantir que as configurações de acesso a banco de dados estejam corretas. Vide arquivo __.env__
- Garantir que o projeto esteja na pasta __www__ do Wamp.
- Acessar a url principal em: localhost/example-app/public/home
- Para realizar o acesso, é necessário criar um login.
- Após criação de registro de login, adicione tags e produtos.


#### SQL de extração de relatório de relevância de produtos:
```SQL
SELECT t.name as tag, count(p.id) as produto 
FROM tag t INNER JOIN product_tag pt on t.id=pt.tag_id
INNER join product p on pt.product_id = p.id
GROUP BY t.name
ORDER BY count(p.id) desc;
```
