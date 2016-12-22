<?php 

/**
* 
*/
class Log extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		

    }

	public function index()
	{
        $this->load->view('template/header');
        $this->load->view('template/sidebar-login');
        $this->load->view('form_login');
        // $this->load->view('layout/footer');
		// $this->load->view('v-login2');
	}



   

}

?>