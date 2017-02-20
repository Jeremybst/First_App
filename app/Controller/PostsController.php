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
* Permet d'ajouter un article
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
 }



 ?>
