<?php

class Errors extends Controller {
	
	function index()
	{
		$this->error404();
	}
	
	function error404()
	{
		header("HTTP/1.0 404 Not Found");
	}


	function error405()
	{
		header("HTTP/1.0 405 Method Not Allowed");
	}
}


