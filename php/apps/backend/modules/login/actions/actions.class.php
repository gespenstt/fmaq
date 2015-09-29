<?php

/**
 * login actions.
 *
 * @package    Futumaq
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$this->setLayout("layout_login");
  	if($request->isMethod("post")){
  		$this->redirect("home/index");
  	}
  }
}
