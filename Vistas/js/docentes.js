/*=============================================
=       SUBIENDO LA FOTO DEL DOCENTE          =
=============================================*/
$(".imagenIn").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".verImagen").attr("src", rutaImagen);

  		})

  	}
})

/*======================================
=             EDITAR DOCENTE           =
======================================*/
$(".btnEditarDocente").click(function() {
	
	var idDocente = $(this).attr("idDocente");
	// console.log("idDocente", idDocente);	

	var datos = new FormData();
	datos.append("idDocente", idDocente);

	$.ajax({

		url:"ajax/docentes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log("respuesta", respuesta);

			$("#idDocente").val(respuesta["id"]);
			$("#dniDocente").val(respuesta["dni"]);
			$("#apellidosDocente").val(respuesta["apellidos"]);
			$("#nombresDocente").val(respuesta["nombres"]);
			$("#direccionDocente").val(respuesta["direccion"]);
			$("#telefonoDocente").val(respuesta["telefono"]);
			$("#emailDocente").val(respuesta["email"]);
			$("#imagenDocente").val(respuesta["foto"]);

			if (respuesta["foto"] != "") {
				$(".verImagen").attr("src",respuesta["foto"]);
			}else{
				$(".verImagen").attr("src","vistas/img/users/anonymous.png");
			}
			

		}

	})

})

/*======================================
=           VER INFO DOCENTE           =
======================================*/
$(".btnVerInfoDocente").click(function() {
	
	var idDocenteVer = $(this).attr("idDocenteVer");
	// console.log("idDocenteVer", idDocenteVer);	

	var datos = new FormData();
	datos.append("idDocenteVer", idDocenteVer);

	$.ajax({

		url:"ajax/docentes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log(respuesta); //||!empty(respuesta["foto"])
			
			if (respuesta["foto"] != "") {
				if (respuesta["foto"] !== "") {
					$("#fotoDocente").attr("src",respuesta["foto"]);					
				}
			}else{
				$("#fotoDocente").attr("src","Vistas/img/users/anonymous.png");				
			}
			$("#documentoDocenteVer").html(respuesta["dni"]);
			$("#apellidosDocenteVer").html(respuesta["apellidos"]);
			$("#nombresDocenteVer").html(respuesta["nombres"]);
			$("#direccionDocenteVer").html(respuesta["direccion"]);
			$("#telefonoDocenteVer").html(respuesta["telefono"]);
			$("#emailDocenteVer").html(respuesta["email"]);
			$("#registroDocenteVer").html(respuesta["fecha_registro"]);

			var idAula = respuesta["aula_asignada"];
			
			var dati = new FormData();
			dati.append("idAula", idAula);
			
			$.ajax({
				url:"ajax/alumnos.ajax.php",
				method: "POST",
				data: dati,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(response){			
					// console.log(response);
					if(response == "")
					{
						$("#aulaDocenteVer").html("Sin aula asignada");
					}else{
						$("#aulaDocenteVer").html(response[0]["nombres"]);
					}
				}
			});

			$("#emailDocenteVer").html(respuesta["email"]);		
			$("#registroDocenteVer").html(respuesta["fecha_registro"]);		

		}

	})

})

/*========================================
=             IR A ALUMNOS               =
========================================*/
$(document).on("click", ".verAlumnos", function(){

	var idAula = $(this).attr("idAula");

	window.location = "index.php?url=alumnosaula&idAula="+idAula;

})

/*======================================
=        EDITAR AULA DOCENTE           =
======================================*/
$(".btnEditarAula").click(function() {
	
	var idDocente = $(this).attr("idDocenteAula");

	var datos = new FormData();
	datos.append("idDocente", idDocente);

	$.ajax({

		url:"ajax/docentes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){		
			console.log(respuesta);
			$("#nombreDocenteEdit").html(respuesta["nombres"] + " " + respuesta["apellidos"]);
			$("#idDocenteEdit").val(respuesta["id"]);

			if (respuesta["aula_asignada"] != null) 
			{
				var idAula = respuesta["aula_asignada"];

				var datos = new FormData();
				datos.append("idAula", idAula);

				$.ajax({

					url:"ajax/alumnos.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(response){			
						console.log("response", response);

						$("#aulaAntesdocente").html(response[0]["nombres"]);
						$("#aulaAntesdocente").val(response[0]["id"]);	

					}

				})
			}else{
				$("#aulaAntesdocente").html("Selccionar aula...");
				$("#aulaAntesdocente").attr({readonly:true,selected:true});
			}		

		}

	})

})