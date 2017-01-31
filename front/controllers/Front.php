<?php 



/**
 * 
 */
 class Front extends MX_Controller
 {

 	function index()
 	{
 		$this->load->view('v-head');
 		$this->load->view('home');
 		$this->load->view('v-footer');
 	}

 	public function workout_f()
 	{
 		$this->load->view('v-head');
 		$this->load->view('v-w-bab');
 		$this->load->view('v-footer');
 	}

 }
 ?>