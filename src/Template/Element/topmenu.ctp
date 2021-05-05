<?php
/*
Element para criar um menu que exibe somente links para controllers aos quais o usuário tem permissão de acesso.
*/
	if($group == 1){
	echo '<div align="center">';
		foreach($supers as $controller){
            if($controller[0] != 'AdminBr'){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
            }
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';		
	}elseif($group == 2){
	echo '<div align="center">';		
		foreach($admins as $controller){
            if($controller[0] != 'AdminBr'){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
            }
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';
	}elseif($group == 3){
	echo '<div align="center">';		
		foreach($managers as $controller){
            if($controller[0] != 'AdminBr'){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
            }
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';		
	}elseif($group == 4){
	echo '<div align="center">';		
		foreach($users as $controller){
            if($controller[0] != 'AdminBr'){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
            }
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';		
	}
