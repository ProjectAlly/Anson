<?php
	class EmployeeController extends AppController{
		public $name = 'Employee';
		public $helpers = array('Html','Form');
		public $components = array('Session');

		
		public $uses = array('UserInfo', 'Register','Profile');

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
			$this->set(compact('title_for_layout'));

			$this -> set('users', $this->Register->find('all' ,array('conditions' => 
																	array('Register.id >' => 'Register.id',
																	'Register.status' => '1'))));
		}

		//new methods
		
		public function pendingUsers() {
			$this->set(compact('title_for_layout'));
			$this->set('users', $this->Register->find('all'));
		}
		
		public function viewProfile($id = null){
			$this->Register->id = $id;
			$this->set('user', $this->Register->find('first', array('conditions' => array('Register.id' => $id))));
			$this->set('proUser', $this->Profile->find('first', array('conditions' => array('Profile.id' => $id))));
		}
		
		public function removeUser($id = null) {
			$this->Register->id = $id;
			$this->Register->delete($id);
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function approveUser($id = null) {
			$this->Register->id = $id;
			$this->Register->updateAll(array('Register.status' => '1'), array('Register.id' => $id));
			
			//Problem in creating profile of User.... Data is not saved in Profile table.... Will have to look at this once...
			
			$this->set('user', $this->Register->find('first',array('conditions' => array('Register.id' => $id))));
			
			$this->Profile->save(array('Profile.id' => $user['Register']['id'],
							'Profile.userName' => $user['Register']['userName'],
							'Profile.inputEmail' => $user['Register']['inputEmail']));
			$this->redirect(array('controller' => 'Employee', 'action' => 'pendingUsers'));
		}
		
		public function userProfile() {
			$this->set('user', $this->Register->find('first', array('conditions' => 
													array('Register.id' => $this->Session->read('id')))));
			$this->set('proUser', $this->Profile->find('first', array('conditions' => 
													array('Profile.id' => $this->Session->read('id')))));
		}
		
		public function editProfile(){
			$this->set('user', $this->Register->find('first', array('conditions' => 
														array('Register.id' => $this->Session->read('id')))));
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
				
			$this->Register->updateAll(array('Register.userName' => "'".$this->data['Profile']['userName']."'",
											'Register.inputEmail' => "'".$this->data['Profile']['inputEmail']."'"),
									  array('Register.id' => $this->Session->read('id')));
			
			$this->redirect(array('controller' => 'Employee', 'action' => 'userProfile'));
		}
	}
?>