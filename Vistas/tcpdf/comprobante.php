<?php

	require_once '../../Controladores/OperacionesControlador.php';
	require_once '../../Modelos/OperacionesModelo.php';

	require_once '../../Controladores/AlumnosControlador.php';
	require_once '../../Modelos/AlumnosModelo.php';

	require_once '../../Controladores/UsuariosControlador.php';
	require_once '../../Modelos/UsuariosModelo.php';

	/*date_default_timezone_set('America/Lima');*/

	/**PAGO */
	$item = "idpago";
	$valor = $_GET["codigoPago"];

	$pago = OperacionesControlador::MostrarPagosC($item,$valor);
	
	/**DETALLE PAGO */
	$item2 = "idpago";
	$valor2 = $_GET["codigoPago"];

	$detallepago = OperacionesControlador::MostrarDetallePagosC($item2,$valor2);
	
	/**ALUMNO */
	$item3 = "idalumno";
	$valor3 = $_GET["idAlumno"];
	
	$alumno = AlumnosControlador::VerAlumnosC($item3,$valor3);
	// var_dump($alumno);

	/**USUARIO */
	$item4 = "id";
	$valor4 = $_GET["idUser"];

	$usuarioAte = UsuariosControlador::VerUsuariosC($item4, $valor4);

	# Incluyendo librerias necesarias #
	require "./code128.php";

	$pdf = new PDF_Code128('P','mm','A4'); //L(horizontal) y P(vertical) 
	$pdf->SetMargins(12,12,19);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('./img/icono_insignia.png',165,12,25,30,'PNG');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('Times','B',20);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,utf8_decode(strtoupper("I.E.P. HENRI FAYOL")),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,utf8_decode("RD: 2810-1245"),0,0,'L');

	$pdf->Ln(6);

	$pdf->Cell(150,9,utf8_decode("Dirección: Mz. A Lt. 01 - Las Retamas - Pachacamac."),0,0,'L');

	$pdf->Ln(6);

	$pdf->Cell(150,9,utf8_decode("Teléfono: 963 235 125"),0,0,'L');

	$pdf->Ln(6);

	$pdf->Cell(150,9,utf8_decode("Email: iep.henrifayol@gmail.com"),0,0,'L');

	$pdf->Ln(12);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,7,utf8_decode("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,utf8_decode(date("d/m/Y", strtotime($detallepago["fecha_registro"]))." ".date("h:i A",strtotime($detallepago["fecha_registro"]))),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,utf8_decode(strtoupper("COMPROBANTE Nro.")),0,0,'C');

	$pdf->Ln(6);

	$pdf->SetFont('Arial','',10);
	$pdf->Cell(15,7,utf8_decode("Atendió: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(130,7,utf8_decode($usuarioAte["nombres"]/*." ".$usuarioAte["apellidos"]*/),0,0,'L');
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode(strtoupper("001-".$_GET['codigoPago'])),0,0,'C'); //NUMERO DE COMPROBANTE

	$pdf->Ln(10);

	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(15,7,utf8_decode("Alumno:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($alumno[0]["nombres"]." ".$alumno[0]["apellidos"]),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,utf8_decode("Doc: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,utf8_decode($alumno[0]["dni"]),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,utf8_decode("Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,utf8_decode($alumno[0]["telefono"]),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(18,7,utf8_decode("Dirección:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,utf8_decode($alumno[0]["direccion"]),0,0);

	$pdf->Ln(15);

	# Tabla de productos #
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(140,8,utf8_decode("Descripción"),1,0,'C',true);
	// $pdf->Cell(15,8,utf8_decode("Cant."),1,0,'C',true);
	// $pdf->Cell(25,8,utf8_decode("Precio"),1,0,'C',true);
	$pdf->Cell(19,8,utf8_decode("Desc."),1,0,'C',true);
	$pdf->Cell(32,8,utf8_decode("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(140,7,utf8_decode(ucwords($detallepago["concepto"])),'L',0,'C');
	// $pdf->Cell(15,7,utf8_decode("7"),'L',0,'C');
	// $pdf->Cell(25,7,utf8_decode("$10 USD"),'L',0,'C');
	$pdf->Cell(19,7,utf8_decode("0 %"),'L',0,'C');
	$pdf->Cell(32,7,utf8_decode("S/ ".$detallepago["total"]),'LR',0,'C');
	$pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('Arial','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(25,7,utf8_decode(''),'T',0,'C');
	$pdf->Cell(32,7,utf8_decode("MONTO ASIGNADO"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("S/ ".$detallepago["total"]),'T',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("IVA (13%)"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("+ $0.00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(25,7,utf8_decode(''),'',0,'C');
	$pdf->Cell(32,7,utf8_decode("MONTO A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,utf8_decode("S/ ".$detallepago["total"]),'T',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("TOTAL PAGADO"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("$100.00 USD"),'',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("CAMBIO"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("$30.00 USD"),'',0,'C');

	// $pdf->Ln(7);

	// $pdf->Cell(100,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(15,7,utf8_decode(''),'',0,'C');
	// $pdf->Cell(32,7,utf8_decode("USTED AHORRA"),'',0,'C');
	// $pdf->Cell(34,7,utf8_decode("$0.00 USD"),'',0,'C');

	// $pdf->Ln(12);

	// $pdf->SetFont('Arial','',9);

	// $pdf->SetTextColor(39,39,51);
	// $pdf->MultiCell(0,9,utf8_decode("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

	// $pdf->Ln(9);

	// # Codigo de barras #
	// $pdf->SetFillColor(39,39,51);
	// $pdf->SetDrawColor(23,83,201);
	// $pdf->Code128(72,$pdf->GetY(),"COD000001V0001",70,20);
	// $pdf->SetXY(12,$pdf->GetY()+21);
	// $pdf->SetFont('Arial','',12);
	// $pdf->MultiCell(0,5,utf8_decode("COD000001V0001"),0,'C',false);

	# Nombre del archivo PDF #
	$pdf->Output("I",$alumno[0]["nombres"]." ".$alumno[0]["apellidos"]." N°".$_GET["codigoPago"].".pdf",true);