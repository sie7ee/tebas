<?php

class DepartamentosController extends AppController {

    public $helpers = array('Html', 'Form', 'Js');
    public $name = 'Departamentos';
    public $uses = array('Departamento');
    public $components = array('RequestHandler');

    function beforeFilter() {
        $this->layout = "default_tebas";
        parent::beforeFilter();
    }

    public function main() {
        
    }

    public function listarRegistros() {
        $this->layout = "ajax";
        $hashMapResponse = $this->Departamento->listarRegistros($this->data);
        return new CakeResponse(array('body' => json_encode($hashMapResponse)));
    }

    public function add() {
        $this->layout = "ajax";
        $hashMapResponse = array("success" => FALSE, "titulo" => "Atencion!", "msg" => "Ocurrio un error al procesar el formulario.", "cmdaceptar" => __("Aceptar", true));

        if (!empty($this->data)) {

            $data = array('Departamento');
            $data['Departamento']['nombre'] = $this->data['Departamento']['nombre'];
            $data['Departamento']['gralEmpresaId'] = $this->data['Departamento']['gralEmpresaId'];
            $data['Departamento']['gralSucursalId'] = $this->data['Departamento']['gralSucursalId'];
            $data['Departamento']['usuarioIdCreated'] = 1;

            $hashMapResponse = $this->Departamento->guardar($data);
            return new CakeResponse(array('body' => json_encode($hashMapResponse)));
        }

        $empresas = $this->Departamento->Empresa->find('list', array(
            'fields' => array('Empresa.razonSocial'),
            'conditions' => array('Empresa.activo' => 'true')
        ));

        $this->set("empresas", $empresas);
    }

    public function edit($id = NULL) {
        $this->layout = "ajax";
        if (!empty($this->data)) {
            $data = array('Departamento');
            //print_r($this->data);exit();
            $data['Departamento']['id'] = $this->data['Departamento']['id'];
            $data['Departamento']['nombre'] = $this->data['Departamento']['nombre'];
            $data['Departamento']['gralEmpresaId'] = $this->data['Departamento']['gralEmpresaId'];
            $data['Departamento']['gralSucursalId'] = $this->data['Departamento']['gralSucursalId'];
            $data['Departamento']['usuarioIdModified'] = 1;

            $hashMapResponse = $this->Departamento->guardar($data);
            return new CakeResponse(array('body' => json_encode($hashMapResponse)));
        } else {

            if ($this->Departamento->exists(array("Departamento.id" => $id))) {
                $detalle=$this->getDetalle($id);
                $this->set("empresas", $detalle['empresas']);
                $this->set("sucursales", $detalle['sucursales']);
                $this->data=$detalle['datos'];
            } else {
                $this->redirect(array("controler" => "app", "action" => "error/Ocurrio un error al procesar la peticion."));
            }
        }
    }

    public function view($id = NULL) {
        $this->layout = "ajax";

        if ($this->Departamento->exists(array("Departamento.id" => $id))) {
                $detalle=$this->getDetalle($id);
                $this->set("empresas", $detalle['empresas']);
                $this->set("sucursales", $detalle['sucursales']);
                $this->data=$detalle['datos'];
        } else {
            $this->redirect(array("controler" => "app", "action" => "error/Ocurrio un error al procesar la peticion."));
        }
    }

    public function deleted($id = NULL) {
        $this->layout = "ajax";
        if (!empty($this->data)) {
            
            $hashMapResponse = $this->Departamento->borradoLogico($this->data['Departamento']['id']);
            return new CakeResponse(array('body' => json_encode($hashMapResponse)));
        } else {
            if ($this->Departamento->exists(array("Departamento.id" => $id))) {
                $detalle=$this->getDetalle($id);
                $this->set("empresas", $detalle['empresas']);
                $this->set("sucursales", $detalle['sucursales']);
                $this->data=$detalle['datos'];
            } else {
                $this->redirect(array("controler" => "app", "action" => "error/Ocurrio un error al procesar la peticion."));
            }
        }
    }

    public function getSucursales($empresaId = 0, $isAjax = true) {
        $hashMapResponse = $this->Departamento->getSucursales($empresaId);
        if ($isAjax) {
            $this->layout = "ajax";
            return new CakeResponse(array('body' => json_encode($hashMapResponse)));
        } else {
            return $hashMapResponse;
        }
    }

    public function getDetalle($id = 0) {
        $data = $this->Departamento->find("first", array("conditions" => array("Departamento.id" => $id), "recursive" => -1));

        $arr = array('Departamento');
        $arr['Departamento']['id'] = $data['Departamento']['id'];
        $arr['Departamento']['nombre'] = $data['Departamento']['nombre'];
        $arr['Departamento']['gralEmpresaId'] = $data['Departamento']['gralEmpresaId'];
        $arr['Departamento']['gralSucursalId'] = $data['Departamento']['gralSucursalId'];
        //$arr;
        
        //print_r($this->data);
        $empresas = $this->Departamento->Empresa->find('list', array(
            'fields' => array('Empresa.razonSocial'),
            'conditions' => array('Empresa.activo' => 'true', 'Empresa.id' => $arr['Departamento']['gralEmpresaId'])
        ));
        $sucursales = $this->Departamento->Sucursal->find('list', array(
            'fields' => array('Sucursal.titulo'),
            'conditions' => array('Sucursal.activo' => 'true', 'Sucursal.id' => $arr['Departamento']['gralSucursalId'])
        ));
        
        $retorno['empresas']=$empresas;
        $retorno['sucursales']=$sucursales;
        $retorno['datos']=$arr;
        return $retorno;
        //$this->set("empresas", $empresas);
        //$this->set("sucursales", $sucursales);
    }

}

?>
