<?php
namespace OCFram;

class HTTPResponse
{
  protected $page;

  public function addHeader($header)
  {
    header($header);
  }

  public function redirect($location)
  {
    header('Location: '.$location);
    exit;
  }

  public function redirect404()
  {
    //créer une instance de la classe Page que l'on stocke dans l'attribut page
    $this->page = new Page($this->app);
    //On assigne ensuite à la page le fichier qui fait office de vue à générer
    $this->page->setContentFile(__DIR__.'/../../Errors/404.html');
    //On ajoute un header disant que le document est non trouvé
    $this->addHeader('HTTP/1.0 404 Not Found');
    //On envoie la réponse
    $this->send();
  }
  
  public function send()
  {
   
    exit($this->page->getGeneratedPage());
  }

  public function setPage(Page $page)
  {
    $this->page = $page;
  }

  // Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true
  public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
  {
    setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
  }
}