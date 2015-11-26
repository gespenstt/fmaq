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
                    $url_front = sfConfig::get("app_frontend_url");
                    if(!$curriculum){
                        throw new Exception("No se ha encontrado el CV solicitado.");
                    }
                    $array_out["estado"] = "ok";
                    $array_out["contenido"] = array(
                        "id" => $curriculum->getCurId(),
                        "carta_presentacion" => $curriculum->getCurCartaPresentacion(),
                        "nombre_archivo" => $curriculum->getCurNombreArchivo(),
                        "ruta" => $url_front.$curriculum->getCurRuta(),
                        "nombre" => $curriculum->getCurNombre(),
                        "rut" => $curriculum->getCurRut(),
                        "telefono" => $curriculum->getCurTelefono(),
                        "email" => $curriculum->getCurEmail(),
                    );
                break;
                
                case "getCamposCliente":
                    $cli_id = $request->getPostParameter("cli_id");
                    $c = new Criteria();
                    $c->add(CampoPeer::CLI_ID,$cli_id);
                    $c->addAscendingOrderByColumn(CampoPeer::CAM_NOMBRE);
                    $campos = CampoPeer::doSelect($c);
                    if(!$campos){
                        throw new Exception("No hay campos para el cliente seleccionado.");
                    }
                    foreach($campos as $cam){
                        $array_out["contenido"][] = array(
                            "id" => $cam->getCamId(),
                            "nombre" => $cam->getCamNombre(),
                        );
                    }
                    $array_out["estado"] = "ok";
                    
                    break;
                    
                case "getPotrerosCampo":
                    $cam_id = $request->getPostParameter("cam_id");
                    $c = new Criteria();
                    $c->add(PotreroPeer::CAM_ID,$cam_id);
                    $c->addAscendingOrderByColumn(PotreroPeer::POT_NOMBRE);
                    $potreros = PotreroPeer::doSelect($c);
                    if(!$potreros){
                        throw new Exception("No hay potreros para el cliente seleccionado.");
                    }
                    foreach($potreros as $pot){
                        $array_out["contenido"][] = array(
                            "id" => $pot->getPotId(),
                            "nombre" => $pot->getPotNombre(),
                        );
                    }
                    $array_out["estado"] = "ok";
                    
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
