<?php
namespace App\Frontend\Modules\Posts;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\PostsFormBuilder;
use \OCFram\FormHandler;

class PostsController extends BackController
{
        public function executeAccueil(HTTPRequest $request)
    {
        
        $nombrePosts = 1;
               
        $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

        // On ajoute une définition pour le titre.
        $this->page->addVar('title', 'Liste des '.$nombrePosts.' dernières posts');

        // On récupère le manager des posts.
        $manager = $this->managers->getManagerOf('Posts');
        $managerChapitres = $this->managers->getManagerOf('Chapitres');


        $listePosts = $managerChapitres->getList(0, $nombrePosts);
        $listePage = $manager->getPage(0, $nombrePosts);
        $listeMenu  = $manager->getMenu('page');
        $count  = $manager->count();
        
        if ($count == "0") {
           $this->app->httpResponse()->redirect('/chapitres');    
        }


        foreach ($listePosts as $posts)
        {
            if (strlen($posts->content()) > $nombreCaracteres)
            {
                $debut = substr($posts->content(), 0, $nombreCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                $posts->setContent($debut);
            }
        }

        // On ajoute la variable $listePosts à la vue.      
        $this->page->addVar('listePosts', $listePosts);
        $this->page->addVar('listeMenu', $listeMenu);
        $this->page->addVar('listePage',  $listePage);
    }

   

 public function executeShowpage(HTTPRequest $request)
    {
         $nombrePosts = 1;

         $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
          // On récupère le manager des posts.
        $manager = $this->managers->getManagerOf('Posts');
        $managerChapitres = $this->managers->getManagerOf('Chapitres');



        $listeMenu  = $manager->getMenu('page');
        $listeChapitres  = $managerChapitres->getList(0, $nombrePosts);


        $pages = $this->managers->getManagerOf('Posts')->getUnique($request->getData('id'));

        if (empty($pages))
        {
            $this->app->httpResponse()->redirect404();
        }

        foreach ($listeChapitres as $chapitre)
        {
            if (strlen($chapitre->content()) > $nombreCaracteres)
            {
                $debut = substr($chapitre->content(), 0, $nombreCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                $chapitre->setContent($debut);
            }
        }


        $this->page->addVar('name', $pages->menu());
        $this->page->addVar('listePosts', $pages);
        $this->page->addVar('listeMenu', $listeMenu);
        $this->page->addVar('listeChapitres', $listeChapitres);

       // $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($posts->id()));

    }

/*
    public function executeShow(HTTPRequest $request)
    {
      
        $posts = $this->managers->getManagerOf('Posts')->getUnique($request->getData('id'));

        if (empty($posts))
        {
            $this->app->httpResponse()->redirect404();
        }

         // On récupère le menu 
        $listeMenu = $this->getListeMenu();


        $this->page->addVar('title', $posts->menu());
        $this->page->addVar('posts', $posts);
        $this->page->addVar('listeMenu', $listeMenu);
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($posts->id()));
    }

    public function executeInsertComment(HTTPRequest $request)
    {
        // On récupère le menu 
        $listeMenu = $this->getListeMenu();


        // Si le formulaire a été envoyé.
        if ($request->method() == 'POST')
        {
            $comment = new Comment([
                'posts' => $request->getData('posts'),
                'auteur' => $request->postData('auteur'),
                'contenu' => $request->postData('contenu')
            ]);
        }
        else
        {
            $comment = new Comment;
        }

        $formBuilder = new CommentFormBuilder($comment);
        $formBuilder->build();

        $form = $formBuilder->form();

        $formHandler = new FormHandler($form, $this->managers->getManagerOf('Comments'), $request);

        if ($formHandler->process())
        {
            $this->app->user()->setFlash('Le commentaire a bien été ajouté, merci !');

            $this->app->httpResponse()->redirect('posts-'.$request->getData('posts').'.html');
        }

        $this->page->addVar('listeMenu', $listeMenu);
        $this->page->addVar('comment', $comment);
        $this->page->addVar('form', $form->createView());
        $this->page->addVar('title', 'Ajout d\'un commentaire');
    }

    private function getListeMenu(){
        // On récupère le manager des posts.
        $manager = $this->managers->getManagerOf('Posts');
        $liste  = $manager->getMenu('page');
        return $liste;
    }

      public function executeSignaler(HTTPRequest $request)
  {
 
   $this->page->addVar('title', 'Signaler un commentaire');

    $add = false;
    if ($request->method() == 'POST')
    {
        $add = true;
      $comment = new Comment([
        'id' => $request->getData('id'),
        'signaler' => 1
      ]);
    }
    else
    {
      $comment = $this->managers->getManagerOf('Comments')->get($request->getData('id'));
    }

    if ($add)
    {
        $manager = $this->managers->getManagerOf('Comments');
        $manager->modifySignaler($comment);

      $this->app->user()->setFlash('Le commentaire a bien été signalé');

      $this->app->httpResponse()->redirect('/posts.html');
    }

    $this->page->addVar('comment', $comment);
   
  }
*/
}