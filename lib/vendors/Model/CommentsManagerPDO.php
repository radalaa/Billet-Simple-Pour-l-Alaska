<?php
namespace Model;

use \Entity\Comment;

class CommentsManagerPDO extends CommentsManager
{
  protected function add(Comment $comment)
  {
    $q = $this->dao->prepare('INSERT INTO comments SET posts = :post, auteur = :auteur, contenu = :contenu, date = NOW()');
    
    $q->bindValue(':post', $comment->posts(), \PDO::PARAM_INT);
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':contenu', $comment->contenu());
    
    $q->execute();
    
    $comment->setId($this->dao->lastInsertId());
  }

  public function delete($id)
  {
    $this->dao->exec('DELETE FROM comments WHERE id = '.(int) $id);
  }

  public function deleteFromPosts($post)
  {
    $this->dao->exec('DELETE FROM comments WHERE posts = '.(int) $post);
  }
  
  public function getListOf($post)
  {
    if (!ctype_digit($post))
    {
      throw new \InvalidArgumentException('L\'identifiant de la post passé doit être un nombre entier valide');
    }
    
    $q = $this->dao->prepare('SELECT * FROM comments WHERE posts = :post');
    $q->bindValue(':post', $post, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    $comments = $q->fetchAll();
    
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }
    
    return $comments;
  }

  protected function modify(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET auteur = :auteur, signaler = :signaler, online = :online, contenu = :contenu WHERE id = :id');
    
    $q->bindValue(':auteur', $comment->auteur());
    $q->bindValue(':online', $comment->online());
    $q->bindValue(':contenu', $comment->contenu());
    $q->bindValue(':signaler', $comment->signaler());
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
  public function get($id)
  {
    $q = $this->dao->prepare('SELECT * FROM comments WHERE id = :id');
    $q->bindValue(':id', (int) $id, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    return $q->fetch();
  }

/**
*
* Methode qui retourne list des commentaire
*/

  public function getComment($signaler)
  {

    
    $q = $this->dao->prepare('SELECT * FROM comments WHERE signaler = :signaler');
    $q->bindValue(':signaler', (int) $signaler, \PDO::PARAM_INT);
    $q->execute();
    
    $q->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Comment');
    
    $comments = $q->fetchAll();
    
    foreach ($comments as $comment)
    {
      $comment->setDate(new \DateTime($comment->date()));
    }


    return $comments;
  }

   public function modifySignaler(Comment $comment)
  {
    $q = $this->dao->prepare('UPDATE comments SET signaler = 1 WHERE id = :id');
    
   
    $q->bindValue(':id', $comment->id(), \PDO::PARAM_INT);
    
    $q->execute();
  }
  
}