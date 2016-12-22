<?php 

/**
* 
*/
class Videoback extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Videobackmodel');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
        $this->load->library('table');

    }

    public function index()
    {
       $data['mapel']=$this->Videobackmodel->provinsi();
        
        if ($this->session->userdata('id_admin')) {
            $this->load->view('admin/layout/header');
        // $this->load->view('layout/nav');
        $this->load->view('v-form-video', $data);
        $this->load->view('admin/layout/footer');

            # code...
        }
        elseif ($this->session->userdata('id_guru')) {
            $this->load->view('guru/layout/header');
        // $this->load->view('layout/nav');
        $this->load->view('v-form-video', $data);
        $this->load->view('guru/layout/footer');

            # code...
        }
        

    }

    // fungsi tampil bab di ajax
    function ambil_data(){

        $modul=$this->input->post('modul');
        $id=$this->input->post('id');

        if($modul=="getbab"){
        echo $this->Videobackmodel->getbab($id);
        }
        else if($modul=="getkesulitan"){
        // echo $this->Modeluser->getkes($id);
        }
        else if($modul=="kelurahan"){

        }
    }

    // fungsi cek option upload video
    public function cek_option_upload()
     {
        //set role
        $this->form_validation->set_rules('deskripsi', 'Judul Video', 'required');
        // $this->form_validation->set_rules('id_bab', 'Bab', 'required');
         // $this->form_validation->set_rules('video', 'Video', 'required');

        //pesan error atau pesan kesalahan pengisian form upload video
        $this->form_validation->set_message('required', '*Data tidak boleh kosong!');
        //value post
         $data['judul_video'] = htmlspecialchars($this->input->post('judul_video'));
         $data['deskripsi'] = htmlspecialchars($this->input->post('deskripsi'));
         $data['id_bab'] = htmlspecialchars($this->input->post('id_bab'));
         $data['publish'] = htmlspecialchars($this->input->post('publish'));
         $data['jenis_video'] = htmlspecialchars($this->input->post('jenis_video'));
         $link=$this->input->post('link_video');
         $option_up=htmlentities($this->input->post('option_up'));
        // if ($this->form_validation->run() == FALSE) {
        //     redirect('banksoal');
        // }else{
             if ($option_up =='link') {
                $UUID = uniqid();
                $linkembed=$this->get_linkembed($link);
                 $data_video = array(
                    'judul_video' => $data['judul_video'] ,
                    'link' => $linkembed,
                    'deskripsi' => $data['deskripsi'],
                    'publish' => $data['publish'],
                    'id_bab' => $data['id_bab'],
                     'jenis_video' => $data['jenis_video']
                );
               
                $this->Videobackmodel->insertVideo($data_video);
             }else {
               
                $this->upload_video_server();
             }
     } 

     // fungsi untuk upload video
    public function upvideo($data) {
        $date = date("ymd");
        $configVideo['upload_path'] = './assets/video';
        $configVideo['max_size'] = '60000';
        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
       $video_name = $date.$_FILES['video']['name'];
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
         $this->upload->initialize($configVideo);
             // pengecekan upload
        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if(!$this->upload->do_upload('video')) {
            echo $this->upload->display_errors();
        }else{
            $videoDetails = $this->upload->data();

            // jika uplod video berhasil jalankan fungsi penyimpanan data video ke db
            // $file_data = $this->upload->data();
            $video = $file_data['filename'];

            $UUID=uniqid();
                //data yg akan di masukan ke tabel video
            $data_video = array(
                'judul_video' => $data['judul_video'] ,
                // 'nama_file' => $data['nama_file'],
                'deskripsi' => $data['deskripsi'],
                'publish' => $data['publish'],
                'id_bab' => $data['id_bab'],
                'jenis_video' => $data['jenis_video']
                );

            $this->Videobackmodel->insertVideo($data_video);
        }
}

    // get id video youtube untuk di simpan ke db
     public function get_linkembed($link)
     {
        $mulai='0';
        $end='0';
        $linkembed=' ';
        $i=0;
        // echo strlen($nama);
        for ($x = 0; $x < strlen($link); $x++) {

          if ($link[$x] == '=' ) {
            $startID=$x+1;
            $linkembed='https://www.youtube.com/embed/'.substr($link, $startID,11);
            break;
          }else{
            $linkembed=$link;
          }
          
        }
        return $linkembed;
     }

     // fungsi upload video ke server di folder assets/video
    public function upload_video_server(){
    if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
        $data['judul_video'] = htmlspecialchars($this->input->post('judul_video'));
         $data['deskripsi'] = htmlspecialchars($this->input->post('deskripsi'));
         $data['id_bab'] = htmlspecialchars($this->input->post('id_bab'));
         $data['publish'] = htmlspecialchars($this->input->post('publish'));
         $data['jenis_video'] = htmlspecialchars($this->input->post('jenis_video'));
         $data['nama_file'] = htmlspecialchars($this->input->post('nama_file'));
         $link=$this->input->post('link_video');
        unset($config);
        $date = date("ymd");
        $configVideo['upload_path'] = './assets/video';
        $configVideo['max_size'] = '90000';
        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = $date.$_FILES['video']['name'];
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if(!$this->upload->do_upload('video')) {
            echo $this->upload->display_errors();
        }else{
            $videoDetails = $this->upload->data();
             $data_video = array(
                'judul_video' => $data['judul_video'] ,
                'nama_file' =>  $video_name,
                'deskripsi' => $data['deskripsi'],
                'publish' => $data['publish'],
                'id_bab' => $data['id_bab'],
                'jenis_video' => $data['jenis_video']
                );

            $this->Videobackmodel->insertVideo($data_video);
            // $data['video_name']= $configVideo['file_name'];
            // $data['video_detail'] = $videoDetails;
            // $this->load->view('movie/show', $data);
        }

    }else{
        echo "Please select a file";
    }
  }

    // fungsi tampil video
    function daftarvideo(){
    
    if ($this->session->userdata('id_admin')) {
        # code...
        $data['data']   = $this->Videobackmodel->tampilvideo();
    $this->load->view('admin/layout/header');
    // $this->load->view('layout/nav');
    $this->load->view('v-daftar-video', $data);
    $this->load->view('admin/layout/footer');
    }
    if ($this->session->userdata('id_guru')) {
        # code...
        $data['data']   = $this->Videobackmodel->tampilvideo();
    $this->load->view('guru/layout/header');
    // $this->load->view('layout/nav');
    $this->load->view('v-daftar-video', $data);
    $this->load->view('guru/layout/footer');
    }


  }

    // fungsi edit video
    public function edit_video($video) {
            $data['mapel']=$this->Videobackmodel->provinsi();
            $data['editdata'] = $this->db->get_where('tb_video',array('id_video'=> $video))->row();
            $data['video']=$this->Videobackmodel->get_video($video)[0];
            if ($this->session->userdata('id_admin')) {
                $this->load->view('admin/layout/header');
                // $this->load->view('layout/nav');
                $this->load->view('v-edit-video', $data);
                $this->load->view('admin/layout/footer');
                # code...
            }
            elseif ($this->session->userdata('id_guru')) {
                $this->load->view('guru/layout/header');
                // $this->load->view('layout/nav');
                $this->load->view('v-edit-video', $data);
                $this->load->view('guru/layout/footer');
                # code...
            }
            
    }

    
     // fungsi update video bukan link
     public function updatevideo(){
        $data['judul_video'] = htmlspecialchars($this->input->post('judul_video'));
         $data['deskripsi'] = htmlspecialchars($this->input->post('deskripsi'));
         $data['id_bab'] = htmlspecialchars($this->input->post('id_bab'));
         $data['publish'] = htmlspecialchars($this->input->post('publish'));
         $data['jenis_video'] = htmlspecialchars($this->input->post('jenis_video'));
         $data['nama_file'] = htmlspecialchars($this->input->post('nama_file'));
            $data['id_video'] = htmlspecialchars($this->input->post('id_video'));
         $link=$this->input->post('link_video');
        unset($config);
        $date = date("ymd");
        $configVideo['upload_path'] = './assets/video';
        $configVideo['max_size'] = '90000';
        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = $date.$_FILES['video']['name'];
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if(!$this->upload->do_upload('video')) {
            echo $this->upload->display_errors();
        }else{
            $videoDetails = $this->upload->data();
             $data['video']  = array(
                'id_video' => $data['id_video'],
                'judul_video' => $data['judul_video'] ,
                'nama_file' =>  $video_name,
                'deskripsi' => $data['deskripsi'],
                'publish' => $data['publish'],
                'id_bab' => $data['id_bab'],
                'link' => null,
                'jenis_video' => $data['jenis_video']
                );

            $this->Videobackmodel->up_video($data);
            // $data['video_name']= $configVideo['file_name'];
            // $data['video_detail'] = $videoDetails;
            // $this->load->view('movie/show', $data);
        }

  }
  
  // fungsi cek option update video
  public function cek_option_update()
     {
        $this->form_validation->set_rules('deskripsi', 'Judul Video', 'required');
       
        //pesan error atau pesan kesalahan pengisian form upload video
        $this->form_validation->set_message('required', '*Data tidak boleh kosong!');
        //value post
         $data['judul_video'] = htmlspecialchars($this->input->post('judul_video'));
         $data['deskripsi'] = htmlspecialchars($this->input->post('deskripsi'));
         $data['id_bab'] = htmlspecialchars($this->input->post('id_bab'));
         $data['publish'] = htmlspecialchars($this->input->post('publish'));
         $data['jenis_video'] = htmlspecialchars($this->input->post('jenis_video'));
         $data['id_video'] = htmlspecialchars($this->input->post('id_video'));
         $link=$this->input->post('link_video');
         $option_up=htmlentities($this->input->post('option_up'));
        if ($this->form_validation->run() == FALSE) {
            redirect('videoback');
        }else{
             if ($option_up =='link') {
                $UUID = uniqid();
                $linkembed=$this->get_linkembed($link);
                 $data['video']  = array(
                    'id_video' => $data['id_video'] ,
                    'judul_video' => $data['judul_video'] ,
                    'nama_file' => null,
                    'link' => $linkembed,
                    'deskripsi' => $data['deskripsi'],
                    'publish' => $data['publish'],
                    'id_bab' => $data['id_bab'],
                     'jenis_video' => $data['jenis_video']
                );
               // update ke db
                $this->Videobackmodel->up_video($data);
             }else {
               // panggil fungsi update video kalau update video ke server
                $this->updatevideo();
             }
     } 
 }

     //hapus file video
    public function del_file_video($videoID)
    {
        $oldVideo=$this->Videobackmodel->get_nameFile($videoID)[0];
        $nameVideo=$oldVideo->nama_file;
        
       if ($nameVideo!=null) {
           unlink("./assets/video/" . $nameVideo);
       }
       $this->dropVideo($videoID);  
    }

     //hapus video di db
    public function dropVideo($videoID)
    {
        $this->Videobackmodel->del_video($videoID);
        redirect('videoback/daftarvideo');
    }

    public function tes_mini()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/index');
    }

    
}
 ?>