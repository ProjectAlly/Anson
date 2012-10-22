<!DOCTYPE html>
<?php 
	echo $this->Html->script('jquery-1.8.0.min.js');
	echo $this->Html->script('jquery-ui-1.8.23.custom.min.js');
	echo $this->Html->css('jquery-ui-1.8.23.custom.css');
	echo $this->Html->css('jquery-ui.css');
	echo $this->Html->script('jquery-ui.js');
?>
<html lang="en">
<head>
	<script>
	 $(function() {
	        $( "#datepicker" ).datepicker({
	            changeMonth: true,
	            yearRange: '-40:-20',
	            changeYear: true
	        });
	    });
   </script>
</head>
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
					echo $this->Form->create('Profile',array('class' => 'form-horizontal', 'url' => array('controller' => 'Employee',
																									'action' => 'updateProfile')));
					echo $this->Html->image('default-profile.jpg', array('class' => 'img-polaroid'));
					echo "<div class=\"control-group\">";
						echo $this->Form->file('userPhoto', array('label' => false));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('userName', 'Name', array('class' => 'control-label'));
						echo $this->Form->input('userName', array('label' => false,
															'value' => $user['Register']['userName']));
					echo "</div>";
				
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputEmail', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('inputEmail', array('label' => false,
															'value' => $user['Register']['inputEmail']));
						echo "</div>";

					echo "<div class=\"control-group\">";
						echo $this->Form->label('userDob', 'Date of Birth', array('class' => 'control-label'));
						echo $this->Form->input('userDob', array('label' =>false,
																'id' => false,
																'id' => 'datepicker',
															    'value' => $proUser['Profile']['userDob']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('userGender', 'Gender', array('class' => 'control-label'));
						echo $this->Form->radio('userGender', array('Male' => 'Male', 'Female' => 'Female'),
														  array('label' => false, 
														  		'legend' => false,
																'value' => $proUser['Profile']['userGender']));
														  
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('workEmail', 'Work Email', array('class' => 'control-label'));
						echo $this->Form->input('workEmail', array('label' => false,
																'value' => $proUser['Profile']['workEmail']));
					echo "</div>";
					
					?>
						<legend>Contact Details</legend>
					<?php 
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('userAddress', 'Address', array('class' => 'control-label'));
						echo $this->Form->textarea('userAddress', array('label' => false,
																'value' => $proUser['Profile']['userAddress']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('userMobile', 'Mobile', array('class' => 'control-label'));
						echo $this->Form->input('userMobile', array('label' => false,
																'value' => $proUser['Profile']['userMobile']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
						echo $this->Form->label('userHome', 'Home', array('class' => 'control-label'));
						echo $this->Form->input('userHome', array('label' => false,
																'value' => $proUser['Profile']['userHome']));
					echo "</div>";
					
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
						echo $this->Form->submit('Save Changes',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";
				?>
				
			</div>
		</div>
	</div>

</html>