<!DOCTYPE html>
<html lang="en">
		<?php 
		$members = $project['AddProject']['projectMembers'];
		if($members == null){
			echo "No members assigned yet..!";
		}
		else{
		?>
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
			$addedmembers = explode(",", $members);
					foreach ($users as $user):
							foreach ($addedmembers as $addedmember):
								if ($addedmember == $user['Profile']['id'])
								{
									?><tr> <td> 
										<?php echo $this->Html->link($user['Profile']['userName'], 
													array('controller' => 'Employee', 'action' => 'viewProfile', $user['Profile']['id'])); ?>
									   </td> </tr>			
									<?php 
								}
								
							endforeach;
					endforeach;
			}
		?>
			</tbody>
			</table>
</html>
