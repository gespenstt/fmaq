<?php

/**
 * noticias actions.
 *
 * @package    Futumaq
 * @subpackage noticias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class noticiasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
            $d = new Criteria();
            $d->addDescendingOrderByColumn(NoticiaPeer::NOT_ID);
            $d->setLimit(10);
            $noticias = NoticiaPeer::doSelect($d);
            $this->notis = $noticias;
            $this->util = new Util();
  }
}
