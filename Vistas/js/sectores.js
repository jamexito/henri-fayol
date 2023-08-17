/*=============================================
Ver Manzanas
=============================================*/
$(document).on("click", ".verManzanas", function(){

	var idSector = $(this).attr("idSector");
	
	// var datos = new FormData();
	// datos.append("idLote", idLote);

	window.location = "index.php?url=manzanas&idSector="+idSector;

})


/*=============================================
ABRIR LOTES
=============================================*/
$(document).on("click", ".verLotes", function(){

	var idManzana = $(this).attr("idManzana");
	
	// var datos = new FormData();
	// datos.append("idLote", idLote);

	window.location = "index.php?url=lotes&idManzana="+idManzana;

})