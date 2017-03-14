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
        $this->load->model('login/Loginmodel');
        $this->load->model('settingpath/mpath');
 		$this->load->library('parser');
 	}


 	public function index()
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['mapel'] = $this->load->Mlinetopik->getmapeltopik();
            $step=false;
            $urutan = 1;

            if ($step == true || $urutan == '1' ) {

            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v-mapel-part', $data);
            $this->load->view('template/siswa2/v-footer');
        }

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
            $this->load->view('template/header');
            $this->load->view('workout1/v-header');
            $this->load->view('v-line-bab', $data);
        } else {
            redirect('login');
        }
    }

    // fungsi pilihan part
    public function pilih_part($no) {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['mapel'] = $this->load->Mlinetopik->getparttopik($no);
            $data['p'] = $this->load->Mlinetopik->getparttopik($no)[0]['nama_mapel'];
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('t-baru/v-line-part', $data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }
    }

    public function learningline($mapel, $part)
    {
        // var_dump($data['datline']);
        //hak akses jika siswa
    if ($this->session->userdata('id_siswa')) {    
        $dat=$this->Mlinetopik->get_line_topik($mapel, $part);
        $data['topik']=$this->Mlinetopik->get_topik($mapel, $part);
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
                // 'bab'=>$rows['judul_bab'],
                'jenisStep'=>$jenis,
                'icon' =>$icon,
                'link' => $link,
                'status'=>$status);
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_log($stepID, $id);
            $step = $log;

        }
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('t-baru/v-line-topik', $data);
        $this->load->view('template/siswa2/v-footer');
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
         
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('t-baru/v-step-materi', $data);
        $this->load->view('template/siswa2/v-footer');
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

    // membuat session untuk latihan
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
                $id_siswa =  $this->session->userdata['id_siswa'];
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

    // fungsi untuk mengecek jawaban quiz
    public function cekjawaban() {
        $uuid_latihan = uniqid();
        $data = $this->input->post('pil');
        $id = $this->session->userdata['id_latihan'];
        $id_latihan = $this->session->userdata['id_latihan'];
        $level = $this->Mworkout1->levelLatihan($id_latihan)[0]->level;
        $result = $this->load->Mworkout1->jawabansoal($id);
        $id_bab = $this->load->Mworkout1->jawabansoal($id)[0]['id_bab'];
        $id_pel = $this->load->Mlinetopik->getmapelbab2($id_bab)[0]['id_mapel'];
        // var_dump($id_pel, $id_bab);/
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

            $hasil['id_pengguna'] = $this->session->userdata['id_siswa'];
            $hasil['id_latihan'] = $uuid_latihan;
            // $hasiil['id_latihan'] = 111;
            $hasil['jmlh_kosong'] = $kosong;
            $hasil['jmlh_benar'] = $benar;
            $hasil['jmlh_salah'] = $salah;
            $hasil['total_nilai'] = $benar;
            $hasil['durasi_pengerjaan'] = $this->input->post('durasi');
            $hasil['id_bab'] = $id_bab;
            $hasil['id_mapel'] = $id_pel;
            if ($level == "1") {
                $hasil['score'] = floatval($benar * ($jumlahsoal * 10) / ($this->input->post('durasi') / 60));
            } else if ($level == "2") {
                $hasil['score'] = floatval($benar * ($jumlahsoal * 20) / ($this->input->post('durasi') / 60));
            } else {
                $hasil['score'] = floatval($benar * ($jumlahsoal * 30) / ($this->input->post('durasi') / 60));
            }

        $this->Mlinetopik->inputreport($hasil);
        $this->session->unset_userdata('id_latihan');
         // cek ke lulusan
        $tampStep = $this->Mlinetopik->get_stepID2($id_latihan);
        $stepID = $tampStep['id'];
        // $UUID = $tampStep['UUID'];
        $data['stepUUID']     = $tampStep['UUID'];
        if ($benar >= $minBenar ) {
          $data['hasil'] = "Selamat Anda Lulus";
             
             $this->logLine($stepID);
         } else {
          $data['hasil'] = "Selamat Anda Gagal, Silahkan Coba Lagi";
            $this->logLine($stepID);
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
        $id = $this->session->userdata['id_siswa'];
        $data['tot']=$this->Mlinetopik->get_total()[0]['tot_path'];
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

        $this->load->view('template/header');
        $this->load->view('v-hasil-quiz', $data);

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
            $log=$this->Mlinetopik->get_log($stepID);
            $step = $log;

        }
        $this->load->view('template/header');
        $this->load->view('workout1/v-header');
        // $this->load->view('v-step-materi', $data);
        $this->load->view('v-line-topik-2', $data);
        // END step line
    }

    public function hasil_part1($pel)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {

            // get total soal yang dikerjakan
            $data['tot']=$this->Mlinetopik->get_total($pel);

            $data['pel']=$this->Mlinetopik->get_total($pel)[0]['nama_mapel'];
            $mp = $this->Mlinetopik->get_total($pel)[0]['id_mapel'];
            $n1=$this->Mlinetopik->get_total($pel)[0]['tot_path'];
            $n2=$this->Mlinetopik->get_total($pel)[0]['benar'];
            $n3=$this->Mlinetopik->get_total($pel)[0]['jum_soal'];
            $n4=$this->Mlinetopik->get_set_part2($pel)[0]['nilai_awal'];
            $n5=$this->Mlinetopik->get_set_part2($pel)[0]['nilai_akhir'];
            // $n6=$this->mpath->get_set_path()[0]['jumlah'];

            $total = ($n2/$n3)*100;
            // var_dump($n2, $n3, $total);
            // substr($total, 0, 3);
            if ($total <= 25) {
                $n6=$this->Mlinetopik->getpath(0,25,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } else if($total >25 && $total <=30) {
                $n6=$this->Mlinetopik->getpath(25,30,$pel)[0]['jumlah'];
                $data['bab'] = $n6;               
            } else  if($total>30 && $total <=35) {
                $n6=$this->Mlinetopik->getpath(30,35,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } else  if($total>35 && $total <=40) {
                $n6=$this->Mlinetopik->getpath(35,40,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } else {
                $n6=$this->Mlinetopik->getpath(40,100,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } 
            
            $data['nilai'] = $total;

            $data['report']=$this->Mlinetopik->getreport($data['bab'], $pel);
            // var_dump($data['report']); 

            // get jumlah soal 
            // $data['jum_soal'] = $this->Mlinetopik->get_soal_pendalaman1($mp)[0]['jumlah_soal'];
            $data['jum_soal'] =  $data['bab'];
            $jml_soal =$data['bab'];

            // $kesulitan = $this->Mlinetopik->get_soal_pendalaman($mp)[0]['level'];
            // var_dump( $data['bab'], $kesulitan );
            // insert ke insert_tb_mm_sol_quiz
            for ($i=1; $i <= $jml_soal; $i++) { 
            foreach ($data['report'] as $row) {
                $id= $this->Mlinetopik->getsoal2($row['id_bab'], 1);
                $data['soal2'] = $id['soal'][$i]['id_bank'];
                $data['mm_sol'] = array(
                "id_quiz" => 1,
                "id_soal" =>  $data['soal2'],
                "id_bab" => $row['id_bab'],
                "id_siswa" => $this->session->userdata('id_siswa')
                );
                // $this->Mlinetopik->insert_tb_mm_sol_quiz($data['mm_sol']);
                
            };
            }

            // buat nampilin soal 
            $query = $this->Mlinetopik->get_soal_part2(1);
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];
            

            // get soal randoom
            $data['soal_random'] = $this->Mlinetopik->get_bab_from_mm($this->session->userdata('id_siswa'));
            $lim =  $this->Mlinetopik->get_count($this->session->userdata('id_siswa'))[0]['jml'];
            // var_dump($data['soal_random']);
            // foreach ($data['soal_random'] as $row) {
            for ($i=0; $i < $lim; $i++) { 
                $data['b'] = $this->Mlinetopik->get_bab_from_mm($this->session->userdata('id_siswa'))[$i]['id_bab'];                 
                 // var_dump($query);
            }
          

            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('t-baru/v-coba-path', $data);
            $this->load->view('template/siswa2/v-footer');
       

        } else {
            redirect('login');
        }
    }

    // fungsi tampil view season part 2
    public function line_part2($mapel, $part)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['simulasi'] = $this->load->Mlinetopik->get_sim_p2($mapel);
            $step=false;
            $urutan = 1;

            if ($step == true || $urutan == '1' ) {
                $data['link'] = base_url('index.php/linetopik/line_simulasi/'.$mapel);
                $sis = $this->session->userdata('id_siswa');
                $data['siswa']  = $this->Loginmodel->get_siswa($sis);
                $this->load->view('template/siswa2/v-header', $data);
                // $this->load->view('t-baru/v-line-bab', $data);
                $this->load->view('t-baru/v-season-simulasi', $data);
                $this->load->view('template/siswa2/v-footer');
            }

        } else {
            redirect('login');
        }
        
    }

    // fungsi tampil isi to dari part 2
    public function line_simulasi($mapel)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['simulasi'] = $this->load->Mlinetopik->get_sim_p2($mapel);
            $data['pel'] = $mapel;
            $step=false;
            $urutan = 1;

            if ($step == true || $urutan == '1' ) {
                // foreach ($data['simulasi'] as $rows) {
                    $data['UUID'] = uniqid();
                    // $sim = $rows['simulasi'];
                    $data['icon'] ='ico-pencil';
                    // $data['link'] = base_url('index.php/linetopik/create_session_id_p2/'.$UUID.'/'.$sim);
                // }
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v-simulasi', $data);
            $this->load->view('template/siswa2/v-footer');
        }

        } else {
            redirect('login');
        }
        
    }

    public function line_to($to)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['simulasi'] = $this->load->Mlinetopik->get_to_p2($to);
            $step=false;
            $urutan = 1;
            $uuid_latihan = uniqid();

            if ($step == true || $urutan == '1' ) {

            $data['icon'] ='ico-pencil';
            $data['link'] = base_url('index.php/linetopik/line_simulasi/'.$uuid_latihan);
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v-simulasi', $data);
            $this->load->view('template/siswa2/v-footer');
        }

        } else {
            redirect('login');
        }
        
    }

    // membuat session untuk quiz part2
    public function create_session_id_p2($id_latihan, $sim, $level, $pel){
        if ($this->session->userdata('id_siswa')) { 
            // $this->session->set_userdata('id_latihan',$id_latihan);
            // $UUID=$this->session->userdata('id_siswa');
            $UUID = $this->session->set_userdata('id_latihan',$id_latihan);
            // var_dump($id_latihan);
            redirect('/linetopik/quiz_part2/'.$id_latihan.'/'.$sim.'/'.$level.'/'.$pel, 'refresh');
             // redirect('/tesonline/mulaitest', 'refresh');
        } else {
                redirect('login');
        }
    }

     // view step Quiz part 2
     public function quiz_part2($UUID, $sim, $level, $pel)
    {
        
        if ($this->session->userdata('id_siswa')) { 
            if (!empty($this->session->userdata['id_latihan'])) {
                // get total soal yang dikerjakan
            $data['tot']=$this->Mlinetopik->get_total($pel);

            // var_dump($data['tot']);
            $data['pel']=$this->Mlinetopik->get_total($pel)[0]['nama_mapel'];
            $mp = $this->Mlinetopik->get_total($pel)[0]['id_mapel'];
            $n1=$this->Mlinetopik->get_total($pel)[0]['tot_path'];
            $n2=$this->Mlinetopik->get_total($pel)[0]['benar'];
            $n3=$this->Mlinetopik->get_total($pel)[0]['jum_soal'];
            $n4=$this->Mlinetopik->get_set_part2($pel)[0]['nilai_awal'];
            $n5=$this->Mlinetopik->get_set_part2($pel)[0]['nilai_akhir'];
            // $n6=$this->mpath->get_set_path()[0]['jumlah'];

            $total = ($n2/$n3)*100;
            // var_dump($n2, $n3, $total);
            // substr($total, 0, 3);
            if ($total <= 25) {
                $n6=$this->Mlinetopik->getpath(0,25,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } else if($total >25 && $total <=30) {
                $n6=$this->Mlinetopik->getpath(25,30,$pel)[0]['jumlah'];
                $data['bab'] = $n6;               
            } else  if($total>30 && $total <=35) {
                $n6=$this->Mlinetopik->getpath(30,35,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } else  if($total>35 && $total <=40) {
                $n6=$this->Mlinetopik->getpath(35,40,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } else {
                $n6=$this->Mlinetopik->getpath(40,100,$pel)[0]['jumlah'];
                $data['bab'] = $n6;
            } 
            
            $data['nilai'] = $total;

            $data['report']=$this->Mlinetopik->getreport($data['bab'], $pel);
            // var_dump($data['report']); 

            // get jumlah soal 
            // $data['jum_soal'] = $this->Mlinetopik->get_soal_pendalaman1($mp)[0]['jumlah_soal'];
            $data['jum_soal'] =  $data['bab'];
            $jml_soal =$data['bab'];
            // var_dump($jml_soal);

            $kesulitan = $this->Mlinetopik->get_soal_pendalaman($mp,$sim);
            // var_dump($level);
            $uuid_latihan = uniqid();

            // insert ke insert_tb_mm_sol_quiz
            for ($i=0; $i < $jml_soal; $i++) { 
            foreach ($data['report'] as $row) {
                $id= $this->Mlinetopik->getsoal2($row['id_bab'], $level);
                $data['soal2'] = $id['soal'][$i]['id_bank'];
                $data['mm_sol'] = array(
                "id_quiz" => $UUID,
                "id_soal" =>  $data['soal2'],
                "id_bab" => $row['id_bab'],
                "id_siswa" => $this->session->userdata('id_siswa'),
                "UUID" => $uuid_latihan
                );
                $this->Mlinetopik->insert_tb_mm_sol_quiz($data['mm_sol']);
            };
            }

            $uuid_quiz = $this->Mlinetopik->get_quiz_by_uuid($UUID);
            // var_dump($uuid_quiz);

            // buat nampilin soal 
            $query = $this->Mlinetopik->get_soal_part2($UUID);
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];
            

            // get soal randoom
            $data['soal_random'] = $this->Mlinetopik->get_bab_from_mm($this->session->userdata('id_siswa'));
            $lim =  $this->Mlinetopik->get_count($this->session->userdata('id_siswa'))[0]['jml'];
            // var_dump($data['soal_random']);
            // foreach ($data['soal_random'] as $row) {
            for ($i=0; $i < $lim; $i++) { 
                $data['b'] = $this->Mlinetopik->get_bab_from_mm($this->session->userdata('id_siswa'))[$i]['id_bab'];                 
                 // var_dump($query);
            }

             $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('workout1/t-header-soal');
             $this->load->view('t-baru/v-to-part2', $data);
                $this->load->view('workout1/t-footer-soal');
                // $this->load->view('template/siswa2/v-header', $data);
                // $this->load->view('t-baru/v-coba-path', $data);
                // $this->load->view('template/siswa2/v-footer');
                   
            } else {
                $this->errortest();
            }
        } else {
                redirect('login');
        }
    }

    public function quizpart2()
    {
        # code...
    }

    public function reportpart1($pel)
    {   
        $data['report'] = $this->Mlinetopik->get_report_p1($this->session->userdata['id_siswa'],$pel);
        $data['datline']=array();
        foreach ($data['report'] as $key) {
            $benar = $key['jmlh_benar'];
            $salah = $key['jmlh_salah'];
            $kosong = $key['jmlh_kosong'];
            $soal = $this->Mlinetopik->get_total($pel)[0]['jum_soal'];
            // var_dump($soal);
            $data['datline'][]=array(
                'jmlh_benar'=>$key['jmlh_benar'],
                'jmlh_salah'=>$key['jmlh_salah'],
                'judul_bab'=>$key['judul_bab'],
                // 'namaStep'=> $key['namaStep'],
                // 'bab'=>$rows['judul_bab'],
                'jmlh_soal'=>$soal
                );
        }

        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('t-baru/v-report-part1', $data);
        $this->load->view('template/siswa2/v-footer');
    }


// fungsi untuk mengecek jawaban workout
    public function cekjawaban_part3() {
        $data = $this->input->post('pil');
        $id = $this->session->userdata['id_latihan'];
        $id_latihan =  $this->session->userdata['id_latihan'];
        // $level = $this->mtesonline->levelLatihan($id_latihan)[0]->level;
        $result = $this->load->Mlinetopik->jawabansoal_part3($id);
        $id_bab = $this->load->Mlinetopik->jawabansoal_part3($id)[0]['id_bab'];
        $id_pel = $this->load->Mlinetopik->getmapelbab2($id_bab)[0]['id_mapel'];
        // $level = $this->Mworkout1->levelLatihan($id_latihan)[0]->level;
        // var_dump($id_latihan, $id);
        // $datQuiz = $this->Mlinetopik->get_datQuiz($id);
        // $minBenar = $datQuiz ['jumlah_benar'];
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
        // $data['syarat']       = $minBenar;
        $data['jumlahBenar']  = $benar;
        $data['jumlahSalah']  = $salah;
        $data['jumlahKosong'] = $kosong;
        $data['totalNilai'] = $benar;

        // if ($level == "mudah") {
        // $data['score'] = floatval($benar * ($jumlahsoal * 10) / ($this->input->post('durasi') / 60));
        // } else if ($level == "sedang") {
        // $data['score'] = floatval($benar * ($jumlahsoal * 20) / ($this->input->post('durasi') / 60));
        // } else {
        // $data['score'] = floatval($benar * ($jumlahsoal * 30) / ($this->input->post('durasi') / 60));
        // }

             $hasil['id_paket']   = $id_latihan;
            $hasil['id_pengguna'] = $this->session->userdata['id_siswa'];
            $hasil['jmlh_kosong'] = $kosong;
            $hasil['jmlh_benar'] = $benar;
            $hasil['jmlh_salah'] = $salah;
            $hasil['total_nilai'] = $benar;
            $hasil['durasi_pengerjaan'] = $this->input->post('durasi');
            $hasil['id_bab'] = $id_bab;
            $hasil['id_mapel'] = $id_pel;

        $this->Mlinetopik->inputrepor_part3($hasil);
        $this->session->unset_userdata('id_latihan');
         // cek ke lulusan
        $tampStep = $this->Mlinetopik->get_paket($id_latihan);
        // $stepID = $tampStep['id'];
        // $UUID = $tampStep['UUID'];
        $data['stepUUID']     = $tampStep['id_paket'];
        // if ($benar >= $minBenar ) {
        //   $data['hasil'] = "Selamat Anda Lulus";
             
        //      // $this->logLine($stepID);
        //  } else {
        //   $data['hasil'] = "Selamat Anda Gagal, Silahkan Coba Lagi";
        //  }
         
         // redirect('/linetopik/timeLine/'.$UUID);
         $this->laporanquiz_part3($data);
    }

    
     //menampilkan laporan hasil quiz
    public function laporanquiz_part3($datArr)
    {

        // $stepUUID=$datArr['stepUUID'];
        // $dat=$this->Mlinetopik->get_topic_step2($stepUUID);
        $data['data']=$datArr;
        $id = $this->session->userdata['id_siswa'];
        $data['tot']=$this->Mlinetopik->get_total_part3()[0]['tot_path'];
        // Start step line data
        $data['datline']=array();
        // 
        $step=false;
        
            $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        

      // END step line data
        $this->load->view('template/siswa2/v-header', $data);
        // $this->load->view('template/header');
        $this->load->view('t-baru/v-hasilquiz-part3', $data);
        $this->load->view('template/siswa2/v-footer');

    }

    
    

    public function tryout()
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $lim = $this->load->Mlinetopik->tampil_active()[0]['active'];
            $data['to'] = $this->load->Mlinetopik->get_view_to($lim);
           

            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v-tryout', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }

    public function daftar_paket($id_try)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['try'] = $this->load->Mlinetopik->get_paketsoal($id_try);




            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v_daftar_paket', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }

    public function report_tryout($id_try)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['report'] = $this->load->Mlinetopik->get_reporttry($id_try);




            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v-reporttryout', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }

    public function report_paket($id_pkt)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['report'] = $this->load->Mlinetopik->get_report_paket($id_pkt);




            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            // $this->load->view('t-baru/v-line-bab', $data);
            $this->load->view('t-baru/v-report-paket', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }


 }

 ?>