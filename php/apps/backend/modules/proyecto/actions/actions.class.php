<?php

/**
 * proyecto actions.
 *
 * @package    Futumaq
 * @subpackage proyecto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proyectoActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  	$tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("IndexClienteProyecto[$tra_id]"); 
        $this->combocliente = "";
        $this->texto = "";
        try{
            
            if($request->isMethod("post")){
                
                $cliente = $request->getPostParameter("combocliente");
                $tipoProyecto = $request->getPostParameter("combotipoProyecto");
                $fechadesde = $request->getPostParameter("fechadesde");
                $fechahasta = $request->getPostParameter("fechahasta");
                $texto = $request->getPostParameter("textoBusqueda");
                $this->combocliente = $cliente;
                $this->texto = $texto;
                $c = new Criteria();
                $c->addDescendingOrderByColumn(ProyectoPeer::PRO_FECHA);
                $c->addJoin(TipoProyectoPeer::TPR_ID, ProyectoPeer::TPR_ID);
                $c->addJoin(PotreroPeer::POT_ID, ProyectoPeer::POT_ID);
                $c->addJoin(CampoPeer::CAM_ID, PotreroPeer::CAM_ID);
                $c->addJoin(ClientePeer::CLI_ID, CampoPeer::CLI_ID);
                if($cliente!=""){
                    $c->add(ClientePeer::CLI_ID, $cliente);                    
                }
                if($tipoProyecto!=""){
                    $c->add(TipoProyectoPeer::TPR_ID, $tipoProyecto);                    
                }
                if($fechadesde!=""){
                    $c->add(ProyectoPeer::PRO_FECHA, date_format($fechadesde, "Y-m-d"),  Criteria::GREATER_EQUAL) ;
                }
                if($fechahasta!=""){
                    $c->add(ProyectoPeer::PRO_FECHA, date_format($fechahasta, "Y-m-d"),  Criteria::LESS_EQUAL) ;
                }
                $pager = new sfPropelPager('proyecto', 15);
                $pager->setCriteria($c);
                $pager->setPage($request->getParameter('p', 1));
                $pager->init();
                $this->pagina = $request->getParameter('p', 1);
                $this->pager = $pager;
            }else{
                $c = new Criteria();
                $c->addDescendingOrderByColumn(ProyectoPeer::PRO_FECHA);
                $c->addJoin(TipoProyectoPeer::TPR_ID, ProyectoPeer::TPR_ID);
                $c->addJoin(PotreroPeer::POT_ID, ProyectoPeer::POT_ID);
                $c->addJoin(CampoPeer::CAM_ID, PotreroPeer::CAM_ID);
                $c->addJoin(ClientePeer::CLI_ID, CampoPeer::CLI_ID);
                $pager = new sfPropelPager('proyecto', 15);
                $pager->setCriteria($c);
                $pager->setPage($request->getParameter('p', 1));
                $pager->init();
                $this->pagina = $request->getParameter('p', 1);
                $this->pager = $pager;
            }
            
            
            
            
            
            $d = new Criteria();
            $clientes = ClientePeer::doSelect($d);
            $this->clientes = $clientes;
            
            
            $e = new Criteria();
            $tipoProyecto = TipoProyectoPeer::doSelect($e);
            $this->tipoProyecto = $tipoProyecto;
            
        }catch(Exception $e){
            $this->msg = "Ha ocurrido un error inesperado al obtener los proyectos";
            $log->err($e->getMessage());
        }
  }
  public function executeAgregar(sfWebRequest $request)
  {
      //Tipos
      $c = new Criteria();
      $c->addAscendingOrderByColumn(TipoProyectoPeer::TPR_NOMBRE);
      $this->tipos = TipoProyectoPeer::doSelect($c);
      
      //Clientes
      $cc = new Criteria();
      $cc->addAscendingOrderByColumn(ClientePeer::CLI_NOMBRE);
      $this->clientes = ClientePeer::doSelect($cc);
      
      if($request->isMethod("post")){
        $tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("proyectoAgregar[$tra_id]");
        $proyecto_id = "";
          try{
              
                $nombre = $request->getPostParameter("nombre");
                $tipo = $request->getPostParameter("tipo");
                $fecha = $request->getPostParameter("fecha");
                $descripcion = $request->getPostParameter("descripcion");
                $cliente = $request->getPostParameter("cliente");
                $campo = $request->getPostParameter("campo");
                $potrero = $request->getPostParameter("potrero");

                $log->debug("Datos de entrada | nombre=$nombre | tipo=$tipo | fecha=$fecha | descripcion=$descripcion | ".
                        "cliente=$cliente | campo=$campo | potrero=$potrero");

                $proyecto = new Proyecto();
                $proyecto->setProNombre($nombre);
                $proyecto->setTprId($tipo);
                $proyecto->setProFecha($fecha);
                $proyecto->setProDescripcion($descripcion);
                $proyecto->setPotId($potrero);
                $proyecto->save();
                
                $proyecto_id = $proyecto->getProId();

                $log->debug("Proyecto creado");

                $this->getUser()->setFlash("flag_msg","Proyecto creado.",true);
                $this->getUser()->setFlash("flag_tipo","success",true);
              
          } catch (Exception $ex) {
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("proyecto/agregar");

          }
          $this->redirect("proyecto/editar/?pro_id=$proyecto_id");
      }
  	
  }
  public function executeEditar(sfWebRequest $request)
  {
      //Tipos
      $c = new Criteria();
      $c->addAscendingOrderByColumn(TipoProyectoPeer::TPR_NOMBRE);
      $this->tipos = TipoProyectoPeer::doSelect($c);
      
      //Clientes
      $cc = new Criteria();
      $cc->addAscendingOrderByColumn(ClientePeer::CLI_NOMBRE);
      $this->clientes = ClientePeer::doSelect($cc);
    
    try{
        
        $pro_id = $request->getParameter("pro_id");        
        $proyecto = ProyectoPeer::retrieveByPK($pro_id);

        if(!$proyecto){
            throw new Exception("El proyecto seleccionado no existe.");
        }  
      
        if($request->isMethod("post")){
            $tra_id = date("U").rand(111,999);
            $util = new Util();
            $log = $util->setLog("proyectoAgregar[$tra_id]");
              
                $nombre = $request->getPostParameter("nombre");
                $tipo = $request->getPostParameter("tipo");
                $fecha = $request->getPostParameter("fecha");
                $descripcion = $request->getPostParameter("descripcion");
                $cliente = $request->getPostParameter("cliente");
                $campo = $request->getPostParameter("campo");
                $potrero = $request->getPostParameter("potrero");

                $log->debug("Datos de entrada | nombre=$nombre | tipo=$tipo | fecha=$fecha | descripcion=$descripcion | ".
                        "cliente=$cliente | campo=$campo | potrero=$potrero");

                
                $proyecto->setProNombre($nombre);
                $proyecto->setTprId($tipo);
                $proyecto->setProFecha($fecha);
                $proyecto->setProDescripcion($descripcion);
                $proyecto->setPotId($potrero);
                $proyecto->save();
                
                $proyecto_id = $proyecto->getProId();

                $log->debug("Proyecto actualizado");

                $this->getUser()->setFlash("flag_msg","Proyecto actualizado.",true);
                $this->getUser()->setFlash("flag_tipo","success",true);          
        }   
        $this->proyecto = $proyecto;
        $cam_id = $proyecto->getPotrero()->getCamId();
        $cli_id = $proyecto->getPotrero()->getCampo()->getCliId();
        $this->cam_id = $cam_id;
        $this->cli_id = $cli_id;
        
        $cca = new Criteria();
        $cca->add(CampoPeer::CLI_ID,$cli_id);
        $cca->addAscendingOrderByColumn(CampoPeer::CAM_NOMBRE);
        $campos = CampoPeer::doSelect($cca);
        $this->campos = $campos;
        
        $cp = new Criteria();
        $cp->add(PotreroPeer::CAM_ID,$cam_id);
        $cp->addAscendingOrderByColumn(PotreroPeer::POT_NOMBRE);
        $potreros = PotreroPeer::doSelect($cp);
        $this->potreros = $potreros;
              
    } catch (Exception $ex) {
      $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
      $this->getUser()->setFlash("flag_tipo","danger",true);
      $this->redirect("proyecto/index");
    }
    
  }

    public function executeEliminar(sfWebRequest $request)
    {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoEliminar[$tra_id]");
        $pro_id = $request->getParameter("pro_id");
        if($request->isMethod("post")){
            try{

                $log->debug("Datos de entrada | pro_id=$pro_id");
                
                $proyecto = ProyectoPeer::retrieveByPK($pro_id);

                if(!$proyecto){
                    throw new Exception("El proyecto seleccionado no existe.");
                }
                
                //Archivos
                if($proyecto->getProyectoArchivos()){
                    foreach($proyecto->getProyectoArchivos() as $par){
                        $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."proyecto".DIRECTORY_SEPARATOR.$pro_id.DIRECTORY_SEPARATOR;
                        $path_file = $path.$par->getParDescripcion();  
                
                        unlink($path_file);
                        $par->delete();
                    }
                }
                
                $proyecto->delete();
                
                
                $this->getUser()->setFlash("flag_msg","El proyecto ha sido eliminado.",true);
                $this->getUser()->setFlash("flag_tipo","success",true);
                
            } catch (Exception $ex) {
                $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
                $this->getUser()->setFlash("flag_tipo","danger",true);
                $this->redirect("proyecto/index");  
            }
        }
        
        $this->redirect("proyecto/index");
    }
  

    public function executeArchivo(sfWebRequest $request)
    {
        $tra_id = date("U").rand(111,999);
        $util = new Util();
        $log = $util->setLog("proyectoArchivo[$tra_id]");
        
        $this->url_frontend = sfConfig::get("app_frontend_url");
        
        try{
            
            $pro_id = $request->getParameter("pro_id");
            $proyecto = ProyectoPeer::retrieveByPK($pro_id);
            
            if(!$proyecto){
                throw new Exception("El proyecto seleccionado no existe.");
            }
            
            if($request->isMethod("post")){
                
                $nombre = $request->getPostParameter("nombre");
                $archivo = $_FILES["archivo"];
                
                $log->debug("Datos de entrada | nombre=$nombre | archivo=".$archivo["name"]);
                
                $proyecto_archivo = new ProyectoArchivo();
                $proyecto_archivo->setProId($pro_id);
                $proyecto_archivo->setParNombre($nombre);
                $proyecto_archivo->save();
                $util->setArchivoProyecto($nombre, $archivo, $pro_id, $proyecto_archivo->getParId());
                
                $log->debug("Archivo creado");
            
                $this->getUser()->setFlash("flag_msg","El archivo ha sido creado.",true);
                $this->getUser()->setFlash("flag_tipo","success",true);
                
            }
            
            
            $this->proyecto = $proyecto;
            
            $cca = new Criteria();
            $cca->addDescendingOrderByColumn(ProyectoArchivoPeer::CREATED_AT);
            
            $pager = new sfPropelPager('proyectoarchivo', 10);
            $pager->setCriteria($cca);
            $pager->setPage($request->getParameter('p', 1));
            $pager->init();
            $this->pagina = $request->getParameter('p', 1);
            $this->pager = $pager;
            
            
        } catch (Exception $ex) {   
            $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
            $this->getUser()->setFlash("flag_tipo","danger",true);
            $this->redirect("proyecto/tipo");  

        }
    }

    public function executeArchivoeliminar(sfWebRequest $request)
    {
        $pro_id = $request->getParameter("pro_id");
        if($request->isMethod("post")){
            try{
                
                
                $par_id = $request->getPostParameter("par_id");

                $proyecto_archivo = ProyectoArchivoPeer::retrieveByPK($par_id);

                if(!$proyecto_archivo){
                    throw new Exception("El archivo seleccionado no existe.");
                }
                
                $path = sfConfig::get("sf_root_dir").DIRECTORY_SEPARATOR.sfConfig::get("app_frontend_webcarpeta").DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."proyecto".DIRECTORY_SEPARATOR.$pro_id.DIRECTORY_SEPARATOR;
                $path_file = $path.$f_name;  
                
                unlink($path_file);
                $proyecto_archivo->delete();
                
                $this->getUser()->setFlash("flag_msg","El archivo ha sido eliminado.",true);
                $this->getUser()->setFlash("flag_tipo","success",true);
                
            } catch (Exception $ex) {
                $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
                $this->getUser()->setFlash("flag_tipo","danger",true);
                $this->redirect("proyecto/archivo/?pro_id=$pro_id");  
            }
        }
        
        $this->redirect("proyecto/archivo/?pro_id=$pro_id");
    }
  
  
  
  
  public function executeTipo(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoTipo[$tra_id]");

    if($request->isMethod("post")){
      $nombre = $request->getPostParameter("nombre");

      $log->debug("Datos de entrada | nombre=$nombre");

      $tipo_proyecto = new TipoProyecto();
      $tipo_proyecto->setTprNombre($nombre);
      $tipo_proyecto->save();

      $log->debug("Tipo de proyecto creado");

      $this->getUser()->setFlash("flag_msg","Tipo de proyecto creado.",true);
      $this->getUser()->setFlash("flag_tipo","success",true);
    }

    $c = new Criteria();
    $c->addDescendingOrderByColumn(TipoProyectoPeer::TPR_NOMBRE);
    $pager = new sfPropelPager('tipoproyecto', 10);
    $pager->setCriteria($c);
    $pager->setPage($request->getParameter('p', 1));
    $pager->init();

    $this->pagina = $request->getParameter('p', 1);

    $this->pager = $pager;


    
  }
  public function executeTipoeditar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoTipoeditar[$tra_id]");
    $tpr_id = $request->getParameter("tpr_id");

    try{

      $tipo_proyecto = TipoProyectoPeer::retrieveByPK($tpr_id);

      if(!$tipo_proyecto){
        throw new Exception("El tipo seleccionado no existe.");
        
      }

        if($request->isMethod("post")){

            $nombre = $request->getPostParameter("nombre");
            $log->debug("Datos de entrada | tpr_id=$tpr_id | nombre=$nombre");

            $tipo_proyecto->setTprNombre($nombre);
            $tipo_proyecto->save();
                
            $log->debug("Tipo actualizado");
            
            $this->getUser()->setFlash("flag_msg","Tipo de proyecto actualizado.",true);
            $this->getUser()->setFlash("flag_tipo","success",true);

        }
        
        
        $this->tipo_proyecto = $tipo_proyecto;


    }catch(Exception $ex){        
      $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
      $this->getUser()->setFlash("flag_tipo","danger",true);
      $this->redirect("proyecto/tipo");
    }


    
  }
  public function executeTipoeliminar(sfWebRequest $request)
  {
    $tra_id = date("U").rand(111,999);
    $util = new Util();
    $log = $util->setLog("proyectoTipoeliminar[$tra_id]");
    
    try{
        
        $tpr_id = $request->getParameter("tpr_id");
        $log->debug("Datos de entrada | tpr_id=$tpr_id");

        $tipo_proyecto = TipoProyectoPeer::retrieveByPK($tpr_id);

        if(!$tipo_proyecto){
          throw new Exception("El tipo seleccionado no existe.");

        }
        
        if($tipo_proyecto->getProyectos()){
            throw new Exception("El tipo no puede ser eliminado, porque hay proyectos configurados con el tipo.");
        }
        
        $tipo_proyecto->delete();
        $log->debug("Tipo eliminado");
            
        $this->getUser()->setFlash("flag_msg","Tipo de proyecto eliminado.",true);
        $this->getUser()->setFlash("flag_tipo","success",true);      
        
        
    } catch (Exception $ex) {
      $this->getUser()->setFlash("flag_msg",$ex->getMessage(),true);
      $this->getUser()->setFlash("flag_tipo","danger",true);
    }
    
    $this->redirect("proyecto/tipo");
      
  }
}
