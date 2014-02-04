<?php

Class Sanitizer {
	public static function cleanName($val)
	{
		return filter_var($val, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	}
}

Class CloseIoApi {

	const LEAD_TYPE_AGENCY = 'Agency';
	const LEAD_TYPE_PARTNERSHIP = 'Agency';
	const LEAD_ENTRY_POINT = 'lead/';

	private $baseRoot = 'https://app.close.io/api/v1/';
	private $contentType = array('Content-Type: application/json');
	private $apiKey = '461284e23ec256c2f08f5b65e10d3cc0aafcde81cfaca5842d63876f';
	private $requestUrl = null;
	private $curlObj = null;
	private $response = null;
	private $error_number = null;
	private $error_message = null;

	public $fields = array();

	private function init()
	{
		$this->curlObj = curl_init();
	}

	private function close()
	{
		curl_close($this->curlObj);
	}

	public function saveLead()
	{
		$this->init();
		$this->requestUrl = $this->baseRoot . self::LEAD_ENTRY_POINT;
		$this->setCurlOption(CURLOPT_POSTFIELDS, json_encode($this->fields));
		$this->setupRequestOptions('POST');
		$this->getResults();
		$this->close();
		return array(
			'response' => $this->response,
			'error' => $this->error_number
		);
	}

	public function getLeads($q)
	{
		$this->init();
		$this->requestUrl = $this->baseRoot . self::LEAD_ENTRY_POINT . $q;
		$this->setupRequestOptions('GET');
		$this->getResults();
		$this->close();
		return array(
			'response' => $this->response,
			'error' => $this->error_number
		);
	}

	public function addContact($contact)
	{
		if (!isset($this->fields['contacts']))
		{
			$this->fields['contacts'] = array();
		}
		array_push($this->fields['contacts'], $contact);

	}

	public function addCustomfield($key, $val)
	{
		if (!isset($this->fields['custom']))
		{
			$this->fields['custom'] = array();
		}
		$this->fields['custom'][$key] = $val;
	}

	public function addField($key, $val)
	{
		$this->fields[$key] = $val;
	}

	private function setField($key, $val)
	{
		$this->fields[$key] = $val;
	}

	private function setupRequestOptions($GET_OR_POST)
	{
		$this->setCurlOption(CURLOPT_URL, $this->requestUrl);
		$this->setCurlOption(CURLOPT_USERPWD, $this->apiKey . ':');
		$this->setCurlOption(CURLOPT_HTTPHEADER, $this->contentType);
		$this->setCurlOption(CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		$this->setCurlOption(CURLOPT_RETURNTRANSFER, true);
		$this->setCurlOption(CURLOPT_CUSTOMREQUEST, $GET_OR_POST);
		$this->setCurlOption(CURLOPT_RETURNTRANSFER, true);
		$this->setCurlOption(CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		$this->setCurlOption(CURLOPT_TIMEOUT, 2);
	}

	protected function setCurlOption($key, $val)
	{
		curl_setopt($this->curlObj, $key, $val);
	}

	protected function getResults()
	{
		$this->response = curl_exec($this->curlObj);
	    $this->error_number = curl_errno($this->curlObj);
	    $this->error_message = curl_error($this->curlObj);
	}


}








