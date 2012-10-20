<!DOCTYPE html>
<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	
?>
<html lang="en">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<!-- Sidebar content -->
				<?php 
					echo $this->Html->link('Logout',array('controller' => 'Home', 'action' => 'logout'),array('class' => 'btn'));
				?>
				
				<?php 
				  	echo $this->Session->read('name');
				?>
			</div>
			<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php 
					//controller and action are yet to be made for profile and add project button
					echo $this->Html->link('Profile',array('controller' => 'Home', 'action' => 'userProfile'),array('class' => 'btn'));
					echo $this->Html->link('Project',array('controller' => 'Home', 'action' => 'listProject'),array('class' => 'btn'));
				?>
			</div>
		</div>
	</div>
</html>