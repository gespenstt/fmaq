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

    if($request->isMethod("post")){
        
        try{

            $metodo = $request->getPostParameter("metodo");
            switch($metodo){

                case "getCv":
                    $cur_id = $request->getPostParameter("cur_id");
                    $curriculum = CurriculumPeer::retrieveByPK($cur_id);
                    if(!$curriculum){
                        throw new Exception("No se ha encontrado el CV solicitado.");
                    }
                    $array_out["estado"] = "ok";
                    $array_out["contenido"] = array(
                        "id" => $curriculum->getCurId(),
                        "carta_presentacion" => $curriculum->getCurCartaPresentacion(),
                        "nombre_archivo" => $curriculum->getCurNombreArchivo(),
                        "ruta" => $curriculum->getCurRuta(),
                        "nombre" => $curriculum->getCurNombre(),
                        "rut" => $curriculum->getCurRut(),
                        "telefono" => $curriculum->getCurTelefono(),
                    );
                break;

                default:
                    $array_out["estado"] = "ok";
                break;
            }  
            
        } catch (Exception $ex) {            
            $array_out["estado"] = "nok";
            $array_out["mensaje"] = $ex->getMessage();
        }		

    }

    echo json_encode($array_out);

    return sfView::NONE;
  }
}
