<?php

/**
 * api actions.
 *
 * @package    Futumaq
 * @subpackage api
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apiActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

  	$array_out = array();

  	if($request->isMethod("get")){

  		$metodo = $request->getPostParameter("metodo");
  		switch($metodo){
  			default:
  				$array_out["estado"] = "ok";
  			break;
  		}  		

  	}

  	echo json_encode($array_out);

  	return sfView::NONE;
  }
}
