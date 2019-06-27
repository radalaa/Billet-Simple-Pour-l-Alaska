<?php
namespace Entity;

    use \OCFram\Entity;
    use \OCFram\Entity\Images;

    class Posts extends Entity
    {
        protected   $menu,
                    $firsttitle,
                    $secondtitle,
                    $thirdtitle,
                    $content,
                    $created,
                    $modified,
                    $online,
                    $image;

        const CONTENT_INVALIDE = 3;
        const FIRSTTITLE_INVALIDE = 1;
        const MENU_INVALIDE = 4;


        public function isValid()
        {
            return !(empty($this->menu) || empty($this->firsttitle) || empty($this->secondtitle) ||empty($this->thirdtitle) || empty($this->content) || empty($this->image));
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
               public function thirdtitle()
        {
            return $this->thirdtitle;
        }
    }