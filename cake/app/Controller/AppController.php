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
	public $components = array('DebugKit.Toolbar');
	var $helpers = array('AssetCompress.AssetCompress');
	
	public $uses = array('UserInfo');
	
	public function authenticate() {
		$test = $this->UserInfo->Find('first',array('conditions' => 
												array('UserInfo.inputEmail' => $this->data['UserInfo']['inputEmail'],
													  'UserInfo.inputPassword' => $this->data['UserInfo']['inputPassword'],
													  'UserInfo.status' => '1')));
		
												
		
												
		echo "<pre>";
		
		$this->Session->write('name',$test['UserInfo']['userName']);
		$this->Session->write('role',$test['UserInfo']['userRole']);
		$this->Session->write('id',$test['UserInfo']['id']);
		//print_r($test);
		
		if ($test == null)
		{
			$this->redirect(array('controller' => 'Home', 'action' => 'loginfailure'));
		}
		else 
		{
			echo "login successful";
			exit();
			switch ($test['UserInfo']['userRole'])
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
					$this->redirect(array('controller' => 'User', 'action' => 'index'));
					break;
			}
		}
		//echo $test['UserInfo']['accessPermission']; 
		exit();
		//print_r($this->UserInfo->Find('first'));
	}
	
	public function logout() {
		$this->Session->destroy();
		$this->redirect(array('controller' => 'home', 'action' => 'index'));
	}
}
