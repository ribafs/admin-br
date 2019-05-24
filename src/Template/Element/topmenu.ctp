<?php
/*
Element para criar um menu que exibe somente links para controllers aos quais o usuário tem permissão de acesso.
*/
	if($loguser == 'super'){
	echo '<div align="center">';
		foreach($supers as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';		
	}elseif($loguser == 'admin'){
	echo '<div align="center">';		
		foreach($admins as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';
	}elseif($loguser == 'manager'){
	echo '<div align="center">';		
		foreach($managers as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';		
	}elseif($loguser == 'user'){
	echo '<div align="center">';		
		foreach($users as $controller){
			echo '<div class="btn btn-primary">'.$this->Html->link(__($controller[0]), ['controller'=>$controller[0],'action'=>'index']).'</div>';
		}
		echo '&nbsp;&nbsp;<div class="btn btn-primary">&nbsp;'.$this->Html->link(__('Sair'), ['controller'=>'Users','action'=>'logout']).'</div>';
	echo '</div>';		
	}
