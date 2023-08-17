/*=============================================
=       SUBIENDO LA FOTO DEL ALUMNO           =
=============================================*/
$(".ImgUser").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".ImgUser").val("");

  		 /*swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });*/

  	}else if(imagen["size"] > 2000000){

  		$(".ImgUser").val("");

  		 /*swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });*/

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".verImagenUser").attr("src", rutaImagen);

  		})

  	}
})

/*======================================
=            EDITAR USUARIO            =
======================================*/
$(".btnEditarUsuario").click(function() {
	
	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({

		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log("respuesta", respuesta);

			$("#id").val(respuesta["id"]);
			$("#apellidosE").val(respuesta["apellidos"]);
			$("#nombresE").val(respuesta["nombres"]);
			$("#dniE").val(respuesta["dni"]);
			$("#direccionE").val(respuesta["direccion"]);
			$("#telefonoE").val(respuesta["telefono"]);
			$("#rolE").val(respuesta["rol"]);			
			$("#usuarioE").val(respuesta["usuario"]);
			$("#claveActual").val(respuesta["clave"]);
			$("#imagenUser").val(respuesta["foto"]);		

			if(respuesta["foto"] == null || respuesta["foto"] == "")
			{
				$(".verImagenUser").attr("src","Vistas/img/users/anonymous.png");
			}else{
				$(".verImagenUser").attr("src",respuesta["foto"]);						
			}

		}

	})

})

/*=============================================
ELIMINAR USUARIO
=============================================*/
$(document).on("click", ".btnEliminarUsuario", function(){
	
  var idUsuario = $(this).attr("idUsuario");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?url=usuarios&idUsuario="+idUsuario;

    }

  })

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(document).on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();
 	datos.append("activarId", idUsuario);
  	datos.append("activarUsuario", estadoUsuario);

  	$.ajax({

	  url:"ajax/usuarios.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      	if(window.matchMedia("(max-width:767px)").matches){
		
      		 swal({
		      	title: "El usuario ha sido actualizado",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then((result) => {
					  if (result.value) {
					    
					  	window.location = "usuarios";

					  }
				})

		}
		
      }

  	})

  	if(estadoUsuario == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoUsuario',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoUsuario',0);

  	}

})