<?php

flush_rewrite_rules( false );

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Run The Theme
|--------------------------------------------------------------------------
|
| Once we have the theme booted, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

require_once __DIR__ . '/bootstrap/app.php';

add_action('admin_head', 'custom_widget_width');

function custom_widget_width() {
    echo '<style>
    .wp-list-table th#post_featured {
		width:65px;
    }
	</style>';
}


add_filter('excerpt_length', 'mytheme_custom_excerpt_length', 999);
function mytheme_custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_more', 'custom_excerpt_more');
function custom_excerpt_more()
{
    return "...";
}

add_filter( 'request', function( $request ){
	if ( isset( $_REQUEST['keywords'] ) ){
			$request['s'] = $_REQUEST['keywords'];
	}

	return $request;
} );

if (!is_user_logged_in()) {
	add_action('init', 'race_register_init');
	add_action('init', 'send_contact_mail_init');
}

function race_register_init(){ 
	add_action( 'wp_ajax_nopriv_registerRace', 'race_register' );
}

function race_register() {
	check_ajax_referer( 'ajax-register-nonce', 'security' );
	$email                = sanitize_text_field($_POST["email"]);
	$phoneNumber          = sanitize_text_field($_POST["phoneNumber"]);
	$firstName            = sanitize_text_field($_POST["firstName"]);
	$lastName             = sanitize_text_field($_POST["lastName"]);
	$gender               = sanitize_text_field($_POST["gender"]);
	$birthDate            = sanitize_text_field($_POST["birthDate"]);
	$bloodType            = sanitize_text_field($_POST["bloodType"]);
	$identifyNumber       = sanitize_text_field($_POST["identifyNumber"]);
	$tShirtSize           = sanitize_text_field($_POST["tShirtSize"]);
	$emergencyName        = sanitize_text_field($_POST["emergencyName"]);
	$emergencyPhoneNumber = sanitize_text_field($_POST["emergencyPhoneNumber"]);
	$raceDistance	      = sanitize_text_field($_POST["raceDistance"]);

	$postData = array(
		'post_title' => date("Y")."-".$raceDistance.": ".$firstName." ".$lastName,
		'post_status' => "publish",
		'post_type' => "registrants",
		'post_author' => get_current_user_id() ?? 1
	);
	kses_remove_filters();
	$post_id = wp_insert_post($postData);
	$attachment_id = media_handle_upload('file', 0);
	// update_field('reg_bib', $attachment_id, $post_id);
	update_field('reg_email', $email, $post_id);
	update_field('reg_phone_number', $phoneNumber, $post_id);
	update_field('reg_first_name', $firstName, $post_id);
	update_field('reg_last_name', $lastName, $post_id);
	update_field('reg_gender', $gender, $post_id);
	update_field('reg_date_of_birth', $birthDate, $post_id);
	update_field('reg_nationality', "Indonesia", $post_id);
	update_field('reg_passport__ktp_number', $identifyNumber, $post_id);
	update_field('reg_passport__ktp_upload', $attachment_id, $post_id);
	update_field('reg_blod_type', $bloodType, $post_id);
	update_field('reg_t-shirt_size', $tShirtSize, $post_id);
	update_field('reg_regist', true, $post_id);
	update_field('emergency_name', $emergencyName, $post_id);
	update_field('emergency_phone_number', $emergencyPhoneNumber, $post_id);
	kses_init_filters();
	wp_set_object_terms($post_id, $raceDistance,"race_distance", true);
	wp_set_object_terms($post_id, date("Y"), "race_year", true);
	wp_set_object_terms($post_id, "New Entry", "race_status", true);

	$response= [
		"status"   => "success",
		"message"  => "Proses registrasi berhasil, silakan cek email anda dan ikuti intruksi selanjutnya",
	];
	echo json_encode($response);
exit;
}

function send_contact_mail_init(){ 
	add_action( 'wp_ajax_nopriv_FormContact', 'form_contact' );
}

function form_contact() {
	check_ajax_referer( 'ajax-formcontact-nonce', 'security' );
	$mails			= sanitize_text_field($_POST["mailList"]);
	$fullName 		= sanitize_text_field($_POST["full_Name"]);
	$email			= sanitize_text_field($_POST["email"]);
	$phoneNumber 	= sanitize_text_field($_POST["phone_Number"]);
	$workServices	= sanitize_text_field($_POST["work_Services"]);
	$retainer		= sanitize_text_field($_POST["retainer"]);
	$detailProject	= sanitize_text_field($_POST["detail_Project"]);
	

	$response= [
		"status"   => "success",
		"message"  => "Thank you for contacting us",
	];

	$message = "
		MangCoding : 
		
		Name: ".$fullName."
		Email: ".$email."
		Phone Number: ".$phoneNumber."
		Work Services: ".$workServices."
		Retainer: ".$retainer."
		Detail Project: ".$detailProject."
	";
	wp_mail($mailTo, "Mangcoding " + $fullName, $message,$headers = 'Cc');
	// echo json_encode($response);
	// echo json_encode($message);
	exit;
}