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
  }

  public function executeDetail(sfWebRequest $request)
  {
  }

  public function executeNew(sfWebRequest $request)
  {
  }

  public function executeEdit(sfWebRequest $request)
  {
  }

  public function executeDelete(sfWebRequest $request)
  {
  }
  
}
