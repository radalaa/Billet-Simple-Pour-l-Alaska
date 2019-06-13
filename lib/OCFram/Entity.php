<?php
namespace OCFram;

abstract class Entity implements \ArrayAccess
{
  protected $erreurs = [],
            $id;

  public function __construct(array $donnees = [])
  {
    if (!empty($donnees))
    {
      $this->hydrate($donnees);
    }
  }

 
}