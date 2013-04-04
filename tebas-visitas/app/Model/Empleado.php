<?php

/**
 * Description of Empleado
 *
 * @author GussJQ
 */
class Empleado extends AppModel {

   // Nombre como se accedera desde el controller
   public $name = 'Empleado';
   // Nombre de la tabla a utilizar
   public $useTable = 'gralempleados';
   //relaciones muchos a uno
   public $belongsTo = array(
                  'Empresa' => array(
                                 'className' => 'Empresa',
                                 'foreignKey' => 'gralEmpresaId'
                  ),
                  'Sucursal' => array(
                                 'className' => 'Sucursal',
                                 'foreignKey' => 'gralSucursalId'
                  ),
                  'Departamento' => array(
                                 'className' => 'Departamento',
                                 'foreignKey' => 'gralDepartamentoId'
                  ),
//                  'TipoEmpleado' => array(
//                                 'className' => 'TipoEmpleado',
//                                 'foreignKey' => 'tiposEmpleadoId'
//                  )
   );
   // validaciones del formulario
   public $validate = array(
                  'nombre' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Nombre no es valido!'
                  )),
                  'apellidoPaterno' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Apellido Paterno no valido!'
                  )),
                  'apellidoMaterno' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Apellido Materno no valido!'
                  )),
                  'curp' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Curp no valido!'
                  )),
                  'calle' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Calle no valida!'
                  )),
                  'numInterior' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Numero Interior no valido!'
                  )),
                  'numeExterior' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Numero Exterior no valido!'
                  )),
                  'Colonia' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Colonia no valida!'
                  )),
                  'gralMunicipioId' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Municipio no valido!'
                  )),
                  'gralEstadoId' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Estado no valido!'
                  )),
                  'gralPaisId' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Pais no valido!'
                  )),
                  'gralDepartamentoId' => array(
                                 'notEmpty' => array(
                                                'rule' => 'notEmpty',
                                                'required' => true,
                                                'message' => 'Departamento no valido!'
                  ))
   );

   /**
    * Metodo que se usara para el paginado 
    * @param type $params 
    */
   public function listarRegistros($params)
   {
      $hashMapResponse = array();
      $conditions = array('Empleado.activo' => true);
      $segmentoPaginadoTrabajado = array();
      $order = $_POST['campo'] . ' ' . $_POST['order'];

      $segmentoPaginado = $this->find("all", array("conditions" => $conditions, "limit" => $_POST['limit'], "page" => $_POST['offset'], "order" => $order, "recursive" => 1, "fields" => array("Empleado.id", "Empleado.nombre", "Empleado.apellidoPaterno", "Empleado.apellidoMaterno", "Empleado.curp", "Empleado.telefono")));

      if (!empty($segmentoPaginado))
      {
         foreach ($segmentoPaginado as $data)
         {
            array_push($segmentoPaginadoTrabajado, array(
                           'id' => $data['Empleado']['id']
                           , 'nombre' => $data['Empleado']['nombre']
                           , 'apellidoPaterno' => $data['Empleado']['apellidoPaterno']
                           , 'apellidoMaterno' => $data['Empleado']['apellidoMaterno']
                           , 'curp' => $data['Empleado']['curp']
                           , 'telefono' => $data['Empleado']['telefono']
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
   
    public function getPaises()
   {
      $hashMapResponse = array();
      foreach ($this->query('SELECT id, titulo FROM "gralpaises";') as $value)
      {
         $hashMapResponse[$value[0]['id']] = $value[0]['titulo'];
      }

      return $hashMapResponse;
   }

   public function getEstados($paisId)
   {
      $hashMapResponse = array();
      foreach ($this->query('SELECT id, titulo FROM "gralestados"  where "gralPaisId" = ' . $paisId . ';') as $value)
      {
         $hashMapResponse[$value[0]['id']] = $value[0]['titulo'];
      }

      return $hashMapResponse;
   }

   public function getMunicipios($paisId, $estadoId)
   {
      $hashMapResponse = array();
      foreach ($this->query('SELECT id, titulo FROM "gralmunicipios"  where "gralPaisId" = ' . $paisId . ' AND "gralEstadoId" = ' . $estadoId . ';') as $value)
      {
         $hashMapResponse[$value[0]['id']] = $value[0]['titulo'];
      }

      return $hashMapResponse;
   }

}

?>
