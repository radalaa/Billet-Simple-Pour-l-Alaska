<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:24
 */

namespace Model;

use \OCFram\Manager;
use \Entity\Users;

abstract class UsersManager extends Manager
{
    /**
     * Méthode permettant d'ajouter une users.
     * @param $users Users La users à ajouter
     * @return void
     */
    abstract protected function add(Users $users);

    /**
     * Méthode permettant d'enregistrer une users.
     * @param $users Users la users à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Users $users)
    {

        if ($users->isValid())
        {
            $users->isNew() ? $this->add($users) : $this->modify($users);
        }
        else
        {
            throw new \RuntimeException('La users doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode renvoyant le nombre de users total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode permettant de supprimer une users.
     * @param $id int L'identifiant de la users à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode retournant une liste de users demandée.
     * @param $debut int La première users à sélectionner
     * @param $limite int Le nombre de users à sélectionner
     * @return array La liste des users. Chaque entrée est une instance de Users.
     */
    abstract public function getList($debut = -1, $limite = -1);

    /**
     * Méthode retournant une users précise.
     * @param $id int L'identifiant de la users à récupérer
     * @return Users La users demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant de modifier une users.
     * @param $users users la users à modifier
     * @return void
     */
    abstract protected function modify(Users $users);
}