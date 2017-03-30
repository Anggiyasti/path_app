<?php 



/**
 * 
 */
 class artikel extends MX_Controller
 {

 	 function __construct()
  {
    parent::__construct();
        $this->load->helper('url');
        $this->murl = 'assets/adminre/';
        $this->load->model('m_artikel');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
        $this->load->library('pagination');
    # code...
  }

 	function index()
 	{
 		if ($this->session->userdata('id_admin')) {
    $slidefront = $this->m_artikel->getDaftarslide();
    $data['data']= $slidefront;  
    $this->load->view('admin/layout/header');
    $this->load->view('v_daftar_artikel',$data);
    $this->load->view('admin/layout/footer');
    }else{

  }

  }

  public function view_artikel($id){
    $data['artikel'] = $this->m_artikel->get_gambarartikel($id);
        if ($this->session->userdata('id_admin')) {
               // var_dump($data);
        $this->load->view('admin/layout/header');
        $this->load->view('v_update_artikel',$data);
        $this->load->view('admin/layout/footer');
        }
        else{
          
        }

  }

  public function gambar_artikel($id) {

        // unlink(FCPATH . "./assets/images/mapel/" . $id);
        $config['upload_path'] = './assets/app/halo/img/artikel';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 2000;
        $config['max_width'] = 700;
        $config['max_height'] = 467;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            $this->m_artikel->gambar_artikel1($id);



            // $data['error'] = array('error' => $this->upload->display_errors());
            


        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->m_artikel->gambar_artikel($id,$photo);
            echo "berhasil upload"; 

            
        }
    }

    function tambahartikel()
    {
        if ($this->session->userdata('id_admin')) {
    $this->load->view('admin/layout/header');
    $this->load->view('v_tambah_artikel');
    $this->load->view('admin/layout/footer');
    }else{

  }

  }

  public function insertartikel(){
        $status ="";
        $msg ="";
        $filename="gambar";

        // if (empty($_POST['tipe']) || empty($_POST['keterangan'])) {
        //     $status="error";
        //     $msg= "isi dengan benar";       
        // }

        if ($status != "error") {
            $config['upload_path']= './assets/app/halo/img/artikel';
           $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
            $config['max_size'] = 2000;
            $config['max_width'] = 700;
            $config['max_height'] = 467;
            // $config['encrypt_name']= true;

            $this->load->library('upload',$config);

            if (!$this->upload->do_upload($filename)) 
            {
                $status = 'error';
                $msg = $this->upload->display_errors('','');

            }
            else{
                // $this->load->model('rumah/Admin_model');
                $data= $this->upload->data();
                $file_id = $this->m_artikel->insert_artikel($_POST['judul_artikel'],
                                                            $_POST['editor1'],
                                                            $data['file_name']);
            if ($file_id) {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Berhasil</div>');
                redirect('artikel/tambahartikel');
            }
            else{
                unlink($data['full_path']);
                    $status = "error";
                    $msg = "Please Try Again";
            }
            }
            @unlink($_FILES[$filename]);

        // }
        // echo json_encode(array('status'=>$status,'msg'=>$msg));
    }


}


// FUNGSI HAPUS ARTIKEL
    public function hapus_artikel($id_artikel) {
      $this->m_artikel->delete_artikel($id_artikel);

      if ($this->db->affected_rows()) 
      {
        $this->session->set_flashdata('info', '<div class="alert alert-success text-center">Berhasil Dihapus</div>');
        redirect('artikel'); 
      }
      else
      {
        $this->session->set_flashdata('pesan2', '<div class="alert alert-danger text-center">Gagal Dihapus!</div>');
        redirect('artikel');
      }

    }
 
 }
 ?>