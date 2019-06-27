<?php

namespace App\Backend\Modules\Chapitres;

use \OCFram\BackController;
use \OCFram\HTTPRequest;
use \Entity\Chapitres;
use \Entity\Comment;
use \FormBuilder\CommentFormBuilder;
use \FormBuilder\ChapitresFormBuilder;
use \FormBuilder\PagesFormBuilder;
use \OCFram\FormHandler;
use \OCFram\Functions;
use \OCFram\Upload;

class ChapitresController extends BackController
{

  public function executeDelete(HTTPRequest $request)
  {
    $chapitreId = $request->getData('id');
    
    $this->managers->getManagerOf('Chapitres')->delete($chapitreId);

    $this->managers->getManagerOf('Comments')->deleteFromChapitres($chapitreId);

    $this->app->user()->setFlash('Post a bien été supprimée !');

    $this->app->httpResponse()->redirect('./gestion');
  }

      public function executeRomans(HTTPRequest $request)
  {
    
     $manager = $this->managers->getManagerOf('Chapitres');
      $listeMenu  = $manager->getMenu();

    $this->page->addVar('title', 'Gestion des pages');

    $this->page->addVar('listeMenu', $listeMenu);
    $this->page->addVar('listepages', $manager->getPage());
   // $this->page->addVar('nombreChapitres', $manager->count());
   
  }

    public function executeUpdate(HTTPRequest $request)
  {
    $this->processForm($request);

    $this->page->addVar('title', 'Modification d\'une chapitre');
  }

  public function processForm(HTTPRequest $request)
  {
    
    if ($request->method() == 'POST')
    {

      
         //appler la function upload image

            if ($request->postData('thirdtitle')=="") {
              $thirdtitle = "__________________";
              echo $thirdtitle;
            }else{
              $thirdtitle =  $request->postData('thirdtitle');
            }
            
     
         $post = new Chapitres([
        'name' => $request->postData('name'),
        'auteur' => $request->postData('auteur'),
        'firsttitle' => $request->postData('name'),
        'firsttitle' => $request->postData('firsttitle'),
        'secondtitle' => $request->postData('secondtitle'),
        'content' => $request->postData('content')
      ]);
       


      $functions = new Functions();
     // $functions->debug();


      if ($request->getExists('id'))
      {
        $post->setId($request->getData('id'));
      }
    }
    else
    {
      // L'identifiant de la chapitre est transmis si on veut la modifier
      if ($request->getExists('id'))
      {
        $post = $this->managers->getManagerOf('Chapitres')->getUnique($request->getData('id'));

      }
      else
      {
        $post = new Chapitres;
      }
    }
        
          
           $formBuilder = new ChapitresFormBuilder($post);

   

  
    $formBuilder->build();

    $form = $formBuilder->form();

    $formHandler = new FormHandler($form, $this->managers->getManagerOf('Chapitres'), $request);


    if ($formHandler->process())
    {
      $this->app->user()->setFlash($post->isNew() ? 'Le chapitre a bien été ajoutée !' : 'Le chapitre a bien été modifiée !');
      
      $this->app->httpResponse()->redirect('/admin/gestion');
    }

    $this->page->addVar('form', $form->createView());
  }

  public function executeInsert(HTTPRequest $request)
  {
    $this->processForm($request);
    $this->page->addVar('title', 'Ajout d\'une chapitre');
  }



   public function executeChapitres(HTTPRequest $request)
  {

     $manager = $this->managers->getManagerOf('Chapitres');
     $managerPost = $this->managers->getManagerOf('Posts');
      $listeMenu  = $managerPost->getMenu();
      $listeChapitres  = $manager->getPage();  

    $this->page->addVar('title', 'Gestion des chapitres');

    $this->page->addVar('listeMenu', $listeMenu);
    $this->page->addVar('listeChapitres', $listeChapitres);
   
   
  }

}