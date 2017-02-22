<?php

/**
 * Controller for Posts
 * Affiche les posts
 */
 class PostsController extends AppController {
     public $helpers = array('Html', 'Form');

     public function index() {
         $this->set('posts', $this->Post->find('all'));
     }
/**
* Permet d'afficher un post (=id)
*/
     public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('post invalide'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('post invalide'));
        }
        $this->set('post', $post);
    }

/**
* Permet d'ajouter un post
*/

  public function add() {
        if ($this->request->is('post')) {
            $this->Post->create();
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Ton post est enregistré.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Un problème est survenu.'));
        }
    }

/**
* Permet d'éditer un post
**/

    public function edit($id = null) {
      if (!$id) {
          throw new NotFoundException(__('Post invalide'));
      }

      $post = $this->Post->findById($id);
      if (!$post) {
          throw new NotFoundException(__('Post invalide'));
      }

      if ($this->request->is(array('post', 'put'))) {
          $this->Post->id = $id;
          if ($this->Post->save($this->request->data)) {
              $this->Flash->success(__('Le post a été mis à jour.'));
              return $this->redirect(array('action' => 'index'));
          }
          $this->Flash->error(__('Un problème est survenu..'));
      }

      if (!$this->request->data) {
          $this->request->data = $post;
      }
  }

/**
*Permet de supprimer un post
**/

public function delete($id) {
if ($this->request->is('get')) {
    throw new MethodNotAllowedException();
}

if ($this->Post->delete($id)) {
    $this->Flash->success(
        __('Le post avec id : %s a été supprimé.', h($id))
    );
} else {
    $this->Flash->error(
        __('Le post avec l\'id: %s n\'a pas pu être supprimé.', h($id))
    );
}

return $this->redirect(array('action' => 'index'));
}
 }




 ?>
