<?php

	function validateEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    return true;
		}

		return false;
	}

	function validateMandatoryStringField($field)
	{
		if (strlen($field) > 0) {
			return true;
		}
		return false;
	}

	function validateForm()
	{
		$errors = array();
		$isEmailValid = false;
		$isNameValid = false;
		$isCompanyValid = false;

		if (!isset($_POST) || empty($_POST)) {
			return null;
		}

		if (isset($_POST['inputEmail'])) {
			$isEmailValid = validateEmail($_POST['inputEmail']);
		}

		if (isset($_POST['inputName'])) {
			$isNameValid = validateMandatoryStringField($_POST['inputName']);
		}

		if (isset($_POST['inputCompany'])) {
			$isCompanyValid = validateMandatoryStringField($_POST['inputCompany']);
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

		if (count($errors) == 0) {
			global $wpdb;
			$table = $wpdb->prefix . "cvo_contacts";
			$now = new DateTime();
			$now->format('Y-m-d H:i:s');

			$wpdb->insert( $table ,array (
				'name' => $name,
				'email' => $email,
				'company' => $company,
			));
			echo '1';
		}
		else {
			$errors['responseType'] = 'Error';
			echo json_encode($errors);
		}

	}

	validateForm();