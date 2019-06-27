<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:24
 */

namespace Model;

use \Entity\Chapitres;

class ChapitresManagerPDO extends ChapitresManager
{
    protected function add(Chapitres $chapitre)
    {
       

        $requete = $this->dao->prepare('INSERT INTO chapitres SET auteur = :auteur, name = :name,firsttitle = :firsttitle,secondtitle = :secondtitle,content = :content, created = NOW(), modified = NOW()');

        $requete->bindValue(':firsttitle', $chapitre->firsttitle());
        $requete->bindValue(':secondtitle', $chapitre->secondtitle());
        $requete->bindValue(':auteur', $chapitre->auteur());
        $requete->bindValue(':name', $chapitre->name());
        $requete->bindValue(':content', $chapitre->content());
       

        $requete->execute();
    }

    public function count()
    {
        return $this->dao->query('SELECT COUNT(*) FROM chapitres')->fetchColumn();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM chapitres WHERE id = '.(int) $id);
    }

    public function getPage()
    {
         $sql = 'SELECT * FROM chapitres';
       

        $requete = $this->dao->query($sql);

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapitres');

        $listeChapitres = $requete->fetchAll();

        foreach ($listeChapitres as $chapitre)
        {
            $chapitre->setCreated(new \DateTime($chapitre->created()));
            $chapitre->setModified(new \DateTime($chapitre->modified()));
        }

        $requete->closeCursor();

        return $listeChapitres;
    }

    public function getList($debut = -1, $limite = -1)
    {
        $sql = 'SELECT * FROM chapitres ORDER BY id DESC';
        if ($debut != -1 || $limite != -1)
        {
            $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
        }

        $requete = $this->dao->query($sql);

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapitres');

        $listeChapitres = $requete->fetchAll();

        foreach ($listeChapitres as $chapitre)
        {
            $chapitre->setCreated(new \DateTime($chapitre->created()));
            $chapitre->setModified(new \DateTime($chapitre->modified()));
        }

        $requete->closeCursor();

        return $listeChapitres;
    }

    public function getMenu()
    {
        $sql = 'SELECT * FROM chapitres';

        $requete = $this->dao->query($sql);
        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapitres');

        $listeMenu = $requete->fetchAll();

        foreach ($listeMenu as $chapitre)
        {
            $chapitre->setCreated(new \DateTime($chapitre->created()));
            $chapitre->setModified(new \DateTime($chapitre->modified()));
        }

        $requete->closeCursor();

        return $listeMenu;
    }
    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM chapitres WHERE id = :id');
        $requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
        $requete->execute();

        $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Entity\Chapitres');

        if ($chapitre = $requete->fetch())
        {
            $chapitre->setCreated(new \DateTime($chapitre->created()));
            $chapitre->setModified(new \DateTime($chapitre->modified()));

            return $chapitre;
        }

        return null;
    }

    protected function modify(Chapitres $chapitre)
    {

        $requete = $this->dao->prepare('UPDATE chapitres SET auteur = :auteur,  name = :name, firsttitle = :firsttitle, secondtitle = :secondtitle,  content = :content, modified = NOW() WHERE id = :id');

        $requete->bindValue(':name', $chapitre->name());
        $requete->bindValue(':auteur', $chapitre->auteur());
        $requete->bindValue(':firsttitle', $chapitre->firsttitle());
        $requete->bindValue(':secondtitle', $chapitre->secondtitle());
        $requete->bindValue(':content', $chapitre->content());
        $requete->bindValue(':id', $chapitre->id(), \PDO::PARAM_INT);
        $requete->execute();
    }
}