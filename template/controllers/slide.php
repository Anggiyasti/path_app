<?php 



/**
 * 
 */
 class Slide extends MX_Controller
 {

 	 function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->murl = 'assets/adminre/';
    $this->load->model('m_slide');
    $this->load->helper(array('form', 'url', 'file', 'html'));
    $this->load->library('form_validation');
    $this->load->library('pagination');
  }

 	function index()
 	{
 		if ($this->session->userdata('id_admin')) {
            $slidefront = $this->m_slide->getDaftarslide();
            $data['data']= $slidefront;  
            $this->load->view('admin/layout/header');
            $this->load->view('slide/slide',$data);
            $this->load->view('admin/layout/footer');
     	}else{
            redirect('login');
      }

  }

  function tampilslide_passing()
  {
    if ($this->session->userdata('id_admin')) {
            $slidefront = $this->m_slide->getDaftarslide_passing();
            $data['data']= $slidefront;  
            $this->load->view('admin/layout/header');
            $this->load->view('slide/slide_passing',$data);
            $this->load->view('admin/layout/footer');
      }else{
            redirect('login');
      }

  }

  //FUNGSI UNTUK MASUK KE FORM UPDATE
  public function view($id){
    if ($this->session->userdata('id_admin')) {
       
            $data['slide'] = $this->m_slide->get_gambarslide($id);
            $id_artikel = $data['slide'][0]['id_artikel'];
            $data['judul_artikel'] = $this->m_slide->get_judul($id_artikel)['judul_artikel'];
            $data['id_art'] = $this->m_slide->get_judul($id_artikel)['id_artikel'];
            $data['artikel']=$this->m_slide->artikel($id_artikel);
            $this->load->view('admin/layout/header');
            $this->load->view('slide/gambar_slide',$data);
            $this->load->view('admin/layout/footer');
            
        }
        else{
          
        }
  }

  // FUNGSI VIEW GAMBAR SLIDE
  public function gambar_slide($id) {

        $config['upload_path'] = './assets/app/halo/img';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 2000;
        $config['max_width'] = 700;
        $config['max_height'] = 1050;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            
            $this->m_slide->gambar_slide1($id);
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
  
            $this->m_slide->gambar_slide($id,$photo);
            echo "berhasil upload"; 
            
            
        }
    }

    public function view_slide_passing($id){
    
  }

     // FUNGSI VIEW GAMBAR SLIDE
  public function gambar_slide_passing($id) {

        $config['upload_path'] = './assets/app/halo/img';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 2000;
        $config['max_width'] = 700;
        $config['max_height'] = 467;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {
            
            if ($this->session->userdata('id_admin')) {
       
            $data['artikel']=$this->m_slide->artikel();
            $data['slide'] = $this->m_slide->get_gambarslide($id);
            $this->load->view('admin/layout/header');
            $this->load->view('slide/gambar_slide_passing',$data);
            $this->load->view('admin/layout/footer');
            
        }
        else{
          
        }
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->m_slide->gambar_slide_passing($id,$photo);
            echo "berhasil upload"; 
            
            
        }
    }



 
 }
 ?>