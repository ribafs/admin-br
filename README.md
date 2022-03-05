# ACL no CakePHP 3 com interface web

## ALERTA

O Github me alertou que esta versão do CakePHP tem uma vulnerabilidade e não consegui atualizar para a versão 4. Agora irei arquivar este projeto:

"CakePHP before 4.0.6 mishandles CSRF token generation. This might be remotely exploitable in conjunction with XSS."

### Testado
- Com até a versão 3.7.9 do CakePHP
- No Windows e no Linux
- Com MySQL e com PostgreSQL

## Este plugin continua o cake-acl-br

## Novidade desta versão
Um ótimo gerenciador de arquivos, tinyFileManager. Após a instalação se encontrarão em vendor/ribafs/admin-br/copiar
Encontra-se na pasta vendor/ribafs/admin-br/copiar. Mova tf.php e translation.json para a pasta webroot.
Edite o tf.php e mude a linha 17 apra: define('CURRENT', '/');
Então acesse com

http://localhost/acl/tf.php

Antes de colocar em produção crie um login e senha apra você e remova o user admin. Crie o hash da senha aqui:

https://tinyfilemanager.github.io/docs/pwd.html

Use uma senha forte, bem forte, pois o arquivo está fora do ACL.

http://localhost/acl/tf.php

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
