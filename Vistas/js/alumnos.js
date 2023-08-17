/*=============================================
=       SUBIENDO LA FOTO DEL ALUMNO           =
=============================================*/
$(".imagenIng").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".imagenIng").val("");

  		 /*swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });*/

  	}else if(imagen["size"] > 2000000){

  		$(".imagenIng").val("");

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

  			$(".verImagenAlumno").attr("src", rutaImagen);

  		})

  	}
})

/*=============================================
=     RESETEANDO LA INFO DE UN MODAL          =
=============================================*/
$('#crearAlumno').on('hidden.bs.modal', function(){ 
	$(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
	$("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
});

/*======================================
=             EDITAR ALUMNO            =
======================================*/
$(".btnEditarAlumno").click(function() {
// $(document).on("click", ".btnEditarAlumno", function(){
	
	var idAlumno = $(this).attr("idAlumno");
    
	var datos = new FormData();
	datos.append("idAlumno", idAlumno);

	$.ajax({

		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log(respuesta);

			$("#idAlumnoEA").val(respuesta[0]["idalumno"]);
			$("#dniEA").val(respuesta[0]["dni"]);
			$("#apellidosEA").val(respuesta[0]["apellidos"]);
			$("#nombresEA").val(respuesta[0]["nombres"]);
			$("#direccionEA").val(respuesta[0]["direccion"]);
			$("#telefonoEA").val(respuesta[0]["telefono"]);
			$("#apoderadoEA").val(respuesta[0]["apoderado"]);
			$("#aulaEA").val(respuesta[0]["aula_asignada"]);
			$("#imagenAlumno").val(respuesta[0]["foto"]);

			if(respuesta[0]["foto"] == null || respuesta[0]["foto"] == "")
			{
				$("#verImagenAlumno").attr("src","Vistas/img/users/anonymous.png");
			}else{
				$(".verImagenAlumno").attr("src",respuesta[0]["foto"]);				
			}

		}

	})

})

/*=============================================
REVISAR SI EL ALUMNO YA ESTÁ REGISTRADO
=============================================*/

$("#dniNuevo").change(function(){

	$(".alert").remove();

	var dniAlumno = $(this).val();

	var datos = new FormData();
	datos.append("validarAlumno", dniAlumno);

	 $.ajax({
	    url:"ajax/alumnos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	//console.log(respuesta);
	    	if(respuesta.length){

	    		$("#dniNuevo").parent().after('<div class="alert alert-warning">Este Alumno ya existe en la base de datos</div>');

	    		$("#dniNuevo").val("");
	    		$("#dniNuevo").focus();;

	    	}

	    }

	})
})

/*======================================
=              EDITAR AULA             =
======================================*/
$(".btnEditarAulaAlumno").click(function() {
// $(document).on("click", ".btnEditarAlumno", function(){
	
	var idAlumnoAula = $(this).attr("idAlumnoAula");
	
	var datos = new FormData();
	datos.append("idAlumnoAula", idAlumnoAula);

	$.ajax({

		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log(respuesta);

			var idAula = respuesta[0]["aula_asignada"];
	
			var datito = new FormData();
			datito.append("idAula", idAula);

			$.ajax({

				url:"ajax/alumnos.ajax.php",
				method: "POST",
				data: datito,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(response){			
					// console.log(response);

					$("#aulaAntes").html(response[0]["nombres"]);
					$("#aulaAntes").val(response[0]["id"]);

				}

			})
			$("#nombreAlumnoEdit").html(respuesta[0]["nombres"] + " " + respuesta[0]["apellidos"]);
			$("#idAlumnoEdit").val(respuesta[0]["idalumno"]);

		}

	})

})

/*======================================
=           VISUALIZAR ALUMNO          =
======================================*/
$(".btnVerAlumno").click(function() {
// $(document).on("click", ".btnEditarAlumno", function(){
	
	var idAlumnoVer = $(this).attr("idAlumnoVer");
	
	var datos = new FormData();
	datos.append("idAlumnoVer", idAlumnoVer);

	$.ajax({

		url:"ajax/alumnos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log(respuesta[0]["foto"]);
			
			if (respuesta[0]["foto"] == null || respuesta[0]["foto"] == "") {
				$("#fotoAlumno").attr("src","Vistas/img/users/anonymous.png");
			}else{
				$("#fotoAlumno").attr("src",respuesta[0]["foto"]);
			}

			$("#documentoAlumno").html(respuesta[0]["dni"]);
			$("#nombreAlumno").html(respuesta[0]["nombres"]);
			$("#apellidosAlumno").html(respuesta[0]["apellidos"]);
			$("#telefonoAlumno").html(respuesta[0]["telefono"]);

			var idAula = respuesta[0]["aula_asignada"];
	
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
				success: function(respuesta){			
					// console.log(respuesta);
					$("#aulaAlumno").html(respuesta[0]["nombres"]);
				}

			})

			// var date = new Date(respuesta[0]["fecha_registro"]);			
			// var fecha_completa = date.getDay()+ "-" +date.getMonth()+ "-" +date.getFullYear();

			$("#apoderadoAlumno").html(respuesta[0]["apoderado"]);
			$("#direccionAlumno").html(respuesta[0]["direccion"]);
			$("#registroAlumno").html(respuesta[0]["fecha_registro"]);

		}

	})

})

/*======================================
=             ESTADO ALUMNO            =
======================================*/
$(".btnStatus").click(function() {
	// $(document).on("click", ".btnEditarAlumno", function(){
		
		var idAlumno = $(this).attr("idAlumnoSt");
		// var idStatus = $(this).attr("idStatus");
		
		var datos = new FormData();
		datos.append("idAlumno", idAlumno);
	
		$.ajax({
	
			url:"ajax/alumnos.ajax.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json",
			success: function(respuesta){			
				// console.log(respuesta);
				$("#idAlumnoStatus").val(respuesta[0]["idalumno"]);

				if (respuesta[0]["estado"] == 2) {					
					$(".pregunta").html("¿Deseas aprobar al alumno?");
					$("#StatusAlumno").val("1");
				}else if (respuesta[0]["estado"] == 1) {
					$(".pregunta").html("¿Deseas desactivar al alumno?");
					$("#StatusAlumno").val("0");
				}else{
					$(".pregunta").html("¿Deseas volver a activar al alumno?");
					$("#StatusAlumno").val("1");
				}
	
			}
	
		})
	
})

/*========================================
VER PERFIL DEL ALUMNO
========================================*/
// $(document).on("click", ".btnVerPerfilAlumno", function(){
$(".btnVerPerfilAlumno").click(function() {
	var idAlumnoPefilVer = $(this).attr("idAlumnoPefilVer");

	window.location = "index.php?url=perfilalumno&idAlumnoPefilVer="+idAlumnoPefilVer;

})

/*========================================
=            IMPRIMIR FACTURA            =
========================================*/
$(document).on("click", ".btnImprimirComprobante", function(){


	var idUser = $(this).attr("idUser");
	var idAlumno = $(this).attr("idAlumno");
	var codigoPago = $(this).attr("codigoPago");

	window.open("Vistas/tcpdf/comprobante.php?idAlumno="+idAlumno+"&idUser="+idUser+"&codigoPago="+codigoPago,"_blank");

})