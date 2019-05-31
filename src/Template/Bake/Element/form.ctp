<%
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * Slightly modified by Òscar Casajuana for the twbs-cake-plugin
 * also under the MIT license.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Utility\Inflector;

$fields = collection($fields)
    ->filter(function($field) use ($schema) {
        return $schema->columnType($field) !== 'binary';
    });
$pk = "\${$singularVar}->{$primaryKey[0]}";
%>
<div class="container">
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Ações') ?></h3>
    <ul class="nav nav-stacked nav-pills">
<% if (strpos($action, 'add') === false): %>
        <li class="active disabled"><?= $this->Html->link(__('Editar <%= $singularHumanName %>'), ['action' => 'edit', <%= $pk %>]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', <%= $pk %>],
                ['confirm' => __('Deseja realmente excluir # {0}?', $<%= $singularVar %>-><%= $primaryKey[0] %>), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('Novo(a) <%= $singularHumanName %>'), ['action' => 'add']) ?></li>
<% else: %>
        <li class="active disabled"><?= $this->Html->link(__('Novo <%= $singularHumanName %>'), ['action' => 'add']) ?></li>
<% endif; %>
        <li><?= $this->Html->link(__('Listar <%= $pluralHumanName %>'), ['action' => 'index']) ?></li>
<%
        $done = [];
        foreach ($associations as $type => $data) {
            foreach ($data as $alias => $details) {
                if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
%>
        <li><?= $this->Html->link(__('Listar <%= $this->_pluralHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'index']) %> </li>
        <li><?= $this->Html->link(__('Novo <%= $this->_singularHumanName($alias) %>'), ['controller' => '<%= $details['controller'] %>', 'action' => 'add']) %> </li>
<%
                    $done[] = $details['controller'];
                }
            }
        }
%>
    </ul>
</div>
<div class="<%= $pluralVar %> form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($<%= $singularVar %>); ?>
    <fieldset>
        <legend><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></legend>
<%
        foreach ($fields as $field) {
            if (in_array($field, $primaryKey)) {
                continue;
            }
            if (isset($keyFields[$field])) {
                $fieldData = $schema->column($field);
                if (!empty($fieldData['null'])) {
%>            
            <div class="form-group"><?php echo $this->Form->input('<%= $field %>',['class'=>'form-control'],['options' => $<%= $keyFields[$field] %>, 'empty' => true]);?></div>
<%
                } else {
%>
            <div class="form-group"><?php echo $this->Form->input('<%= $field %>',['class'=>'form-control'],['options' => $<%= $keyFields[$field] %>, 'autofocus'=>'true']);?>
<%
                }
                continue;
            }
            if (!in_array($field, ['created', 'modified', 'updated'])) {
%>
            <div class="form-group"><?php echo $this->Form->input('<%= $field %>',['class'=>'form-control']);?></div>
<%
            }
        }
        if (!empty($associations['BelongsToMany'])) {
            foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
%>
            <div class="form-group"><?php echo $this->Form->input('<%= $assocData['property'] %>._ids',['class'=>'form-control'], ['options' => $<%= $assocData['variable'] %>]);?></div>
<%
            }
        }
%>
    </fieldset>
    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
</div>
