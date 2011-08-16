<?php

/**
 * Contacto form.
 *
 * @package    sfAgenda
 * @subpackage form
 * @author     Flai Webnected S. L.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactoForm extends BaseContactoForm
{

  public function configure()
  {
    unset( $this['visitas'] );

    // Widgets
    $this->widgetSchema['imagen'] = new sfWidgetFormInputFile();

    // Address form
    $address_forms = new sfForm();
    $address_forms->embedForm('1', new DireccionForm());
    $address_forms->embedForm('2', new DireccionForm());
    $address_forms->embedForm('3', new DireccionForm());

    $this->embedForm( 'direcciones', $address_forms );

    // Validators
    $this->validatorSchema['nombre']          = new sfValidatorString( array('required' => true) );
    $this->validatorSchema['primer_apellido'] = new sfValidatorString( array('required' => true) );
    $this->validatorSchema['imagen']          = new sfValidatorFile(
      array(
        'required'   => false,
        'path'       => sfConfig::get('sf_upload_dir'),
        'mime_types' => 'web_images'
      ),
      array( 'invalid' => 'Archivo no válido.', 'mime_types' => 'Las imágenes deben ser de formato JPEG, PNG o GIF.' )
    );
  }

  protected function doSave($con = null)
  {
    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $this->updateObject();

    $this->getObject()->save($con);

    Doctrine_Query::create()
    ->delete()
    ->from('Direccion')
    ->andWhere('contacto_id = ?', $this->getObject()->getId())
    ->execute();


    $addresses = $this->getValue('direcciones');
    if( !empty($addresses) )
    {
      foreach( $addresses as $address )
      {
        if( $address['direccion'] != '' && $address['direccion'] != '' && $address['direccion'] != '' )
        {
          $item = new Direccion();
          $item->setContactoId($this->getObject()->getId());
          $item->setDireccion( $address['direccion'] );
          $item->setPredeterminado( $address['predeterminado'] );
          $item->setEmail( $address['email'] );
          $item->setTelefono( $address['telefono'] );
          $item->setInfoAdicional( $address['info_adicional'] );
          $item->save( $con );
        }
      }
    }
  }


}
