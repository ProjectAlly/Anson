<?php
	class EmployeeController extends AppController{
		public $name = 'Employee';
		public $helpers = array('Html','Form');
		public $components = array('Session');

		
		public $uses = array('UserInfo', 'Profile');

/*		public function beforeFilter() {
			
			//to prevent going back after logout is clicked
			//$this->disableCache();
			
			$name = $this->Session->read('name');
			if (isset($name)) {
				
			}
			else {
				$this->redirect(array('controller' => 'Home', 'action' => 'index'));
			}
		}*/
		
		public function index() {
			$title_for_layout = 'Home';
			$this->set(compact('title_for_layout'));

			$this -> set('users', $this->Profile->find('all' ,array('conditions' => 
																	array('Profile.id >' => 'Profile.id',
																	'Profile.status' => '1'))));
		}

		//new methods
		
		public function pendingUsers() {
			$this->set(compact('title_for_layout'));
			$this->set('proUser', $this->Profile->find('all'));
		}
		
		public function viewProfile($id = null){
			$this->Profile->id = $id;
			$this->set('proUser', $this->Profile->find('first', array('conditions' => array('Profile.id' => $id))));
		}
		
		public function removeUser($id = null) {
			$this->Profile->id = $id;
			$this->Profile->delete($id);
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function approveUser($id = null) {
			$this->Profile->id = $id;
			$this->Profile->updateAll(array('Profile.status' => '1'), array('Profile.id' => $id));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function userProfile() {
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
													array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function editProfile(){
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
														array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function updateProfile(){
			$this->Profile->updateAll(array('Profile.userName' => "'".$this->data['Profile']['userName']."'",
											'Profile.inputEmail' => "'".$this->data['Profile']['inputEmail']."'",
											'Profile.userDob' => "'".$this->data['Profile']['userDob']."'", 
											'Profile.userGender' => "'".$this->data['Profile']['userGender']."'", 
											'Profile.workEmail' => "'".$this->data['Profile']['workEmail']."'", 
											'Profile.userAddress' => "'".$this->data['Profile']['userAddress']."'", 
											'Profile.userMobile' => "'".$this->data['Profile']['userMobile']."'", 
											'Profile.userPhoto' => "'".$this->data['Profile']['userPhoto']."'", 
											'Profile.userHome' => "'".$this->data['Profile']['userHome']."'"),
									  array('Profile.id' => $this->Session->read('id')));
				
			$this->Profile->updateAll(array('Profile.userName' => "'".$this->data['Profile']['userName']."'",
											'Profile.inputEmail' => "'".$this->data['Profile']['inputEmail']."'"),
									  array('Profile.id' => $this->Session->read('id')));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'userProfile'));
		}
	}
?>