<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
 class Linetopik extends MX_Controller
 {

 	function __construct()
 	{
 		$this->load->model('Mlinetopik');
 		$this->load->model('Workout1/Mworkout1');
 		$this->load->library('parser');
 	}


 	public function index()
 	{
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
     		$data['mapel'] = $this->load->Mworkout1->getdaftarmapel();
     		$this->load->view('template/siswa/v-head');
     		$this->load->view('v-line-mapel', $data);
            $this->load->view('template/siswa/v-footer');
     	} else {
            redirect('login');
        }
    }

 	// fungsi pilihan bab
    public function pilih_bab_report($no) {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['bab'] = $this->Mworkout1->get_mapel_bab($no);
            $data['mapel'] = $no;
            $this->load->view('template/siswa/v-head');
            $this->load->view('v-line-bab', $data);
            $this->load->view('template/siswa/v-footer');
        } else {
            redirect('login');
        }
    }

 	public function learningLine($babid)
 	{
 		// var_dump($data['datline']);
 		//hak akses jika siswa
    if ($this->session->userdata('id_siswa')) {    
 		$dat=$this->Mlinetopik->get_line_topik($babid);
        $data['topik']=$this->Mlinetopik->get_topik($babid);
 		$data['datline']=array();
        // 
        $step=false;
 		foreach ($dat as $rows) {
 			$tampJenis = $rows['jenisStep'];
 			$UUID = $rows['stepUUID'];
            $stepID = $rows['stepID'];
            $urutan = $rows ['urutan'];
            // pengecekan jenis step line
 			if ($tampJenis == '1') {
                // jika step line video
 				$jenis='Video';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon='ico-movie ';
                    $link = base_url('index.php/linetopik/step_video/'.$UUID);
                    $status ="enable";
                } else {
                    $icon='ico-movie';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }

 			}else if ($tampJenis == '2') {
                // jika step line Materi atau modul
 				$jenis='Materi';
                // 587496e2a4f33
 				// pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon ='ico-file6';
                    $link = base_url('index.php/linetopik/step_materi/'.$UUID);
                    // $link = base_url('index.php/linetopik/step_materi/587496e2a4f33');
                    $status ="enable";
                } else {
                   $icon='ico-file6';
                   $link = 'javascript:void(0)';
                   $status ="disable";
                }
 			}else{
                // jika step line latihan atau quiz
 				$jenis='Latihan';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                   $icon ='ico-pencil';
                  $latihanID = $rows['latihanID'];
                   $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                   $status ="enable";
                } else {
                  $icon='ico-pencil';
                 $link = 'javascript:void(0)';
                 $status ="disable";
                }
 			}
 			$data['datline'][]=array(
                'namaTopik'=>$rows['namaTopik'],
                'deskripsi'=>$rows['deskripsi'],
 				'namaStep'=> $rows['namaStep'],
                'bab'=>$rows['judul_bab'],
 				'jenisStep'=>$jenis,
 				'icon' =>$icon,
 				'link' => $link,
                'status'=>$status);
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_log($stepID, $id);
            $step = $log;

 		}

 		$this->load->view('template/siswa/v-head');
 		// $this->load->view('workout1/v-header');
 		// $this->load->view('v-line-topik', $data);
        $this->load->view('v-line-topik-2', $data);
        $this->load->view('template/siswa/v-footer');
    } else {
            redirect('login');
    }
 	}

    // View step Materi
        public function step_materi($UUID)
    {
        if ($this->session->userdata('id_siswa')) { 
         $stepID= $this->Mlinetopik->get_stepID($UUID);
        $this->logline($stepID);
         
        $data['datMateri']=$this->Mlinetopik->get_datMateri($UUID);
         // get UUID TOPIK
        $data['UUID']=$data['datMateri']['UUID'];
          // get tanggal dan bulan
        $timestamp = strtotime($data['datMateri']['date_created']);
        $data['tgl']=date("d", $timestamp);
        $data['bulan']=date("M", $timestamp);
          //Start get data untuk time line side bar
        $dat=$this->Mlinetopik->get_topic_step2($UUID);
        $data['datline']=array();
         $step=false;
        foreach ($dat as $rows) {
            $data['namaTopik']=$rows['namaTopik'];
            $data['deskripsi']=$rows['deskripsi'];
            $tampJenis = $rows['jenisStep'];
            $UUID = $rows['stepUUID'];
            $stepID = $rows['stepID'];
            $urutan = $rows ['urutan'];
           if ($tampJenis == '1') {
                $jenis='Video';
                
                if ($step == true || $urutan == '1' ) {
                    $icon='ico-movie';
                    $link = base_url('index.php/linetopik/step_video/'.$UUID);
                    $status ="enable";
                    
                } else {
                    $icon ='ico-movie';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }

            }else if ($tampJenis == '2') {
                $jenis='Materi';
                
                if ($step == true || $urutan == '1' ) {
                    $icon ='ico-file6';
                    $link = base_url('index.php/linetopik/step_materi/'.$UUID);
                    $status ="enable";
                } else {
                    $icon ='ico-file6';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }else{
                $jenis='Latihan';
                if ($step == true || $urutan == '1' ) {
                   $icon ='ico-pencil';
                  $latihanID = $rows['latihanID'];
                   $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                   $status ="enable";
                } else {
                    $icon ='ico-pencil';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }
            $data['datline'][]=array(
                'namaStep'=> $rows['namaStep'],
                'jenisStep'=>$jenis,
                'icon' =>$icon,
                'link' => $link,
                'status'=>$status);
            $data['bab']      = $rows['judul_bab'];
            $data['topik']    = $rows['namaTopik'];
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_log($stepID, $id);
            $step = $log;
        }
          // END get data time untuk side bar
         
        $this->load->view('template/siswa/v-head');
        $this->load->view('v-step-materi-2', $data);
        $this->load->view('template/siswa/v-footer');
        } else {
                redirect('login');
        }
    }

    // save log step
    public function logline($step_id)
    {
        $id = $this->session->userdata['id_siswa'];

        $log=$this->Mlinetopik->get_log($step_id, $id);
        // pengecekan log step line
        
        if ($log == false) {
            
            $datLog = array(
                'penggunaID'=>$this->session->userdata['id_siswa'],
                'stepID'=>$step_id);
            //jika log belum ada maka save log
            $this->Mlinetopik->save_log($datLog);
        }else{
           
        }

        return $log;
        
    }

    public function create_session_id_latihan($id_latihan){
        if ($this->session->userdata('id_siswa')) { 
            $this->session->set_userdata('id_latihan',$id_latihan);
            $UUID=$this->Mlinetopik->get_UUID($id_latihan);
          
            redirect('/linetopik/step_quiz/'.$UUID, 'refresh');
             // redirect('/tesonline/mulaitest', 'refresh');
        } else {
                redirect('login');
        }
    }

    // view step Quiz
     public function step_quiz($UUID)
    {
        
        if ($this->session->userdata('id_siswa')) { 
            if (!empty($this->session->userdata['id_latihan'])) {
                $id = $this->session->userdata['id_latihan'];
                $this->load->view('workout1/t-header-soal');

                $query = $this->Mworkout1->get_soal($id);
                $data['soal'] = $query['soal'];
                $data['pil'] = $query['pil'];
                $this->load->view('v-step-quiz', $data);
                $this->load->view('workout1/t-footer-soal');
            } else {
                $this->errortest();
            }
        } else {
                redirect('login');
        }
    }

    // fungsi jika test error
    public function errortest() {
        $this->load->view('t-header-soal');
        $this->load->view('v-error-test.php');
    }

    // fungsi untuk mengecek jawaban workout
    public function cekjawaban() {
        $data = $this->input->post('pil');
        $id = $this->session->userdata['id_latihan'];
        $id_latihan = $this->session->userdata['id_latihan'];
        // $level = $this->mtesonline->levelLatihan($id_latihan)[0]->level;
        $result = $this->load->Mworkout1->jawabansoal($id);
        $datQuiz = $this->Mlinetopik->get_datQuiz($id);
        $minBenar = $datQuiz ['jumlah_benar'];
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $koreksi = array();
        $idSalah = array();
        $jumlahsoal = sizeOf($result);
        for ($i = 0; $i < sizeOf($result); $i++) {
            $id = $result[$i]['soalid'];
            // $data[$id];
            if (!isset($data[$id])) {
                $kosong++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            } else if ($data[$id] == $result[$i]['jawaban']) {
                $benar++;
            } else {
                $salah++;
                $koreksi[] = $result[$i]['soalid'];
                $idSalah[] = $i;
            }
        }
        $data['jumlahsoal']   = $jumlahsoal;
        $data['syarat']       = $minBenar;
        $data['jumlahBenar']  = $benar;
        $data['jumlahSalah']  = $salah;
        $data['jumlahKosong'] = $kosong;
         // cek ke lulusan
        $tampStep = $this->Mlinetopik->get_stepID2($id_latihan);
        $stepID = $tampStep['id'];
        // $UUID = $tampStep['UUID'];
        $data['stepUUID']     = $tampStep['UUID'];
        if ($benar >= $minBenar ) {
          $data['hasil'] = "Selamat Anda Lulus";
             $id = $this->session->userdata['id_siswa'];
             $this->logLine($stepID, $id);
         } else {
          $data['hasil'] = "Selamat Anda Gagal, Silahkan Coba Lagi";
          $id = $this->session->userdata['id_siswa'];
             $this->logLine($stepID, $id);
         }
         
         // redirect('/linetopik/timeLine/'.$UUID);
         $this->laporanquiz($data);
    }

    //menampilkan laporan hasil quiz
    public function laporanquiz($datArr)
    {

        $stepUUID=$datArr['stepUUID'];
        $dat=$this->Mlinetopik->get_topic_step2($stepUUID);
        $data['data']=$datArr;

        // Start step line data
        $data['datline']=array();
        // 
        $step=false;
        foreach ($dat as $rows) {
            $tampJenis = $rows['jenisStep'];
            $UUID = $rows['stepUUID'];
            $stepID = $rows['stepID'];
            $urutan = $rows ['urutan'];
            // pengecekan jenis step line
            if ($tampJenis == '1') {
                // jika step line video
                $jenis='Video';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon='ico-movie ';
                    $link = base_url('index.php/linetopik/step_video/'.$UUID);
                    $status ="enable";
                } else {
                    $icon='ico-movie';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }

            }else if ($tampJenis == '2') {
                // jika step line Materi atau modul
                $jenis='Materi';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon ='ico-file6';
                    $link = base_url('index.php/linetopik/step_materi/'.$UUID);
                    $status ="enable";
                } else {
                   $icon='ico-file6';
                   $link = 'javascript:void(0)';
                   $status ="disable";
                }
            }else{
                // jika step line latihan atau quiz
                $jenis='Latihan';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                   $icon ='ico-pencil';
                  $latihanID = $rows['latihanID'];
                   $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                   $status ="enable";
                } else {
                  $icon='ico-pencil';
                 $link = 'javascript:void(0)';
                 $status ="disable";
                }
            }
            $data['namaTopik']=$rows['namaTopik'];
            $data['bab'] =$rows['judul_bab'];
            $data['topikUUID']=$rows['topikUUID'];
            $data['datline'][]=array(
                'deskripsi'=>$rows['deskripsi'],
                'namaStep'=> $rows['namaStep'],
               
                'jenisStep'=>$jenis,
                'icon' =>$icon,
                'link' => $link,
                'status'=>$status);
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_log($stepID, $id);
            $step = $log;

        }

      // END step line data

        $this->load->view('template/siswa/v-head');
        $this->load->view('v-hasil-quiz', $data);
        $this->load->view('template/siswa/v-footer');

    }

        //PENCARIAN TOPIK
    public function cariTopik()
    {   
        $data = array(
            'judul_halaman' => 'Netjoo - Step Line',
            'judul_header' => 'Hasil Pencarian',
             'judul_header2' =>'Hasil Pencarian Topik'
        );
        $kunciCari=htmlspecialchars($this->input->get('keycari'));
        
        $dat=$this->Mlinetopik->get_caritopik($kunciCari);
        
         $data['topik']=$this->Mlinetopik->get_topik_bynama($kunciCari);
        $data['datline']=array();
        // Start step line
          $step=false;
        foreach ($dat as $rows) {
            $tampJenis = $rows['jenisStep'];
            $UUID = $rows['stepUUID'];
            $stepID = $rows['stepID'];
            $urutan = $rows ['urutan'];
            // pengecekan jenis step line
            if ($tampJenis == '1') {
                // jika step line video
                $jenis='Video';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon='ico-movie ';
                    $link = base_url('index.php/linetopik/step_video/'.$UUID);
                    $status ="enable";
                } else {
                    $icon='ico-movie';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }

            }else if ($tampJenis == '2') {
                // jika step line Materi atau modul
                $jenis='Materi';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon ='ico-file6';
                    $link = base_url('index.php/linetopik/step_materi/'.$UUID);
                    $status ="enable";
                } else {
                   $icon='ico-file6';
                   $link = 'javascript:void(0)';
                   $status ="disable";
                }
            }else{
                // jika step line latihan atau quiz
                $jenis='Latihan';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                   $icon ='ico-pencil';
                  $latihanID = $rows['latihanID'];
                   $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                   $status ="enable";
                } else {
                  $icon='ico-pencil';
                 $link = 'javascript:void(0)';
                 $status ="disable";
                }
            }
            $data['datline'][]=array(
                'namaTopik'=>$rows['namaTopik'],
                'deskripsi'=>$rows['deskripsi'],
                'namaStep'=> $rows['namaStep'],
                'bab'=>$rows['judul_bab'],
                'jenisStep'=>$jenis,
                'icon' =>$icon,
                'link' => $link,
                'status'=>$status);
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_log($stepID,$id);
            $step = $log;

        }
        $this->load->view('template/siswa/v-head');
        // $this->load->view('v-step-materi', $data);
        $this->load->view('v-line-topik-2', $data);
        $this->load->view('template/siswa/v-footer');
        // END step line
    }


    public function timeline($UUID)
    {
         $dat=$this->Mlinetopik->get_topic_step($UUID);
        $data['datline']=array();
         $step=false;
        foreach ($dat as $rows) {
            $data['namaTopik']=$rows['namaTopik'];
            $data['deskripsi']=$rows['deskripsi'];
            $tampJenis = $rows['jenisStep'];
            $UUID = $rows['stepUUID'];
            $stepID = $rows['stepID'];
            $urutan = $rows ['urutan'];
           if ($tampJenis == '1') {
                $jenis='Video';
                
                if ($step == true || $urutan == '1' ) {
                    $icon='ico-movie';
                    $link = base_url('index.php/linetopik/step_video/'.$UUID);
                    $status ="enable";
                    
                } else {
                    $icon ='ico-movie';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }

            }else if ($tampJenis == '2') {
                $jenis='Materi';
                
                if ($step == true || $urutan == '1' ) {
                    $icon ='ico-file6';
                    $link = base_url('index.php/linetopik/step_materi/'.$UUID);
                    $status ="enable";
                } else {
                    $icon ='ico-file6';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }else{
                $jenis='Latihan';
                if ($step == true || $urutan == '1' ) {
                   $icon ='ico-pencil';
                  $latihanID = $rows['latihanID'];
                   $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                   $status ="enable";
                } else {
                    $icon ='ico-pencil';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }
            $data['datline'][]=array(
                'namaStep'=> $rows['namaStep'],
                'jenisStep'=>$jenis,
                'icon' =>$icon,
                'link' => $link,
                'bab'=>$rows['judul_bab'],
                'status'=>$status);
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_log($stepID, $id);
            $step = $log;
            $babID = $rows['babID'];
        }
        $data['topik']=$this->Mlinetopik->get_topik($babID);
          // END get data time untuk side bar

        $this->load->view('template/siswa/v-head');
        $this->load->view('v-oneline', $data);
        $this->load->view('template/siswa/v-footer');
        // END step line
         
    }


    // view step video
    public function step_video($UUID)
    {
        // pengecekan jika snip url
        $snip=$this->Mlinetopik->get_stepLog($UUID);
        if ($snip==false) {
          redirect('/login');
        }
        //get stepID untuk save log
         $stepID= $this->Mlinetopik->get_stepID($UUID);
        // save log step line
        $this->logLine($stepID);
         $data['datVideo']=$this->Mlinetopik->get_datvideo($UUID);
         // get UUID TOPIK
         $data['UUID']=$data['datVideo']['UUID'];
         // Start get tanggal dan bulan
            $timestamp = strtotime($data['datVideo']['date_created']);
            $data['tgl']=date("d", $timestamp);
            $data['bulan']=date("M", $timestamp);
         // END get tanggal dan bulan
         //Start get data untuk time line side bar
           $dat=$this->Mlinetopik->get_topic_step2($UUID);
            $data['datline']=array();
            //menampung bolean t/f utuk disable enable step
            $step=false;
        foreach ($dat as $rows) {
            $data['namaTopik']=$rows['namaTopik'];
            $data['deskripsi']=$rows['deskripsi'];
            $data['topikUUID']=$rows['topikUUID'];
            $tampJenis = $rows['jenisStep'];
            $UUID = $rows['stepUUID'];
            $stepID = $rows['stepID'];
            $urutan = $rows ['urutan'];
            // Pengecekan jenis step line
           if ($tampJenis == '1') {
                $jenis='Video';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon='ico-movie ';
                    $link = base_url('index.php/linetopik/step_video/'.$UUID);
                    $status ="enable";
                } else {
                   $icon='ico-movie';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }else if ($tampJenis == '2') {
                $jenis='Materi';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                    $icon =' ico-file6';
                    $link = base_url('index.php/linetopik/step_materi/'.$UUID);
                    $status ="enable";
                } else {
                   $icon =' ico-file6';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }else{
                $jenis='Latihan';
                // pengecekan disable atau enable step
                if ($step == true || $urutan == '1' ) {
                   $icon ='ico-pencil';
                  $latihanID = $rows['latihanID'];
                   $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                   $status ="enable";
                } else {
                    $icon ='ico-pencil';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
            }
            $data['datline'][]=array(
                'namaStep'=> $rows['namaStep'],
                'jenisStep'=>$jenis,
                'icon' =>$icon,
                'link' => $link,
                'status'=>$status);
            $data['bab']      = $rows['judul_bab'];
            $data['topik']    = $rows['namaTopik'];
            $id = $this->session->userdata['id_siswa'];
              $log=$this->Mlinetopik->get_log($stepID, $id);
            $step = $log;
        }
          // END get data time untuk side bar
          $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header-login.php',

            APPPATH . 'modules/linetopik/views/v-step-video.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );

     
        $this->parser->parse('templating/index', $data);

    }





 }

 ?>