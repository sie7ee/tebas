<h3 class="ui-widget-header"><?php echo __("Nuevo Empleado", true); ?></h3>


<div id="tabs">

   <ul>
      <li><a href="#tab-1">General</a></li>
      <li><a href="#tab-2">Administrador</a></li>
   </ul>

   <?php echo $this->Form->create("Empleado", array('action' => 'add', 'type' => 'file', 'onkeypress' => 'return event.keyCode!=13', 'id' => 'Form00', 'class' => 'form-horizontal')); ?>
   <div id="tab-1">

      <fieldset>
         <legend>Datos Generales</legend>
         <div class="row-fluid">

            <div class="control-group">
               <label class="control-label" for="nombre"><?php echo __("Nombre *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('nombre', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="nombre" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="apellidoPaterno"><?php echo __("Apellido Paterno *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('apellidoPaterno', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="apellidoPaterno" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="apellidoMaterno"><?php echo __("Apellido Materno *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('apellidoMaterno', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="apellidoPaterno" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="curp"><?php echo __("Curp *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('curp', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="curp" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="email"><?php echo __("Email *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('email', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="curp" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="telefono"><?php echo __("Telefono *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('telefono', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="telefono" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="gralDepartamentoId"><?php echo __("Departamento *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->select('gralDepartamentoId', $departamentos, array('class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="gralDepartamentoId" class="label label-important"></span>
               </div>
            </div>

         </div>
      </fieldset>

      <fieldset>
         <legend>Ubicaci&oacute;n</legend>

         <div class="row-fluid">
            <div class="control-group">
               <label class="control-label" for="Colonia"><?php echo __("Colonia *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('Colonia', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="Colonia" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="calle"><?php echo __("Calle *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('calle', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="calle" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="numInterior"><?php echo __("Num Interior *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('numInterior', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="numInterior" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="numeExterior"><?php echo __("Num Exterior *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('numeExterior', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="numeExterior" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="gralPaisId"><?php echo __("Pais *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->select('gralPaisId', $paises, array('class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="gralPaisId" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="gralEstadoId"><?php echo __("Estado *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->select('gralEstadoId', array(), array('class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="gralEstadoId" class="label label-important"></span>
               </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="gralMunicipioId"><?php echo __("Municipio *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->select('gralMunicipioId', array(), array('class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="gralMunicipioId" class="label label-important"></span>
               </div>
            </div>

         </div>

      </fieldset>

   </div>

   <div id="tab-2">
      <fieldset>
         <legend>Configurar</legend>
         <div class="control-group">
            <label class="control-label" for="gralPaisId"><?php echo __("Empresa *", true); ?></label>
            <div class="controls">
               <?php echo $this->Form->select('gralPaisId', $empresas, array('class' => 'input-large')); ?>
               <span id="sp_error" style="display:none;" name="gralPaisId" class="label label-important"></span>
            </div>
         </div>
            
         <div class="control-group">
            <label class="control-label" for="gralEstadoId"><?php echo __("Sucursal *", true); ?></label>
            <div class="controls">
               <?php echo $this->Form->select('gralEstadoId', $sucursales, array('class' => 'input-large')); ?>
               <span id="sp_error" style="display:none;" name="gralEstadoId" class="label label-important"></span>
            </div>
         </div>
      </fieldset>
   </div>

   <!--  Botones de acciones -->
   <div class="control-group">
      <div id="acciones" class="controls">
         <?php echo$this->Form->button(__('Cancelar', true), array('type' => 'button', 'id' => 'cancelar', 'class' => 'btn btn-second ')); ?>
         <?php echo$this->Form->button(__('Guardar', true), array('type' => 'submit', 'id' => 'guardar', 'class' => 'btn btn-primary')); ?>
      </div>
   </div>

   <?php echo $this->Form->end(); ?>

</div>

<script type="text/javascript" src="/js/implementaciones/empleados/add.js"></script>