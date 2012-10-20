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
				<table class="table table-hover">
					<caption>Projects</caption>
					<thead>
						<tr>
							<th>Project Title</th>
							<th>Company Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($projects as $project):
						?> 
							<tr>
								<td> <?php //echo $this->Html->link($project['AddProject']['projectName'], 
										   //				array('controller' => 'Home', 'action' => 'viewProject', $project['AddProject']['id'])); 
										   
									echo $project['AddProject']['projectName'];
								?> 
								</td>
								<td> <?php echo $project['AddProject']['id'];?> </td>
								<td> <?php echo $this->Html->link('View Members',array('controller' => 'Home', 'action' => 'viewMembers', $project['AddProject']['id']),array('class' => 'btn btn-info')); ?> </td>
							</tr>
						<?php
							endforeach; 	
											
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</html>