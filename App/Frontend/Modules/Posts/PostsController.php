<?php
namespace App\Frontend\Modules\Posts;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class PostsController extends BackController
{
  public function executeIndex(HTTPRequest $request)
  {
    $nombrePosts = $this->app->config()->get('nombre_posts');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
    
    // On ajoute une définition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombrePosts.' dernières posts');
    
    // On récupère le manager des posts.
    $manager = $this->managers->getManagerOf('Posts');
    
    // Cette ligne, vous ne pouviez pas la deviner sachant qu'on n'a pas encore touché au modèle.
    // Contentez-vous donc d'écrire cette instruction, nous implémenterons la méthode ensuite.
    $listePosts = $manager->getList(0, $nombrePosts);
    
    foreach ($listePosts as $posts)
    {
      if (strlen($posts->contenu()) > $nombreCaracteres)
      {
        $debut = substr($posts->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        
        $posts->setContenu($debut);
      }
    }
    
    // On ajoute la variable $listePosts à la vue.
    $this->page->addVar('listePosts', $listePosts);
  }

  public function executeShow(HTTPRequest $request)
  {
    $posts = $this->managers->getManagerOf('Posts')->getUnique($request->getData('id'));
    
    if (empty($posts))
    {
      $this->app->httpResponse()->redirect404();
    }
    
    $this->page->addVar('title', $posts->titre());
    $this->page->addVar('posts', $posts);
  }
}