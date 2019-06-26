<?php
namespace OCFram;

class ChoixField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    $widget .= '<label class="label-add">'.$this->label.'</label><select class ="form-control form-control-lg"  name="'.$this->name.'">';
    
   

   
    return $widget .= '<option value=0>Non</option><option value=1>Oui</option></select>';
  }
  
  public function setMaxLength($maxLength)
  {
    $maxLength = (int) $maxLength;
    
    if ($maxLength > 0)
    {
      $this->maxLength = $maxLength;
    }
    else
    {
      throw new \RuntimeException('La longueur maximale doit être un nombre supérieur à 0');
    }
  }
}