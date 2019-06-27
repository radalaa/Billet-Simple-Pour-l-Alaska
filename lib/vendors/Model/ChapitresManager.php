<?php
/**
 * Created by PhpStorm.
 * User: Alaa
 * Date: 02/06/2019
 * Time: 08:24
 */

namespace Model;

use \OCFram\Manager;
use \Entity\Chapitres;

abstract class ChapitresManager extends Manager
{
    /**
     * Méthode permettant d'ajouter une chapitre.
     * @param $chapitre Chapitres La chapitre à ajouter
     * @return void
     */
    abstract protected function add(Chapitres $chapitre);

    /**
     * Méthode permettant d'enregistrer une chapitre.
     * @param $chapitre Chapitres la chapitre à enregistrer
     * @see self::add()
     * @see self::modify()
     * @return void
     */
    public function save(Chapitres $chapitre)
    {

        if ($chapitre->isValid())
        {
            $chapitre->isNew() ? $this->add($chapitre) : $this->modify($chapitre);
        }
        else
        {
            throw new \RuntimeException('La chapitre doit être validée pour être enregistrée');
        }
    }

    /**
     * Méthode renvoyant le nombre de chapitre total.
     * @return int
     */
    abstract public function count();

    /**
     * Méthode permettant de supprimer une chapitre.
     * @param $id int L'identifiant de la chapitre à supprimer
     * @return void
     */
    abstract public function delete($id);

    /**
     * Méthode retournant une liste de chapitre demandée.
     * @param $debut int La première chapitre à sélectionner
     * @param $limite int Le nombre de chapitre à sélectionner
     * @return array La liste des chapitre. Chaque entrée est une instance de Chapitres.
     */
    abstract public function getList($debut = -1, $limite = -1);

    /**
     * Méthode retournant une chapitre précise.
     * @param $id int L'identifiant de la chapitre à récupérer
     * @return Chapitres La chapitre demandée
     */
    abstract public function getUnique($id);

    /**
     * Méthode permettant de modifier une chapitre.
     * @param $chapitre chapitre la chapitre à modifier
     * @return void
     */
    abstract protected function modify(Chapitres $chapitre);
}