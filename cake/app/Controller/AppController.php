<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('DebugKit.Toolbar', 'Session');
	var $helpers = array('AssetCompress.AssetCompress');
	
	public $uses = array('UserInfo', 'Profile', 'AddProject');
	//Manually defined functions
	
	public function beforeFilter(){
		//next two lines are to count the number of pending users
		$notify = $this->Profile->find('count', array('conditions' => array('Profile.status' => 0)));
		$this->set(compact('notify'));
		
		//To check whether an user is logged in or not
		$name = $this->Session->read('name');
		if (isset($name)) {
		}else {
			$this->redirect(array('controller' => 'Home', 'action' => 'index'));
		}
	}
	public function authenticate() {
		//function to authenticate a user
		$test = $this->UserInfo->Find('first',array('conditions' => 
												array('UserInfo.inputEmail' => $this->data['UserInfo']['inputEmail'],
													  'UserInfo.inputPassword' => $this->data['UserInfo']['inputPassword'],
													  'UserInfo.status' => '1')));
		
		echo "<pre>";
		//print_r($test);
		$name = $this->Session->read('name');
		if (!isset($name)) {
			if ($test == null)
				{
					$this->redirect(array('controller' => 'Home', 'action' => 'loginfailure'));
				}
				else 
				{
					echo "login successful";
					$this->Session->write('name',$test['UserInfo']['userName']);
					$this->Session->write('role',$test['UserInfo']['userRole']);
					$this->Session->write('id',$test['UserInfo']['id']);
					$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
					exit();
				}
			
			exit();
		}
		else{
			echo "Already logged in";		
		}
	}
	
	public function logout() {
		//function to logout
		$this->Session->destroy();
		$this->redirect(array('controller' => 'Home', 'action' => 'index'));
	}
}

