<?php

/**
 * maquinaria actions.
 *
 * @package    Futumaq
 * @subpackage maquinaria
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class maquinariaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	
  }
  public function executeAgregar(sfWebRequest $request)
  {
  	$files = $_FILES["imagenes"];
  	$files_tmp = $files["tmp_name"];
  	$files_name = $files["name"];
  	print_r($files_tmp);

  	

  }
  public function executeMarcas(sfWebRequest $request)
  {
  	
  }
}
