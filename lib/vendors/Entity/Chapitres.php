<?php
namespace Entity;

use \OCFram\Entity;
use \OCFram\Entity\Images;

class Chapitres extends Entity
{
    protected   $name,
                $auteur,
                $firsttitle,
                $secondtitle,
                $content,
                $created,
                $modified,
                $UserId,
                $image;

    const TITREBANNIER_INVALIDE = 1;
    const TYPE_INVALIDE = 2;
    const CONTENT_INVALIDE = 3;
    const FIRSTTITLE_INVALIDE = 1;
    const NAME_INVALIDE = 4;


    public function isValid()
    {
        return !(empty($this->name) || empty($this->auteur) || empty($this->firsttitle)|| empty($this->secondtitle) || empty($this->content));
    }


    // SETTERS //

     public function setName($name)
    {
        if (!is_string($name) || empty($name))
        {
            $this->erreurs[] = self::NAME_INVALIDE;
        }

        $this->name = $name;
    } 


     public function setAuteur($auteur)
    {
        if (!is_string($auteur) || empty($auteur))
        {
            $this->erreurs[] = self::NAME_INVALIDE;
        }

        $this->auteur = $auteur;
    } 

    
    

    public function setContent($content)
    {
        if (!is_string($content) || empty($content))
        {
            $this->erreurs[] = self::CONTENT_INVALIDE;
        }

        $this->content = $content;
    }




    public function setCreated(\DateTime $created)
    {
        $this->created = $created;
    }

    public function setModified(\DateTime $modified)
    {
        $this->modified = $modified;
    }


          public function setImage($image)
    {
        
        $this->image = $image;
    }


       public function setFirsttitle($firsttitle)
    {
        if (!is_string($firsttitle) || empty($firsttitle))
        {
            $this->erreurs[] = self::FIRSTTITLE_INVALIDE;
        }

        $this->firsttitle = $firsttitle;
    }
       public function setSecondtitle($secondtitle)
    {
        $this->secondtitle = $secondtitle;
    }

           public function setUser_id($UserId)
    {
        $this->UserId = $UserId;
    }

    // GETTERS //

     public function name()
    {
        return $this->name;
    }

    public function auteur()
    {
        return $this->auteur;
    }

    public function content()
    {
        return $this->content;
    }

    public function created()
    {
        return $this->created;
    }

    public function modified()
    {
        return $this->modified;
    }


     public function image()
    {
        return $this->image;
    }

      public function firsttitle()
    {
        return $this->firsttitle;
    }
           public function secondtitle()
    {
        return $this->secondtitle;
    }

}