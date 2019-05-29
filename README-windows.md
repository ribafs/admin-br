## Guia para instalação no Windows

Chamarei o aplicativo de clientes e suporei a instalação em:

```php
Em
c:\xampp\htdocs\clientes

Ajuste caso esteja instalando em outro diretório.
```

### Criar um banco de dados chamado cliente para testes iniciais

### Instalação do CakePHP 3

```php
cd c:\xampp\htdocs
composer create-project --prefer-dist cakephp/app clientes
cd clientes
```
## Instalação do Plugin
```php
composer require ribafs/admin-br
```
## Habilitar o Plugin
```php
bin\cake plugin load AdminBr --bootstrap 
```
## Configurações

Banco de dados – config/app.pgp, configure user, senha e banco:
```php
            'username' => 'root',
            'password' => 'root',
            'database' => 'cliente',

Em 'Error' =>
Troque - 'errorLevel' => E_ALL,
por
 'errorLevel' => E_ALL & ~E_USER_DEPRECATED,
```

Rotas – config\routes.php, comente esta linha abaixo:
```php
Comente esta linhs
$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

E adicione esta:
    $routes->connect('/', ['controller' => 'Users', 'action' => 'login']);
```    
## Executar o composer no plugin
```php
cd c:\xampp\htdocs\clientes
composer dump-autoload -d vendor\ribafs\admin-br
```
## Execute a migration
```php
cd c:\xampp\htdocs\clientes)
bin\cake migrations migrate -p AdminBr
bin\cake migrations seed -p AdminBr
```
## Geração do Código com o bake
```php
cd clientes
bin\cake bake all groups -t AdminBr
bin\cake bake all users -t AdminBr
bin\cake bake all permissions -t AdminBr
bin\cake bake all customers -t AdminBr
```
