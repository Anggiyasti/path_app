<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passinggrade extends MX_Controller {

	public function __construct() {
       parent::__construct();
        $this->load->helper('url');
        $this->murl = 'assets/adminre/';
        $this->load->model('Mpassing');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
    }

	public function index() {
		$this->load->model('Mpassing');
	}

	public function tambah_passing()
	{
		//set validation rules
        $this->form_validation->set_rules('kode', 'kode', 'trim|required');
        $this->form_validation->set_rules('wilayah', 'wilayah', 'trim|required');
        $this->form_validation->set_rules('universitas', 'universitas', 'trim|required');
        $this->form_validation->set_rules('prodi', 'program studi', 'trim|required');
        $this->form_validation->set_rules('passinggrade', 'passing grade', 'trim|required');
        

        //validate form input
        if ($this->form_validation->run()==FALSE ) {
        	if ($this->session->userdata('id_admin')) {
            // gagal
            // $this->load->view('vRegistrasi');
            $this->load->view('admin/layout/header');
            $this->load->view('add_passing');
            $this->load->view('admin/layout/footer');
        }
        	elseif ($this->session->userdata('id_guru')) {
            // gagal
            // $this->load->view('vRegistrasi');
            $this->load->view('guru/layout/header');
            $this->load->view('add_passing');
            $this->load->view('guru/layout/footer');
        }
        } else {

            //insert the user registration details into database
            $data = array(
                'kode' => $this->input->post('kode'),
                'wilayah' => $this->input->post('wilayah'),
                'universitas' => $this->input->post('universitas'),
                'prodi' => $this->input->post('prodi'),
                'passinggrade' => $this->input->post('passinggrade')
            );
            
            // insert form data into database
            if ($this->Mpassing->insert_passing($data))
            {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully </div>');
                    redirect('passinggrade/t_pass');
            
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('passinggrade/t_pass');
            }
        }
	}

	
	public function t_pass()
	{
		if ($this->session->userdata('id_admin')) {
		$this->load->view('admin/layout/header');
		$this->load->view('add_passing');
		$this->load->view('admin/layout/footer');
	}
		elseif ($this->session->userdata('id_guru')) {
		$this->load->view('guru/layout/header');
		$this->load->view('add_passing');
		$this->load->view('guru/layout/footer');
	}
	}

    public function edit_pass($no) {
        if ($this->input->post('update')) 
        {
            $this->Mpassing->update_passing();
            
            if ($this->db->affected_rows())
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
                redirect('Passinggrade/daftar_pass');
            }
            else
            {
                 $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
                redirect('Passinggrade/daftar_pass');
            }
        }
        else
        {
            if ($this->session->userdata('id_admin')) {
            // $data['content'] = 'kontrak/k_edit';
            $data['editdata'] = $this->db->get_where('tb_passing_grade',array('id_passing'=> $no))->row();
            $this->load->view('admin/layout/header');
            $this->load->view('edit_passing', $data);
            $this->load->view('admin/layout/footer');
        }
            elseif ($this->session->userdata('id_guru')) {
            // $data['content'] = 'kontrak/k_edit';
            $data['editdata'] = $this->db->get_where('tb_passing_grade',array('id_passing'=> $no))->row();
            $this->load->view('guru/layout/header');
            $this->load->view('edit_passing', $data);
            $this->load->view('guru/layout/footer');
        }
        }
    }


    public function daftar_pass()
    {
        if ($this->session->userdata('id_admin')) {
        $data['data']   = $this->Mpassing->getpassing();
        $this->load->view('admin/layout/header');
        $this->load->view('daftar_passing', $data);
        $this->load->view('admin/layout/footer');
    }
        elseif ($this->session->userdata('id_guru')) {
        $data['data']   = $this->Mpassing->getpassing();
        $this->load->view('guru/layout/header');
        $this->load->view('daftar_passing', $data);
        $this->load->view('guru/layout/footer');
    }
    }

    public function delete_pass($id) {
        $this->Mpassing->delete_passing($id);

        if ($this->db->affected_rows()) 
        {
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Deleted </div>');
            redirect('passinggrade/daftar_pass');    
        }
        else
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Failed </div>');
            redirect('passinggrade/daftar_pass');
        }

    }

    // tampilan awal passing grade
    public function pass_grade()
    {
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        $this->load->view('v-front');
    }

    // fungsi untuk menampilkan berdasarkan universitas
    public function univ()
    {
        $data['data']   = $this->Mpassing->getpassing();
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        $this->load->view('v-univ', $data);
        
    }

    //fungsi untuk memilih prodi
    public function pilih_prodi()
    {
        $data['data']   = $this->Mpassing->tampil_prodi();
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        $this->load->view('v-pilih-prodi', $data);
        
    }

    // fungsi untuk menampilkan  prodi berdasarkan pilihan 
    public function prodi($prodi)
    {   
       $prodii = urldecode($prodi);
        $data['data']   = $this->Mpassing->getprodi($prodii);
        $data['prodi'] = $prodii;
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        $this->load->view('v-prodi', $data);
        
    }

    public function passing()
    {
        // $data['data']   = $this->Mpassing->getpassing();
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        $this->load->view('v-passing');
        
    }
    public function hasilpassing()
    {
        $pass = htmlspecialchars($this->input->post('pass'));


        if ($pass = '1') {
            $a = 40;
            $b = 50;
        }
        $data['data']  = $this->Mpassing->hasil_passing($a,$b);
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        $this->load->view('v-cobapassing',$data);

        // var_dump($data);

        
    }



}