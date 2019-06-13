<?php
namespace Entity;

use \OCFram\Entity;

class Posts extends Entity
{
    protected   $menu,
                $titrebannier,
                $type,
                $content,
                $firsttitle,
                $secondtitle,
                $thirdtitle,
                $created,
                $modified,
                $online,
                $image,
                $slug;

    const TITREBANNIER_INVALIDE = 1;
    const TYPE_INVALIDE = 2;
    const CONTENT_INVALIDE = 3;
    const FIRSTTITLE_INVALIDE = 1;
    const MENU_INVALIDE = 4;


    public function isValid()
    {
        return !(empty($this->menu) || empty($this->type)|| empty($this->firsttitle) || empty($this->content));
    }


    // SETTERS //

     public function setMenu($menu)
    {
        if (!is_string($menu) || empty($menu))
        {
            $this->erreurs[] = self::MENU_INVALIDE;
        }

        $this->menu = $menu;
    } 

    public function setTitrebannier($titrebannier)
    {

        if (!is_string($titrebannier) || empty($titrebannier))
        {
            $this->erreurs[] = self::TITREBANNIER_INVALIDE;
        }

        $this->titrebannier = $titrebannier;
    } 
           public function setType($type)
    {
       
         if (!is_string($type) || empty($type))
        {
            $this->erreurs[] = self::TYPE_INVALIDE;
        }
        $this->type = $type;
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

    public function setOnline($online)
    {
        $this->online = $online;
    }

  

          public function setImage($image)
    {
        $this->image = $image;
    }


      public function setSlug($slug)
    {
        $this->slug = $slug;
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
       public function setThirdtitle($thirdtitle)
    {
        $this->thirdtitle = $thirdtitle;
    }

    // GETTERS //

     public function menu()
    {
        return $this->menu;
    }
    public function titrebannier()
    {
        return $this->titrebannier;
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

       public function online()
    {
        return $this->online;
    }

       public function type()
    {
        return $this->type;
    }
           public function image()
    {
        return $this->image;
    }


       public function slug()
    {
        return $this->slug;
    }

           public function firsttitle()
    {
        return $this->firsttitle;
    }
           public function secondtitle()
    {
        return $this->secondtitle;
    }
           public function thirdtitle()
    {
        return $this->thirdtitle;
    }
}