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
	public $uses = array('UserInfo', 'Profile','AddProject');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	
	public function beforeFilter() {
		//next two lines are to count the number of pending users
		$notify = $this->Profile->find('count', array('conditions' => array('Profile.status' => 0)));
		$this->set(compact('notify'));
		
		//$this->disableCache();
		if ($this->params['action'] == 'index') {
			$name = $this->Session->read('name');
			$role = $this->Session->read('role');
			if (isset($name)) {
				$this->redirect(array('controller' => 'Home', 'action' => 'HomePage'));
			}
		}
	}
	
	public function index() {
		$title_for_layout = 'Home';
		$this->set(compact('title_for_layout'));
		if(!empty($this->data)){
			if($this->Profile->save($this->data)){
				echo "successful";
				$this->Session->setFlash('Your stuff has been saved.');
			} else {
				$this->Session->setFlash('Something went wrong please try again.');
			}
		$this->redirect(array('controller' => 'Home', 'action' => 'index'));
		}
	}
	
	public function HomePage() {

	}
	
	public function test() {
		echo "you successfully registered with projectally....kindly wait till admin approves yours request.";
	}
	
	public function message() {
		
	}
	
	public function loginfailure() {
		
	}
			
	public function listProject() {
		$this->set(compact('title_for_layout'));
		$this->set('projects', $this->AddProject->find('all'));
	}
}