<?php
namespace App\Frontend\Modules\Chapitres;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\PostsFormBuilder;
use \OCFram\FormHandler;

class ChapitresController extends BackController
{

/**
*Action pour afficher la liste des chapitres.
*
**/
 public function executeChapitres(HTTPRequest $request)
    {

        $nombrePosts = $this->app->config()->get('nombre_posts');
        $nombreCaracteres = $this->app->config()->get('nombre_caracteres');

        // On ajoute une définition pour le titre.
        $this->page->addVar('title', 'Liste des '.$nombrePosts.' dernières posts');

        // On récupère le manager des posts.
        $manager = $this->managers->getManagerOf('Chapitres');
        $managerMenu = $this->managers->getManagerOf('Posts');


        $listeChapitres = $manager->getList(0, $nombrePosts);
        $listeMenu  = $managerMenu->getMenu();

        

        foreach ($listeChapitres as $posts)
        {
            if (strlen($posts->content()) > $nombreCaracteres)
            {
                $debut = substr($posts->content(), 0, $nombreCaracteres);
                $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                $posts->setContent($debut);
            }
        }

        // On ajoute la variable $listeChapitres à la vue.      
        $this->page->addVar('listeChapitres', $listeChapitres);
        $this->page->addVar('listeMenu', $listeMenu);
    }


/**
*Action pour aficher la vue show.php
*
**/
        public function executeShow(HTTPRequest $request)
    {
        $chapitres = $this->managers->getManagerOf('Chapitres')->getUnique($request->getData('id'));

        if (empty($chapitres))
        {
            $this->app->httpResponse()->redirect404();
        }

         // On récupère le menu 
        $listeMenu = $this->getListeMenu();


        $this->page->addVar('title', $chapitres->name());
        $this->page->addVar('chapitres', $chapitres);
        $this->page->addVar('listeMenu', $listeMenu);
        $this->page->addVar('comments', $this->managers->getManagerOf('Comments')->getListOf($chapitres->id()));
    }

/**
* Function pour récupèreles posts.
**/
    private function getListeMenu(){
    // On récupère le manager des posts.
    $manager = $this->managers->getManagerOf('Posts');
    $liste  = $manager->getMenu();
    return $liste;
    }

/**
* Action pour inserer les commentaires pour récupèreles posts.
**/
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

            $this->app->httpResponse()->redirect('chapitre-'.$request->getData('posts').'.html');
        }

        $this->page->addVar('listeMenu', $listeMenu);
        $this->page->addVar('comment', $comment);
        $this->page->addVar('form', $form->createView());
        $this->page->addVar('title', 'Ajout d\'un commentaire');
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

      $this->app->httpResponse()->redirect('/chapitres');
    }

    $this->page->addVar('comment', $comment);
   
  }


}