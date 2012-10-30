<?php
	class ProjectController extends AppController {	
		
		public $uses = array('AddProject','Profile');
		
		
		public function listProject() {
			$this->set(compact('title_for_layout'));
			$this->set('projects', $this->AddProject->find('all'));
		}
		
		public function viewProject($id = null) {
			$this->AddProject->id = $id;
			$this->set('project', $this->AddProject->find('first', array('conditions' => 
																		array('AddProject.id' => $id))));
			$this->set('users', $this->Profile->find('all' ,array('conditions' => 
																	array('Profile.id >' => 'Profile.id',
																	'Profile.status' => '1'))));
		}
		
		public function viewMembers($id = null) {
		$this->AddProject->id = $id;
		$this->set('project', $this->AddProject->find('first', array('conditions' => 
																	array('AddProject.id' => $id))));
		$this -> set('users', $this->Profile->find('all' ,array('conditions' => 
																array('Profile.id >' => 'Profile.id',
																'Profile.status' => '1'))));
		}
		
		public function addProject() {
			if(!empty($this->data)){
				if($this->AddProject->save($this->data)){
					$this->redirect(array('controller' => 'Project', 'action' => 'listProject'));
				} else {
					$this->Session->setFlash('Your stuff has been saved.');
				}
			}
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
			$this->redirect(array('controller' => 'Project', 'action' => 'viewProject', $proj_id));
		}
	}
?>