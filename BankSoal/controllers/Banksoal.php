<?php 



/**
 * 
 */
 class Banksoal extends MX_Controller
 {
  
  function __construct()
  {
    parent::__construct();
        $this->load->helper('url');
        $this->murl = 'assets/adminre/';
        $this->load->model('Modelbank');
    $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
         $this->load->library('pagination');
    # code...
  }

  
    function ambil_data(){
      //fungsi ambil data unruk dropdown
    $modul=$this->input->post('modul');
    $id=$this->input->post('id');

    if($modul=="getbab"){
    echo $this->Modelbank->getbab($id);
  }
  }


  public function listsoal()
    {

        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data();
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoal/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;

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
        $list = $this->Modelbank->data_soal($config['per_page'],$from);

        $this->tampSoal($list);
    }

public function listfilter($data)
    {

        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data();
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoal/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;

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
        $list = $this->Modelbank->data_soal_filter($config['per_page'],$from, $data);

        $this->tampSoal($list);
    }

    //tampung list semua soal u/ ke view
    public function tampSoal($list)
    {
        //  $data['judul_halaman'] = "Bank Soal";
        // $data['files'] = array(
        //     APPPATH . 'modules/banksoal/views/v-soal-all2.php',
        //     );
        // $this->load->view('soal/v-soal-all2');
         // $pilihan = $this->Mbanksoal->get_allpilihan();
        // ekstrak data db ke new arrat
          $data['datSoal']=array();
          foreach ( $list as $list_soal ) {
            $id_bank=$list_soal['id_bank'];
            $jawaban_benar=$list_soal['jawaban_benar'];
            $id_bank=$list_soal['id_bank'];
            $random=$list_soal['random'];
            $publish=$list_soal['publish'];
            $judulSoal = $list_soal['judul_soal'];
            $tingkat = $list_soal['kesulitan'];
            $soal=$list_soal['soal'];
            $sumber=$list_soal['sumber'];
            $UUID=$list_soal['UUID'];
            $mapel= $list_soal['nama_mapel'];
            $bab = $list_soal['judul_bab'];
            $tampBahas=$list_soal['pembahasan'];
            $pembahasan = '<a style="color:red;">Maaf Pembahasan Belum Tersedia !! </a>';
          
            $tampVideo = $list_soal['pembahasan'];
            $videoBahas ='';
            $tampImgSoal= $list_soal['gambar_soal'];
            $imgSoal='';
            $imgJawaban='';
            $jawaban_benar=$list_soal['jawaban_benar'];
            $isiJawaban = '';

            if ($jawaban_benar != '' && $jawaban_benar != ' ') {
                //untuk menampung data sementara jawaban
                $tampJawaban = $this->Modelbank->get_jawaban($jawaban_benar,$id_bank);
                $isiJawaban = $tampJawaban['jawaban'];
                $tampImgJawaban = $tampJawaban['imgJawaban'];
                if ($tampImgJawaban != '' && $tampImgJawaban != ' ' ) {
                     $imgJawaban=base_url().'/assets/images/jawaban/'.$tampImgJawaban;
                }
            }



            

            //pengecekan pembahsan
            
            if($tampVideo !='' && $tampVideo !=' ') {
                $videoBahas=base_url().'/assets/video/video_soal/'.$tampVideo;
                $pembahasan=$tampVideo;
            }
            elseif ($tampBahas != '' && $tampBahas != ' ') {
                $pembahasan=$tampBahas;
          }
            
            // Pengecekan gambar Soal
            if ($tampImgSoal!='' && $tampImgSoal != ' ') {
                // jika gambar tidak null 
                $imgSoal=base_url().'/assets/uploads/'.$tampImgSoal;
            } 


            if ($tingkat == '3') {
                $kesulitan = 'Sulit';
            } elseif ($tingkat == '2') {
                $kesulitan = 'Sedang';
            }else {
               $kesulitan = 'Mudah';
            }

            



            

            if ($tingkat == '3') {
                $kesulitan = 'Sulit';
            } elseif ($tingkat == '2') {
                $kesulitan = 'Sedang';
            }else {
               $kesulitan = 'Mudah';
            }

            $data['datSoal'][]=array(
                'id_bank'=>$id_bank,
                'judulSoal'=>$judulSoal,
                'soal'=>$soal,
                'imgSoal'=>$imgSoal,
                'kesulitan'=>$kesulitan,
                'publish'=>$publish,
                'random'=>$random,
                'sumber'=>$sumber,
                'mapel'=>$mapel,
                'bab'=> $bab,
                'pembahasan' => $pembahasan,
                'videoBahas'=>$videoBahas,
                'UUID'=>$UUID,
                'jawaban'=>$jawaban_benar,
                'isiJawaban'=>$isiJawaban,
                'imgJawaban'=>$imgJawaban
                );
          }
        // 

        //  #START cek hakakses#
        // $hakAkses=$this->session->userdata['HAKAKSES'];
        // if ($hakAkses=='admin') {
        //         $this->parser->parse('admin/v-index-admin', $data);
        // } elseif($hakAkses=='guru'){
        //      // jika guru
        //        $this->parser->parse('templating/index-b-guru', $data);
        // }else{
        //     // jika siswa redirect ke welcome
        //     redirect(site_url('welcome'));
        // }
        #END Cek USer#
          $data['mapel']=$this->Modelbank->getmapel();
    $data['data'] = $this->Modelbank->getsoal();
      if     ($this->session->userdata('id_admin')) {
          $this->load->view('admin/layout/header');
          $this->load->view('soal/v-soal-all2', $data);
          $this->load->view('admin/layout/footer');
    } elseif ($this->session->userdata('id_guru')) {
          $this->load->view('guru/layout/header');
          $this->load->view('soal/v-soal-all2', $data);
          $this->load->view('guru/layout/footer');
  }
        
        
    }

  
    public function uploadsoal()
  {
    // upload soal
    $UUID = uniqid();
    //set validation rules
        $judul_soal  = $this->form_validation->set_rules('judul_soal', 'Nama Depan', 'trim|required');
        
        $this->form_validation->set_rules('sumber', 'Email ID', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // gagal
            site_url('banksoal');
        } else {
          $judul_soal = htmlspecialchars($this->input->post('judul_soal'));
          $soal = $this->input->post('editor1');
           $gambarSoal = $this->input->post('gambarSoal');
           $options = htmlspecialchars($this->input->post('options'));
          $jawaban = htmlspecialchars($this->input->post('jawaban_benar'));
          $kesulitan = htmlspecialchars($this->input->post('kesulitan'));
          $id_mapel = htmlspecialchars($this->input->post('id_mapel'));
          $judul_bab = htmlspecialchars($this->input->post('judul_bab'));
          $sumber = htmlspecialchars($this->input->post('sumber'));
          $random = htmlspecialchars($this->input->post('random'));
          //$pembahasan = htmlspecialchars($this->input->post('pembahasan'));
          $publish = htmlspecialchars($this->input->post('publish'));
          if ($this->session->userdata('id_admin')) {
            $create_by = $this->session->userdata['username'];
          }
          elseif ($this->session->userdata('id_guru')) {
          $create_by = $this->session->userdata['username'];
            # code...
          }


          $a = $this->input->post('a');
          $b = $this->input->post('b');
          $c = $this->input->post('c');
          $d = $this->input->post('d');
          $e = $this->input->post('e');


          //kesulitan indeks 1-3
          //insert soal into database
           $dataSoal = array(
            'judul_soal' => $judul_soal,
            'soal' => $soal,
            'jawaban_benar' => $jawaban,
            'kesulitan' => $kesulitan,
            'id_mapel' => $id_mapel,
            'judul_bab' => $judul_bab,
            'id_bab' => $judul_bab,
            'sumber' => $sumber,
            'random' => $random,
            //'pembahasan' => $pembahasan,
            'publish' => $publish,
            'create_by' => $create_by,
            'UUID' => $UUID   
           );

           //call fungsi insert soal
           $this->Modelbank->insert_soal($dataSoal);
           $this->gambarsoal($UUID);
             
          
        // $this->modelBank->insert_soal($dataSoal);
             // // mengambil id soal untuk fk di tb_piljawaban
             $data['tb_bank_soal'] = $this->Modelbank->get_soalID($UUID)[0];
             $soalID = $data['tb_bank_soal']['id_bank'];
             if ($options == 'text') {
                $dataJawaban = array(
                     array(
                         'pilihan_jawaban' => 'A',
                         'jawaban' => $a,
                         'id_soal' => $soalID
                     ),
                     array(
                         'pilihan_jawaban' => 'B',
                         'jawaban' => $b,
                         'id_soal' => $soalID
                     ),
                     array(
                         'pilihan_jawaban' => 'C',
                         'jawaban' => $c,
                         'id_soal' => $soalID
                     ),
                     array(
                         'pilihan_jawaban' => 'D',
                         'jawaban' => $d,
                         'id_soal' => $soalID
                     ),
                     array(
                         'pilihan_jawaban' => 'E',
                         'jawaban' => $e,
                         'id_soal' => $soalID
                     )
                 );
               $this->Modelbank->insert_jawaban($dataJawaban);
             }else{
               // if ($options ==) {
               //   # code...
               // }
              $this->gambar_jawab($soalID);


             }
             
            
               //call function insert jawaban tet
                                 
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Berhasil</div>');
                redirect(site_url('banksoal/form_tambahsoal'));
        
            
  }
}

public function up_video_pembahasan($UUID)
    {
        // echo "video pembahasan";
          $configvideo['upload_path'] = './assets/video/video_soal';
        $configvideo['allowed_types'] = 'mp4';
        $configvideo['max_size'] = 90000;
        $this->load->library('upload', $configvideo);
        $this->upload->initialize($configvideo);
             // pengecekan upload
        if (!$this->upload->do_upload('video')) {
                // jika upload video gagal
            $error = array('error' => $this->upload->display_errors());

        } else {
                // jika uplod video berhasil jalankan fungsi penyimpanan data video ke db
              $file_data = $this->upload->data();
           $file_name = $file_data['file_name'];
        $data['UUID']=$UUID;
        $data['dataSoal']=  array(
            'pembahasan' => $file_name);

            $this->Modelbank->ch_soal($data);


           
        }
    }


public function upload_video(){
    if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
         $data['pembahasan'] = htmlspecialchars($this->input->post('pembahasan'));
         // $link=$this->input->post('link_video');
        unset($config);
        // $date = date("ymd");
        $configVideo['upload_path'] = './assets/video/video_soal';
        $configVideo['max_size'] = '90000';
        $configVideo['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = $_FILES['video']['name'];
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);
        if(!$this->upload->do_upload('video')) {
            echo $this->upload->display_errors();
        }else{
            $videoDetails = $this->upload->data();
             $dataSoal = array(
                'pembahasan' =>  $video_name,
                );

            $this->Modelbank->insert_soal($dataSoal);
            // $data['video_name']= $configVideo['file_name'];
            // $data['video_detail'] = $videoDetails;
            // $this->load->view('movie/show', $data);
        }

    }else{
        echo "Please select a file";
    }
  }


// untuk upload gambar di dalam soal
  public function gambarsoal($UUID) {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $this->upload->do_upload($gambar);
        $file_data = $this->upload->data();
        $file_name = $file_data['file_name'];
        $data['UUID']=$UUID;
        $data['dataSoal']=  array(
            'gambar_soal' => $file_name);

            $this->Modelbank->ch_soal($data);
    }

//untuk upload gambar di jawaban
    public function gambar_jawab($soalID){
      $config2['upload_path'] = './assets/images/jawaban/';
        $config2['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config2['max_size'] = 100;
        $config2['max_width'] = 1024;
        $config2['max_height'] = 768;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        $n = '1';
        $datagambar = array();
        for ($x = 1; $x <= 5; $x++) {
            $gambar = "gambar" . $n;
            
            if ($this->upload->do_upload($gambar)) {
              $file_data = $this->upload->data();
              $file_name = $file_data['file_name'];
              if ($n == '1') {
                  $pilihan_jawaban = "A";
              } else if ($n == '2') {
                  $pilihan_jawaban = "B";
              } else if ($n == '3') {
                  $pilihan_jawaban = "C";
              } else if ($n == '4') {
                  $pilihan_jawaban = 'D';
              } else {
                  $pilihan_jawaban = 'E';
              }

              $datagambar[] = array('pilihan_jawaban' => $pilihan_jawaban,
                'id_soal' => $soalID,
                'gambar' => $file_name
                );
            } else {
              # code...
            }
            $n++;
        }

        $this->Modelbank->insert_gambar($datagambar);

    }
    //form tambah soal
    function form_tambahsoal(){

    $data['tingkat'] = $this->Modelbank->getTingkat();
    $data['mapel']=$this->Modelbank->getmapel();
    $data['kesulitan'] = $this->Modelbank->getKesulitan();
    
    //hak akses jika admin
    if ($this->session->userdata('id_admin')) {

    $this->load->view('admin/layout/header');
        // $this->load->view('layout/nav');
        $this->load->view('soal/tambah_soal', $data);
        $this->load->view('admin/layout/footer');
    }
      //hak akses jika guru

      elseif ($this->session->userdata('id_guru')) {

    $this->load->view('guru/layout/header');
        $this->load->view('soal/tambah_soal', $data);
        $this->load->view('guru/layout/footer');
    }
  }
  //menampilkan soal 
  function daftarsoal(){
    //hak akses jika admin
    if ($this->session->userdata('id_admin')) {
      $daftarsoal = $this->Modelbank->getdaftarsoal();
      $data['data']= $daftarsoal; 
    
    $this->load->view('admin/layout/header');
    $this->load->view('soal/daftar_soal',$data);
    $this->load->view('admin/layout/footer');
  }
  //hak akses jika guru
    elseif ($this->session->userdata('id_guru')) {
      $daftarsoal = $this->Modelbank->getdaftarsoal();
    if($daftarsoal){
      $data['data']= $daftarsoal; 
    }
    
    
    $this->load->view('guru/layout/header');
    $this->load->view('soal/daftar_soal',$data);
    $this->load->view('guru/layout/footer');
  }

  }


  public function formUpdate($UUID) {
    //hak akses jika admin
    if ($this->session->userdata('id_admin')) {

    $data['mapel']=$this->Modelbank->getmapel();
      $data['data'] = $this->Modelbank->getsoal();
        $data['banksoal'] = $this->Modelbank->get_onesoal($UUID)[0];
        $id_soal = $data['banksoal']['id_bank'];
            //get piljawaban == id soal
        $data['piljawaban'] = $this->Modelbank->get_piljawaban($id_soal);
        $this->load->view('admin/layout/header');
        $this->load->view('soal/v-edit-soal',$data);
         $this->load->view('admin/layout/footer');
         }
  //hak akses jika guru
    elseif ($this->session->userdata('id_guru')) {
      $data['mapel']=$this->Modelbank->getmapel();
      $data['data'] = $this->Modelbank->getsoal();
        $data['banksoal'] = $this->Modelbank->get_onesoal($UUID)[0];
        $id_soal = $data['banksoal']['id_bank'];
            //get piljawaban == id soal
        $data['piljawaban'] = $this->Modelbank->get_piljawaban($id_soal);
        $this->load->view('guru/layout/header');
        $this->load->view('soal/v-edit-soal',$data);
         $this->load->view('guru/layout/footer');
       }
    }

    public function cek($UUID)
    {
      $options = htmlspecialchars($this->input->post('options'));
      var_dump($options);
    }

  public function update_soal($UUID){

          // $UUID = uniqid();
           $judul_soal = htmlspecialchars($this->input->post('judul_soal'));
          $soal = $this->input->post('editor1');
           $gambarSoal = $this->input->post('gambarSoal');
           $options = htmlspecialchars($this->input->post('options'));
           $soalID = htmlspecialchars($this->input->post('soalID'));
          $jawaban = htmlspecialchars($this->input->post('jawaban_benar'));
          $kesulitan = htmlspecialchars($this->input->post('kesulitan'));
          $id_mapel = htmlspecialchars($this->input->post('id_mapel'));
          $judul_bab = htmlspecialchars($this->input->post('judul_bab'));
          $sumber = htmlspecialchars($this->input->post('sumber'));
          $random = htmlspecialchars($this->input->post('random'));
         //  $pembahasan= htmlspecialchars($this->input->post('pembahasan'));
          $publish = htmlspecialchars($this->input->post('publish'));
           // $UUID = htmlspecialchars($this->input->post('UUID'));

          $idA = htmlspecialchars($this->input->post('idpilA'));
          $idB = htmlspecialchars($this->input->post('idpilB'));
          $idC = htmlspecialchars($this->input->post('idpilC'));
          $idD = htmlspecialchars($this->input->post('idpilD'));
          $idE = htmlspecialchars($this->input->post('idpilE'));

          $a = $this->input->post('a');
          $b = $this->input->post('b');
          $c = $this->input->post('c');
          $d = $this->input->post('d');
          $e = $this->input->post('e');

          $data['UUID'] = $UUID;
          $data['soal'] = array(
            'judul_soal' => $judul_soal,
            'soal' => $soal,
            'jawaban_benar' => $jawaban,
            'kesulitan' => $kesulitan,
            'id_mapel' => $id_mapel,
            'judul_bab' => $judul_bab,
            'sumber' => $sumber,
            'random' => $random,
            'publish' => $publish
            //'pembahasan' => $pembahasan

           );


          $this->Modelbank->ch_soalup($data);
          $this->ch_img_soal($UUID);

           $data['id_soal']=$soalID;
          if ($options == 'text') {
                $data['jawaban'] = array(
                     array(
                         'pilihan_jawaban' => 'A',
                         'jawaban' => $a,
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'B',
                         'jawaban' => $b,
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'C',
                         'jawaban' => $c,
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'D',
                         'jawaban' => $d,
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'E',
                         'jawaban' => $e,
                         
                     )
                 );
               

               $this->Modelbank->ch_jawaban($data);

              } else{
               
              $this->ch_img_jawaban($soalID);


             }
             redirect(site_url('banksoal/daftarsoal'));
          // var_dump($data);



  }


  

  public function ch_img_soal($UUID) {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        $gambar = "gambarSoal";
        $oldgambar = $this->Modelbank->get_oldgambar_soal($UUID);
        if ($this->upload->do_upload($gambar)) {
         
         $file_data = $this->upload->data();
         $file_name = $file_data['file_name'];
         $data['UUID']=$UUID;
         $data['soal']=  array(
          'gambar_soal' => $file_name);
         $this->Modelbank->ch_soalup($data);
         $data['tb_bank_soal'] = $this->Modelbank->get_soalID($UUID)[0];
         $soalID = $data['tb_bank_soal']['id_bank'];
        }
        // $this->Mbanksoal->insert_gambar($datagambar);
    }
    public function ch_img_jawaban($soalID) {

        //unlink( FCPATH . "./assets/image/jawaban/".$xxxx );
        $config2['upload_path'] = './assets/images/jawaban/';
        $config2['allowed_types'] = 'jpeg|gif|jpg|png|bmp';
        $config2['max_size'] = 100;
        $config2['max_width'] = 1024;
        $config2['max_height'] = 768;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);

        $oldgambar = $this->Modelbank->get_oldgambar($soalID);

        $n = '1';
        $datagambar = array();
        // pengulngan untuk mendapat kan data gambar lama
        foreach ($oldgambar as $rows) {
            // remove old gambar      
            $gambar = "gambar" . $n;
            // pengecekan upload
            if ($this->upload->do_upload($gambar)) {
              // jika upload berhasil hapus gambar sebelumnya
                unlink(FCPATH . "./assets/images/jawaban/" . $rows['gambar']);

                $file_data = $this->upload->data();
                $file_name = $file_data['file_name'];
                if ($n == '1') {
                    $pilihan = "A";
                } else if ($n == '2') {
                    $pilihan = "B";
                } else if ($n == '3') {
                    $pilihan = "C";
                } else if ($n == '4') {
                    $pilihan = 'D';
                } else { 
                    $pilihan = 'E';
                }
                // tampung nama gambar yg berhasil di upload ke array
                $datagambar[] = array('pilihan_jawaban' => $pilihan,
                    'id_soal' => $soalID,
                    'gambar' => $file_name,
                    'id_pilih' => $rows['id_pilih']);
           
            }else{
              
            }

            $n++;
        }
        // pengecekan jika array kosong
        if ($datagambar!=array()) {
          // jika array tidak kosong panggil function ch_gambar
         $this->Modelbank->ch_gambar($datagambar);
        }
    }

    public function edit_soal($no) {
    if ($this->input->post('update')) 
    {
      $this->Modelbank->update_soal();
      // $this->Modelbank->update_pilihan();
      
      if ($this->db->affected_rows())
      {
        $this->session->set_flashdata('info', 'Update Berhasil');
        redirect('banksoal/daftarsoal');
      }
      else
      {
        $this->session->set_flashdata('pesan2', 'Update Gagal');
        redirect('banksoal/daftarsoal');
      }
    }
    else
    {
      $data['mapel']=$this->Modelbank->getmapel();
      $data['data'] = $this->Modelbank->getsoal();
      if ($this->session->userdata('id_admin')) {
        
      $data['editdata'] = $this->db->get_where('tb_bank_soal',array('id_bank'=> $no))->row();
      
      // $data['piljawaban'] = $this->db->get_where('tb_pil_jawab',array('id_soal'=>$no ))->row();
      
       
      
      $this->load->view('admin/layout/header');
      $this->load->view('soal/v-edit-soal', $data);
      $this->load->view('admin/layout/footer');
    }
    elseif ($this->session->userdata('id_guru')) {
        # code...
      
      // $data['content'] = 'kontrak/k_edit';
      $data['editdata'] = $this->db->get_where('tb_bank_soal',array('id_bank'=> $no))->row();
      $this->load->view('guru/layout/header');
      $this->load->view('soal/v-edit-soal', $data);
      $this->load->view('guru/layout/footer');
    }

  }
  }
  public function hapus_soal($id) {
    $this->Modelbank->delete_soal($id);

    if ($this->db->affected_rows()) 
    {
      $this->session->set_flashdata('info', 'Berhasil  Dihapus!');
      redirect('banksoal/daftarsoal');  
    }
    else
    {
      $this->session->set_flashdata('pesan2', 'Gagal  Dihapus!');
      redirect('banksoal/daftarsoal');
    }

  }

  public function deletebanksoal2() {
        if ($this->input->post()) {
            $post = $this->input->post();
             $this->Modelbank->del_banksoal($post['id']);
        }
           redirect(site_url('banksoal/listsoal'));
    }
  

  function search(){

    $cmapel=$_POST['id_mapel'];
    $data['data']= $this->Modelbank->getCarimapel($cmapel); 
    // $data['data']= $this->Modelbank->getCaribab($cbab);  
    $this->load->view('layout/header');
    $this->load->view('soal/daftar_soal',$data);
    $this->load->view('layout/footer');


  }

  // function searchbab(){
  //  $cbab=$_POST['judul_bab'];
    // $data['data']= $this->Modelbank->getCarimapel($cbab);  
    // $this->load->view('layout/header');
  //  $this->load->view('soal/daftar_soal',$data);
  //  $this->load->view('layout/footer');


  // }


  public function uploadmapel(){
    // upload soal
    //set validation rules
        $alias_mapel  = $this->form_validation->set_rules('alias_mapel', 'alias mapel', 'trim|required');
        $nama_mapel  = $this->form_validation->set_rules('nama_mapel', 'nama mapel', 'trim|required');        
        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // gagal
            site_url('banksoal');
        } else {
          $alias_mapel = htmlspecialchars($this->input->post('alias_mapel'));
          $nama_mapel = htmlspecialchars($this->input->post('nama_mapel'));
          $part1 = htmlspecialchars($this->input->post('part1'));
          $part2 = htmlspecialchars($this->input->post('part2'));
          $part3 = htmlspecialchars($this->input->post('part3'));
          $part4 = htmlspecialchars($this->input->post('part4'));
                 
           $datamapel= array(
                       array(
                        'alias_mapel' => $alias_mapel,
                        'nama_mapel' => $nama_mapel,
                         'part' => '1',
                         'part' => $part1,
                         
                      ),
                       array(
                          'alias_mapel' => $alias_mapel,
                          'nama_mapel' => $nama_mapel,
                           'part' => '2',
                           'part' => $part2,
                           
                       ),
                       array(
                        'alias_mapel' => $alias_mapel,
                        'nama_mapel' => $nama_mapel,
                         'part' => '3',
                         'part' => $part3,
                         
                      ),
                       array(
                          'alias_mapel' => $alias_mapel,
                          'nama_mapel' => $nama_mapel,
                           'part' => '4',
                           'part' => $part4,
                           
                       ),
                  
                 );
           //call fungsi insert soal
           $this->Modelbank->insert_mapel($datamapel);
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Berhasil</div>');
           redirect(site_url('banksoal/tambahmapel'));
        
            
  }
}

function daftarmapelicon(){
    if ($this->session->userdata('id_admin')) {
    $daftarmapel = $this->Modelbank->getDaftarMapel();
    $data['data']= $daftarmapel;  
    $this->load->view('admin/layout/header');
    $this->load->view('matapelajaran/tambah_icon',$data);
    $this->load->view('admin/layout/footer');
  }
    

  }

public function gambar_mapel($id) {

        // unlink(FCPATH . "./assets/images/mapel/" . $id);
        $config['upload_path'] = './assets/images/mapel';
        $config['allowed_types'] = 'jpeg|gif|jpg|png|mkv';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('photo')) {


            $data['error'] = array('error' => $this->upload->display_errors());
            $data['mapel'] = $this->Modelbank->get_mapelgambar($id);
            $this->load->view('admin/layout/header');
          $this->load->view('matapelajaran/edit_icon',$data);
          $this->load->view('admin/layout/footer');

            // $this->load->view('beranda/main_view',$error);,
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->Modelbank->gambar_mapel($id,$photo);
            echo "berhasil upload"; 
            //for testing
            // $data['img'] = base_url().'/images/'.$file_data['file_name'];
            // $this->load->view('beranda/success_msg',$data);
            
        }
    }


public function uploadbab(){
    // upload soal
    //set validation rules
        $judul_bab  = $this->form_validation->set_rules('judul_bab', 'alias mapel', 'trim|required');
        $keterangan  = $this->form_validation->set_rules('keterangan', 'nama mapel', 'trim|required');        
        //validate form input
        if ($this->form_validation->run() == FALSE) {
            // gagal
            site_url('banksoal');
        } else {
          $id_mapel= htmlspecialchars($this->input->post('id_mapel'));
          $judul_bab = htmlspecialchars($this->input->post('judul_bab'));
          $keterangan= htmlspecialchars($this->input->post('keterangan'));

                 
           $databab = array(
            'id_mapel' => $id_mapel,
            'judul_bab' => $judul_bab,
            'keterangan' => $keterangan
           );

           //call fungsi insert soal
           $this->Modelbank->insert_bab($databab);
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Berhasil</div>');
           redirect(site_url('banksoal/tambahbab'));
        
            
  }
}
  function tambahmapel(){
    // $data['mapel'] = $this->Modelbank->getMapel();
    if ($this->session->userdata('id_admin')) {
    $this->load->view('admin/layout/header');
    $this->load->view('matapelajaran/tambah_mapel');
    $this->load->view('admin/layout/footer');
  }
  elseif($this->session->userdata('id_guru')) {
    $this->load->view('guru/layout/header');
    $this->load->view('matapelajaran/tambah_mapel');
    $this->load->view('guru/layout/footer');
  }

  }

   function tambahbab(){
    if ($this->session->userdata('id_admin')) {
    $data['mapel'] = $this->Modelbank->getmapel2();
    $this->load->view('admin/layout/header');
    $this->load->view('bab/tambah_bab',$data);
    $this->load->view('admin/layout/footer');
  }
    elseif ($this->session->userdata('id_guru')) {
    $data['mapel'] = $this->Modelbank->getmapel2();
    $this->load->view('guru/layout/header');
    $this->load->view('bab/tambah_bab',$data);
    $this->load->view('guru/layout/footer');
  }

  }

  function daftarmapel(){
    if ($this->session->userdata('id_admin')) {
    $daftarmapel = $this->Modelbank->getDaftarMapel();
    $data['data']= $daftarmapel;  
    $this->load->view('admin/layout/header');
    $this->load->view('matapelajaran/tampil_mapel',$data);
    $this->load->view('admin/layout/footer');
  }
    elseif ($this->session->userdata('id_guru')) {
    $daftarmapel = $this->Modelbank->getDaftarMapel();
    $data['data']= $daftarmapel;  
    $this->load->view('guru/layout/header');
    $this->load->view('matapelajaran/tampil_mapel',$data);
    $this->load->view('guru/layout/footer');
  }



  }
  function daftarbab(){

    if ($this->session->userdata('id_admin')) {
      $daftar_bab = $this->Modelbank->getDaftarBab();
      $data['bab']= $daftar_bab;  
      $this->load->view('admin/layout/header');
      $this->load->view('bab/tampil_bab',$data);
      $this->load->view('admin/layout/footer');
    } elseif ($this->session->userdata('id_guru')) {
      $daftar_bab = $this->Modelbank->getDaftarBab();
      $data['bab']= $daftar_bab;  
      $this->load->view('guru/layout/header');
      $this->load->view('bab/tampil_bab',$data);
      $this->load->view('guru/layout/footer');
    }
  }

  public function edit_mapel($no) {
    if ($this->input->post('update')) 
    {
      $this->Modelbank->update_mapel();
      
      if ($this->db->affected_rows())
      {
        $this->session->set_flashdata('info', 'Update Berhasil');
        redirect('banksoal/daftarmapel');
      }
      else
      {
        $this->session->set_flashdata('pesan2', 'Update Gagal');
        redirect('banksoal/daftarmapel');
      }
    }
    else
    {
      if ($this->session->userdata('id_admin')) {
      // $data['content'] = 'kontrak/k_edit';

      $data['editdata'] = $this->db->get_where('tb_mata_pelajaran',array('id_mapel'=> $no))->row();
      $this->load->view('admin/layout/header');
      $this->load->view('matapelajaran/v-edit-mapel', $data);
      $this->load->view('admin/layout/footer');
    }
    if ($this->session->userdata('id_guru')) {
      // $data['content'] = 'kontrak/k_edit';
      $data['editdata'] = $this->db->get_where('tb_mata_pelajaran',array('id_mapel'=> $no))->row();
      $this->load->view('guru/layout/header');
      $this->load->view('matapelajaran/v-edit-mapel', $data);
      $this->load->view('guru/layout/footer');
    }
    }
  }

  
    public function hapus_mapel($id) {
      $this->Modelbank->delete_mapel($id);

      if ($this->db->affected_rows()) 
      {
        $this->session->set_flashdata('info', 'Berhasil  Dihapus!');
        redirect('banksoal/daftarmapel'); 
      }
      else
      {
        $this->session->set_flashdata('pesan2', 'Gagal  Dihapus!');
        redirect('banksoal/daftarmapel');
      }

    }




  public function ubah_bab($no) {
    if ($this->input->post('update')) 
    {
      $this->Modelbank->update_bab();
      
      if ($this->db->affected_rows())
      {
        $this->session->set_flashdata('info', 'Update Berhasil');
        redirect('banksoal/daftarbab');
      }
      else
      {
        $this->session->set_flashdata('pesan2', 'Update Gagal');
        redirect('banksoal/daftarbab');
      }
    }
    else
    {
      if ($this->session->userdata('id_admin')) {
      // $data['content'] = 'kontrak/k_edit';
      $data['editdata'] = $this->db->get_where('tb_bab',array('id_bab'=> $no))->row();
      $this->load->view('admin/layout/header');
      $this->load->view('bab/v-edit-bab', $data);
      $this->load->view('admin/layout/footer');

    }
    elseif ($this->session->userdata('id_guru')) {
      // $data['content'] = 'kontrak/k_edit';
      $data['editdata'] = $this->db->get_where('tb_bab',array('id_bab'=> $no))->row();
      $this->load->view('guru/layout/header');
      $this->load->view('bab/v-edit-bab', $data);
      $this->load->view('guru/layout/footer');
    }
    }
  }
  public function hapus_bab($id) {
    $this->Modelbank->delete_bab($id);

    if ($this->db->affected_rows()) 
    {
      $this->session->set_flashdata('info', 'Berhasil  Dihapus!');
      redirect('banksoal/daftarbab'); 
    }
    else
    {
      $this->session->set_flashdata('pesan2', 'Gagal  Dihapus!');
      redirect('banksoal/daftarbab');
    }

  }


  public function filterbab(){
    if ($this->session->userdata('id_admin')) {

    
    if ($this->input->post('submit')) 
    {
      $pel = $this->input->post('pelajaran');
      $mapel = $this->input->post('id_bab');
      $kesulitan = $this->input->post('kesulitan');

      if ($pel && $mapel && $kesulitan) { 
        // $mapel = $this->input->post('id_bab');
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
        $data['data'] = $this->Modelbank->filter_soal_all($mapel, $pel, $kesulitan);
        $data['mapel']=$this->Modelbank->getmapel();

        // $this->load->view('admin/layout/header');
        // $this->load->view('soal/v-filter-baru', $data);
        // $this->load->view('admin/layout/footer');   
        redirect('banksoal/listfilter/'.$pel);
      
      } elseif ($pel && $mapel) {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
        $data['data'] = $this->Modelbank->filter_soal_pel_bab($mapel, $pel);
        $data['mapel']=$this->Modelbank->getmapel();

        $this->load->view('admin/layout/header');
        $this->load->view('soal/v-filter-baru', $data);
        $this->load->view('admin/layout/footer');
        
      } else {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
        $data['data'] = $this->Modelbank->filter_soal_pel($pel);
        $data['mapel']=$this->Modelbank->getmapel();
        
        redirect('banksoal/listfilter/').$pel;
        // $this->load->view('admin/layout/header');
        // $this->load->view('soal/v-filter-baru', $data);
        // $this->load->view('admin/layout/footer');

        
      }
    }
    else
    {
    $mapel = $this->input->post('id');
    $data['data'] = $this->Modelbank->getsoal();
    $data['mapel']  = $this->Modelbank->getmapel();
    $list= $this->Modelbank->getkesulitanfilter();

    $this->load->view('admin/layout/header');
    $this->load->view('vfilter', $data);
    $this->load->view('admin/layout/footer');
    }
    // var_dump($pel, $mapel, $kesulitan);
    
  }
   elseif ($this->session->userdata('id_guru')) {

    
    if ($this->input->post('submit')) 
    {
      $pel = $this->input->post('pelajaran');
      $mapel = $this->input->post('id_bab');
      $kesulitan = $this->input->post('kesulitan');

      if ($pel && $mapel && $kesulitan) { 
        // $mapel = $this->input->post('id_bab');
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
        $data['data'] = $this->Modelbank->filter_soal_all($mapel, $pel, $kesulitan);
        $data['mapel']=$this->Modelbank->getmapel();

        $this->load->view('guru/layout/header');
        $this->load->view('vfilter', $data);
        $this->load->view('guru/layout/footer');   
      
      } elseif ($pel && $mapel) {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
        $data['data'] = $this->Modelbank->filter_soal_pel_bab($mapel, $pel);
        $data['mapel']=$this->Modelbank->getmapel();

        $this->load->view('guru/layout/header');
        $this->load->view('vfilter', $data);
        $this->load->view('guru/layout/footer');
        
      } else {
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated </div>');
        $data['data'] = $this->Modelbank->filter_soal_pel($pel);
        $data['mapel']=$this->Modelbank->getmapel();
        
        $this->load->view('guru/layout/header');
        $this->load->view('vfilter', $data);
        $this->load->view('guru/layout/footer');

        
      }
    }
    else
    {
    $mapel = $this->input->post('id');
    $data['data'] = $this->Modelbank->getsoal();
    $data['mapel']  = $this->Modelbank->getmapel();
    $list= $this->Modelbank->getkesulitanfilter();

    $this->load->view('guru/layout/header');
    $this->load->view('vfilter', $data);
    $this->load->view('guru/layout/footer');
    }
    // var_dump($pel, $mapel, $kesulitan);
    
  }

}

  public function filter()
  {
    if ($this->session->userdata('id_admin')) {
      # code...
    

    $data['mapel']=$this->Modelbank->getmapel();
    $data['data'] = $this->Modelbank->getsoal();
    $list= $this->Modelbank->getkesulitanfilter();

    $this->load->view('admin/layout/header');
    $this->load->view('vfilter', $data);
    $this->load->view('admin/layout/footer');
  }
  if ($this->session->userdata('id_guru')) {
      # code...
    

    $data['mapel']=$this->Modelbank->getmapel();
    $data['data'] = $this->Modelbank->getsoal();
    $list= $this->Modelbank->getkesulitanfilter();

    $this->load->view('guru/layout/header');
    $this->load->view('vfilter', $data);
    $this->load->view('guru/layout/footer');
  }
}


  


 } ?>