<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:24
 */

namespace Model;

use \Entity\Users;

class UsersManagerPDO extends UsersManager
{
    protected function add(Users $posts)
    {
         //$requete = $this->dao->prepare('INSERT INTO posts (firsttitle, type, content) VALUES (:firsttitle, :type, :content');
        $requete = $this->dao->prepare('INSERT INTO posts SET menu = :menu, type = :type,firsttitle = :firsttitle, content = :content, created = NOW(), modified = NOW()');

        $requete->bindValue(':firsttitle', $posts->firsttitle());
        $requete->bindValue(':menu', $posts->menu());
        $requete->bindValue(':type', $posts->type());
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
         $sql = 'SELECT * FROM posts WHERE type = "page"';
       

        $requete = $this->dao->query($sql);

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');

        $listeUsers = $requete->fetchAll();

        foreach ($listeUsers as $posts)
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));
        }

        $requete->closeCursor();

        return $listeUsers;
    }

    public function getFirst($login, $password)
    {
        $requete = $this->dao->prepare('SELECT * FROM users WHERE name = :name and password = :password');
        $requete->bindValue(':name', $login);
        $requete->bindValue(':password', $password);
        $requete->execute();
        $listeUsers = $requete->fetchAll();
        return $listeUsers;
    }

    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT * FROM posts WHERE type = "post" ORDER BY id DESC';
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->dao->query($sql);

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');

        $listeUsers = $requete->fetchAll();

        foreach ($listeUsers as $posts)
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));
        }

        $requete->closeCursor();

        return $listeUsers;
    }

    public function getMenu($menu)
    {
        $sql = 'SELECT * FROM posts WHERE type = '."'$menu'";

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');

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

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Users');

        if ($posts = $requete->fetch())
        {
            $posts->setCreated(new \DateTime($posts->created()));
            $posts->setModified(new \DateTime($posts->modified()));

            return $posts;
        }

        return null;
    }

    protected function modify(Users $posts)
    {
        $requete = $this->dao->prepare('UPDATE posts SET menu = :menu, type = :type,firsttitle = :firsttitle, content = :content, modified = NOW() WHERE id = :id');
        $requete->bindValue(':menu', $posts->menu());
        $requete->bindValue(':firsttitle', $posts->firsttitle());
        $requete->bindValue(':content', $posts->content());
        $requete->bindValue(':type', $posts->type());
        $requete->bindValue(':id', $posts->id(), \PDO::PARAM_INT);
        $requete->execute();
    }
}