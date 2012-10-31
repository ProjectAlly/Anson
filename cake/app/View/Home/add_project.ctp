<!DOCTYPE html>
<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	echo $this->Html->css('jquery-ui.css');
	echo $this->Html->script('jquery-ui.js');
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
				<legend>Add New Project</legend>
				<table>
					<?php
						echo $this->Form->create('AddProject',array('class' => 'form-horizontal', 'url' => array('controller' => 'Home',
																										'action' => 'addProject')));
					?>
					<tr>
						<td align="right">Name</td>
						<td><?php echo $this->Form->input('projectName', array('label' => false)); ?></td>
					</tr>	
					
					<tr>
						<td align="right">Project Description</td>
						<td><?php echo $this->Form->textarea('projectDescription', array('label' => false));?></td>
					</tr>	
										
					<tr>
						<td></td>
						<td><?php echo $this->Form->submit('Add Project',array('class' => 'btn'));?></td>
					</tr>	
					<?php echo $this->Form->end();?>	
				</table>		
									
			</div>
		</div>
	</div>

</html>