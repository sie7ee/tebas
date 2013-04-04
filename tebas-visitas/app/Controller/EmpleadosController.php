<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpleadosController
 *
 * @author GussJQ
 */
class EmpleadosController extends AppController {

   public $helpers = array('Html', 'Form', 'Js');
   public $name = 'Empleados';
   public $uses = array('Empleado');
   public $components = array('RequestHandler');

   public function beforeFilter()
   {
      $this->layout = "default_tebas";
      parent::beforeFilter();
   }

   //<editor-fold defaultstate="collapsed" desc="Funciones PROCESO CRUD">

   /**
    * Metodo vista principal del catalogo
    * @return void
    */
   public function main()
   {
      
   }

   /**
    * Metodo que se encarga del proceso de nuevo
    * 
    * @return \CakeResponse
    */
   public function add()
   {
      $this->layout = "ajax";
      $hashMapResponse = array("success" => FALSE, "titulo" => "Atencion!", "msg" => "Ocurrio un error al procesar el formulario.", "cmdaceptar" => __("Aceptar", true));

      if (!empty($this->data))
      {
         $hashMapResponse = $this->Empleado->guardar($this->data);

         return new CakeResponse(array('body' => json_encode($hashMapResponse)));
      }
      
      $empresas = $this->Empleado->Empresa->find('list', array(
                     'fields'=> array('Empresa.razonSocial'), 
                     'conditions' => array('Empresa.activo' => 'true')
      ));
      
      $Sucursales = $this->Empleado->Sucursal->find('list', array(
                     'fields'=> array('Sucursal.titulo'), 
                     'conditions' => array('Sucursal.activo' => 'true')
      ));
      
      $this->set("departamentos", array('4' => 'Departamento1', '2' => 'Departamento2'));
      $this->set('empresas', $empresas);
      $this->set('sucursales', $Sucursales);
      $this->set('paises', $this->Empleado->getPaises());
   }

   /**
    * 
    * @param int $id Identificador de la empresa
    * @return \CakeResponse
    */
   public function edit($id = NULL)
   {
      $this->layout = "ajax";
      $hashMapResponse = array("success" => FALSE, "titulo" => "Atencion!", "msg" => "Ocurrio un error al procesar el formulario.", "cmdaceptar" => __("Aceptar", true));
      
      if (!empty($this->data))
      {  
         $hashMapResponse = $this->Empleado->guardar($this->data);
         return new CakeResponse(array('body' => json_encode($hashMapResponse)));
      }
      else
      {
         if ($this->Empleado->exists(array("Empleado.id" => $id)))
         {
            $this->data = $this->Empleado->find("first", array("conditions" => array("Empleado.id" => $id), "recursive" => -1));
            
            $this->set("departamentos", array('4' => 'Departamento1', '2' => 'Departamento2'));
            $this->set('estados', $this->getEstados($this->data['Empleado']['gralPaisId'], FALSE));
            $this->set('municipios', $this->getMunicipios($this->data['Empleado']['gralPaisId'], $this->data['Empleado']['gralEstadoId'], FALSE));
         }
         else
         {
            $this->redirect(array("controler" => "app", "action" => "error/Ocurrio un error al procesar la peticion."));
         }
      }

      $this->set('paises', $this->Empleado->getPaises());
   }

   public function view($id = NULL)
   {
      $this->layout = "ajax";
      if ($this->Empleado->exists(array("Empleado.id" => $id)))
      {
         $this->data = $this->Empleado->find("first", array("conditions" => array("Empleado.id" => $id), "recursive" => -1));
         $this->set("departamentos", array('4' => 'Departamento1', '2' => 'Departamento2'));
         $this->set('estados', $this->getEstados($this->data['Empleado']['gralPaisId'], FALSE));
         $this->set('municipios', $this->getMunicipios($this->data['Empleado']['gralPaisId'], $this->data['Empleado']['gralEstadoId'], FALSE));
      }
      else
      {
         $this->redirect(array("controler" => "app", "action" => "error/Ocurrio un error al procesar la peticion."));
      }
      
      $this->set('paises', $this->Empleado->getPaises());
   }

   public function deleted($id = NULL)
   {
      $this->layout = "ajax";
      if (!empty($this->data))
      {  
         $hashMapResponse = $this->Empleado->borradoLogico($this->data['Empleado']['id']);
         return new CakeResponse(array('body' => json_encode($hashMapResponse)));
      }
      else
      {
         if ($this->Empleado->exists(array("Empleado.id" => $id)))
         {
            $this->data = $this->Empleado->find("first", array("conditions" => array("Empleado.id" => $id), "recursive" => -1));
            $this->set("departamentos", array('4' => 'Departamento1', '2' => 'Departamento2'));
            $this->set('estados', $this->getEstados($this->data['Empleado']['gralPaisId'], FALSE));
            $this->set('municipios', $this->getMunicipios($this->data['Empleado']['gralPaisId'], $this->data['Empleado']['gralEstadoId'], FALSE));
         }
         else
         {
            $this->redirect(array("controler" => "app", "action" => "error/Ocurrio un error al procesar la peticion."));
         }
      }
      
      $this->set('paises', $this->Empleado->getPaises());
   }

   //</editor-fold>
   
   //<editor-fold defaultstate="collapsed" desc="Funciones PROCESO GRID">

   public function listarRegistros()
   {
      $this->layout = "ajax";
      $hashMapResponse = $this->Empleado->listarRegistros($this->data);

      return new CakeResponse(array('body' => json_encode($hashMapResponse)));
   }

   //</editor-fold>
   
   public function getEstados($paisId, $isAjax = true)
   {
      $hashMapResponse = $this->Empleado->getEstados($paisId);
      if ($isAjax)
      {
         $this->layout = "ajax";
         return new CakeResponse(array('body' => json_encode($hashMapResponse)));
      }
      else
      {
         return $hashMapResponse;
      }
   }

   public function getMunicipios($paisId, $estadoId, $isAjax = true)
   {
      $hashMapResponse = $this->Empleado->getMunicipios($paisId, $estadoId);
      if ($isAjax)
      {
         $this->layout = "ajax";
         return new CakeResponse(array('body' => json_encode($hashMapResponse)));
      }
      else
      {
         return $hashMapResponse;
      }
   }
	
}

?>
