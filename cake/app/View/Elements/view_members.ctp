<!DOCTYPE html>
<html lang="en">
		<table class="table table-bordered">
			<caption>List of Employees Working on project</caption>
			<thead>
				<tr>
					<th>User Name</th>
				</tr>
			</thead>
			<tbody>
			<tr> 
		<?php 
			$members = $project['AddProject']['projectMembers'];
			$addedmembers = explode(",", $members);
					foreach ($users as $proUser):
							foreach ($addedmembers as $addedmember):
								if ($addedmember == $proUser['Profile']['id'])
								{
									?><tr> <td> 
										<?php echo $this->Html->link($user['Register']['userName'], 
													array('controller' => 'Employee', 'action' => 'viewProfile', $user['Register']['id'])); ?>
									   </td> </tr>			
									<?php 
								}
							endforeach;
					endforeach;
					?>
			</tbody>
			</table>
</html>
