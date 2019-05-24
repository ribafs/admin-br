<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('CakeAclBr.bootstrap.min.css') ?>
    <?= $this->Html->script('CakeAclBr.jquery.min') ?>
    <?= $this->Html->script('CakeAclBr.bootstrap.min') ?>    
    <?= $this->Html->css('CakeAclBr.custom.css') ?>    

    <?php    echo $this->fetch('css'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();   
        });
    </script>

</head>
<body>
    <header role="banner" class="navbar navbar-inverse">
        <div class="container">
<?php
    if($loguser){
?>
        <h2 align="center" class="titulo"><?= $titulo ?></h2>
        <h3 class="titulo"><?php echo $this->element('CakeAclBr.topmenu') ?></h3>
        <button type="button" class="btn btn-info col-md-1" data-toggle="popover" data-placement="bottom" title="Ajuda para o Aplicativo" data-content="Aqui adicione a ajuda do usuário. Como ele deve proceder para usar o aplicativo..">Ajuda</button><div class="col-md-4"></div>
        <spam class="logado col-centered"><?= $this->fetch('title') ?></spam>
        <spam class="logado pull-right">Logado como: <strong><?=__($loguser) ?></strong></spam>        
<?php
    }else{
        echo '<h3 class="titulo" align="center">Acesso ao Sistema</h3>';
    }
?>
        <br>
            <?php if ($this->fetch('navbar.top')): ?>
            <nav role="navigation" class="collapse navbar-collapse" id="navbar-top">
                <ul class="nav navbar-nav">
                    <?= $this->fetch('navbar.top'); ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </header>
    <div class="container">
        <div id="content" class="row">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </div>
    </div>
</body>
</html>
