# Implementando ACL no CakePHP 3 com interface web

### Testado
- Com até a versão 3.7.9 do CakePHP
- No Windows e no Linux
- Com MySQL e com PostgreSQL

### Este plugin continua o cake-acl-br

## Instale em ambiente de testes inicialmente
Idealmente instale em um ambiente de testes para ter maior controle.

### URL deste projeto 
https://github.com/ribafs/admin-br/

### Para um plugin sem o BootStrap indico:

https://github.com/ribafs/admin-default-br

### Sobre este plugin
Este plugin inclue o Twitter Bootstrap e também inclui o plugin [Bootstrap-UI](https://github.com/FriendsOfCake/bootstrap-ui) e os templates do bake do plugin [twbs-cake-plugin](https://github.com/elboletaire/twbs-cake-plugin) que nesta versão (1.19) mudei as tags do ASP para as do Twig. Aos autores dos mesmos fica aqui meu agradecimento.

## Principais recursos    
    • Menu de topo com o element topmenu 
    • Uso do framework Bootstrap
    • Busca com paginação 
    • Senhas criptografadas com Bcrypt 
    • Controle de Acesso tipo ACL com administração web 
    • Dois Layouts: admin e default com cor de fundo que os diferencia
    • Datas formatadas como pt-br (veja em Customers)
    • Tradução do template do Bake para pt-br. A partir da versão 1.15 usando twig para compatibilizar com o CakePHP 4
    • Customização do bootstrap_cli adicionando os campos login e logout na geração do Bake
    • Validação via frontend no login com pattern e minlenght, para exigir senha forte, com pelo menos 8 dígitos,     
    uma maiúscula, uma minúscula e um símbolo. Também com recomendações para validação semelhante pelo CakePHP no    UsersTable.php

## Com esta versão temos validação no login
Agora temos validação pelo frontend usando recursos do HTML5, pattern e minlenght e também pelo UsersTable.php
    
## Notices
Com esta versão devemos ocultar os nitices disparados pelo bootstrap-UI.

## Criação de aplicativo usando o admin-br com bastante detalhes

Abaixo um guia passo a passo e com boas informações para customizar aplicativos do CakePHP 3.

## Guia de instalação para Windows

https://github.com/ribafs/admin-br/blob/master/README-windows.md

## Guia de instalação para Linux

https://github.com/ribafs/admin-br/blob/master/README-linux.md

## Alternativa para implantação de ACL em Aplicativos do CakePHP

A alternativa de plugin para uso no terminal/prompt é o uso do plugin oficial

https://github.com/cakephp/acl

Aqui abaixo um ótimo exemplo de uso do mesmo

https://github.com/mattmemmesheimer/cakephp-3-acl-example

## Sugestões, colaborações, issues, pull requests e forks serão bem vindos:

- Português
- PHP
- CakePHP
- ControlComponent.php
- Ou algo que queira me avisar...

License
-------

The MIT License (MIT)
