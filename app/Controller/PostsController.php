<?php
class PostsController extends AppController
{
  public $helpers = array('Html', 'Form');
  public function index() {
  $this->set('posts', $this->Post->find('all'));
  if ($this->request->is(array('post', 'put'))) {
                $this->Post->id = $id;
                if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'login'));
                }
}
  }
  public function show() {
  $this->set('posts', $this->Post->find('all'));
  }
        public function view($id = null) {
        $user_id=$this->Auth->user('id');
          $username=$this->Auth->user('username');
        if (!$user_id) {
        throw new NotFoundException(__('Invalid post'));
        }
        if (!empty($this->request->data['Comment'])) {
            $this->request->data['Comment']['class'] = 'Post'; 
            $this->request->data['Comment']['foreign_id'] = $id; 
            $this->request->data['Comment']['name'] = $username; 
            $this->Post->Comment->create(); 
            if ($this->Post->Comment->save($this->request->data)) {
               $this->Flash->success(__('The Comment has been saved.', true),'success');
                $this->redirect(array('action'=>'view',$id));
            }
            $this->Flash->error(__('The Comment could not be saved. Please, try again.', true),'warning');
        }
        $post = $this->Post->read(null, $id); // contains $post['Comments']
        $this->set(compact('post'));
        $post = $this->Post->findById($id);
        if (!$post) {
        throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
        public function delete($id) {
                if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
                }
                if ($this->Post->delete($id)) {
                $this->Flash->success(
                __('The post with id: %s has been deleted.', h($id))
                );
                return $this->redirect(array('action' => 'index'));
                } 
                else {
                $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($id))
                );
                }
                
}
  public function delete_cm($id) {
                if ($this->request->is('get')) {
                throw new MethodNotAllowedException();
                }
                if ($this->Post->delete($this->request->data('Post.user_id'))) {
                $this->Flash->success(
                __('The post with id: %s has been deleted.', h($user_id))
                );
                } else {
                $this->Flash->error(
                __('The post with id: %s could not be deleted.', h($user_id))
                );
                }
                return $this->redirect(array('action' => 'index'));
}
/*$this->set('posts',$this->Post->find('all',array('conditions'=>array('Post.user_id'=>$this->Auth->user('id')))));
*/
        public function edit($id = null) {
                if (!$id) {
                throw new NotFoundException(__('Invalid post'));
                }
                $post = $this->Post->findById($id);
                if (!$post) {
                throw new NotFoundException(__('Invalid post'));
                }
                if ($this->request->is(array('post', 'put'))) {
                $this->Post->id = $id;
                $result=$this->Post->save($this->request->data);
                if ($result) 
                {
                    
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('controller' =>'Posts','action' => 'index'));
                }
                $this->Flash->error(__('Unable to update your post.'));
                }
                if (!$this->request->data) {
                $this->request->data = $post;
                }
                }
              public function edit_cm($id = null) {
                if (!$id) {
                throw new NotFoundException(__('Invalid post'));
                }
                $post = $this->Post->findById($id);
                if (!$post) {
                throw new NotFoundException(__('Invalid post'));
                }
                if ($this->request->is(array('post', 'put'))) {
                $this->Post->id = $id;
                $result=$this->Post->save($this->request->data);
                if ($result) 
                {
                    
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
                }
                $this->Flash->error(__('Unable to update your post.'));
                }
                if (!$this->request->data) {
                $this->request->data = $post;
                }
                }
function uploadimg($id = null) {
    header('Content-type: image/jpeg');
    $posts = $this->Post->findById($id);
    echo $posts['Post']['image'];
}
public function cmt() {
    if ($this->request->is('post')) 
    {
    $this->Post->create();
    if ($this->Post->save($this->request->data))
     {
    $this->Flash->success(__('Your post has been saved.'));
return $this->redirect(array('action' => 'show'));
    }
$this->Flash->error(__('Unable to add your post.'));
}
 return $this->redirect(array('action' => 'index'));
}
        
 public function add() {
       if ($this->request->is('post')) {
           $this->Post->create();
           $filePath="./img/posts/".$this->request->data['Post']['image']['name'];
           $filename=$this->request->data['Post']['image']['tmp_name'];
           if(move_uploaded_file($filename, $filePath)){
               echo "File Uploaded Successfully";
               $this->request->data['Post']['imagePath']=$this->request->data['Post']['image']['name'];
               $this->request->data['Post']['user_id'] = $this->Auth->user('id');
                if ($this->Post->save($this->request->data)) {
                     $this->Flash->success(__('Your post has been saved.'));
               }
               return $this->redirect(array('controller' =>'Posts','action' => 'index'));
              }
      }
   }
   public function manage(){
 $this->set('posts',$this->Post->find('all',array('conditions'=>array('Post.user_id'=>$this->Auth->user('id')))));
  }
   public function vv($id = null) {
    if (!$id) {
      $this->flash(__('Invalid Post.', true),'error');
      $this->redirect(array('action'=>'index'));
    }
    // save the comment
    if (!empty($this->data['Comment'])) {
      $this->data['Comment']['class'] = 'Post'; 
      $this->data['Comment']['foreign_id'] = $id; 
      $this->Post->Comment->create(); 
      if ($this->Post->Comment->save($this->data)) {
        $this->Session->setFlash(__('The Comment has been saved.', true),'success');
        $this->redirect(array('action'=>'vv',$id));
      }
      $this->Session->setFlash(__('The Comment could not be saved. Please, try again.', true),'warning');
    }
    // set the view variables
    $post = $this->Post->read(null, $id); // contains $post['Comments']
    $this->set(compact('post'));
    debug($post);
  }
}
?>