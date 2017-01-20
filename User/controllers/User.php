<?php 



/**
 * 
 */
 class User extends MX_Controller
 {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url','file'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->model('Modeluser');
	}

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/nav');
		// $this->load->view('layout/footer');
	}

	// fungsi tampil form tambah siswa
	public function t_siswa()
	{
		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v_siswa/v-tambah-siswa');
		$this->load->view('admin/layout/footer');
	}
		elseif ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v_siswa/v-tambah-siswa');
		$this->load->view('guru/layout/footer');
	}


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
        if ($this->form_validation->run()==FALSE ) {
        	if ($this->session->userdata('id_admin')) {
            // gagal
            // $this->load->view('vRegistrasi');
            $this->load->view('admin/layout/header');
            $this->load->view('v_siswa/v-tambah-siswa');
            $this->load->view('admin/layout/footer');
        }
        	elseif ($this->session->userdata('id_guru')) {
            // gagal
            // $this->load->view('vRegistrasi');
            $this->load->view('guru/layout/header');
            $this->load->view('v_siswa/v-tambah-siswa');
            $this->load->view('guru/layout/footer');
        }
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
		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('v_guru/v-tambah-guru');
		$this->load->view('admin/layout/footer');
	}
		elseif ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('v_guru/v-tambah-guru');
		$this->load->view('guru/layout/footer');
	}
	}

	

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
            if ($this->session->userdata('id_admin')) {
            // $this->load->view('vRegistrasi');
            $this->load->view('admin/layout/header');
            $this->load->view('v_guru/v-tambah-guru');
            $this->load->view('admin/layout/footer');
        }
        	elseif ($this->session->userdata('id_guru')) {
            // $this->load->view('vRegistrasi');
            $this->load->view('guru/layout/header');
            $this->load->view('v_guru/v-tambah-guru');
            $this->load->view('guru/layout/footer');
        }
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
		if ($this->session->userdata('id_admin')) {
		$data['data']	= $this->Modeluser->getdaftarsiswa();
		$this->load->view('admin/layout/header');
		$this->load->view('v_siswa/v-daftar-siswa', $data);
		$this->load->view('admin/layout/footer');
	}
		elseif ($this->session->userdata('id_guru')) {
		$data['data']	= $this->Modeluser->getdaftarsiswa();
		$this->load->view('guru/layout/header');
		$this->load->view('v_siswa/v-daftar-siswa', $data);
		$this->load->view('guru/layout/footer');
	}
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
			if ($this->session->userdata('id_admin')) {
			// $data['content'] = 'kontrak/k_edit';
			$data['editdata'] = $this->db->get_where('tb_siswa',array('id_siswa'=> $no))->row();
			$this->load->view('admin/layout/header');
			$this->load->view('v_siswa/v-edit-siswa', $data);
			$this->load->view('admin/layout/footer');
		}
			elseif ($this->session->userdata('id_guru')) {
			// $data['content'] = 'kontrak/k_edit';
			$data['editdata'] = $this->db->get_where('tb_siswa',array('id_siswa'=> $no))->row();
			$this->load->view('guru/layout/header');
			$this->load->view('v_siswa/v-edit-siswa', $data);
			$this->load->view('guru/layout/footer');
		}
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
		elseif ($this->session->userdata('id_guru')) {
		$data['data']	= $this->Modeluser->getdaftarguru();
		$this->load->view('guru/layout/header');
		$this->load->view('v_guru/v-daftar-guru', $data);
		$this->load->view('guru/layout/footer');
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
			if ($this->session->userdata('id_admin')) {
			// $data['content'] = 'kontrak/k_edit';
			$data['editdata'] = $this->db->get_where('tb_guru',array('id_guru'=> $no))->row();
			$this->load->view('admin/layout/header');
			$this->load->view('v_guru/v-edit-guru', $data);
			$this->load->view('admin/layout/footer');
		}
			elseif ($this->session->userdata('id_guru')) {
			// $data['content'] = 'kontrak/k_edit';
			$data['editdata'] = $this->db->get_where('tb_guru',array('id_guru'=> $no))->row();
			$this->load->view('guru/layout/header');
			$this->load->view('v_guru/v-edit-guru', $data);
			$this->load->view('guru/layout/footer');
		}
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
		$data['data']	= $this->Modeluser->getdaftarsiswa();
		$data['mapel']	= $this->Modeluser->getmapel();
		$this->load->view('layout/header');
		$this->load->view('v-coba', $data);
		$this->load->view('layout/footer');
	}

	public function cari()
	{
		if ($this->input->post('submit')) 
		{
			$mapel = $this->input->post('id_mapel');
			
			
				 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
		$data['data']	= $this->Modeluser->filter_mapel_bab($mapel);
		$this->load->view('v-hasil', $data);
		}
		else
		{
		$data['data']	= $this->Modeluser->getdaftarsiswa();
		$data['mapel']	= $this->Modeluser->getmapel();
		$this->load->view('layout/header');
		$this->load->view('v-coba', $data);
		$this->load->view('layout/footer');
		}
		
	}


}

 ?>