<%
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
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
%>   
<div class="<%= $pluralVar %> form">
<div class="container">   
<div class="users form">
<?= $this->Flash->render('auth') ?>    
    <div align="center">
        <?= $this->Form->create() ?>
        <fieldset>
            <legend><?= __('Favor entrar com seu login e senha') ?></legend>
            <div class="form-group"><?= $this->Form->input('username', ['label'=>'Login', 'class'=>'col4 form-control', 'autofocus'=>'true']) ?></div>
            <div class="form-group"><?= $this->Form->input('password',['label'=>'Senha', 'class'=>'col4 form-control', 'pattern'=>'^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$', 'minlenght'=>8, 'title'=>'Favor digitar uma senha com pelo menos 8 dígitos, sendo pelo menos 1 algarismo, um minúsculo, um maiúsculo e um símbolo']) ?></div>
        </fieldset>
        <?= $this->Form->button(__('Acessar'), ['class' => 'btn btn-default']); ?>
        <?= $this->Form->end() ?>
    </div>
</div>
</div>
