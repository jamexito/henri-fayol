/*======================================
=             MOSTAR DATOS            =
======================================*/
$(document).on("click", ".btnAsignarPropietario", function(){
// $(".btnAsignarPropietario").click(function() {
	
	var idLote = $(this).attr("idLote");

	var datos = new FormData();
	datos.append("idLote", idLote);

	$.ajax({

		url:"ajax/lotes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log("respuesta", respuesta); 

			$("#IdLote").val(respuesta[0]["id"]);

		}

	})

})


/*===============================================
=            MOSTRAR DATOS PARA PAGO            =
===============================================*/
$(document).on("click", ".btnRealizarPago", function(){
	
	var idTerreno = $(this).attr("idTerreno");

	window.location = "index.php?url=operacion&idTerreno="+idTerreno;

})




