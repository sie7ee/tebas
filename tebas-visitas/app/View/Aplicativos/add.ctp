<h3 class="ui-widget-header"><?php echo __("Nuevo Aplicativo",true); ?></h3>
<div id="tabs">

   <ul>
      <li><a href="#tab-1">General</a></li>
   </ul>
   
   <?php echo $this->Form->create("Aplicativo", array('action' => 'add', 'type' => 'file', 'onkeypress' => 'return event.keyCode!=13', 'id' => 'Form00', 'class' => 'form-horizontal')); ?>
   
   <div id="tab-1">
     
      <fieldset>
         <legend>Datos Generales</legend>
         <div class="row-fluid">
            
            <div class="control-group">
               <label class="control-label" for="titulo"><?php echo __("Titulo *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('titulo', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="titulo" class="label label-important"></span>
               </div>
            </div>
            
            <div class="control-group">
               <label class="control-label" for="nombreSistema"><?php echo __("Nombre Sistema *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('nombreSistema', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="nombreSistema" class="label label-important"></span>
               </div>
            </div>
            
            <div class="control-group">
               <label class="control-label" for="padre"><?php echo __("Es padre *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('padre', array('label' => FALSE, 'type' => 'checkbox', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="padre" class="label label-important"></span>
               </div>
            </div>
            
            <div class="control-group">
               <label class="control-label" for="padreId"><?php echo __("Padre *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->select('padreId', $aplicativos, array('class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="padreId" class="label label-important"></span>
               </div>
            </div>
            
            <div class="control-group">
               <label class="control-label" for="icono"><?php echo __("Icono *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('imgicono', array('label' => FALSE, 'type' => 'text', 'type' => 'file', 'maxlength' => '50', 'id' => 'fax', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="icono" class="label label-important"></span>
               </div>
            </div>
            
            <div class="control-group">
               <label class="control-label" for="urlGo"><?php echo __("Url *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('urlGo', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="urlGo" class="label label-important"></span>
               </div>
            </div>
            
            <div class="control-group">
               <label class="control-label" for="ordenacion"><?php echo __("Ordenacion *", true); ?></label>
               <div class="controls">
                  <?php echo $this->Form->input('ordenacion', array('label' => FALSE, 'type' => 'text', 'maxlength' => '50', 'id' => 'titulo', 'class' => 'input-large')); ?>
                  <span id="sp_error" style="display:none;" name="ordenacion" class="label label-important"></span>
               </div>
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

<script type="text/javascript" src="/js/implementaciones/sucursales/add.js"></script>