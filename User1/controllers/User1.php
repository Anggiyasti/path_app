<?php 



/**
 * 
 */
 class User1 extends MX_Controller
 {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->model('Modeluser');
		$this->load->database();
	}

	public function index()
	{
		// $this->load->view('layout/header');
		// $this->load->view('layout/nav');
		// $this->load->view('layout/footer');
		$data['mapel']=$this->Modeluser->provinsi();
		$data['data']	= $this->Modeluser->getsoal();
		$list= $this->Modeluser->getkesulitan();

		$this->load->view('layout/header');
		$this->load->view('v-filter', $data);
		$this->load->view('layout/footer');
	}

	// fungsi tampil form tambah siswa
	public function t_siswa()
	{
		$this->load->view('layout/header');
		$this->load->view('v-tambah-siswa');
		$this->load->view('layout/footer');
	}

	// fungsi tambah siswa 
	public function tambah_siswa()
	{
		//set validation rules
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'trim|required');
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email|is_unique[tb_siswa.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_conf]|md5');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_tlp', 'No Telp', 'trim|required');
        $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'trim|required');

        $this->form_validation->set_message('is_unique', '*Email sudah terdaftar');

        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // gagal
            // $this->load->view('vRegistrasi');
            $this->load->view('layout/header');
            $this->load->view('v-tambah-siswa');
            $this->load->view('layout/footer');
        } else {
            //insert the user registration details into database
            $data = array(
                'nama_depan' => $this->input->post('nama_depan'),
                'nama_belakang' => $this->input->post('nama_belakang'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('no_tlp'),
                'nama_sekolah' => $this->input->post('nama_sekolah'),
                'status' => $this->input->post('status')
            );
            
            // insert form data into database
            if ($this->Modeluser->insert_siswa($data))
            {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully </div>');
                    redirect('user/t_siswa');
            
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('user/t_siswa');
            }
        }
	}

	// fungsi tampil form tambah guru
	public function t_guru()
	{
		$this->load->view('layout/header');
		$this->load->view('v-tambah-guru');
		$this->load->view('layout/footer');
	}

	// fungsi tambah guru 
	public function tambah_guru()
	{
		//set validation rules
        $this->form_validation->set_rules('nama', 'Nama Guru', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[12]|is_unique[tb_guru.username]');
        $this->form_validation->set_rules('email', 'Email ID', 'required|valid_email|is_unique[tb_guru.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_conf]|md5');
        $this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required');
        $this->form_validation->set_message('is_unique', '*Email sudah terdaftar');

        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // gagal
            // $this->load->view('vRegistrasi');
            $this->load->view('layout/header');
            $this->load->view('v-tambah-guru');
            $this->load->view('layout/footer');
        } else {
            //insert the user registration details into database
            $data = array(
                'nama_guru' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'status' => $this->input->post('status')
            );
            
            // insert form data into database
            if ($this->Modeluser->insert_guru($data))
            {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully </div>');
                    redirect('user/t_guru');
            
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('user/t_guru');
            }
        }
	}

	//fungsi untuk tampil halaman daftar siswa
	public function d_siswa()
	{
		$data['data']	= $this->Modeluser->getdaftarsiswa();
		$this->load->view('layout/header');
		$this->load->view('v-daftar-siswa', $data);
		// $this->load->view('layout/footer');
	}

	// fungsi edit siswa
	public function edit_siswa($no) {
		if ($this->input->post('update')) 
		{
			$this->Modeluser->update_siswa();
			
			if ($this->db->affected_rows())
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				redirect('user/d_siswa');
			}
			else
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
				redirect('user/d_siswa');
			}
		}
		else
		{
			// $data['content'] = 'kontrak/k_edit';
			$data['editdata'] = $this->db->get_where('tb_siswa',array('id_siswa'=> $no))->row();
			$this->load->view('layout/header');
			$this->load->view('v-edit-siswa', $data);
			$this->load->view('layout/footer');
		}
	}

	// fungsi hapus siswa
	public function hapus_siswa($id) {
		$this->Modeluser->delete_siswa($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Deleted </div>');
			redirect('user/d_siswa');	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
			redirect('user/d_siswa');
		}

	}

	//fungsi untuk tampil halaman daftar guru
	public function d_guru()
	{
		if ($this->session->userdata('id_admin')) {
		$data['data']	= $this->Modeluser->getdaftarguru();
		$this->load->view('admin/layout/header');
		$this->load->view('v_guru/v-daftar-guru', $data);
		$this->load->view('admin/layout/footer');
	}
	}

	// fungsi edit guru
	public function edit_guru($no) {
		if ($this->input->post('update')) 
		{
			$this->Modeluser->update_guru();
			
			if ($this->db->affected_rows())
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				redirect('user/d_guru');
			}
			else
			{
				 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
				redirect('user/d_guru');
			}
		}
		else
		{
			// $data['content'] = 'kontrak/k_edit';
			$data['editdata'] = $this->db->get_where('tb_guru',array('id_guru'=> $no))->row();
			$this->load->view('layout/header');
			$this->load->view('v-edit-guru', $data);
			$this->load->view('layout/footer');
		}
	}

	// fungsi hapus guru
	public function hapus_guru($id) {
		$this->Modeluser->delete_guru($id);

		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Deleted </div>');
			redirect('user/d_guru');	
		}
		else
		{
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
			redirect('user/d_guru');
		}

	}

	// fungsi coba tampil halaman filtering
	public function d_filter()
	{

		$data['mapel']=$this->Modeluser->provinsi();

		$this->load->view('layout/header');
		$this->load->view('v-coba', $data);
				// $this->load->view('v-enur', $data);
		$this->load->view('layout/footer');
	}

	public function cari()
	{
		if ($this->input->post('submit')) 
		{
			$mapel = $this->input->post('id_mapel');
			
			
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
			$data['mapel']=$this->Modeluser->provinsi();

			$data['mapel']	= $this->Modeluser->getmapel();
			$data['data']	= $this->Modeluser->getfilterbab($mapel);
			$this->load->view('layout/header');
							// $this->load->view('v-enur', $data);

			$this->load->view('v-coba', $data);
			$this->load->view('layout/footer');
		}
		else
		{
		$data['data']	= $this->Modeluser->getdaftarsiswa();
		$data['mapel']	= $this->Modeluser->getmapel();
		$this->load->view('layout/header');
						$this->load->view('v-enur', $data);

		// $this->load->view('v-coba', $data);
		$this->load->view('layout/footer');
		}
		
	}

	public function filtersoal(){
 		if ($this->input->post('submit')) 
		{
			$mapel = $this->input->post('id_mapel');
			$data['data']	= $this->Modeluser->getdaftarsiswa();
			$data['mapel']	= $this->Modeluser->getmapel();
			$data['mapel']=$this->Modeluser->provinsi();
			
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
		$data['data']	= $this->Modeluser->filter_mapel_bab($mapel);
		$this->load->view('v-coba', $data);
		}
		else
		{
		
		$data['mapel']	= $this->Modelbank->getMapel();
		$this->load->view('layout/header');
		$this->load->view('v-coba', $data);
		$this->load->view('layout/footer');
		}
		
	}

	function ambil_data(){

$modul=$this->input->post('modul');
$id=$this->input->post('id');

if($modul=="getbab"){
echo $this->Modeluser->getbab($id);
}
else if($modul=="getkesulitan"){
// echo $this->Modeluser->getkes($id);
}
else if($modul=="kelurahan"){

}
}

public function filterbab(){
		
 		if ($this->input->post('submit')) 
		{
			$pel = $this->input->post('pelajaran');
			$mapel = $this->input->post('id_bab');
			$kesulitan = $this->input->post('kesulitan');

			if ($pel && $mapel && $kesulitan) {	
				// $mapel = $this->input->post('id_bab');
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				$data['data']	= $this->Modeluser->filter_soal_all($mapel, $pel, $kesulitan);
				$data['mapel']=$this->Modeluser->provinsi();

				$this->load->view('layout/header');
				$this->load->view('v-filter', $data);
				$this->load->view('layout/footer');		
			
			} elseif ($pel && $mapel) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				$data['data']	= $this->Modeluser->filter_soal_pel_bab($mapel, $pel);
				$data['mapel']=$this->Modeluser->provinsi();

				$this->load->view('layout/header');
				$this->load->view('v-filter', $data);
				$this->load->view('layout/footer');
				
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
				$data['data']	= $this->Modeluser->filter_soal_pel($pel);
				$data['mapel']=$this->Modeluser->provinsi();
				
				$this->load->view('layout/header');
				$this->load->view('v-filter', $data);
				$this->load->view('layout/footer');

				
			}
		}
		else
		{
		$mapel = $this->input->post('id_bab');
		$data['data']	= $this->Modeluser->getsoal();
		$data['mapel']	= $this->Modeluser->provinsi();
		$list= $this->Modeluser->getkesulitan();

		$this->load->view('layout/header');
		$this->load->view('v-filter', $data);
		$this->load->view('layout/footer');
		}
		// var_dump($pel, $mapel, $kesulitan);
		
	}

	public function d_filter1()
	{

		$data['mapel']=$this->Modeluser->provinsi();
		$data['data']	= $this->Modeluser->getsoal();
		$list= $this->Modeluser->getkesulitan();

		$this->load->view('layout/header');
		$this->load->view('v-filter', $data);
		$this->load->view('layout/footer');
	}

// public function filterbab(){
		
//  		if ($this->input->post('submit')) 
// 		{
// 			$mapel = $this->input->post('id_bab');
// 			$pel = $this->input->post('pelajaran');
// 			var_dump($pel);
// 			$data['data']	= $this->Modeluser->getsoal();
// 			// $data['mapel']	= $this->Modeluser->getmapel();
			
// 			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
// 			$data['data']	= $this->Modeluser->filter_soal($mapel, $pel);
// 			// $data['data']	= $this->Modeluser->filter_soal_pel($pel);
// 			$this->load->view('layout/header');
// 			$this->load->view('v-coba', $data);
// 			$this->load->view('layout/footer');
// 		}
// 		else
// 		{
// 			$mapel = $this->input->post('id_bab');
// 		$data['data']	= $this->Modeluser->getsoal();
// 		$data['mapel']	= $this->Modeluser->getmapel();
// 		$data['data']	= $this->Modeluser->filter_soal($mapel);
// 		$this->load->view('layout/header');
// 		$this->load->view('v-coba', $data);
// 		$this->load->view('layout/footer');
// 		}

		
// 	}

	// fungsi coba tampil halaman filtering
	

	public function carilagi()
	{
		$pel = $this->input->post('nama_mapel');
		$mapel = $this->input->post('id_bab');
		$kesulitan = $this->input->post('kesulitan');
		// $np = $this->input->post('nama_mapel');
		
		// if ($pel) {
			// $no=$_POST['nama_mapel'];
			$data['data']=$this->Modeluser->getsoalcari($pel);	
			$data['mapel']=$this->Modeluser->provinsi();
			$this->load->view('layout/header');
			$this->load->view('v-filter', $data);
			$this->load->view('layout/footer');
			var_dump($pel);
		// } else {
		// 	$no=$_POST['nama_mapel'];
		// 	$data['data']=$this->Modeluser->cari_soal_all($pel, $no);	
		// 	// $data['content']	= 'kontrak/k_view';
		// 	$this->load->view('v-filter', $data);
		// 	var_dump($pel);
		// }
		// $no=$_POST['id_bank'];
		// $data['data']=$this->Modelbank->get_cari_kon($no);	
		// // $data['content']	= 'kontrak/k_view';
		// $this->load->view('k_view', $data);
	}



}

 ?>