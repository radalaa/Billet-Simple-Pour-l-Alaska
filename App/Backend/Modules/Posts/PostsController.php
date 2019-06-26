<?php

namespace App\Backend\Modules\Posts;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Posts;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\PostsFormBuilder;
use \OCFram\FormHandler;

class PostsController extends BackController
{
  public function executeDelete(HTTPRequest $request)
  {
    $postsId = $request->getData('id');
    
    $this->managers->getManagerOf('Posts')->delete($postsId);

    $this->managers->getManagerOf('Comments')->deleteFromPosts($postsId);

    $this->app->user()->setFlash('Post a bien été supprimée !');

    $this->app->httpResponse()->redirect('./gestion');
  }

  public function executeDeleteComment(HTTPRequest $request)
  {
    $this->managers->getManagerOf('Comments')->delete($request->getData('id'));
    
    $this->app->user()->setFlash('Le commentaire a bien été supprimé !');
    
    $this->app->httpResponse()->redirect('/admin/commentaires#message');
  }

  public function executeIndex(HTTPRequest $request)
  {
       // On récupère le manager des posts.
        $manager = $this->managers->getManagerOf('Posts');
        $listeMenu  = $manager->getMenu('page');

    $this->page->addVar('title', 'Gestion des Chapitres');

    $manager = $this->managers->getManagerOf('Posts');

    $this->page->addVar('listeMenu', $listeMenu);
    $this->page->addVar('listePosts', $manager->getList());
    $this->page->addVar('nombrePosts', $manager->count());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);
    $this->page->addVar('title', 'Ajout d\'une posts');
  }

  public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une posts');
  }

  public function executeUpdateComment(HTTPRequest $request)
  {
    $this->page->addVar('title', 'Modification d\'un commentaire');

    if ($request->method() == 'POST')
    {
      $comment = new Comment([
        'id' => $request->getData('id'),
        'auteur' => $request->postData('auteur'),
        'online' => $request->postData('online'),
        'contenu' => $request->postData('contenu'),
        'signaler' => 0
      ]);
    }
    else
    {
      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    }

    $formBuilder = new CommentFormBuilder($comment);
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

    if ($formHandler->process())
    {
      $this->app->user()->setFlash('Le commentaire a bien été modifié');

      $this->app->httpResponse()->redirect('/admin/commentaires');
    }

    $this->page->addVar('form', $form->createView());
  }

  public function processForm(HTTPRequest $request)
  {
    
    if ($request->method() == 'POST')
    {
            if ($request->postData('thirdtitle')=="") {
              $thirdtitle = "__________________";
              echo $thirdtitle;
            }else{
              $thirdtitle =  $request->postData('thirdtitle');
            }
      
      if ($request->postData('type') === "Chapitre") {
         $post = new Posts([
        'menu' => $request->postData('menu'),
        'type' => $request->postData('type'),
        'firsttitle' => $request->postData('firsttitle'),
        'secondtitle' => "null",
        'image' => "null",
        'thirdtitle' => $thirdtitle,
        'content' => $request->postData('content')
      ]);
       
      }else{
         $post = new Posts([
        'menu' => $request->postData('menu'),
        'type' => $request->postData('type'),
        'firsttitle' => $request->postData('firsttitle'),
        'secondtitle' => $request->postData('secondtitle'),
        'image' => $request->postData('image'),
        'thirdtitle' => $thirdtitle,
        'content' => $request->postData('content')
      ]);
      }
  
     

      if ($request->getExists('id'))
      {
        $post->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la posts est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $post = $this->managers->getManagerOf('Posts')->getUnique($request->getData('id'));
      }
      else
      {
        $post = new Posts;
      }
    }
    
    $formBuilder = new PostsFormBuilder($post);
  
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Posts'), $request);


    if ($formHandler->process())
    {
      $this->app->user()->setFlash($post->isNew() ? 'Le posts a bien été ajoutée !' : 'Le posts a bien été modifiée !');
      
      $this->app->httpResponse()->redirect('/admin/gestion');
    }

    $this->page->addVar('form', $form->createView());
  }

 public function executeGestion(HTTPRequest $request)
  {
    /*
     $manager = $this->managers->getManagerOf('Posts');
      $listeMenu  = $manager->getMenu('page');

    $this->page->addVar('title', 'Gestion des Chapitres');

    $manager = $this->managers->getManagerOf('Posts');

    $this->page->addVar('listeMenu', $listeMenu);
    $this->page->addVar('listePosts', $manager->getList());
    $this->page->addVar('nombrePosts', $manager->count());
   
*/
  }

   public function executePages(HTTPRequest $request)
  {
    
     $manager = $this->managers->getManagerOf('Posts');
      $listeMenu  = $manager->getMenu('page');

    $this->page->addVar('title', 'Gestion des pages');

    $this->page->addVar('listeMenu', $listeMenu);
    $this->page->addVar('listepages', $manager->getPage());
   // $this->page->addVar('nombrePosts', $manager->count());
   
  }

  public function executeComments(HTTPRequest $request)
  {
    
     $manager = $this->managers->getManagerOf('comments');
      $listeCommentsignaler  = $manager->getComment(1);

       $listeCommentNONsignaler  = $manager->getComment(0);

    $this->page->addVar('title', 'Gestion des Commentaires');
    $this->page->addVar('listeCommentsignaler', $listeCommentsignaler);
    $this->page->addVar('listeCommentNONsignaler', $listeCommentNONsignaler);
   
  }
    public function executeChapitres(HTTPRequest $request)
  {
 
     $manager = $this->managers->getManagerOf('Posts');
      $listeMenu  = $manager->getMenu('page');

    $this->page->addVar('title', 'Gestion des chapitres');

    $this->page->addVar('listeMenu', $listeMenu);
    $this->page->addVar('listepages', $manager->getList());
    $this->page->addVar('nombrePosts', $manager->count('Chapitre'));
    
   
  }

  


}