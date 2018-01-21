<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Email extends BaseController {

	 /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
		$this->load->model('email_model');
		$this->isLoggedIn();   
    }
	
	public function emailTemplates()
	{ 
		$data['userRecords'] = '';
		$this->global['pageTitle'] = 'Viral Marketer : Email Templates';
        
        $this->loadViews("email/listEmailTemplate", $this->global, $data , NULL);
	}
}
