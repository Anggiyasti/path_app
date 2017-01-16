<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Learningline extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('learningmodel');
		$this->load->model('videoback/videobackmodel');

	}

	// FUNGSI INDEX
	public function index(){
		$this->load->view('v-header');
		$this->load->view('v-container-daftar-bab');
		$this->load->view('script-learning-daftar-bab.js');
		$this->load->view('admin/layout/footer');
	}
	// FUNGSI INDEX

	// GET LIST STEP BERDASARKAN ID TOPIK
	public function ajax_get_list_bab(){
		$list = $this->learningmodel->get_bab_for_topik();
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['id'];			
			$row[] = $list_item['namaTingkat'];
			$row[] = $list_item['namaMataPelajaran'];
			$row[] = $list_item['judulBab'];
			if ($list_item['statusLearningLine']==1) {
				$row[] = "<input type='checkbox' 
				class='switchery' checked onclick='update_learning_bab(".$list_item['id'].",".$list_item['statusLearningLine'].")'>";
			} else {
				$row[] = "<input type='checkbox' 
				class='switchery' unchecked onclick='update_learning_bab(".$list_item['id'].",".$list_item['statusLearningLine'].")'>";
			}
			
			
			$row[] = '
			<a class="btn btn-sm btn-success"  title="Detail" onclick="detail_bab('."'".$list_item['id']."'".')"><i class="ico-file-plus2"></i></a>';

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	
	}
	// GET LIST STEP BERDASARKAN ID TOPIK

	function ajax_get_video($babid){
		$list = $this->mvideos->get_all_video_by_bab($babid);
		$data = array();

		$baseurl = base_url();
		foreach ( $list as $list_item ) {
			// $no++;
			$row = array();
			$row[] = $list_item['videoID'];			
			$row[] = $list_item['judulSubBab'];
			$row[] = $list_item['judulVideo'];
			
			$row[] = "<input type='radio' name='video' value=".$list_item['videoID']."class='switchery' unchecked'>";

			$data[] = $row;

		}

		$output = array(
			"data"=>$data,
			);

		echo json_encode( $output );	

	}


	## --------------------------AJAX PROCESSING-------------------------- ##


}


?>