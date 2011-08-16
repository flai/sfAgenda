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
  }

  public function executeList(sfWebRequest $request)
  {
    $letter          = $request->getParameter('param');
    $this->contactos = Doctrine::getTable('Contacto')->buscar( $letter );
  }

  public function executeDetail(sfWebRequest $request)
  {
    $this->contacto = $this->getRoute()->getObject();
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
          $this->getUser()->setFlash('notice', 'El contacto se ha almacenado correctamente.');
        }
        catch(Exception $e)
        {
          $this->getUser()->setFlash('error', 'No se pudo almacenar la información.');
        }
      }
    }
  }

  public function executeEdit(sfWebRequest $request)
  {
  }

  public function executeDelete(sfWebRequest $request)
  {
  }

}
