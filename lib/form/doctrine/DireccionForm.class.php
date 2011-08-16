<?php

/**
 * Direccion form.
 *
 * @package    sfAgenda
 * @subpackage form
 * @author     Flai Webnected S. L.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DireccionForm extends BaseDireccionForm
{
  public function configure()
  {    
    // Validators
    $this->validatorSchema['contacto_id'] = new sfValidatorPass();
  }
}
