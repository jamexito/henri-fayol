/*=============================================
                    VER GRADOS
=============================================*/
$(document).on("click", ".verSeccion", function(){

	var idGrado = $(this).attr("idGrado");
	
	// var datos = new FormData();
	// datos.append("idLote", idLote);

	window.location = "index.php?url=seccion&idGrado="+idGrado;

})