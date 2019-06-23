<?php
namespace Entity;

use \OCFram\Entity;

class Comment extends Entity
{
  protected $auteur,
            $contenu,
            $online,
            $signaler,
            $date,
            $posts;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  public function isValid()
  {
    return !(empty($this->auteur) || empty($this->contenu));
  }



    public function setPosts($posts)
  {
    $this->posts = (int) $posts;
  }

  public function setAuteur($auteur)
  {
    if (!is_string($auteur) || empty($auteur))
    {
      $this->erreurs[] = self::AUTEUR_INVALIDE;
    }

    $this->auteur = $auteur;
  }

  public function setContenu($contenu)
  {
    if (!is_string($contenu) || empty($contenu))
    {
      $this->erreurs[] = self::CONTENU_INVALIDE;
    }

    $this->contenu = $contenu;
  }

  public function setOnline($online)
  {
  
    $this->online = $online;
  }

  public function setSignaler($signaler)
  {
  
    $this->signaler = $signaler;
  }

  public function setDate(\DateTime $date)
  {
    $this->date = $date;
  }



    public function posts()
  {
    return $this->posts;
  }

  public function auteur()
  {
    return $this->auteur;
  }

  public function contenu()
  {
    return $this->contenu;
  }

    public function online()
  {
    return $this->online;
  }

  public function signaler()
  {
    return $this->signaler;
  }

  public function date()
  {
    return $this->date;
  }
}