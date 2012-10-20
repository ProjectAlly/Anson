<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class HomeController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Home';
	public $helpers = array('Html','Form');
	public $components = array('Session');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('UserInfo', 'Register', 'Profile','AddProject');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	
	public function beforeFilter() {
		if ($this->action == 'index') {
			$name = $this->Session->read('name');
			$role = $this->Session->read('role');
			if (isset($name)) {
				switch ($role)
				{
					case 1:
						$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'index'));
						break;
					case 2:
						$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
						break;
					case 3:
						$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
						break;
					default:
						echo "User";
						break;
				}	
			}
		}
		
	}
	
	public function index() {
		$title_for_layout = 'Home';
		$this->set(compact('title_for_layout'));
		if(!empty($this->data)){
			if($this->Register->save($this->data)){
				echo "successful";
				$this->Session->setFlash('Your stuff has been saved.');
				$this->redirect(array('controller' => 'Home', 'action' => 'index'));
			} else {
				$this->Session->setFlash('Something went wrong please try again.');
				$this->redirect(array('controller' => 'Home', 'action' => 'index'));
			}
		}
	}
	
	
	
	public function userProfile() {
		$this->set('user', $this->Register->find('first', array('conditions' => 
												array('Register.id' => $this->Session->read('id')))));
		$this->set('proUser', $this->Profile->find('first', array('conditions' => 
												array('Profile.id' => $this->Session->read('id')))));
	}
	
	public function viewProfile($id = null){
		$this->Register->id = $id;
		$this->set('user', $this->Register->find('first', array('conditions' => array('Register.id' => $id))));
		$this->set('proUser', $this->Profile->find('first', array('conditions' => array('Profile.id' => $id))));
	}
	
	
	public function test() {
		echo "you successfully registered with projectally....kindly wait till admin approves yours request.";
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
		
		$this->redirect(array('controller' => 'Home', 'action' => 'userProfile'));
	}

	public function message() {
		
	}
	
	public function loginfailure() {
		
	}
			
	public function addProject() {
		if(!empty($this->data)){
			if($this->AddProject->save($this->data)){
				$role = $this->Session->read('role');
				switch ($role)
				{
					case 1:
						$this->redirect(array('controller' => 'SuperAdmin', 'action' => 'listProject'));
						break;
					case 2:
						$this->redirect(array('controller' => 'Admin', 'action' => 'index'));
						break;
					case 3:
						$this->redirect(array('controller' => 'Employee', 'action' => 'index'));
						break;
					default:
						echo "User";
						break;
				}
				
			} else {
				$this->Session->setFlash('Your stuff has been saved.');
			}
		}
	}
	
	
	public function listProject() {
		$this->set(compact('title_for_layout'));
		$this->set('projects', $this->AddProject->find('all'));
	}
	
	public function viewMembers($id = null) {
		$this->AddProject->id = $id;
		$this->set('project', $this->AddProject->find('first', array('conditions' => 
																	array('AddProject.id' => $id))));
		$this -> set('users', $this->Register->find('all' ,array('conditions' => 
																array('Register.id >' => 'Register.id',
																'Register.status' => '1'))));
	}
}
