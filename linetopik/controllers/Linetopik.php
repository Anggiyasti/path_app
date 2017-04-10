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
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $jur = $this->Mlinetopik->get_jurusan($sis);
            $data['video'] = $this->load->Mlinetopik->get_view_video(); 
           
            $data['mapel'] = $this->load->Mlinetopik->getmapeltopik($jur);
            // update status path siswa menjadi tidak bisa ubah jurusan pelajaran
            $this->Mlinetopik->update_status_siswa($sis,1);
            // CEK TO YANG AKTIF
            $lim = $this->load->Mlinetopik->tampil_active()[0]['active'];
            
            $id = $this->session->userdata['id_siswa'];

            $log=$this->Mlinetopik->get_cek_logtry($id);
            $cek = $log;
                // pengecekan log part 3
                if ($cek == true) {           
                    $data['to'] = $this->load->Mlinetopik->get_to_log($id);
                    }
                else{
                    $this->logtry($id,$lim);
                    $data['to'] = $this->load->Mlinetopik->get_to_log($id);

                    }
            // get data nilai tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();
            $data['jur']  = $this->Loginmodel->get_siswa($id)[0]->jurusan_pelajaran;
            // cek status path siswa
            $data['status']  = $this->Loginmodel->get_siswa($id)[0]->status_path;
            // get status akttivasi path
            $data['sp'] = $this->load->Mlinetopik->status_path();

            
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('t-baru/v-mapel-part', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }

    // AWAL FUNGSI UNTUK PART 1

    // FUNGSI TAMPIL LEARNINGLINE PART 1
    public function learningline($mapel, $part)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {    
            $dat=$this->Mlinetopik->get_line_topik($mapel, $part);
            $data['topik']=$this->Mlinetopik->get_topik($mapel, $part);
            $data['datline']=array();
            
            $step=false;
            foreach ($dat as $rows) {
                $tampJenis = $rows['jenisStep'];
                $UUID = $rows['stepUUID'];
                $stepID = $rows['stepID'];
                $urutan = $rows ['urutan'];

                    // pengecekan disable atau enable step
                    if ($step == true || $urutan == '1' ) {
                       $icon ='ico-pencil';
                      $latihanID = $rows['latihanID'];
                       $link = base_url('index.php/linetopik/step_part1/'.$UUID);
                       $status ="enable";
                    } else {
                      $icon='ico-pencil';
                     $link = 'javascript:void(0)';
                     $status ="disable";
                    }
                
                $data['datline'][]=array(
                    'namaTopik'=>$rows['namaTopik'],
                    'deskripsi'=>$rows['deskripsi'],
                    'namaStep'=> $rows['namaStep'],
                    'icon' =>$icon,
                    'link' => $link,
                    'status'=>$status);
                $id = $this->session->userdata['id_siswa'];
                $log=$this->Mlinetopik->get_log($stepID, $id);
                $step = $log;

            }
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get data nilai tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();
            $data['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
            $data['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('t-baru/v-line-topik', $data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }
    }

    // save log step part 1
    public function logline($step_id)
    {
        $id = $this->session->userdata['id_siswa'];

        $log=$this->Mlinetopik->get_log($step_id, $id);
        // pengecekan log step line
        
        if ($log == true) {
            
            $datLog = array(
                'penggunaID'=>$this->session->userdata['id_siswa'],
                'stepID'=>$step_id);
            //jika log belum ada maka save log
            $this->Mlinetopik->save_log($datLog);
        }else{
           
        }

        return $log;
        
    }

    // View step part 1
    public function step_part1($UUID)
    {   
        // hak akses jika siswa
        if ($this->session->userdata('id_siswa')) { 
            $stepID= $this->Mlinetopik->get_stepID($UUID);        
        
            //Start get data untuk time line 
            $dat=$this->Mlinetopik->get_topic_step2($UUID);
            $data['datline']=array();
            $on =1;
            
            foreach ($dat as $rows) {
                $data['namaTopik']=$rows['namaTopik'];
                $data['deskripsi']=$rows['deskripsi'];
                $tampJenis = $rows['jenisStep'];
                $UUID = $rows['stepUUID'];
                $stepID = $rows['stepID'];
                $urutan = $rows ['urutan'];
                $id = $this->session->userdata['id_siswa'];
                $log=$this->Mlinetopik->get_log($stepID, $id);
                $step = $log;
                    $jenis='Latihan';
                    if ($step == true && $on == 1) {
                        $icon ='ico-pencil';
                        $latihanID = $rows['latihanID'];
                        $link = base_url('index.php/linetopik/create_session_id_latihan/'.$latihanID);
                        $status ="enable";
                        $on =0;
                    } else {
                        $icon ='ico-pencil';
                        $link = 'javascript:void(0)';
                        $status ="disable";
                    }
                
                $data['datline'][]=array(
                    'namaStep'=> $rows['namaStep'],
                    'jenisStep'=>$jenis,
                    'icon' =>$icon,
                    'link' => $link,
                    'status'=>$status);
                $data['bab']      = $rows['judul_bab'];
                $data['topik']    = $rows['namaTopik'];
                
            }
          // END 
         
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        // get data nilai tertinggi
        $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
        // get data log activity
        $data['log']  = $this->Loginmodel->getlogact();
        $data['jur']  = $this->Loginmodel->get_siswa($id)[0]->jurusan_pelajaran;
        $data['status']  = $this->Loginmodel->get_siswa($id)[0]->status_path;
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('t-baru/v-step-part1', $data);
        $this->load->view('template/siswa2/v-footer');
        } else {
                redirect('login');
        }
    }

    // membuat session untuk latihan part 1
    public function create_session_id_latihan($id_latihan){
        if ($this->session->userdata('id_siswa')) { 
            $this->session->set_userdata('id_latihan',$id_latihan);
            $UUID=$this->Mlinetopik->get_UUID($id_latihan);
          
            redirect('/linetopik/step_quiz/'.$UUID, 'refresh');
        } else {
                redirect('login');
        }
    }

     // view step Quiz part 1
     public function step_quiz($UUID) {
        // jika hak akses == siswa
        if ($this->session->userdata('id_siswa')) { 
            if (!empty($this->session->userdata['id_latihan'])) {
                $id = $this->session->userdata['id_latihan'];
                $id_siswa =  $this->session->userdata['id_siswa'];

                $query = $this->Mworkout1->get_soal($id);
                $data['soal'] = $query['soal'];
                $data['pil'] = $query['pil'];
                $this->load->view('workout1/t-header-soal');
                $this->load->view('v-step-quiz', $data);
                $this->load->view('workout1/t-footer-soal');
            } else {
                $this->errortest();
            }
        } else {
                redirect('login');
        }
    }

    // fungsi untuk mengecek jawaban quiz part 1
    public function cekjawaban() {
        $uuid_latihan = uniqid();
        $data = $this->input->post('pil');
        $id = $this->session->userdata['id_latihan'];
        $id_latihan = $this->session->userdata['id_latihan'];
        $level = $this->Mworkout1->levelLatihan($id_latihan)[0]->level;
        $result = $this->load->Mworkout1->jawabansoal($id);
        $id_bab = $this->load->Mworkout1->jawabansoal($id)[0]['id_bab'];
        $id_pel = $this->load->Mlinetopik->getmapelbab2($id_bab)[0]['id_mapel'];
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
            $hasil['jmlh_kosong'] = $kosong;
            $hasil['jmlh_benar'] = $benar;
            $hasil['jmlh_salah'] = $salah;
            $hasil['total_nilai'] = $benar;
            $hasil['durasi_pengerjaan'] = $this->input->post('durasi');
            $hasil['id_bab'] = $id_bab;
            $hasil['id_mapel'] = $id_pel;
            $score = floatval(($benar*4-$salah)/($jumlahsoal*4)*100);
            $hasil['score'] = $score;

        $this->Mlinetopik->inputreport($hasil);
        $this->session->unset_userdata('id_latihan');
         // cek ke lulusan
        $tampStep = $this->Mlinetopik->get_stepID2($id_latihan);
        $stepID = $tampStep['id'];
        $data['stepUUID']     = $tampStep['UUID'];
        if ($benar >= $minBenar ) {
          $data['hasil'] = "Selamat Anda Lulus";
             $this->logline($stepID);
         } else {
          $data['hasil'] = "Selamat Anda Gagal, Silahkan Coba Lagi";
            $this->logline($stepID);
         }
         
    }   

     // FUNGSI UNTUK VIEW REPORT PART 1
    public function reportpart1($pel)
    {   
        // jika hak akses == siswa
        if ($this->session->userdata('id_siswa')) { 
            $data['report'] = $this->Mlinetopik->get_jumlah_soal($pel);
            $data['datline']=array();
            foreach ($data['report'] as $key) {
                $benar = $key['jmlh_benar'];
                $salah = $key['jmlh_salah'];
                $kosong = $key['jmlh_kosong'];
                $jml_soal = $key['jum_soal'];
                $kosong = $key['kosong'];


                // hitung pg perbab
                $pg = round(($benar*4 - $salah) /($jml_soal*4) *100);

                $data['datline'][]=array(
                    'jmlh_benar'=>$benar,
                    'jmlh_salah'=>$salah,
                    'judul_bab'=>$key['judul_bab'],
                    'jml_soal'=>$jml_soal,
                    'pg' => $pg,
                    'jmlh_kosong' => $kosong,
                    'mapel' => $key['nama_mapel']
                    
                    );
                }

               // get total soal yang dikerjakan
                $data['tot']=$this->Mlinetopik->get_total($pel);
                $data_total = $this->Mlinetopik->get_total($pel);
                if ($data_total) {
                   
                    $data['pel']= $data_total['nama_mapel'];
                    $mp =$data_total['id_mapel'];
                    $n1=$data_total['tot_path'];
                    $jml_benar =$data_total['benar'];
                    $jml_salah=$data_total['salah'];
                    $jml_soal=$data_total['jum_soal'];
                    $data['kosong'] = $data_total['kosong'];
                }

                if ($jml_soal == 0) {
                    $data['total_pg'] = 0;
                } else {
                $total = floatval((($jml_benar*4-$jml_salah)/($jml_soal*4))*100);

                // PENGECEKAN JUMLAH BAB YANG DIAMBIL DI PART 2
                if ($total <= 25) {
                    $n6=$this->Mlinetopik->getpath(0,25,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else if($total >25 && $total <=30) {
                    $n6=$this->Mlinetopik->getpath(25,30,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;               
                } else  if($total>30 && $total <=35) {
                    $n6=$this->Mlinetopik->getpath(30,35,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else  if($total>35 && $total <=40) {
                    $n6=$this->Mlinetopik->getpath(35,40,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else  if($total>40 && $total <=45) {
                    $n6=$this->Mlinetopik->getpath(40,45,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else  if($total>45 && $total <=50) {
                    $n6=$this->Mlinetopik->getpath(45,50,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6; 
                } else  if($total>50 && $total <=55) {
                    $n6=$this->Mlinetopik->getpath(50,55,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6; 
                } else  if($total>55 && $total <=60) {
                    $n6=$this->Mlinetopik->getpath(55,60,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6; 
                } else  if($total>60 && $total <=65) {
                    $n6=$this->Mlinetopik->getpath(60,65,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else {
                    $n6=$this->Mlinetopik->getpath(65,100,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } 

                $data['nilai'] = $total;
                $data['benar'] = $jml_benar;
                $data['salah'] = $jml_salah; 
            }
        $sis = $this->session->userdata('id_siswa');
        $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
        // get data nilai tertinggi
        $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
        // get data log activity
        $dataa['log']  = $this->Loginmodel->getlogact();
        $dataa['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
        $dataa['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
        $this->load->view('template/siswa2/v-header', $dataa);
        $this->load->view('t-baru/v-report-part1', $data);
        $this->load->view('template/siswa2/v-footer');
        }  else {
            redirect('login');
        }
    }
    // END FUNGSI REPORT PART 1


    // AKHIR FUNGSI PART 1



    // AWAL FUNGSI PART 2

    // FUNGSI UNTUK  PENGECEKAN JUMLAH PART 1 YANG DIKERJAKAN
    public function part2($id_mapel)
    {   
        $id_siswa = $this->session->userdata('id_siswa');
        //hak akses jika siswa
        if ($id_siswa) {
            // hitung jumlah id dari linetopik dan step yang ada di part1
            $data1 = $this->Mlinetopik->get_count_p1($id_mapel); 
            // hitung jumlah step yang telah dikerjakan
            $data2 = $this->Mlinetopik->get_count_log1($id_mapel, $id_siswa);

            // pengecekan jumlah step 
            if ($data2 != $data1) {
                $this->session->set_flashdata('msg','<div class="notification notification-danger">
                                                        <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
                                                        <p>Part 1 Belum Selesai</p>
                                                      </div>
                                                ');
                redirect('linetopik');
            } else {
                redirect('linetopik/line_simulasi/'.$id_mapel);
            }
        } else {
            redirect('login');
        }
    }
    // END   

     // fungsi VIEW part 2
    public function line_simulasi($mapel)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            // if($this->part2($mapel)) {
            
                $data['simulasi'] = $this->load->Mlinetopik->get_sim_p2($mapel);
                $data['pel'] = $mapel;
                $UUID = uniqid();
                $data['datline']=array();
                $on=1;
                $i = 0;

                foreach ($data['simulasi'] as $key) {
                    $stepID= $this->Mlinetopik->get_stepID_p2($mapel)[$i]['id']; 
                    $urutan = $key['simulasi'];
                    $level = $key['level'];
                    $id = $this->session->userdata['id_siswa'];
                    $log=$this->Mlinetopik->get_log_p2($stepID, $id);
                    $step = $log;
                    // PENGECEKAN ENABLE DISABLED 
                    if ($step == true && $on ==1 ) {
                            $icon='ico-pencil';
                            $link = base_url('index.php/linetopik/create_session_id_p2/'.$UUID.'/'.'/'.$urutan.'/'.'/'.$level.'/'.$mapel);
                            $status ="enable";
                            $on=0;
                    } else {
                            $icon ='ico-pencil';
                            $link = 'javascript:void(0)';
                            $status ="disable";
                     }
                    $data['datline'][]=array(
                    'simulasi'=> $key['simulasi'],
                    'level'=> $key['level'],
                    'icon' =>$icon,
                    'link' => $link,
                    'status'=>$status);
                    $i++;
                }

                $sis = $this->session->userdata('id_siswa');
                $data['siswa']  = $this->Loginmodel->get_siswa($sis);
                // get data nilai tertinggi
                $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
                // get data log activity
                $data['log']  = $this->Loginmodel->getlogact();
                $data['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
                $data['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
                $this->load->view('template/siswa2/v-header', $data);
                $this->load->view('t-baru/v-simulasi', $data);
                $this->load->view('template/siswa2/v-footer'); 
            // } else {
            //     redirect('login');
            // }
        } else {
            redirect('login');
        }
        
    }
    // END

    // membuat session untuk quiz part2
    public function create_session_id_p2($id_latihan, $sim, $level, $pel){
        if ($this->session->userdata('id_siswa')) { 
            $UUID = $this->session->set_userdata('id_latihan',$id_latihan);
            redirect('/linetopik/quiz_part2/'.$id_latihan.'/'.$sim.'/'.$level.'/'.$pel, 'refresh');
        } else {
            redirect('login');
        }
    }
    // END

    // view step Quiz part 2
     public function quiz_part2($UUID, $sim, $level, $pel)
    {
        // HAK AKSES JIKA SISWA   
        if ($this->session->userdata('id_siswa')) { 
            if (!empty($this->session->userdata['id_latihan'])) {
                // get total soal yang dikerjakan
                $data['tot']=$this->Mlinetopik->get_total($pel);

                $data['pel']=$this->Mlinetopik->get_total($pel)['nama_mapel'];
                $mp = $this->Mlinetopik->get_total($pel)['id_mapel'];
                $n1=$this->Mlinetopik->get_total($pel)['tot_path'];
                $jml_benar=$this->Mlinetopik->get_total($pel)['benar'];
                $jml_salah=$this->Mlinetopik->get_total($pel)['salah'];
                $total_soal=$this->Mlinetopik->get_total($pel)['jum_soal'];

                // HITUNG TOTAL PART 1
                $total = round((($jml_benar*4-$jml_salah)/($total_soal*4))*100);

                // PENGECEKAN JUMLAH BAB YANG DIAMBIL DI PART 2
                if ($total <= 25) {
                    $n6=$this->Mlinetopik->getpath(0,25,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else if($total >25 && $total <=30) {
                    $n6=$this->Mlinetopik->getpath(25,30,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;               
                } else  if($total>30 && $total <=35) {
                    $n6=$this->Mlinetopik->getpath(30,35,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else  if($total>35 && $total <=40) {
                    $n6=$this->Mlinetopik->getpath(35,40,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else  if($total>40 && $total <=45) {
                    $n6=$this->Mlinetopik->getpath(40,45,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else  if($total>45 && $total <=50) {
                    $n6=$this->Mlinetopik->getpath(45,50,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6; 
                } else  if($total>50 && $total <=55) {
                    $n6=$this->Mlinetopik->getpath(50,55,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6; 
                } else  if($total>55 && $total <=60) {
                    $n6=$this->Mlinetopik->getpath(55,60,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6; 
                } else  if($total>60 && $total <=65) {
                    $n6=$this->Mlinetopik->getpath(60,65,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } else {
                    $n6=$this->Mlinetopik->getpath(65,100,$pel)[0]['jumlah'];
                    $data['total_pg'] = $n6;
                } 
                
                $data['nilai'] = $total;

                $data['report']=$this->Mlinetopik->getreport($data['total_pg'], $pel);
               
                $data['jum_soal'] =  $data['total_pg'];
                $jml_soal =$data['total_pg'];

                $kesulitan = $this->Mlinetopik->get_soal_pendalaman($mp,$sim);

                $uuid_quiz = uniqid();
                $data['id_sim'] = $this->Mlinetopik->get_soal_pendalaman($mp,$sim)[0]['id'];

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
                    "UUID" => $uuid_quiz
                    );
                    $this->Mlinetopik->insert_tb_mm_sol_quiz($data['mm_sol']);
                    
                };
                }

                $data['uuid_quiz'] = $this->Mlinetopik->get_quiz_by_uuid($UUID)[0]['id_quiz'];
                $data['uu_mm'] = $this->Mlinetopik->get_quiz_by_uuid($UUID)[0]['UUID'];
                // buat nampilin soal 
                $query = $this->Mlinetopik->get_soal_part2($uuid_quiz);
                $data['soal'] = $query['soal'];
                $data['pil'] = $query['pil'];
                

                // get soal randoom
                $data['soal_random'] = $this->Mlinetopik->get_bab_from_mm($this->session->userdata('id_siswa'));
                $lim =  $this->Mlinetopik->get_count($this->session->userdata('id_siswa'))[0]['jml'];

                for ($i=0; $i < $lim; $i++) { 
                    $data['b'] = $this->Mlinetopik->get_bab_from_mm($this->session->userdata('id_siswa'))[$i]['id_bab'];                 
                }

                $sis = $this->session->userdata('id_siswa');
                $data['log']  = $this->Loginmodel->getlogact();
                $this->load->view('workout1/t-header-soal');
                $this->load->view('t-baru/v-to-part2', $data);
                $this->load->view('workout1/t-footer-soal');
                       
            } else {
                $this->errortest();
            }
        } else {
                redirect('login');
        }
    }

    // FUNGSI UNTUK CEK JAWABAN PART 2
    public function cekjawaban_part2()
    {
        if ($this->input->post()) {
            $uuid_latihan = uniqid();
            $data = $this->input->post('pil');
            $id_sim = $this->input->post('id_sim');
            $id_quiz = $this->input->post('id_quiz');
            $uu_mm = $this->input->post('uuid_mm');
            $id_pel = $this->load->Mlinetopik->get_pel($id_sim);

            $result = $this->load->Mlinetopik->jawabansoal_part2($uu_mm);
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

                // untuk dimasukkan ke db
                $hasil['id_pengguna'] = $this->session->userdata['id_siswa'];
                $hasil['uuid_quiz'] = $uu_mm;
                $hasil['jmlh_kosong'] = $kosong;
                $hasil['jmlh_benar'] = $benar;
                $hasil['jmlh_salah'] = $salah;
                $hasil['total_nilai'] = $benar;
                $hasil['durasi_pengerjaan'] = $this->input->post('durasi');
                $hasil['id_simulasi'] = $id_sim;
                $hasil['id_mapel'] = $id_pel;
                // HITUNG SCORE
                if ($level == "1") {
                    $hasil['score'] = floatval($benar * ($jumlahsoal * 10) / ($this->input->post('durasi') / 60));
                } else if ($level == "2") {
                    $hasil['score'] = floatval($benar * ($jumlahsoal * 20) / ($this->input->post('durasi') / 60));
                } else {
                    $hasil['score'] = floatval($benar * ($jumlahsoal * 30) / ($this->input->post('durasi') / 60));
                }

            // input report part2
            $this->Mlinetopik->inputreport_part2($hasil);
            $sis = $this->session->userdata('id_siswa');
            // input ke log part 2
            $this->logline_p2($id_sim,$sis);
        }
        else {
            redirect('login');
        }

    }
    // END CEK JAWABAN PART 2

     // save log step PART 2
    public function logline_p2($step_id)
    {
        $id = $this->session->userdata['id_siswa'];

        $log=$this->Mlinetopik->get_log_p2($step_id, $id);
        // pengecekan log step line
        
        if ($log == true) {
            
            $datLog = array(
                'penggunaID'=>$this->session->userdata['id_siswa'],
                'stepID'=>$step_id);
            //jika log belum ada maka save log
            $this->Mlinetopik->save_log_p2($datLog);
        }else{
           
        }

        return $log;
        
    }
    // END LOG LINE PART 2

     // FUNGSI UNTUK VIEW REPORT PART 2
    public function report_part2($pel)
    {   
        // GET DATA REPORT PART 2
        $data['report'] = $this->Mlinetopik->get_report_p2($pel);
        $data['datline']=array();
            foreach ($data['report'] as $key) {
            $benar = $key['jmlh_benar'];
            $salah = $key['jmlh_salah'];
            $kosong = $key['jmlh_kosong'];

            // hitung jumlah soal
            $jml_soal = $benar+$salah+$kosong;

            $data['datline'][]=array(
                'jmlh_benar'=>$benar,
                'jmlh_salah'=>$salah,
                'jml_soal'=>$jml_soal,
                'jmlh_kosong' => $kosong,
                'simulasi' => $key['simulasi']
                
                );
            }

        $sis = $this->session->userdata('id_siswa');
        $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
        // get data nilai tertinggi
        $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
        // get data log activity
        $dataa['log']  = $this->Loginmodel->getlogact();
        $dataa['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
        $dataa['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
        $this->load->view('template/siswa2/v-header', $dataa);
        $this->load->view('t-baru/v-report-part2', $data);
        $this->load->view('template/siswa2/v-footer');
    }
    // END FUNGSI REPORT PART 2

    // AKHIR FUNGSI PART 2



    // AWAL FUNGSI PART 3

    // FUNGSI UNTUK  PENGECEKAN LOG YANG DIKERJAKAN PART 2
    public function part3($id_try)
    {   
        $id_siswa = $this->session->userdata('id_siswa');
        //hak akses jika siswa
        if ($id_siswa) {
            // ambil jurusan pelajaran siswanya dulu
            $jur = $this->Mlinetopik->get_jurusan($id_siswa);
            // hitung jumlah simulasi part2
            $data1 = $this->Mlinetopik->get_count_p2($jur); 
            // hitung jumlah step yang telah dikerjakan
            $data2 = $this->Mlinetopik->get_count_log2($id_siswa);

            // pengecekan jumlah step 
            if ($data2 != $data1) {
                $this->session->set_flashdata('msg','<div class="notification notification-danger">
                                                        <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
                                                        <p>Part 2 Belum Selesai</p>
                                                      </div>
                                                ');
                redirect('linetopik');
            } else {
                redirect('linetopik/daftar_paket/'.$id_try);
            }
        } else {
            redirect('login');
        }
    }
    // END  

    // FUNGSI VIEW DAFTAR PAKET PART 3
    public function daftar_paket($id_try)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
         
            $data['try'] = $this->load->Mlinetopik->get_paketsoal($id_try);
            $dat=$this->Mlinetopik->get_paketsoal($id_try);
            $data['datline']=array();
            $on =1;
          
            $i=0;
            foreach ($dat as $rows ) {
            $data['nm_paket']=$rows['nm_paket'];
            $data['deskripsi']=$rows['deskripsi'];
            $stepID = $this->Mlinetopik->get_paketID($id_try)[$i]['id_paket'];
            $id = $this->session->userdata['id_siswa'];
            $log=$this->Mlinetopik->get_logpaket($stepID, $id);
            $step = $log;
                // PENGECEKAN ENALED DAN DISABLED
                if ($step == true && $on =1) {
                $icon ='ico-pencil';
                $latihanID = $rows['id_paket'];
                    $link = base_url('index.php/linetopik/create_session_id_tryout/'.$latihanID);
                    $status ="enable";
                    $on =1;
                } 
                else {
                    $icon ='ico-pencil';
                    $link = 'javascript:void(0)';
                    $status ="disable";
                }
                $data['datline'][]=array(
                'id_paket'=>$rows['id_paket'],
                'nm_paket'=>$rows['nm_paket'],
                'deskripsi'=>$rows['deskripsi'],
                'jumlah_soal'=>$rows['jumlah_soal'],
                'durasi'=>$rows['durasi'],
                'icon' =>$icon,
                'link' => $link,
                'status'=>$status
                );
                $i++;
            }

            $sis = $this->session->userdata('id_siswa');
            $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get data nilai tertinggi
            $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $dataa['log']  = $this->Loginmodel->getlogact();
            $dataa['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
            $dataa['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
            $this->load->view('template/siswa2/v-header', $dataa);
            $this->load->view('t-baru/v_daftar_paket', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }
    // END

    // FUNGSI CREATE SESSION TRYOUT
    public function create_session_id_tryout($id_latihan){
        if ($this->session->userdata('id_siswa')) { 
            $this->session->set_userdata('id_latihan',$id_latihan);
            $UUID=$this->Mlinetopik->get_id_paket($id_latihan);
          
            redirect('/linetopik/step_quiz_paket/'.$UUID, 'refresh');
        } else {
            redirect('login');
        }
    }

     // view step Quiz
     public function step_quiz_paket($UUID)
    {
        // JIKA HAK AKSES == SISWA
        if ($this->session->userdata('id_siswa')) { 
            // PENGECEKAN ID LATIHAN
            if (!empty($this->session->userdata['id_latihan'])) {
                $id = $this->session->userdata['id_latihan'];
                $id_siswa =  $this->session->userdata['id_siswa'];

                $data['paket'] = $this->Mlinetopik->durasipaket($id);

                $query = $this->Mworkout1->get_soalll($id);
                $data['id'] =$this->Mworkout1->get_soalll($id);
                $data['soal'] = $query['soal'];
                $data['pil'] = $query['pil'];
                $this->load->view('workout1/t-header-soal');
                $this->load->view('t-baru/v-quiz-part3', $data);
                $this->load->view('workout1/t-footer-part3');
            } else {
                $this->errortest();
            }
        } else {
                redirect('login');
        }
    }

    // save log step part 3
    public function logpaket($paket_id)
    {
        $id = $this->session->userdata['id_siswa'];

        $log=$this->Mlinetopik->get_logpaket($paket_id, $id);
        // pengecekan log step line
        
        if ($log == true) {
            
            $datLog = array(
                'penggunaID'=>$this->session->userdata['id_siswa'],
                'paketID'=>$paket_id);
            //jika log belum ada maka save log
            $this->Mlinetopik->save_logpaket($datLog);
        }else{
           
        }

        return $log;
        
    }
  
    // FUNGSI CEK JAWABAN PART 3
    public function cekjawaban_part3() {
        
        if ($this->input->post()) {
            $data = $this->input->post('pil');

            $id = $this->session->userdata['id_latihan'];
            $id_latihan =  $this->session->userdata['id_latihan'];

            $result = $this->load->Mlinetopik->jawabansoal_part3($id);
            $id_bab = $this->load->Mlinetopik->jawabansoal_part3($id)[0]['id_bab'];
            $id_pel = $this->load->Mlinetopik->getmapelbab2($id_bab)[0]['id_mapel'];

            $benar = 0;
            $salah = 0;
            $kosong = 0;

            $koreksi = array();
            $idSalah = array();
            $jumlahsoal = sizeOf($result);
            for ($i = 0; $i < sizeOf($result); $i++) {
                $id = $result[$i]['soalid'];
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
            $data['jumlahBenar']  = $benar;
            $data['jumlahSalah']  = $salah;
            $data['jumlahKosong'] = $kosong;
            $data['totalNilai'] = $benar;

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

            $stepID = $tampStep['id_paket'];
            $data['stepUUID']     = $tampStep['id_paket'];

             $this->logpaket($stepID);
             $this->laporanquiz_part3($data);
        }else{
            redirect(base_url('index.php/linetopik/tryout'));
        }

    }

    //menampilkan laporan hasil quiz PART 3
    public function laporanquiz_part3($datArr)
    {
        $stepUUID=$datArr['stepUUID'];
        $data['data']=$datArr;
        $id = $this->session->userdata['id_siswa'];
        $data['tot']=$this->Mlinetopik->get_total_part3()[0]['tot_path'];
        // Start step line data
        $data['datline']=array();
        // 
        $step=false;
        
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $log=$this->Mlinetopik->get_logpaket($stepUUID, $id);
        $step = $log;
        $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
        // get data nilai tertinggi
        $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
        // get data log activity
        $dataa['log']  = $this->Loginmodel->getlogact();

        // END step line data
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('t-baru/v-hasilquiz-part3', $data);
        $this->load->view('template/siswa2/v-footer');

    }
    
    // FUNGSI VIEW TRYOUT PART 3
    public function tryout()
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $lim = $this->load->Mlinetopik->tampil_active()[0]['active'];
            $data['to'] = $this->load->Mlinetopik->get_view_to($lim);
           
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('t-baru/v-tryout', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }
    

    // FUNGSI VIEW REPORT TRYOUT PART 3
    public function report_tryout($id_try)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $sis = $this->session->userdata('id_siswa');

            $data['report'] = $this->load->Mlinetopik->get_reporttry($id_try);
            $data['datline']=array();
            foreach ($data['report'] as $key) {
            $nm_paket = $key['nm_paket'];
            $benar = $key['jmlh_benar'];
            $salah = $key['jmlh_salah'];
            $kosong = $key['jmlh_kosong'];
            $jml_soal = $key['jumlah_soal'];

            // hitung pg perbab
            $pg = round(($benar*4 - $salah) /($jml_soal*4) *100);

            $data['datline'][]=array(
                'nm_paket'=>$nm_paket,
                'jmlh_benar'=>$benar,
                'jmlh_salah'=>$salah,
                'nm_tryout'=>$key['nm_tryout'],
                'jumlah_soal'=>$jml_soal,
                'pg' => $pg,
                'jmlh_kosong' => $kosong                
                );
            }

            $jml_benar =$this->Mlinetopik->get_hasil_part3($id_try)[0]['benar'];
            $jml_salah=$this->Mlinetopik->get_hasil_part3($id_try)[0]['salah'];
            $jml_soal=$this->Mlinetopik->get_hasil_part3($id_try)[0]['jum_soal'];

            if ($jml_soal == 0) {
                $total = 0;
            } else {
                $total = floatval((($jml_benar*4-$jml_salah)/($jml_soal*4))*100);
            }

            $data['nilai'] = $total;

            
            $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get data nilai tertinggi
            $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $dataa['log']  = $this->Loginmodel->getlogact();
            $dataa['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
            $dataa['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
            $this->load->view('template/siswa2/v-header', $dataa);
            $this->load->view('t-baru/v-reporttryout', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }

    // FUNGSI VIEW REPORT PAKET PART 3
    public function report_paket($id_pkt)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $data['report'] = $this->load->Mlinetopik->get_report_paket($id_pkt);
            $data['datline']=array();
            foreach ($data['report'] as $key) {
            $nm_paket = $key['nm_paket'];
            $benar = $key['jmlh_benar'];
            $salah = $key['jmlh_salah'];
            $kosong = $key['jmlh_kosong'];

            $data['datline'][]=array(
                'nm_paket'=>$nm_paket,
                'jmlh_benar'=>$benar,
                'jmlh_salah'=>$salah,
                'jmlh_kosong' => $kosong,                
                );
            }

            $sis = $this->session->userdata('id_siswa');
            $dataa['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get data nilai tertinggi
            $dataa['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $dataa['log']  = $this->Loginmodel->getlogact();
            $dataa['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
            $dataa['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
            $this->load->view('template/siswa2/v-header', $dataa);
            $this->load->view('t-baru/v-report-paket', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }

     //save log tryout
    public function logtry($id,$lim)
    {        
        // pengecekan log step line
        $logto= $this->load->Mlinetopik->get_view_to($lim); 
        $i=0;

        for ($i=0; $i < $lim; $i++) { 
            $data = array(        
                        array(
                            'id_siswa'=>$id,
                            'id_try'=>$logto[$i]['id_tryout'],
                            'nm_try'=>$logto[$i]['nm_tryout']
                        )
                    );
            $this->Mlinetopik->save_logtry($data);
        }      
    }

    // fungsi jika test error
    public function errortest() {
        $this->load->view('workout1/t-header-soal');
        $this->load->view('v-error-test.php');
    }


     // FUNGSI PENGECEKAN UNTUK PART 4
    public function part4($id_video)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $sis = $this->session->userdata('id_siswa');
            // cek dulu jumlah paket yang harus dikerjakan
            $jml_paket = $this->load->Mlinetopik->get_jml_paket_by_siswa($sis);
            // cek jumlah paket yang sudah dikerjakan siswa
            $jml_log = $this->load->Mlinetopik->get_jml_log_by_siswa($sis);
            // pengecekan jumlah step 
            if ($jml_log != $jml_paket) {
                $this->session->set_flashdata('msg','<div class="notification notification-danger">
                                                        <a class="close-notification no-smoothState"><i class="ion-android-close"></i></a>
                                                        <p>Part 3 Belum Selesai</p>
                                                      </div>
                                                ');
                redirect('linetopik');
            } else {
                // update status path siswa menjadi bisa ubah jurusan pelajaran
                $this->Mlinetopik->update_status_siswa($sis, 0);
                redirect('linetopik/video_part4/'.$id_video);
            }
            
        } else {
            redirect('login');
        }
    }

     // FUNGSI VIEW VIDEO PART 4
    public function video_part4($id_video)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            $sis = $this->session->userdata('id_siswa');
            $data['video'] = $this->load->Mlinetopik->get_videobyid($id_video);
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('t-baru/v_video', $data);
            $this->load->view('template/siswa2/v-footer');

        } else {
            redirect('login');
        }
    }


    // FUNGSI delete latihan
    public function del_latihan($id)
    {
        //hak akses jika siswa
        if ($this->session->userdata('id_siswa')) {
            // $sis = $this->session->userdata('id_siswa');
            $this->Mlinetopik->del_logline($id);
            $this->Mlinetopik->del_loglinepart2($id);
            $this->Mlinetopik->del_loglinepart3($id);
            $this->Mlinetopik->del_logtryout($id);
            $this->Mlinetopik->del_reportpart2($id);
            $this->Mlinetopik->del_reportquiz($id);
            $this->Mlinetopik->del_reportquiz3($id);
            // update status path siswa menjadi bisa ubah jurusan pelajaran
                $this->Mlinetopik->update_status_siswa($id, 0);
            redirect('login');

        } else {
            redirect('login');
        }
    }
    



 }

 ?>