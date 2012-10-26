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
//	echo $this->Html->addCrumb($cont,'/'.$cont);
//	echo $this->Html->addCrumb($act,'/'.$cont.'/'.$act);
//	echo $this->Html->getCrumbs('>','home');
?>

<ul class="breadcrumb">
  <li><a href="../Home"><?php echo "Home"; ?></a> <span class="divider">/</span></li>
  <li><a href="../".<?php echo $cont; ?>><?php echo $cont;?></a> <span class="divider">/</span></li>
  <li class="active"><?php echo $act?></li>
</ul>