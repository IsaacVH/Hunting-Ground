<?php

namespace App\Http\Controllers\Common;

class ServiceResult
{
	public $Content;
	public $Errors = [];
	public $IsSuccess;

	function __construct($content, $errors = [], $success = null)
	{
		$this->Content = $content;
		$this->Errors = $errors;
		$this->IsSuccess = $success == null ? count($errors) <= 0 : $success;
	}

	public function ToArray() {
		return ["content" => $this->Content, "errors" => $this->Errors, "success" => $this->IsSuccess];
	}
}


