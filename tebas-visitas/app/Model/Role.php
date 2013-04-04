<?php

/**
 * Description of Role
 *
 * @author GussJQ
 */
class Role extends AppModel {
   
   // Nombre como se accedera desde el controller
   public $name = 'Role';
   // Nombre de la tabla a utilizar
   public $useTable = 'sysadmroles';
   //relaciones muchos a uno
   public $belongsTo = array(
                  'Empresa' => array(
                                 'className' => 'Empresa',
                                 'foreignKey' => 'gralEmpresaId'
                  ),
                  
                  'Sucursal' => array(
                                 'className' => 'Sucursal',
                                 'foreignKey' => 'gralSucursalId'
                  )
   );
   
   public $validate = array(
                  'titulo' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Titulo no es valido!'
                  )),
                  'gralEmpresaId' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Empresa no valida!'
                  )),
   );
   
   /**
    * Metodo que se usara para el paginado 
    * @param type $params 
    */
   public function listarRegistros($params)
   {
      $hashMapResponse = array();
      $conditions = array('Role.activo' => 'true');
      $segmentoPaginadoTrabajado = array();
      $order = $_POST['campo'] . ' ' . $_POST['order'];

      $segmentoPaginado = $this->find("all", array("conditions" => $conditions, "limit" => $_POST['limit'], "page" => $_POST['offset'], "order" => $order, "recursive" => 1, "fields" => array("Role.id", "Role.titulo", "Role.created", "Empresa.razonSocial")));

      if (!empty($segmentoPaginado))
      {
         foreach ($segmentoPaginado as $data)
         {
            array_push($segmentoPaginadoTrabajado, array(
                           'id' => $data['Role']['id']
                           , 'titulo' => $data['Role']['titulo']
                           , 'razonSocial' => $data['Empresa']['razonSocial']
                           , 'created' => $data['Role']['created']
            ));
         }

         $hashMapResponse['success'] = true;
         $hashMapResponse['data'] = $segmentoPaginadoTrabajado;
         $hashMapResponse['msg'] = __("Datos recuperados ok.", true);
         $hashMapResponse['total_rows'] = $this->find('count');
         $hashMapResponse['total_rows_search'] = $this->find('count', array('conditions' => $conditions));
      }
      else
      {
         $hashMapResponse['success'] = false;
         $hashMapResponse['data'] = array();
         $hashMapResponse['msg'] = __("Ocurrio un error al recuperar los datos!", true);
         $hashMapResponse['total_rows'] = "0";
         $hashMapResponse['total_rows_search'] = "0";
      }

      return $hashMapResponse;
   }
}

?>
