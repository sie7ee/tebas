$(document).ready(function(){
      
      function raund(a,b) {
            return Math.round(Math.random()*(b-a)+a);
      }
      var base_url = document.location.protocol + '//' + document.location.host + $("#hd_url_proyect").val();
      //var permits = utils_library.security.load_permits(base_url + 'admin_catalogs/employees/fn_load_permits'); // se cargan los permisos
	  

      $("#catalog-table").jcatalogTable({
            title: 'Empleados',
            paginate:{
                  order: 'DESC',
                  campo: 'Sucursal.id',
                  limit: 10,
                  offset: 0,
                  cbox_pagination:true
            },
            actions: {
                  listAction: base_url + 'Empleados/listarRegistros'
            },
            
            buttons:{
                  add:{
                        title: 'Nuevo',
                        fn:function(obj_click, obj_plugin){
                              crudLibrary.add(base_url+"Empleados/add/"+raund(1,90000));
                        },
                        permit: true
                  }
            },

            fields: {
                  nombre:{
                        title: 'Nombre',
                        width: '20%',
                        sortable: true,
                        pivot: true,
                        pivot_title: 'Empleados.nombre'
                  },    
                  apellidoPaterno:{
                        title: 'Apellido Paterno',
                        width: '20%',
                        sortable: true,
                        pivot: true,
                        pivot_title: 'Empleado.apellidoPaterno'
                  },
                  apellidoMaterno:{
                        title: 'Apellido Materno',
                        width: '20%',
                        sortable: true,
                        pivot: true,
                        pivot_title: 'Empleado.apellidoMaterno'
                  },
                  telefono:{
                        title: 'Telefono',
                        width: '20%',
                        sortable: true,
                        pivot: true,
                        pivot_title: 'Empleado.telefono'
                  },
                  actionsRows:{
                        title: 'Acciones',
                        width: '20%'
                  }
            },
            
            actionsRows:{
                  
                  view:{
                        title:'Ver',
                        fn: function(data){
                              crudLibrary.view(base_url+"Empleados/view/"+ data.id + "/" + raund(1,90000));
                        },
                        permit: true
                  },
                  edit:{
                        title:'Editar',
                        fn: function(data){
                              crudLibrary.edit(base_url+"Empleados/edit/"+ data.id + "/" + raund(1,90000));
                        },
                        permit: true
                  },
                  
                  deleted:{
                        title:'Eliminar',
                        fn: function(data){
                              crudLibrary.deleted(base_url+"Empleados/deleted/"+ data.id + "/" + raund(1,90000));
                        },
                        permit: true
                  }
            }
      });
      
      $("#catalog-table").jcatalogTable('load');
});