<?php
class UsersController extends AppController
{
 public function beforeFilter() {
   parent::beforeFilter();
   // Allow users to register and logout.
   $this->Auth->allow('add','logout');
}
public function login()
       {
           if($this->request->is('post'))
           {
               if($this->Auth->login())
               {
                   return $this->redirect($this->Auth->redirectUrl('../posts/index'));
                   //$this->Flash->success(__('Success'));
                  /* return $this->redirect(array('action'=>'../posts/index'));*/
               }
               $this->Flash->error(__('Invalid username or password, try again.'));
           }
       }

public function logout() {
  /*$this->Session->setFlash('Good-Bye');*/
   return $this->redirect($this->Auth->logout());
}
   public function index() {
      $this->User->recursive = 0;
      $this->set('users', $this->paginate());
  }
 public function index1() {
      $this->User->recursive = 0;
      $this->set('users', $this->paginate());
  }
  
  public function add() {
      if ($this->request->is('post')) {
          $this->User->create();
          if ($this->User->save($this->request->data)) {
              $this->Flash->success(__('The user has been saved'));
              return $this->redirect(array('action' => 'login'));
          }
          $this->Flash->error(
              __('The user could not be saved. Please, try again.')
          );
      }
  }

  }