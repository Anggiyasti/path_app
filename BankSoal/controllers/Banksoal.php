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
  }

    // FUNGSI AMBIL DATA UNTUK DROPDOWN
    function ambil_data(){
      //fungsi ambil data unruk dropdown
    $modul=$this->input->post('modul');
    $id=$this->input->post('id');

    if($modul=="getbab"){
    echo $this->Modelbank->getbab($id);
  }
  }

  // FUNGSI FILTER SOAL
  public function filtersoal()
    {
      $mapel = $this->input->post('pelajaran');
      $bab = $this->input->post('id_bab');
      $level = $this->input->post('kesulitan');
      if ($mapel &&$bab && $level) {
            //list soal mapel bab level
        $this->listsoalpelbablevel($mapel,$bab,$level);
            
        } else if ($mapel && $bab) {
            //list soal mapel dan bab
          $this->listsoalpelbab($mapel,$bab);
        } else if($mapel && $level) {
          $this->listsoalpellevel($mapel,$level);
        }  else if ($mapel) {
          $this->listsoalmapel($mapel);
        }  else if ($level) {
          $this->listsoallevel($level);
        } else {
          $this->listsoal();
        }
    }


    // LIST filter mapel
    public function listsoalmapel($pel)
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_mapel($pel);
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoalmapel/'.$pel.'/';
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
        
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
        $list = $this->Modelbank->data_soal_pel($config['per_page'],$from,$pel); 
        $this->tampSoal($list);
    }
    // FILTER SOAL BERDASARKAN LEVEL
     public function listsoallevel($level)
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_level($level);
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoallevel/'.$level.'/';
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
        
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
        $list = $this->Modelbank->data_soal_level($config['per_page'],$from,$level); 
        $this->tampSoal($list);
    }

    // filter soal pel bab level
    public function listsoalpelbablevel($pel, $bab, $level)
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_pel_bab_level($pel, $bab, $level);
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoalpelbablevel/'.$pel.'/'.$bab.'/'.$level.'/';
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
        
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
        $list = $this->Modelbank->data_soal_pel_bab_level($config['per_page'],$from,$pel, $bab, $level); 
        $this->tampSoal($list);
    }


    // filter soal pel bab level
    public function listsoalpel($pel)
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_mapel($pel);
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoalpel/'.$pel.'/';
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
        
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
        $list = $this->Modelbank->data_soal_pel($config['per_page'],$from,$pel); 
        $this->tampSoal($list);
    }

    // filter soal mapel  bab
    public function listsoalpelbab($pel, $bab)
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_pel_bab($pel, $bab);
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoalpelbab/'.$pel.'/'.$bab.'/';
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
        
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
        $list = $this->Modelbank->data_soal_pel_bab($config['per_page'],$from,$pel, $bab); 
        $this->tampSoal($list);
    }

     // filter soal mapel  bab
    public function listsoalpellevel($pel, $level)
    {
        // code u/pagination
       $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_pel_level($pel, $level);
       
        $config['base_url'] = base_url().'index.php/banksoal/listsoalpellevel/'.$pel.'/'.$level.'/';
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
        
        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
        $list = $this->Modelbank->data_soal_pel_level($config['per_page'],$from,$pel, $level); 
        $this->tampSoal($list);
    }

    // FUNGSI VIEW ALL SOAL
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

    // FUNGSI FILTER 
    public function listfilter()
    {
      $mapel = $this->input->post('pelajaran');
        $bab = $this->input->post('id_bab');
        $level = $this->input->post('kesulitan');

        // code u/pagination
        $this->load->database();
        $jumlah_data = $this->Modelbank->jumlah_data_filter_bab($bab);
       
        $config['base_url'] = base_url().'index.php/banksoal/listfilter/';
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
        if ($mapel && $bab && $level) {
           $list = $this->Modelbank->data_soal_filter1($config['per_page'],$from, $mapel, $bab, $level);
         } else if ($mapel && $bab) {
           $list = $this->Modelbank->data_soal_filter2($config['per_page'],$from, $mapel, $bab);
         } else if ($mapel && $level) {
           $list = $this->Modelbank->data_soal_filter3($config['per_page'],$from, $mapel, $level);
         } else if ($mapel) {
           $list = $this->Modelbank->data_soal_filter4($config['per_page'],$from, $mapel);
         } else if ($level) {
           $list = $this->Modelbank->data_soal_filter5($config['per_page'],$from, $level);
         }

        $this->tampSoal($list);
    }

    //tampung list semua soal u/ ke view
    public function tampSoal($list)
    {
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

             $tampJawaban = $this->Modelbank->get_jawaban($jawaban_benar,$id_bank);
            if ($tampJawaban) {
                //untuk menampung data sementara jawaban
                $isiJawaban = $tampJawaban['jawaban'];
                $tampImgJawaban = $tampJawaban['imgJawaban'];
                if ($tampImgJawaban != '' && $tampImgJawaban != ' ' ) {
                     $imgJawaban=base_url().'/assets/image/jawaban/'.$tampImgJawaban;
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
            
            // PENGECEKAN LEVEL
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
        
        $data['mapel']=$this->Modelbank->getmapel();
        $data['data'] = $this->Modelbank->getsoal();
        if ($this->session->userdata('id_admin')) {
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
          $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Gagal, Isi Semua Field</div>');
            redirect(site_url('banksoal/form_tambahsoal'));
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
          $pembahasan = htmlspecialchars($this->input->post('pembahasan'));
          $publish = htmlspecialchars($this->input->post('publish'));
          if ($this->session->userdata('id_admin')) {
            $create_by = $this->session->userdata['username'];
          }
          elseif ($this->session->userdata('id_guru')) {
          $create_by = $this->session->userdata['username'];
          }

          if ($pembahasan) {
              for ($x = 0; $x < strlen($pembahasan); $x++) {

            if ($pembahasan[$x] == '=' ) {
              $startID=$x+1;
              $linkembed='https://www.youtube.com/embed/'.substr($pembahasan, $startID,11);
              break;
            }else{
              $linkembed=$pembahasan;
            }
          
          }
          } else {
            $pembahasan = '';
            $linkembed = $pembahasan;
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
            'pembahasan' => $linkembed,
            'publish' => $publish,
            'create_by' => $create_by,
            'UUID' => $UUID   
           );


           //call fungsi insert soal
           $this->Modelbank->insert_soal($dataSoal);
           $this->gambarsoal($UUID);
                       
            // mengambil id soal untuk fk di tb_piljawaban
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
                // CALL FUNGSI INSERT JAWABAN
               $this->Modelbank->insert_jawaban($dataJawaban);
             }else{
              $this->gambar_jawab($soalID);
             }
                                                   
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Berhasil</div>');
            redirect(site_url('banksoal/form_tambahsoal'));
        
            
  }
}

// FUNGSI UPLOAD VIDEO PEMBAHASAN
public function up_video_pembahasan($UUID)
    {
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

// FUNGSI UPLOAD VIDEO
public function upload_video(){
    if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
         $data['pembahasan'] = htmlspecialchars($this->input->post('pembahasan'));
        unset($config);
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
             // CALL FUNGSI INSERT
            $this->Modelbank->insert_soal($dataSoal);

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
        $config2['max_size'] = 500;
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

  //menampilkan soal DI TABLE
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

  // FUNGSI VIEW FORM UPDATE
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

    // FUNGSI UPDATE SOAL
    public function update_soal($UUID){
        $id_soal = $this->input->post('soalID');
        $judul_soal = htmlspecialchars($this->input->post('judul_soal'));
        $soal = $this->input->post('editor1');
        $gambarSoal = $this->input->post('gambarSoal');
           $options = htmlspecialchars($this->input->post('options'));
           $soalID = htmlspecialchars($this->input->post('soalID'));
          $jawaban = $this->input->post('jawaban_benar');
          $kesulitan = htmlspecialchars($this->input->post('kesulitan'));
          $id_mapel = htmlspecialchars($this->input->post('id_mapel'));
          $judul_bab = htmlspecialchars($this->input->post('judul_bab'));
          $sumber = htmlspecialchars($this->input->post('sumber'));
          $random = htmlspecialchars($this->input->post('random'));
          $pembahasan= htmlspecialchars($this->input->post('pembahasan'));
          $publish = htmlspecialchars($this->input->post('publish'));

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

          // CONVERT LINK YOUTUBE JADI EMBED
          for ($x = 0; $x < strlen($pembahasan); $x++) {

            if ($pembahasan[$x] == '=' ) {
              $startID=$x+1;
              $linkembed='https://www.youtube.com/embed/'.substr($pembahasan, $startID,11);
              break;
            }else{
              $linkembed=$pembahasan;
            }
          
          }

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
            'publish' => $publish,
            'pembahasan' => $linkembed

           );


          $this->Modelbank->ch_soalup($data);
          $this->ch_img_soal($UUID);

           $data['id_soal']=$soalID;
        // PENGECEKAN JAWABAN TEXT ATAU GAMBAR
          if ($options == 'text') {
                $data['jawabann'] = array(
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

                $data['insert'] = array(
                     array(
                         'pilihan_jawaban' => 'A',
                         'jawaban' => $a,
                         'id_soal'=> $soalID
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'B',
                         'jawaban' => $b,
                         'id_soal'=> $soalID
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'C',
                         'jawaban' => $c,
                         'id_soal'=> $soalID
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'D',
                         'jawaban' => $d,
                         'id_soal'=> $soalID
                         
                     ),
                     array(
                         'pilihan_jawaban' => 'E',
                         'jawaban' => $e,
                         'id_soal'=> $soalID
                         
                     )
                 );
               
               
               // cek ada jawaban atau tidak 
              $cek = $this->Modelbank->cek_jawaban($id_soal);
              // var_dump($cek);
              if ($cek) {
                // echo "update";
                $this->Modelbank->ch_jawaban($data);
              } else {
                // insert 
                $this->Modelbank->insert_jawaban($data['insert']);
              }
               

              } else{
                $this->ch_img_jawaban($soalID);
             }
             redirect(site_url('banksoal/listsoal'));
  }

  // FUNGSI UPLOAD GAMBAR SOAL
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
    }

    // FUNGSI UPLOAD GAMBAR JAWABAN
    public function ch_img_jawaban($soalID) {
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

    // FUNGSI VIEW FORM EDIT SOAL
    public function edit_soal($no) {
    if ($this->input->post('update')) 
    {
      $this->Modelbank->update_soal();
      
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
      
      $this->load->view('admin/layout/header');
      $this->load->view('soal/v-edit-soal', $data);
      $this->load->view('admin/layout/footer');
     } elseif ($this->session->userdata('id_guru')) {      
      $data['editdata'] = $this->db->get_where('tb_bank_soal',array('id_bank'=> $no))->row();
      $this->load->view('guru/layout/header');
      $this->load->view('soal/v-edit-soal', $data);
      $this->load->view('guru/layout/footer');
    }

  }
  }

  // FUNGSI HAPUS SOAL
  public function hapus_soal($id) {
    $this->Modelbank->delete_soal($id);
    // PENGECEKAN JIKA HAPUS BERHASIL
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

  // FUNGSI UPLOAD MATA PELAJARAN
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
                   
           $datamapel = array(
            'alias_mapel' => $alias_mapel,
            'nama_mapel' => $nama_mapel,
            'part'=>1,
           );
           //call fungsi insert soal
           $this->Modelbank->insert_mapel($datamapel);
           $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Berhasil</div>');
           redirect(site_url('banksoal/tambahmapel'));
        
            
  }
}

// FUNGSI VIEW DAFTAR ICON MAPEL
function daftarmapelicon(){
    // PENGECEKAN HAK AKSES
    if ($this->session->userdata('id_admin')) {
        $daftarmapel = $this->Modelbank->getDaftarMapel();
        $data['data']= $daftarmapel;  
        $this->load->view('admin/layout/header');
        $this->load->view('matapelajaran/tambah_icon',$data);
        $this->load->view('admin/layout/footer');
    } elseif ($this->session->userdata('id_guru')) {  
        $daftarmapel = $this->Modelbank->getDaftarMapel();
        $data['data']= $daftarmapel;  
        $this->load->view('admin/layout/header');
        $this->load->view('matapelajaran/tambah_icon',$data);
        $this->load->view('admin/layout/footer'); 
    } else {
        redirect('login');
    } 
    

  }

    // FUNGSI UPLOAD ICON MATA PELAJARAN
    public function gambar_mapel($id) {
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
        } else {
            $file_data = $this->upload->data();
            $photo = $file_data['file_name'];
            $this->Modelbank->gambar_mapel($id,$photo);
            echo "berhasil upload"; 
        }
    }

    // FUNGSI INSERT BAB
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

    // FUNGSI VIEW FORM TAMBAH MATA PELAJARAN
    function tambahmapel(){
        // PENGECEKAN HAK AKSES
        if ($this->session->userdata('id_admin')) {
        $this->load->view('admin/layout/header');
        $this->load->view('matapelajaran/tambah_mapel');
        $this->load->view('admin/layout/footer');
      }
      elseif($this->session->userdata('id_guru')) {
        $this->load->view('guru/layout/header');
        $this->load->view('matapelajaran/tambah_mapel');
        $this->load->view('guru/layout/footer');
      } else {
        redirect('login');
      }

  }

  // FUNGSI VIEW FORM TAMBAH BAB
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

  // FUNGSI VIEW DAFTAR MATA PELAJARAN
  function daftarmapel(){
    // PENGECEKAN HAK AKSES
    if ($this->session->userdata('id_admin')) {
        $daftarmapel = $this->Modelbank->getDaftarMapel();
        $data['data']= $daftarmapel;  
        $this->load->view('admin/layout/header');
        $this->load->view('matapelajaran/tampil_mapel',$data);
        $this->load->view('admin/layout/footer');
    } elseif ($this->session->userdata('id_guru')) {
        $daftarmapel = $this->Modelbank->getDaftarMapel();
        $data['data']= $daftarmapel;  
        $this->load->view('guru/layout/header');
        $this->load->view('matapelajaran/tampil_mapel',$data);
        $this->load->view('guru/layout/footer');
    } else {
        redirect('login');
    }
  }

  // FUNGSI VIEW DAFTAR BAB
  function daftarbab(){
    // PENGECEKAN HAK AKSES
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
    } else {
        redirect('login');
    }
  }

  // FUNGSI EDIT MATA PELAJARAN
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
        // PENGECEKAN HAK AKSES
      if ($this->session->userdata('id_admin')) {
      $data['editdata'] = $this->db->get_where('tb_mata_pelajaran',array('id_mapel'=> $no))->row();
      $this->load->view('admin/layout/header');
      $this->load->view('matapelajaran/v-edit-mapel', $data);
      $this->load->view('admin/layout/footer');
    }else if ($this->session->userdata('id_guru')) {
      $data['editdata'] = $this->db->get_where('tb_mata_pelajaran',array('id_mapel'=> $no))->row();
      $this->load->view('guru/layout/header');
      $this->load->view('matapelajaran/v-edit-mapel', $data);
      $this->load->view('guru/layout/footer');
    } else {
        redirect('login');
    }
    }
  }

    // FUNGSI HAPUS MATA PELAJARAN
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

// FUNGSI UBAH BAB
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
    } else {
        redirect('login');
    }
    }
  }

  // FUNGSI HAPUS BAB
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


 } ?>