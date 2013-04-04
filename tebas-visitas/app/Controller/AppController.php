<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

   var $components = array('RequestHandler', 'Session');

   function beforeFilter()
   {
      $this->RequestHandler->accepts(array('json'));  /*
        $this->loadModel("Aco");
        if($this->Aco->__permitir_accion($this->params['controller'],$this->params['action'],'0')):
        $aco_id=$this->Aco->get_aco_id($this->params['controller'],$this->params['action']);
        $this->__validar_acceso($aco_id);
        endif; */
      $this->set("url_proyect", $this->webroot); /**/
      $usuario = $this->Session->read("usuario");
      if (!empty($usuario)):
         $this->loadModel("Usuario");
         $this->set("usuario_info", $this->Usuario->find("first", array("conditions" => array("Usuario.id" => $usuario['id']), "fields" => array("Usuario.nombre", "Perfile.descripcion", "Usuario.estatus"))));
      endif;
      
      /*mandamos los datos necesarios para cargar la unformacion del usuario dentro del template */
      $this->set('nombreUsuario', $this->getNombreUsuario());
      $this->set('roleUsuario', $this->getRoleUsuario());
      $this->set('empresaUsuario', $this->getEmpresaUsuario());
      $this->set('sucursalUsuario', $this->getSucursalUsuario());
   }

   function error($msg = "")
   {
      $this->set("msg", $msg);
      $this->render('/elements/error');
      $this->setDebugMode();
   }

   function setDebugMode($mode = 0)
   {
      Configure::write("debug", $mode);
   }

   function __validar_acceso($aco_id)
   {
      if ($this->Session->check("usuario")):
         $this->loadModel("Permiso");
         ##si la session existe validamos el acceso del usuario
         $usuario = $this->Session->read("usuario");
         $result = $this->Permiso->__tiene_acceso($usuario['perfil_id'], $aco_id);
         if (!$result):
            $this->redirect(array('controller' => 'usuarios', 'action' => 'acceso_denegado/'));
         endif;
      else:
         ##si la session no existe mandamos al usuario a la pantalla de login
         $this->redirect(array('controller' => 'usuarios', 'action' => 'login_form'));
      endif;
   }

   // Datos del usuario
   public  function getEmpleadoIdUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['roleId'];
      }
      else
      {
         return '';
      }
   }
   
   public function getNombreUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['empleadoNombre'] . ' ' . $usuario['empleadoApellidoPaterno'] . ' ' . $usuario['empleadoApellidoMaterno'];
      }
      else
      {
         return '';
      }
   }
   
   public  function getRoleIdUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['roleId'];
      }
      else
      {
         return '';
      }
   }

   public function getRoleUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['roleTitulo'];
      }
      else
      {
         return '';
      }
   }
   
   public  function getEmpresaIdUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['empresaId'];
      }
      else
      {
         return '';
      }
   }
   
   public function getEmpresaUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['empresaTitulo'];
      }
      else
      {
         return '';
      }
   }
   
   public  function getSucursalIdUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['empresaId'];
      }
      else
      {
         return '';
      }
   }
   
   public function getSucursalUsuario()
   {
      if ($this->Session->check("user_tebas"))
      {
         $usuario = $this->Session->read("user_tebas");
         return $usuario['sucursalTitulo'];
      }
      else
      {
         return '';
      }
   }
}
