<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:24
 */

namespace Model;

use \Entity\Posts;

class PostsManagerPDO extends PostsManager
{
    protected function add(Posts $posts)
    {
       

        $requete = $this->dao->prepare('INSERT INTO posts SET menu = :menu, firsttitle = :firsttitle,secondtitle = :secondtitle,thirdtitle = :thirdtitle,image = :image, content = :content, created = NOW(), modified = NOW()');

        $requete->bindValue(':firsttitle', $posts->firsttitle());
        $requete->bindValue(':secondtitle', $posts->secondtitle());
        $requete->bindValue(':thirdtitle', $posts->thirdtitle());
        $requete->bindValue(':menu', $posts->menu());
        $requete->bindValue(':image', $posts->image());
        $requete->bindValue(':content', $posts->content());
       

        $requete->execute();
    }

    public function count()
    {
        return $this->dao->query('SELECT COUNT(*) FROM posts')->fetchColumn();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM posts WHERE id = '.(int) $id);
    }

    public function getPage()
    {
         $sql = 'SELECT * FROM posts';
       

        $requete = $this->dao->query($sql);

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

        $listePosts = $requete->fetchAll();

        foreach ($listePosts as $posts)
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));
        }

        $requete->closeCursor();

        return $listePosts;
    }

    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT * FROM posts ORDER BY id DESC';
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->dao->query($sql);

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

        $listePosts = $requete->fetchAll();

        foreach ($listePosts as $posts)
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));
        }

        $requete->closeCursor();

        return $listePosts;
    }

    public function getMenu()
    {
        $sql = 'SELECT * FROM posts';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

        $listeMenu = $requete->fetchAll();

        foreach ($listeMenu as $posts)
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));
        }

        $requete->closeCursor();

        return $listeMenu;
    }
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM posts WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Posts');

        if ($posts = $requete->fetch())
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));

            return $posts;
        }

        return null;
    }

    protected function modify(Posts $posts)
    {
       
        $requete = $this->dao->prepare('UPDATE posts SET menu = :menu, firsttitle = :firsttitle, image = :image, content = :content, modified = NOW() WHERE id = :id');
        $requete->bindValue(':menu', $posts->menu());
        $requete->bindValue(':firsttitle', $posts->firsttitle());
        $requete->bindValue(':content', $posts->content());
        $requete->bindValue(':image', $posts->image());
        $requete->bindValue(':id', $posts->id(), \PDO::PARAM_INT);
        $requete->execute();
    }
}