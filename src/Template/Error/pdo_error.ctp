<?php
/**
 * src/Templates/Error/pdo_error.ctp
 *
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
use Cake\Utility\Debugger;
?>
<h2>Erro no Cadastro</h2>
<p class="error">
	<strong>Erro: Grupo não existe na tabela estrangeira<br></strong>

	<?php
        if($error->getCode() == 23503){
            print "Este grupo não existe na tabela estrangeira.<br>Caso tenha realmente digitado de forma correta<br>e queira adicionar cadastre-o na tabela estrangeira<br>primeiro e depois cadastre o material com ele!";
        }

        //print $message; 
    ?>
</p>
