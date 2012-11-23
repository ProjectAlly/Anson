<!DOCTYPE html>
<?php 
	$role = $this->Session->read('role');
?>
<html lang="en">
<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<!-- Sidebar content -->
				<?php echo $this->element('sidebar/fix_side'); ?>
			</div>
			<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->
				<?php
					echo $this->Html->link('Project',array('controller' => 'Project', 'action' => 'listProject'),
															array('class' => 'btn'));
				?>
			</div>
		</div>
	</div>
</html>