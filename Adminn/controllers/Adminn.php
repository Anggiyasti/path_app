<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminn extends MX_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->murl = 'assets/adminre/';
    }

	public function index() {
		$this->load->view('vBack');
	}

}