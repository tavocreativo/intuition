<?php


class IntuitionAjaxRequest
{

	public static $baseProduct = array(
		"post_type" => "product",
		"posts_per_page" => 6,
	);

	/** Query base de productos */
	private $prodBaseQuery = array();

	public function __construct()
	{
		$this->prodBaseQuery = self::$baseProduct;

		$actions = array(
			"send_contact_form"
		);

		foreach ($actions as $act) {
			add_action("wp_ajax_nopriv_{$act}", array($this, $act));
			add_action("wp_ajax_{$act}", array($this, $act));
		}
	}

	public function send_contact_form()
	{

		$nombre = $_POST["name"];
		$telefono = $_POST["telefono"];
		$email = $_POST["email"];
		$asunto = $_POST["subject"];
		$mensajetxt = $_POST["message"];
		if ($nombre != "" && $telefono != "" && $email != "" && $asunto != "" && $mensajetxt != "") {

			$dataMail = array(
				"primaryColor" => "#00c551",
				"sitename" => "Intuition Studio",
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
				"subject" => "Nuevo formulario en Intuition Studio",
				"receptors" => env("admin_email"),
				"html" => $htmlAdmin
			));
			$sendClient = ins_send_mail(array(
				"subject" => "Gracias por escribir en Intuition Studio",
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

		wp_die();
	}

	// private function verifyRecatpcha($token, $action)
	// {
	//   define("RECAPTCHA_V3_SECRET_KEY", '6LebHjUaAAAAAIsjGAcH8LKIfKeK-_PzINhLcKAR');


	//   // call curl to POST request
	//   $ch = curl_init();
	//   curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	//   curl_setopt($ch, CURLOPT_POST, 1);
	//   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
	//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//   $response = curl_exec($ch);
	//   curl_close($ch);
	//   $arrResponse = json_decode($response, true);

	//   // verify the response
	//   if ($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
	//     return true;
	//   } else {
	//     return false;
	//   }
	// }


}

new IntuitionAjaxRequest();
