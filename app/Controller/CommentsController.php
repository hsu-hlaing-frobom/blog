<?php
class CommentsController extends AppController
{
	public function delete($id=null)
   {// debug($id);
       $user_id=$this->Auth->user('id');
       $comment_field=$this->Comment->findById($id);  
       debug($comment_field);
       $comment_id=$comment_field['Comment']['id'];
       debug($comment_id);
       if($user_id)
          {
              $result=$this->Comment->delete($comment_id);
              if($result)
              {  
               $this->Flash->success(__('Comments has been deleted.'));
               return $this->redirect(array('action'=>'index','controller'=>'Posts'));
              }
              else
              {
                $this->Flash->error(__('Your delete operation has failed.'));
                return $this->redirect(array('action'=>'manage'));
              }
           }
           else{
               return $this->redirect(array('action'=>'index'));
               }
           }
}

?>














