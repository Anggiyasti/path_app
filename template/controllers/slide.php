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

  public function view($id){
    if ($this->session->userdata('id_admin')) {
       
            $data['artikel']=$this->m_slide->artikel();
            $data['slide'] = $this->m_slide->get_gambarslide($id);
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
            // redirect('template/slide');
            
        

            // $this->load->view('beranda/main_view',$error);,
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            // var_dump($photo);
            $this->m_slide->gambar_slide($id,$photo);
            echo "berhasil upload"; 
            //for testing
            // $data['img'] = base_url().'/images/'.$file_data['file_name'];
            // $this->load->view('beranda/success_msg',$data);
            
        }
    }



    public function gambararticle($id) {

        // unlink(FCPATH . "./assets/images/mapel/" . $id);
        $config['upload_path'] = './assets/app/halo/img';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 2000;
        $config['max_width'] = 700;
        $config['max_height'] = 467;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {



            $data['error'] = array('error' => $this->upload->display_errors());

            $data['slide'] = $this->m_slide->get_gambarslide($id);
            if ($this->session->userdata('id_admin')) {
            $this->load->view('admin/layout/header');
          $this->load->view('slide/gambar_slide',$data);
          $this->load->view('admin/layout/footer');
        }
        else{
          
        }

            // $this->load->view('beranda/main_view',$error);,
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->m_slide->gambar_artikel($id,$photo);
            echo "berhasil upload"; 
            //for testing
            // $data['img'] = base_url().'/images/'.$file_data['file_name'];
            // $this->load->view('beranda/success_msg',$data);
            
        }
    }

 
 }
 ?>