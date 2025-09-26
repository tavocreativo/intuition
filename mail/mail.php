<?php
require "includes/class.phpmailer.php";
$nombre = $_POST["name"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$asunto = $_POST["subject"];
$mensajetxt = $_POST["message"];
if($nombre!="" && $telefono!="" && $email!="" && $asunto!="" && $mensajetxt!=""){
	$mail = new phpmailer();
	$visitante =  new phpmailer();
	$mail->PluginDir = "includes/";
	$visitante->PluginDir = "includes/";
	$mail->IsSMTP();
	$visitante->IsSMTP();
	$mail->SMTPAuth = true;
	$visitante->SMTPAuth = true;
	$mail->Host = "a2plcpnl0900.prod.iad2.secureserver.net";
	$visitante->Host = "a2plcpnl0900.prod.iad2.secureserver.net";
	$mail->Username = "info@intuitionstudio.co";
	$visitante->Username = "info@intuitionstudio.co";
	$mail->Password = "Intuition1234%"; 
	$visitante->Password = "Intuition1234%";
	$mail->Port = 25;
	$visitante->Port = 25;	
	$mail->From = "info@intuitionstudio.co";
	$mail->FromName = "Intuition Studio";
	$visitante->From = "info@intuitionstudio.co";
	$visitante->FromName = "Intuition Studio";
	$mail->Timeout=30;
	$visitante->Timeout=30;
	//$mail->AddAddress("ruizmunozc@gmail.com");//
	$mail->AddAddress("tavocreativo@gmail.com");
	$visitante->AddAddress($email);
	$mail->IsHTML(true);
	$mail->Subject = "Formulario enviado desde el website www.intuitionstudio.co";
	$visitante->IsHTML(true);
	$visitante->Subject = "Gracias por escribirnos";
	$mensaje='<title>Intuition Studio</title>

	</head>

	<body>

	<table width="500" align="center" border="0" cellpadding="0" cellspacing="0">

	<!--DWLayoutTable-->

	<tr>

	<td width="500" height="56" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>

	</tr>

	<tr>

	<td height="134" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

	<!--DWLayoutTable-->

	<tr>

	<td width="500"align="center" valign="top"><img src="http://intuitionstudio.co/wp-content/themes/intuition/img/email_respuesta_4.jpg" width="337"/></td>

	</tr>

	</table></td>

	</tr>

	<tr>

	<td height="134" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

	<tr>

	<td width="500" height="134" valign="top" style="font-Tamaño: 12px; font-family: Arial, Helvetica, sans-serif; ">

	<p align="center">Formulario enviado desde el website <a href="http://www.intuitionstudio.co/">www.intuitionstudio.co</a> </p>

	<table width="384" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#000" style="font-Tamaño: 12px; font-family: Arial, Helvetica, sans-serif;">

	<tr>

	<td width="84"><span><strong>Nombre</strong></span></td>
	<td width="251"><span >';
	$mensaje.=$nombre;
	$mensaje.='</span></td>
	</tr>

	<tr>
	<td><span><strong>Telefono</strong></span></td>
	<td><span >';
	$mensaje.=$telefono;
	$mensaje.='</span></td>
	</tr>

	<tr>
	<td><span><strong>Email</strong></span></td>
	<td><span >';
	$mensaje.=$email;
	$mensaje.='</span></td>
	</tr>

	<tr>
	<td><span><strong>Asunto</strong></span></td>
	<td><span >';
	$mensaje.=$asunto;
	$mensaje.='</span></td>
	</tr>

	<tr>
	<td><span ><strong>Mensaje</strong></span></td>
	<td><span >';
	$mensaje.=$mensajetxt;
	$mensaje.='</span></td>
	</tr>

	</table>          

	<p>&nbsp;</p></td>

	</tr>

	</table>

	</td>

	</tr>




	</table>

	</body>

	</html>';




	$mensajes='<title>Intuition Studio</title>

	</head>

	<body>

	<table width="500" align="center" border="0" cellpadding="0" cellspacing="0">

	<!--DWLayoutTable-->

	<tr>

	<td width="500" height="56" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>

	</tr>

	<tr>

	<td height="268" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">

	<!--DWLayoutTable-->

	<tr>

	<td width="337" valign="top" align="center"><img src="http://intuitionstudio.co/wp-content/themes/intuition/img/email_respuesta_4.jpg" width="337" />
	<p style="font-family:Tahoma, Geneva, sans-serif">Su solicitud fue recibida y de inmediato será tramitada, estaremos en contacto lo más pronto posible.</p></td>

	</tr>

	</table>

	</td>

	</tr>

	</table>

	</body>

	</html>';
	$mail->Body = $mensaje;	
	$exito = $mail->Send();
	$visitante->Body = $mensajes;
	$exito = $visitante->Send();	
	$intentos=1; 
	while ((!$exito) && ($intentos < 5)) {
		sleep(5);
		$exito = $mail->Send();
		$exito = $visitante->Send();
		$intentos=$intentos+1;	
	}
	if(!$exito){
		echo 0;
	}else{
		echo 1;		
	}
}
?>