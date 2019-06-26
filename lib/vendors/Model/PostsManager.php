<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:24
 */

namespace Model;

use \OCFram\Manager;
use \Entity\Posts;

abstract class PostsManager extends Manager
{
    /**
     * Méthode permettant d'ajouter une posts.
     * @param $posts Posts La posts à ajouter
     * @return void
     */
    abstract protected function add(Posts $posts);

    /**
     * Méthode permettant d'enregistrer une posts.
     * @param $posts Posts la posts à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Posts $posts)
    {

        if ($posts->isValid())
        {
            $posts->isNew() ? $this->add($posts) : $this->modify($posts);
        }
        else
        {
            throw new \RuntimeException('La posts doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode renvoyant le nombre de posts total.
     * @return int
     */
    abstract public function count($type);

    /**
     * Méthode permettant de supprimer une posts.
     * @param $id int L'identifiant de la posts à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode retournant une liste de posts demandée.
     * @param $debut int La première posts à sélectionner
     * @param $limite int Le nombre de posts à sélectionner
     * @return array La liste des posts. Chaque entrée est une instance de Posts.
     */
    abstract public function getList($debut = -1, $limite = -1);

    /**
     * Méthode retournant une posts précise.
     * @param $id int L'identifiant de la posts à récupérer
     * @return Posts La posts demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant de modifier une posts.
     * @param $posts posts la posts à modifier
     * @return void
     */
    abstract protected function modify(Posts $posts);
}