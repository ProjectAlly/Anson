<!DOCTYPE html>
<?php 
	echo $this->Html->script('jquery.validate.js');
	echo $this->Html->script('validate.js');
	echo $this->Html->script('unload.js');
	echo $this->Html->css('jquery.validate.css');
	//test
?>
<html lang="en">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<!-- Sidebar content -->
				<a href="#myModal" role="button" class="btn" data-toggle="modal">Login</a>
				<!-- Modal -->
				<div style="display: none;" class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-header">
				    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
				    <h3 id="myModalLabel">Login</h3>
				  </div>
				  <div class="modal-body">
				  	<?php 
						$options = array(
						'label' => false,
						'placeholder' => 'Email',
						'div' => array(
							'class' => 'controls'
							)
						);
					
					
					//at present model name isn't specified....it will be specified as per
					//requirement.
					echo $this->Form->create('UserInfo',array('class' => 'form-horizontal',
												'url' => array('controller' => 'Home',
													'action' => 'authenticate')));
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputEmail', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('inputEmail',$options);
					echo "</div>";
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputPassword', 'Password', array('class' => 'control-label'));
						echo $this->Form->input('inputPassword',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  'div' => array(
																	'class' => 'controls'
																	)
																   ));
					echo "</div>";
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
						//echo $this->Form->label(null,'Remember me',array('class' => 'checkbox'));
					?>
					<label class="checkbox">
					<?php 
					echo $this->Form->checkbox('Remember me',array('label' => false));
						//echo " Remember me";	
					echo "Remember Me </label>";
						echo $this->Form->submit('Login',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";
					?>		
				  </div>
				</div>
			</div>
			<div class="span10">
				<!-- Main content -->
				<!-- form using cakephp -->

				<?php
				 $options = array(
					'label' => false,
					'div' => array(
						'class' => 'controls'
						)
					);
					
					$user_role = array('0' => 'Select Role', '1' => 'Super Administrator', '2' => 'Administrator', '3' =>'Employee', '4' =>'User');
					//at present model name isn't specified....it will be specified as per
					//requirement.
				?>
						<legend> Register with Project<span style="color: #52a8ec"><strong>Ally</strong></span> </legend>
				
					<table>
					<?php echo $this->Form->create('Profile',array('class' => 'AdvancedForm',
														'url' => array('controller' => 'Home',
														'action' => 'index')));?>
					<tr>
						<td align="right">Name</td>
						<td><?php echo $this->Form->input('userName',array('label' => false,
																		   'type' => 'text')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Company</td>
						<td><?php echo $this->Form->input('companyName',array('label' => false,
																		   'type' => 'text')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Designation</td>
						<td><?php echo $this->Form->input('userRole',array('label' => false,
																		   'options' => $user_role)); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Email</td>
						<td><?php echo $this->Form->input('inputEmail',array('label' => false,
																		   'type' => 'text')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Password</td>
						<td><?php echo $this->Form->input('inputPassword',array('label' => false,
																				'type' => 'password')); ?>
						</td>
					</tr>
					<tr>
						<td align="right">Confirm Password</td>
						<td><?php echo $this->Form->input('confirmPassword',array('label' => false,
																				'type' => 'password')); ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $this->Form->submit('Sign Up',array('class' => 'btn')); ?></td>
					</tr>
					
					<?php echo $this->Form->end();?>
				</table>
				
					
					<?php 
					
					//at present model name isn't specified....it will be specified as per
					//requirement.
					/*echo $this->Form->create('',array('class' => 'form-horizontal'));
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputEmail', 'Email', array('class' => 'control-label'));
						echo $this->Form->input('inputEmail',$options);
					echo "</div>";
					echo "<div class=\"control-group\">";
						echo $this->Form->label('inputPassword', 'Password', array('class' => 'control-label'));
						echo $this->Form->input('inputPassword',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  'div' => array(
																	'class' => 'controls'
																	)
																   ));
					echo "</div>";
					echo "<div class=\"control-group\">";
					echo "<div class=\"controls\">";
						//echo $this->Form->label(null,'Remember me',array('class' => 'checkbox'));
					?>
					<label class="checkbox">
					<?php 
					echo $this->Form->checkbox('Remember me',array('label' => false));
						//echo " Remember me";	
					echo "Remember Me </label>";
						echo $this->Form->submit('Login',array('class' => 'btn'));
						echo $this->Form->end();
					echo "</div>";
					echo "</div>";*/
				?>
				
				
				<!-- Form is commented and kept for reference -->
				<!-- 
				<form class="form-horizontal">
				  <div class="control-group">
				    <label class="control-label" for="inputEmail">Email</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" placeholder="Email">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="inputPassword">Password</label>
				    <div class="controls">
				      <input type="password" id="inputPassword" placeholder="Password">
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				      <label class="checkbox">
				        <input type="checkbox"> Remember me
				      </label>
				      <button type="submit" class="btn">Sign in</button>
				    </div>
				  </div>
				</form>
				 -->
			</div>
		</div>
	</div>

</html>