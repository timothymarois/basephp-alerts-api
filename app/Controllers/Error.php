<?php namespace App\Controllers;

use Base\Routing\Controller;

class Error extends Controller
{

	public function index()
	{
		config()->set('api', [
			'error' => 'true',
			'message' => 'This path does not exist.'
		]);

        return [];
	}

}
