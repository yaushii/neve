<?php
/**
 * Neve functions.php file
 *
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      17/08/2018
 *
 * @package Neve
 */

define( 'NEVE_VERSION', '2.3.6' );
define( 'NEVE_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'NEVE_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );

if ( ! defined( 'NEVE_DEBUG' ) ) {
	define( 'NEVE_DEBUG', false );
}

/**
 * Themeisle SDK filter.
 *
 * @param array $products products array.
 *
 * @return array
 */
function neve_filter_sdk( $products ) {
	$products[] = get_template_directory() . '/style.css';

	return $products;
}

add_filter( 'themeisle_sdk_products', 'neve_filter_sdk' );

add_filter( 'themeisle_onboarding_phprequired_text', 'neve_get_php_notice_text' );

/**
 * Get php version notice text.
 *
 * @return string
 */
function neve_get_php_notice_text() {
	$message = sprintf(
		/* translators: %s message to upgrade PHP to the latest version */
		__( "Hey, we've noticed that you're running an outdated version of PHP which is no longer supported. Make sure your site is fast and secure, by %s. Neve's minimal requirement is PHP 5.4.0.", 'neve' ),
		sprintf(
			/* translators: %s message to upgrade PHP to the latest version */
			'<a href="https://wordpress.org/support/upgrade-php/">%s</a>',
			__( 'upgrading PHP to the latest version', 'neve' )
		)
	);

	return wp_kses_post( $message );
}

/**
 * Adds notice for PHP < 5.3.29 hosts.
 */
function neve_php_support() {
	printf( '<div class="error"><p>%1$s</p></div>', neve_get_php_notice_text() ); // WPCS: XSS OK.
}

if ( version_compare( PHP_VERSION, '5.3.29' ) <= 0 ) {
	/**
	 * Add notice for PHP upgrade.
	 */
	add_filter( 'template_include', '__return_null', 99 );
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'neve_php_support' );

	return;
}

require_once get_template_directory() . '/start.php';

require_once 'globals/utilities.php';
require_once 'globals/hooks.php';
require_once 'globals/sanitize-functions.php';

require_once get_template_directory() . '/header-footer-grid/loader.php';

add_filter('frm_to_email', 'custom_set_email_value', 10, 4);

function custom_set_email_value($recipients, $values, $form_id, $args){

//    var_dump($recipients);

//    var_dump($form_id);

//    var_dump($args);

$ville=array(
"Nomain"=>"justine.telmann@gmail.com",
// "Aix"=>
// "Sameon"=>
// "Landas"=>
// "Beuvry La Foret"=>
// "Auchy Les Orchies"=>
// "Coutiches"=>
// "Bouvignies"=>
// "Tilloy-Les Marchiennes"=>
// "Warling"=>
// "wandignies-Hamage"=>
// "Hornaing"=>
// "Erre"=>
// "Fenain"=>
// "Marchiennes"=>
// "Vred"=>
// "Rieulay"=>
// "Somain"=>
// "Bruille Lez Marchiennes"=>
// "Masny"=>
// "Pecquencourt"=>
// "Montigny en Ostrevent"=>
// "Loffre"=>
// "Lewarde"=>
// "Ecaillon"=>
// "Auberchicourt"=>
// "Aniche"=>
// "Emerchicourt"=>
// "Monchecourt"=>
// "Flines Les Raches"=>
// "Lallaing"=>
// "Waziers"=>
// "Sin Le Noble"=>
// "Dechy"=>
// "Guesnain"=>
// "Roucourt"=>
// "Erchin"=>
// "Fressain"=>
// "Villers au tertre"=>
// "Marcq en Ostrevent"=>
// "Fechain"=>
// "Aubygnac Au Bac"=>
// "Brunemont"=>
// "Bugnicourt"=>
// "Arleux"=>
// "Cantin"=>
// "goeulzin"=>
// "Ferin"=>
// "Estrees"=>
// "Hamel"=>
// "Lecluse"=>
// "Douai"=>
// "Faumont"=>
// "Raches"=>
// "Anhiers"=>
// "Roost Warendin"=>
// "Flers En Escrebieux"=>
// "Lauwin Planque"=>
// "Esquerchin"=>
// "Cuincy"=>
// "Lambres Lez Douai"=>
// "Courchelettes"=>
// "Auby"=>
// "Raimbeaucourt"=>
);
if($form_id == 2){
   foreach ( $values as $value ) {
	if ($value->field_id == 10){
	var_dump($value->meta_value);
		if(in_array($value->meta_value,$ville)) {
	//	$email =	$ville[$value]
		// $email = $ville['Nomain']
		}
	}      
   }
   exit();
   }



   return $recipients;

}

// add_filter('frm_to_email', 'custom_set_email_value', 10, 4);
// function custom_set_email_value($recipients, $values, $form_id, $args){
//     if($form_id == 5 && $args['email_key'] == 4933){ // change 5 to the id of your form and 4933 with the ID of the email
//         foreach ( $values as $value ) {
//             if ( $value->field_id != 125 ) continue; //change 125 to the id of the drop-down or radio field
//             switch ( $value->meta_value ) {
//                 case 'Option 1':
//                     $recipients[] = 'Michael.@example.com';
//                     break;
//                 case 'Option 2' or 'Option 3' or 'Option 4': // change these values to the choices in your field
//                     $recipients[] = 'Abe@example.com';
//                     break;
//                 case 'Option 5':
//                     $recipients[] = 'Bob@example.com';
//                     $recipients[] = 'Carrie@example.com';
//                     break;
//                 default: //this will be used if none of the other cases occur
//                     $recipients[] = 'default@example.com';
//                     break;
//             }
//                 unset( $field_id, $value );
//         }
//     }
//     return $recipients;
// }