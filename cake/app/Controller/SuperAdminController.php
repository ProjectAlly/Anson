<?php
	class SuperAdminController extends AppController{
		public $name = 'SuperAdmin';
		public $helpers = array('Html','Form');
		public $components = array('Session');

		
		public $uses = array('UserInfo','Register','AddProject', 'Profile');
		
		public function beforeFilter() {
			
			//to prevent going back after logout is clicked
			$this->disableCache();
			
			$name = $this->Session->read('name');
			if (isset($name)) {
				
			}
			else {
				$this->redirect(array('controller' => 'Home', 'action' => 'index'));
			}
		}
		
		public function index() {
			$title_for_layout = 'Home';
			
		}
		 
		public function removeUser($id = null) {
			$this->Register->id = $id;
			$this->Register->delete($id);
			$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'pendingUsers'));
		}
		
		public function approveUser($id = null) {
			$this->Register->id = $id;
			$this->Register->updateAll(array('Register.status' => '1'), array('Register.id' => $id));
			
			//Problem in creating profile of User.... Data is not saved in Profile table.... Will have to look at this once...
			
			$this->set('user', $this->Register->find('first',array('conditions' => array('Register.id' => $id))));
			
			$this->Profile->save(array('Profile.id' => $user['Register']['id'],
							'Profile.userName' => $user['Register']['userName'],
							'Profile.inputEmail' => $user['Register']['inputEmail']));
			$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'pendingUsers'));
		}
		
		public function pendingUsers() {
			$this->set(compact('title_for_layout'));
			$this->set('users', $this->Register->find('all'));
		}
		
		public function listProject() {
			$this->set(compact('title_for_layout'));
			$this->set('projects', $this->AddProject->find('all'));
		}
		
		public function viewProject($id = null) {
			$this->AddProject->id = $id;
			$this->set('project', $this->AddProject->find('first', array('conditions' => 
																		array('AddProject.id' => $id))));
			$this -> set('users', $this->Register->find('all' ,array('conditions' => 
																	array('Register.id >' => 'Register.id',
																	'Register.status' => '1'))));
		}
		
		public function addMember($id = null) {

			$user_id = $this->params['named']['user_id'];
			$proj_id = $this->params['named']['proj_id'];
			$project = $this->AddProject->find('first',array('conditions' =>
																		array('AddProject.id' => $proj_id)));
			//echo $project['AddProject']['projectMembers'];
			//exit;
			if ($project['AddProject']['projectMembers'] == null)
			{
				$this->AddProject->UpdateAll(array('AddProject.projectMembers' => "'$user_id'"),
											array('AddProject.id' => $proj_id));	
			}
			else 
			{
				$users_id = $project['AddProject']['projectMembers'] . ',' . $user_id;
				$this->AddProject->UpdateAll(array('AddProject.projectMembers' => "'$users_id'"),
											array('AddProject.id' => $proj_id));
				
			
			}
			$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'viewProject', $proj_id));
		}
	}
?>