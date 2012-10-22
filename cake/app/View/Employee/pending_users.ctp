<!DOCTYPE html>
<?php 
	
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	echo $this->element('crumbs');
	
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
					<caption>Project Staff</caption>
					<thead>
						<tr>
							<th>User Name</th>
							<th>Company Name</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($users as $user):
						if($user['Register']['status'] == '1'){
						?> 
							<tr>
								<td> <?php echo $this->Html->link($user['Register']['userName'], 
															array('controller' => 'Employee', 'action' => 'viewProfile', $user['Register']['id'])); ?> </td>
								<td> <?php echo $user['Register']['companyName'];?> </td>
								<td> <?php echo "Approved"; ?> </td>
								<td></td>
								<td>
									<i class="icon-remove"></i>
									<?php 
										echo $this->Html->link('Remove User', array('controller' => 'Employee', 'action' =>'removeUser', $user['Register']['id']),
															 						array(), "Are you sure you wish to remove this user?");
									?>
								</td>
							</tr>
						<?php 
						}
						else{
							?> 
							<tr>
								<td> <?php echo $this->Html->link($user['Register']['userName'], 
															array('controller' => 'Home', 'action' => 'viewProfile', $user['Register']['id'])); ?> </td>
								<td> <?php echo $user['Register']['companyName'];?> </td>
								<td> <?php echo "Pending"; ?> </td>
								<td>
									<i class="icon-ok"></i>
									<?php 
										echo $this->Html->link('Approve User', array('controller' => 'Employee', 'action' =>'approveUser', $user['Register']['id']),
															 array(), "Approve User?"); 
									?> 
								</td>
								<td>
									<i class="icon-remove"></i>
									<?php 
										echo $this->Html->link('Remove User', array('controller' => 'Employee', 'action' =>'removeUser', $user['Register']['id']),
															 array(), "Are you sure you want to remove this user?");
									?>
								</td>
							</tr>
						<?php
						}
						endforeach; 						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</html>