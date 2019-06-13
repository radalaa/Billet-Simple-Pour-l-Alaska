<?php
namespace Model;

use \Entity\Posts;

class PostsManagerPDO extends PostsManager
{
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM posts ORDER BY id DESC';
    
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
    
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');
    
    $listePosts = $requete->fetchAll();
    
    foreach ($listePosts as $posts)
    {
      $posts->setDateAjout(new \DateTime($posts->dateAjout()));
      $posts->setDateModif(new \DateTime($posts->dateModif()));
    }
    
    $requete->closeCursor();
    
    return $listePosts;
  }
}