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
			
		public function viewProject($id = null) {
			$this->AddProject->id = $id;
			$this->set('project', $this->AddProject->find('first', array('conditions' => 
																		array('AddProject.id' => $id))));
			$this -> set('users', $this->Register->find('all' ,array('conditions' => 
																	array('Register.id >' => 'Register.id',
																	'Register.status' => '1'))));
		}
		
		
	}
?>