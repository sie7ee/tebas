<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aplicativo
 *
 * @author GussJQ
 */
class Accione extends AppModel {
   
   // Nombre como se accedera desde el controller
   public $name = 'Accione';
   // Nombre de la tabla a utilizar
   public $useTable = 'sysadmacciones';
   // relaciones 
   public $belongsTo = array(
                  'Aplicativo' => array(
                                 'className' => 'Aplicativo',
                                 'foreignKey' => 'sysAdmAplicativoId'
                  )
   );
   
}

?>
