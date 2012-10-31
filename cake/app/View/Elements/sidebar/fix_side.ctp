<?php 
	echo $this->Html->link('Logout',array('controller' => 'Home', 'action' => 'logout'),array('class' => 'btn'));
  	echo $this->Session->read('name');
?>
