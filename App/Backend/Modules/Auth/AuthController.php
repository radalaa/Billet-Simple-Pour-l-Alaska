<?php
namespace App\Backend\Modules\Auth;

use \OCFram\BackController;
use \OCFram\HTTPRequest;

class AuthController extends BackController
{
  /**
  *login
  **/
  public function executeLogin(HTTPRequest $request){

          $this->page->addVar('title', 'Connexion');

          if ($request->postExists('login')) {
              $login = $request->postData('login');
              $password = sha1($request->postData('password'));
              //charger le model 
              // On récupère le manager des news.
              $manager = $this->managers->getManagerOf('Users');

              $user = $manager->getFirst($login, $password);
              if (!empty($user)) {
              $this->app->user()->setAuthenticated(true);
              	$this->app->httpResponse()->redirect('./gestion');
              }else{
              $this->app->user()->setFlash('Le pseudo ou le mot de passe est incorrect.');
              }



          }

  }


  public function executeLogout(HTTPRequest $request){

      $this->page->addVar('title', 'connexion');
      $this->app->user()->isNotAuthenticated();
      $this->app->user()->setFlash('Vous ete déconnecté.');
      $this->app->httpResponse()->redirect('./gestion');

  }

}