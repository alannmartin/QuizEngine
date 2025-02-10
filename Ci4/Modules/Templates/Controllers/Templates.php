<?php namespace Modules\Templates\Controllers;

use App\Controllers\BaseController;

class Templates extends BaseController
{   

    public function index() 
	{
		return view('\Modules\Templates\Views\Public\header')
			.view('\Modules\Templates\Views\Public\public_template');
			//.view('\Modules\Templates\Views\Public\footer');
	}
	
	public function admin() 
	{
		return view('\Modules\Templates\Views\Public\header')
			.view('\Modules\Templates\Views\Admin\admin_template');
			//.view('\Modules\Templates\Views\Public\footer');
	}
	

}// end class file