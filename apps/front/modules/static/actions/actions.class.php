<?php

/**
 * static actions.
 *
 * @package    sfAgenda
 * @subpackage static
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->contactos = Doctrine::getTable('Contacto')->masVisitados( 6 );
    
    $this->setMetaInfo( 'Bienvenido a tu agenda de contactos' );
  }

  public function executeList(sfWebRequest $request)
  {
    $letter          = $request->getParameter('param');
    $this->contactos = Doctrine::getTable('Contacto')->buscar( $letter );
    
    $this->setMetaInfo( 'Búsqueda de contactos' );
  }

  public function executeDetail(sfWebRequest $request)
  {
    $this->contacto = $this->getRoute()->getObject();
    Doctrine::getTable('Contacto')->incrementarVisitas( $this->contacto->getId() );
    
    $this->setMetaInfo( trim( "{$this->contacto->getNombre()} {$this->contacto->getPrimerApellido()} {$this->contacto->getSegundoApellido()}" ) );
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ContactoForm();

    if($request->getMethod() == sfRequest::POST)
    {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

      if($this->form->isValid())
      {
        try
        {
          $this->form->save();
          $this->getUser()->setFlash('notice', 'El contacto se ha creado correctamente.');
          $this->redirect('editpage', $this->form->getObject());
        }
        catch(Exception $e)
        {
          $this->getUser()->setFlash('error', 'No se pudo almacenar la información.');
        }
      }
    }
    else
    {
      $this->getUser()->setFlash('notice', null);
      $this->getUser()->setFlash('error', null);
    }

    $this->setMetaInfo( 'Nuevo contacto' );
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->contacto = $this->getRoute()->getObject();
    $this->form = new ContactoForm( $this->contacto );

    if($request->getMethod() == sfRequest::POST)
    {
      $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));

      if($this->form->isValid())
      {
        try
        {
          $this->form->save();
          $this->getUser()->setFlash('notice', 'El contacto se ha actualizado correctamente.');
        }
        catch(Exception $e)
        {
          $this->getUser()->setFlash('error', 'No se pudo actualizar la información.');
        }
      }
    }
    else
    {
      $this->getUser()->setFlash('error', null);
    }

    $this->setMetaInfo( trim("Editando a {$this->contacto->getNombre()} {$this->contacto->getPrimerApellido()} {$this->contacto->getSegundoApellido()}" ) );

  }

  public function executeDelete(sfWebRequest $request)
  {
    $contacto = $this->getRoute()->getObject();

    $conn = Doctrine_Manager::connection();
    try
    {
      $conn->beginTransaction();

      Doctrine_Query::create()
      ->delete()
      ->from('Direccion')
      ->andWhere('contacto_id = ?', $contacto->getId())
      ->execute();

      if( $contacto->delete($conn) )
      {
        $conn->commit();
        $this->redirect('deleteokpage');
      }
      else
      {
        $conn->rollback();
        $this->getUser()->setFlash('error', 'No se pudo eliminar el contacto.');
      }
    }
    catch(Doctrine_Exception $e)
    {
      $conn->rollback();
      $this->getUser()->setFlash('error', 'No se pudieron eliminar las direcciones asociadas al contacto.');
    }
  }

  public function executeDeleteOk(sfWebRequest $request)
  {
     $this->setMetaInfo( 'Contacto borrado' );
  }


  /******************************************************
   * PRIVATE METHODS
   ******************************************************/

  private function getKeywords( $value )
  {
    $aux_keywords = explode( ' ', str_replace('-', " ", $value));
    $keywords     = array();

    foreach( $aux_keywords as $key => $item )
    {
      if( strlen($item)  > 3 )
      {
        $keywords[] = strtolower($item);
      }
    }

    return implode( ', ', $keywords );
  }

  private function getTitle( $title )
  {
    return $title . " | Curso básico de Symfony 1.4";
  }

  private function setMetaInfo( $value )
  {
    $title    = $this->getTitle( $value );

    $response = $this->getResponse();
    $response->setTitle($title);
    $response->addMeta('description', $title);
    $response->addMeta('keywords', $this->getKeywords( $value ));
  }

}
