<?php 
	//echo "<pre>";
	//print_r($this->params['controller']);
	$cont = $this->params['controller'];
	$act = $this->params['action'];
	/*echo $cont;
	echo "<br>";
	echo $act;
	*/
	
	//if 
	echo $this->Html->addCrumb($cont,'/'.$cont);
	echo $this->Html->addCrumb($act,'/'.$cont.'/'.$act);
	echo $this->Html->getCrumbs('>','home');
?>