var perfilOculto = $("#perfilOculto").val();
// console.log("perfilOculto", perfilOculto);

$('.tablasPagos').DataTable( {
    "ajax": "ajax/datatable-pagos.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
    "retrieve": true,
    "processing": true,    
    "language": {
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix":    "",
	    "sSearch":         "Buscar:",
	    "sUrl":            "",
	    "sInfoThousands":  ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	        "sFirst":    "Primero",
	        "sLast":     "Último",
	        "sNext":     "Siguiente",
	        "sPrevious": "Anterior"
	    },
	    "oAria": {
	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	},
	"pageLength": 20
})


/*========================================
=            IMPRIMIR FACTURA            =
========================================*/
$(".tablas").on("click", ".btnImprimirComprobante", function(){


	var idUser = $(this).attr("idUser");
	var idAlumno = $(this).attr("idAlumno");
	var codigoPago = $(this).attr("codigoPago");

	window.open("Vistas/tcpdf/comprobante.php?idAlumno="+idAlumno+"&idUser="+idUser+"&codigoPago="+codigoPago,"_blank");

})

/*===============================================
                ANULAR COMPROBANTE
===============================================*/
$(document).on("click", ".anularComprobante", function(){
	
	var idComprobante = $(this).attr("idComprobante");

	var datos = new FormData();
	datos.append("idComprobante", idComprobante);

	$.ajax({

		url:"ajax/operaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){			
			// console.log(respuesta);
			$("#idPagoComp").val(respuesta[0]["idpago"]);

			if (respuesta[0]["estado"] == 1) {					
				$("#anularComprobanteText").html("¿Deseas anular el comprobante?");
				$("#StatusComp").val("0");
			}

		}

	})

})

