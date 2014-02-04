<?php
require_once(locate_template('includes/Api/Close.io.php'));

define('DEMO_REQUEST', 'request-demo');
define('WHITE_PAPER_REQUEST', 'white-paper');

	function validateEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    return true;
		}

		return false;
	}

	function validateMandatoryStringField($field)
	{
		if (isset($_POST[$field]) && strlen($_POST[$field]) > 0) {
			return true;
		}
		return false;
	}

	function submitForm()
	{
		$errors = array();
		$context = '';
		$phone = '';
		$title = '';
		$position = '';
		$postTitle = '';
		$isEmailValid = false;
		$isNameValid = false;
		$isCompanyValid = false;
		$isPhoneValid = false;
		$isPositionValid = false;
		$context = isset($_POST['context'])? $_POST['context']: '';
		$itemId = isset($_POST['itemId'])? $_POST['itemId']: '';


		if (!isset($_POST) || empty($_POST)) {
			return null;
		}

		$industry = isset($_POST['inputIndustry']) ? sanitize_text_field($_POST['inputIndustry']) : '';
		$isPhoneValid = validateMandatoryStringField('inputPhone') && preg_match("/^[0-9\+\-\*]{3,}$/", $_POST['inputPhone']);
		$isPositionValid = validateMandatoryStringField('inputPosition');
		$isNameValid = validateMandatoryStringField('inputName');
		$isCompanyValid = validateMandatoryStringField('inputCompany');

		if (isset($_POST['inputEmail'])) {
			$isEmailValid = validateEmail($_POST['inputEmail']);
		}

		if ($isPhoneValid) {
			$phone = sanitize_text_field($_POST['inputPhone']);
		}
		else {
			$errors['phone'] = __('Enter a valid phone number');
		}

		if ($isPositionValid) {
			$position = sanitize_text_field($_POST['inputPosition']);
		}
		else {
			$errors['position'] = __('There is a problem with the position field');
		}

		if ($isEmailValid) {
			$email = sanitize_text_field($_POST['inputEmail']);
		}
		else {
			$errors['email'] = __('There is a problem with your "Email address"');
		}

		if ($isNameValid) {
			$name = sanitize_text_field($_POST['inputName']);
		}
		else {
			$errors['name'] = __('Please fill in your name');
		}

		if ($isCompanyValid) {
			$company = sanitize_text_field($_POST['inputCompany']);
		}
		else { 	$errors['company'] = __('Please fill in your company name');
		}


		if (is_numeric(intval($itemId))) {
			$post = get_post($itemId);
		} else {
			$post = null;
		}

		if (count($errors) == 0) {
			global $wpdb;



			$title = isset($post->post_title)? $post->post_title: '';
			$postId = isset($post->ID)? $post->ID: '';
			$table = $wpdb->prefix . "cvo_contacts";
			$now = new DateTime();
			$now->format('Y-m-d H:i:s');
			$fields = array (
				'name' => $name,
				'email' => $email,
				'company' => $company,
				'item_id' => $itemId,
				'context' => $context,
				'title' => $title,
				'phone' => $phone,
				'position' => $position,
				'industry' => $industry,
			);

			$wpdb->insert( $table , $fields);


			if (is_numeric($wpdb->insert_id)) {

				$fields['attachment'] = get_post_meta( $postId, '_cmb_attachment', true );

				if ($context == DEMO_REQUEST) {
					sendConfirmationEmail($fields, 'client', 'demo-request');
					sendConfirmationEmail($fields, 'internal', 'demo-request');
				} else {
					sendConfirmationEmail($fields, 'client', 'white-paper');
					sendConfirmationEmail($fields, 'internal', 'white-paper');
				}

				return array(
					'status' => 'success',
					'content' => '',
					'closeIo' => saveLead($fields)
				);
			} else {
				return array(
					'status' => 'error',
					'content' => $errors
				);
			}
		}
		else {
			return array(
				'status' => 'error',
				'content' => $errors
			);
		}

	}

function sendConfirmationEmail($fields = null, $destination = 'client', $type = 'demo-request') {

	$templates = array(
		'client' => array(
			'to' => $fields['email'],
			'demo-request' => array(
				'subject' => 'Demo request confirmation',
				'message' => include(locate_template('views/backend/clientDemoRequestEmail.php'))
			),
			'white-paper' => array(
				'subject' => 'White paper request confirmation',
				'message' => include(locate_template('views/backend/clientWhitePaperEmail.php'))
			),
		),
		'internal' => array(
			'to' => getRecipients(),
			'demo-request' => array(
				'subject' => 'Demo request from - ' . $fields['name'] . ' » ' . $fields['company'],
				'message' => include(locate_template('views/backend/leadsDemoRequestEmail.php'))
			),
			'white-paper' => array(
				'subject' => 'White paper request from - ' . $fields['name'] . ' » ' . $fields['company'],
				'message' => include(locate_template('views/backend/leadsWhitePaperEmail.php'))
			),

		)
	);

    $to = $templates[$destination]['to'];
    $subject = $templates[$destination][$type]['subject'];
    $message = $templates[$destination][$type]['message'];
    $attachment = (isset($fields['attachment']) && !empty($fields['attachment'])) ? array($fields['attachment']) : array();

    add_filter( 'wp_mail_content_type', 'setHtmlContentTtype' );
    wp_mail( $to, $subject, $message, setHeaders(), $attachment);
    remove_filter( 'wp_mail_content_type', 'setHtmlContentTtype' );
}

function saveLead($fields) {
	$closeIo = new CloseIoApi();
	$closeIo->addField('name', Sanitizer::cleanName($fields['company']));
	$closeIo->addField('description', Sanitizer::cleanName('www.convertro.com » request » '.$fields['context'].' » '. $fields['title']));
	$closeIo->addField('lead_status', 'Potential');
	$closeIo->addContact(array(
		'name' => Sanitizer::cleanName($fields['name']),
		'title' => Sanitizer::cleanName($fields['position']),
		'type' => 'office',
		'phones' => array(

			array('phone' => Sanitizer::cleanName($fields['phone']), 'type' => 'office'),
		),
		'emails' => array(
			array('email' => Sanitizer::cleanName($fields['email']), 'type' => 'office'),
		)
	));

	$closeIo->addCustomfield('Lead Source','inquiry form');
	$closeIo->addCustomfield('Lead Type','Advertiser');
	$closeIo->addCustomfield('Lead Score','10');
	$closeIo->addCustomfield('Industry',$fields['industry']);
	return $closeIo->saveLead();
}

function setHtmlContentTtype() {
    return 'text/html';
}

function setHeaders() {
    $headers[] = 'From: Convertro notifications <owl@convertro.com>';
    return $headers;
}

function getRecipients() {
    $emailList = get_option('cvo_notifications_email_lists');
    $emailParts = explode(',', $emailList);
    return $emailParts;
}
