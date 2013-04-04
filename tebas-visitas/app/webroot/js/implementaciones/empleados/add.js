$(document).ready(function(){
      
      $('#tabs').tabs();
      
      var base_url = document.location.protocol + '//' + document.location.host + $("#hd_url_proyect").val();
      var paises = $('#tabs').find('form#Form00').find('.control-group').find('.controls').find('select#EmpleadoGralPaisId');
      var estados = $('#tabs').find('form#Form00').find('.control-group').find('.controls').find('select#EmpleadoGralEstadoId');
      var municipios = $('#tabs').find('form#Form00').find('.control-group').find('.controls').find('select#EmpleadoGralMunicipioId');
      
      var loadCbox = function(url, item){
            $.ajax({
                  url: url,
                  dataType:"JSON",
                  type:"POST",
                  async:false,
                  success:function(request){  
                        $('<option></option>').val('').text('-Seleccione-').appendTo(item);
                        $.each(request, function(key, value){
                              $('<option></option>').val(key).text(value).appendTo(item);
                        });
                  }
            });
      }
      
      paises.change(function(){
            estados.empty();
            municipios.empty();
            loadCbox(base_url + 'empleados/getEstados/' + ($(this).val()), estados);
      });
      
      estados.change(function(){
            municipios.empty();
            loadCbox(base_url + 'empleados/getMunicipios/' + (paises.val()) + '/' + ($(this).val()) + '/', municipios);
      });
});