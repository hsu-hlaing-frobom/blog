
<?php
	class StaffsController extends AppController
	{
		public function add()
		{
			if($this->request->is('post'))
			{
			$data=$this->data;
			$result=$this->Staff->save($data);
			if($result)
			{
				$this->Flash->success('Login Success');
				return $this->redirect(array('action'=>'login'));
			}
			else
			{
				$this->Flash->error('Error');
			}
			}
		}
		public function login()
		{
			if($this->request->is('post'))
			{
				if($this->Auth->login())
				{
					$result=$this->Auth->redirectUrl('../Staffs/index');
					return $this->redirect($result);
				}
				$this->Flash->error('Login failed');
			}
		}
		public function index() {
	      $this->Staff->recursive = 0;
	      $this->set('staffs', $this->paginate());
  }
	}
?>