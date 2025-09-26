<?php
require "includes/class.phpmailer.php";
$nombre = $_POST["name"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$asunto = $_POST["subject"];
$mensajetxt = $_POST["message"];
if ($nombre != "" && $telefono != "" && $email != "" && $asunto != "" && $mensajetxt != "") {

	$dataMail = array(
		"primaryColor" => "#00c551",
		"sitename" => "Inttuition Studio",
		"siteEmail" => "info@intuitionstudio.co",
		"siteAddress" => "Ciudadela Colsubsidio - Bogotá D.C., Colombia",
		"sitePhone" => "+57 311 8964235",
		"termsLinks" => "",
		"homeUrl" => home_url("/"),
		"fbUrl" => "",
		"imageUrl" => get_template_directory_uri() . "/img/email_respuesta_1.jpg"
	);
	$dataMailAdmin = array_merge(
		$dataMail,
		array(
			"dataForm" => array(
				"Nombre" => $nombre,
				"Email" => $email,
				"Teléfono" => $telefono,
				"Asunto" => $asunto,
				"Mensaje" => $mensajetxt
			)
		)
	);

	$htmlAdmin = ins_get_html("mails/contact-form-admin", $dataMailAdmin);
	$htmlClient = ins_get_html("mails/contact-form-client", $dataMail);

	$sendAdmin = ins_send_mail(array(
		"subject" => "Nuevo formulario en ins-ethical Market",
		"receptors" => env("admin_email"),
		"html" => $htmlAdmin
	));
	$sendClient = ins_send_mail(array(
		"subject" => "Gracias por escribir en ins-ethical Market",
		"receptors" => array(
			$email => $nombre
		),
		"html" => $htmlClient
	));

	if ($sendAdmin > 0 && $sendClient > 0) {
		echo 1;
	} else {
		echo 0;
	}
}
