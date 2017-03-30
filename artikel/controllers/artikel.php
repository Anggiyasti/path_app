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
        $this->load->model('login/Loginmodel');
        $this->load->library('pagination');
        $this->load->model('workout1/Mworkout1');
  }

 	function index()
 	{ 
        // pengecekan hak akses
 		if ($this->session->userdata('id_admin')) {
            $slidefront = $this->m_artikel->getDaftarslide();
            $data['data']= $slidefront;  
            $this->load->view('admin/layout/header');
            $this->load->view('v_daftar_artikel',$data);
            $this->load->view('admin/layout/footer');
        }else{
            redirect('logoin');
      }

    }

  // fungsi view artikel untuk backend
    public function view_artikel($id){
        $data['artikel'] = $this->m_artikel->get_gambarartikel($id);
        if ($this->session->userdata('id_admin')) {
            $this->load->view('admin/layout/header');
            $this->load->view('v_update_artikel',$data);
            $this->load->view('admin/layout/footer');
        }
        else{
            redirect('login');
        }
    }  

    // FUNGSI UPLOAD GAMBAR ARTIKEL BACKEND
    public function gambar_artikel($id) {

        $config['upload_path'] = './assets/app/halo/img/artikel';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 2000;
        $config['max_width'] = 700;
        $config['max_height'] = 467;
        $this->load->library('upload', $config);

        // PENGECEKAN KETIKA UPDATE APAKAH ADA FOTO ATAU TIDAK
        if (!$this->upload->do_upload('photo')) {
            $this->m_artikel->gambar_artikel1($id);            
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->m_artikel->gambar_artikel($id,$photo);
        }
    }

    // FUNGSI VIEW FORM ARTIKEL
    function tambahartikel()
    {
        if ($this->session->userdata('id_admin')) {
            $this->load->view('admin/layout/header');
            $this->load->view('v_tambah_artikel');
            $this->load->view('admin/layout/footer');
        }else{
            redirect('login');
        }
    }

    // FUNGSI INSERT ARTIKEL
    public function insertartikel(){
        $status ="";
        $msg ="";
        $filename="gambar";

        if ($status != "error") {
            $config['upload_path']= './assets/app/halo/img/artikel';
           $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
            $config['max_size'] = 2000;
            $config['max_width'] = 700;
            $config['max_height'] = 467;

            $this->load->library('upload',$config);
            // PENGECEKAN UPLOAD ARTIKEL
            if (!$this->upload->do_upload($filename))  {
                $status = 'error';
                $msg = $this->upload->display_errors('','');
            } else {
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
        }
    }


    // FUNGSI HAPUS ARTIKEL
    public function hapus_artikel($id_artikel) {
      $this->m_artikel->delete_artikel($id_artikel);
        // PENGECCEKAN JIKA BERHASIL DIHAPUS ATAU TIDAK
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', '<div class="alert alert-success text-center">Berhasil Dihapus</div>');
            redirect('artikel'); 
        } else {
            $this->session->set_flashdata('pesan2', '<div class="alert alert-danger text-center">Gagal Dihapus!</div>');
            redirect('artikel');
        }
    }
    
    // coba pagination news
    public function news()
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->m_artikel->jumlah_data();
       
        $config['base_url'] = base_url().'index.php/artikel/news/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 3;

        // Start Customizing the “Digit” Link
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // end  Customizing the “Digit” Link
        
        // Start Customizing the “Current Page” Link
        $config['cur_tag_open'] = '<li><a><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        // END Customizing the “Current Page” Link

        // Start Customizing the “Previous” Link
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
         // END Customizing the “Previous” Link

        // Start Customizing the “Next” Link
        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
         // END Customizing the “Next” Link

        // Start Customizing the first_link Link
        $config['first_link'] = '<span aria-hidden="true">&larr; First</span>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
         // END Customizing the first_link Link

        // Start Customizing the last_link Link
        $config['last_link'] = '<span aria-hidden="true">Last &rarr;</span>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
         // END Customizing the last_link Link
        
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $list = $this->m_artikel->data_news($config['per_page'],$from);

        $this->tampnews($list);

    }

     //tampung list semua soal u/ ke view
    public function tampnews($list)
    {
        // ekstrak data db ke new array
        $data['datnews']=array();
        foreach ( $list as $list_news ) {
            $id_art=$list_news['id_artikel'];
            $judul=$list_news['judul_artikel'];
            $isi=$list_news['isi_artikel'];

            $data['datnews'][]=array(
                'id_artikel'=>$id_art,
                'judul_artikel' => $judul,
                'isi_artikel' => $isi
            );
        }
        
        $sis = $this->session->userdata('id_siswa');
        $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
        // get data nilai tertinggi
        $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
        $dataa['log']  = $this->Loginmodel->getlogact();

        // pengecekan hak akses
        if ($this->session->userdata('id_siswa')) {
            $this->load->view('template/siswa2/v-header',$dataa);
            $this->load->view('v-news',$data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }
    }

 }
 ?>
