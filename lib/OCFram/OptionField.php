<?php
namespace OCFram;

class OptionField extends Field
{
  protected $maxLength;
  
  public function buildWidget()
  {
    $widget = '';
    
    if (!empty($this->errorMessage))
    {
      $widget .= $this->errorMessage.'<br />';
    }
    
    $widget .= '<label class="label-add">'.$this->label.'</label><select name="'.$this->name.'"';
    
   
      $widget .= ' value="'.htmlspecialchars($this->value).'" >';
    

  
    
    return $widget .= '<option value="post">Post</option><option value="page">Page</option></select>';
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