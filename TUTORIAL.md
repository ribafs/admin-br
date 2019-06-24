## Continuação do README

## Privilégios de cada usuário

Após efetuar login com cada um observe pelo menu a que ele tem acesso

## Após efetuar login com o usuário super aparece:

![](images/cakeaclbr2.png)

## Ao logar como admin vemos

![](images/cakeaclbr3.png)

Clicando em Sair e logando como manager:

![](images/cakeaclbr4.png)

## Finalmente logando como user:

![](images/cakeaclbr5.png)

Veja que ele está logado mas não tem permissão de acessar nada e foi jogado para a tela de login.

## Permissões

Para que ele enha acesso precisamos usar um dos usuários com privilégio administrativo para cadastrar permissões para ele. A tela de permissões é onde damos privilégios para usuários acessarem e efetuarem outras atividades.

## Sempre que adicionar um novo action em qualquer controller

Ao tentar acessar um novo action ainda não registrado no Permissions, recebemos o erro abaixo e não interessa que estejamos logado como super. Adicionei o action password no controller Users e antes de registrá-lo tentei acessar:

![](images/adminbr1.png)

## Concedendo permissão para o user acessar a index de customers

- Logar como admin
- Abrir permissions (por padrão ela será aberta)
- Clique à esquerda em Novo Permission
- Selecione em Group Users
- Em Controller digite Customers
- Em Action digite index

E clique em Enviar

## Testando a nova permissão

- Efetuar o login com user

Veja que agora ele acessa a tela de Customers

![](images/cakeaclbr6.png)

Observe que nem aparece o ícone para excluir um registro. Interessante as datas no formato pt-br

Como concedemos apenas permissão para listagem da index, ele não poderá acessar nem o edit nem o exibir.

Clique no botão com o lápis, para editar. Veja a mensagem em vermelho:

![](images/cakeaclbr7.png)

Como usuário user não tem permissão de acesso. Da mesma forma não tem para exibir.

## Usando nosso banco

Esta é uma instalação padrão de teste do plugin admin-br, que usa o banco default que acompanha o mesmo. Podemos adicionar nossas próprias tabelas ou usar nosso próprio banco, apenas precisamos adicionar as tabelas users, groups e permissions.


## Customizações do código gerado    

## Reforçando a segurança do login

## Reforçar através de recursos do HTML 5 o frontend

Edite src/Template/Users/login.ctp e altere o campo password para ter o seguinte código:
```php
<?= $this->Form->input('password',['label'=>'Senha', 'class'=>'col4', 'pattern'=>'^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$', 'minlenght'=>8, 'title'=>'Favor digitar uma senha com pelo menos 8 dígitos, sendo pelo menos 1 algarismo, um minúsculo, um maiúsculo e um símbolo']) ?>
```
Então o código do  src/Template/Users/login.ctp ficará assim:

```php
<div class="users form">
<?= $this->Flash->render('auth') ?>    
    <div align="center">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Favor entrar com seu login e senha') ?></legend>
            <?= $this->Form->input('username', ['label'=>'Login', 'class'=>'col4', 'autofocus'=>'true']) ?>
            <?php // $this->Form->input('password',['label'=>'Senha', 'class'=>'col4']) ?>
            <?= $this->Form->input('password',['label'=>'Senha', 'class'=>'col4', 'pattern'=>'^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$', 'minlenght'=>8, 'title'=>'Favor digitar uma senha com pelo menos 8 dígitos, sendo pelo menos 1 algarismo, um minúsculo, um maiúsculo e um símbolo']) ?>
        </fieldset>
        <?= $this->Form->button(__('Acessar')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
```
Experimente logar agora com uma senha errada e verá a mensagem:

Atenda o formato solicitado:   Favor digitar uma senha com pelo menos 8 dígitos, sendo pelo menos 1 algarismo, um minúsculo, um maiúsculo e um símbolo.

## Reforçando a segurança no backend, usando validação

Edite o arquivo o src/Model/Table/UsersTable.php e adicione a validação para checar a senha com expressão regular. Mude o validator da password para que fique assim:

```php
        $validator
            ->scalar('password')
           // ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->allowEmptyString('password', false)
            ->add('password', 'validFormat',[
                    'rule' => ['custom', '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/i'],
                    'message' => 'No mínimo 8 dígitos, sendo pelo menos uma minúscula, uma maiúscula e um símbolo.'
            ]);
```

Assim caso alguém acesse com um navegador sem suporte ao HTML5, o backend segurará, assim como se de alguma forma a validação do form for anulada ou falhar o backend segurará pela validação do model.

Só para testar vou retirar a validação do HTML5 para testar:

![](images/cakeaclbr8.png)

## Aterar a largura de campos nos forms.
Para isso usaremos as classes criadas no plugin admin-br para o framework Bootstrap, que estão no arquivo webroot/css/custom.css.


Veja como está o form add.ctp para adicionar nova permissão:

![](images/cakeaclbrr9.png)

Os campos tem a largura da tela. Vamos reduzir adequadamente, usando a classe colX.

Ajustar a largura das colunas em src/Template/Permissions/add.ctp, para que fique assim:
```php
        <?php
            echo $this->Form->input('group_id', ['options' => $groups, 'autofocus'=>'true', 'class'=>'col4']);
            echo $this->Form->input('controller', ['class'=>'col4']);
            echo $this->Form->input('action',['class'=>'col4']);
        ?>
```

Veja agora como ficou:

![](images/cakeaclbr10.png)

Agora ficou mais adequado.

Aproveitar e ajustar também as larguras de src/Template/Permissions/edit.ctp

## Implementar a busca para Customers

Obs.: lembrar que busca é para campos tipo texto.

- Editar o arquivo src/Controller/PermissionsController.php

    - Remover o action index() ativo
    - Mover "use Cake\Datasource\ConnectionManager;" para baixo da linha "use App\Controller\AppController;"
    - Remover o final do comentário que está abaixo do index()

- Ajustar o index() que estava comentado para que fique assim, para que possamos pesquisar pelo group e pelo controller:

```php
    public function index()
    {        
		$conn = ConnectionManager::get('default');
		$driver = $conn->config()['driver']; // Outros: database, etc.
		
		if($driver == 'Cake\Database\Driver\Postgres'){
		    $this->paginate = [
		        //'contain' => ['Users'], // Quanto for relacionada com Users descomentar
		        'conditions' => ['or' => [
		            'Customers.name ilike' => '%' . $this->request->getQuery('search') . '%',
		            'Customers.phone ilike' => '%' . $this->request->getQuery('search') . '%'
		        ]],
		        'order' => ['Customers.id' => 'DESC' ]
		    ];
		}elseif($driver=='Cake\Database\Driver\Mysql'){
		    $this->paginate = [
		        //'contain' => ['Users'],
		        'conditions' => ['or' => [
		            'Customers.name like' => '%' . $this->request->getQuery('search') . '%',
		            'Customers.phone like' => '%' . $this->request->getQuery('search') . '%'
		        ]],
		        'order' => ['Customers.id' => 'DESC' ]
		    ];
		}else{
			print '<h2>Driver database dont supported!';
			exit;
		}
            
	        $this->set('customers', $this->paginate($this->Customers));
		$this->set('_serialize', ['customers']);    
    }
```
- Agora ajustemos o src/Template/Customers/index.ctp. Veja que o trecho de código da busca está comentado no início. Descomente e deixe assim:

```php
	<?php
	    echo $this->Form->create(null, ['type' => 'get']);
   	    echo $this->Form->label('Busca');
	    echo $this->Form->input('search', ['class' => 'form-control', 'label' => false, 'style'=>'width:170px;',
		'placeholder' => 'Nome ou fone', 'value' => $this->request->getQuery('search')]);	    
	    echo $this->Form->button('Busca');
	    echo $this->Form->end();
	?>            
```

- Agora já pode acessar novamente Customers e efetuar uma busca para testar. Veja como ficou:

![](images/cakeaclbr11.png)

Basta digitar as primeiras litras e clicar em Buscar.


## Mudar o Título do Aplicativo

Acessar clientes/src/Controller/AppController.php e alterar a linha:

        $this->set('titulo', 'Título do Aplicativo');

Para algo que desejar:

        $this->set('titulo', 'Cadastro de Clientes');


Acesse novamente e atualize a tela para visualizar o novo nome.

![](images/cakeaclbr12.png)

Vamos trocar  os tipos de campos controller e action do form src/Template/Permissions/add.ctp de text para select, já trazendo os respectivos actions

Acesse src/Template/Permissions/add.ctp e comente a linha do campo action e adicione esta abaixo:

```php			
            //echo $this->Form->input('action', ['class'=>'col4']);

            $options = ['index'=>'index','add'=>'add','edit'=>'edit','view'=>'view','delete'=>'delete'];
            echo $this->Form->input('action', ['options'=>$options,'required'=>'false', 'class'=>'col-md-12', 'empty'=>'Selecione','class'=>'col4']);
```

Controller apenas a sugestão, se fossem apenas os campos originais seria assim. Lembrando que para permissions somente estes controllers são válidos:

```php
            //echo $this->Form->input('controller', ['class'=>'col4']);

$options2 = ['Customers'=>'Customers','Groups'=>'Groups', 'Users'=>'Users', 'Permissions'=>'Permissions', 'Products'=>'Products', 'ProductItems'=>'ProductItems', 'value'=>'Selecione'];            
echo $this->Form->input('controller',['options'=>$options2,'required'=>'false', 'class'=>'col-md-12','empty'=>'Selecione','class'=>'col4']);
```
![](images/cakeaclbr13.png)

## Remover a coluna Password do src/Template/Users/index.ctp

Remover as linhas:

                <th><?= $this->Paginator->sort('password') ?></th>
e
                <td><?= h($user->password) ?></td>


Veja como ficou

![](images/cakeaclbr14.png)

## Adicionar 'Selecione' para a combo de User em add.ctp de todas as tabelas,

A linha deve ficar assim:

```php
 echo $this->Form->input('group_id', ['options' => $groups, 'autofocus'=>'true','empty'=>'Selecione', 'class'=>'col4']);
```
![](images/cakeaclbr15.png)
    
## Implantação do Aplicativo em Produção

Uma vez que seu aplicativo está completo, ou mesmo antes você pode querer implantá-lo. Há algumas coisas que você deve fazer quando da implantação de uma aplicação CakePHP. 

### Ajustes no config/app.php
- debug = false para ocultar as mensagens de erro
- mensagens de debug criadas com pr() e debug() são desabilitadas
- Erros de views são menos informativas e dão apenas uma mensagem de erro genérica
- Erros do PHP não são mostrados
- Exceções de pilha de exceção estão desativados.

### Cheque a Segurança
- Verifique se não deixou nenhum vazamento óbvio
- Habilite o componente Security
- Assegure-se de que seus Models têm regras de validação habilitadas

Use sempre os Helpers para reforçar a segurança

Ao criar forms sempre use o FormHelper
Ao criar Html procure sempre usar o HtmlHelper

Mais detalhes em:

http://book.cakephp.org/3.0/en/deployment.html

## Ajuda para o aplicativo

Ao acessar o aplicativo, após o login, acima e à esquerda, encontrará um botão Ajuda, que poderá ser usado para dar algum aviso ao usuário ou então realmente oferecer ajuda. Para mudar seu texto altere em src/Tamplate/Layout/admin.ctp ou default.ctp no button com popover.
