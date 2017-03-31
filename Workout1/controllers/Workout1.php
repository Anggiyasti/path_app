<?php 

/**
* 
*/
class Workout1 extends MX_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mworkout1');
        $this->load->model('siswa/msiswa');
        $this->load->model('login/Loginmodel');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $token = $this->msiswa->get_token();
        // cek hak akses, jika siswa
        if ($this->session->userdata('id_siswa')) {
            if ($token) {
            //memiliki token
            $date1 = new DateTime($token['tanggal_diaktifkan']);
            // cek dulu statusnya udah di aktifin atau belum
                if ($token['status']==1) {
                    # udah diaktifin
                 $date_diaktifkan = $date1->format('d-M-Y');
                 $date_kadaluarsa =  date("d-M-Y", strtotime($date_diaktifkan)+ (24*3600*$token['masaAktif']));

                 $date1 = new DateTime(date("d-M-Y"));
                 $date2 = new DateTime($date_kadaluarsa);
                 $sisa_aktif = $date2->diff($date1)->days;
                         if ($sisa_aktif != 0) {
                            //token aktif
                            $this->session->set_userdata(array('token'=>'Aktif','sisa'=>$sisa_aktif));
                            // get data nilai tertinggi
                            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
                            // get data mata pelajaran
                            $data['mapel'] = $this->Mworkout1->getdaftarmapel();
                            // get data log activity
                            $data['log']  = $this->Loginmodel->getlogact();
                            $sis = $this->session->userdata('id_siswa');
                            // get data siswa
                            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
                            $data['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
                            $data['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
                                $this->load->view('template/siswa2/v-header', $data);
                                $this->load->view('template_baru/v-wo-bab', $data);
                                $this->load->view('template/siswa2/v-footer');
                        }else{
                            //token habis
                            $this->session->set_userdata(array('token'=>'Habis'));
                            $this->settoken();
                        }
                }else{
                    // token belum diaktifkan
                    $this->session->set_userdata(array('token'=>'BelumAktif'));
                    $this->settoken();
                }
            }else{
                // belum terdaftar di token
                $this->session->set_userdata(array('token'=>'TidakAda'));
                $this->settoken();
            }
        // hak akses jika bukan siswa atau tidak memiliki hak akses
        } else {
            redirect('login');
        }
    }

    // untuk menampilkan halaman isi token bila kosong
    function settoken(){
        $sis = $this->session->userdata('id_siswa');
        // get data siswa
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('token/v-set-token');
        $this->load->view('template/siswa2/v-footer');
    }

        // fungsi untuk menampilkan form pilih kesulitan dan jumlah soal
    function next($bab) {
        // jika hak akses siswa
        if ($this->session->userdata('id_siswa')) {
            $data['bab'] = $bab;

            // pengecekan soalnya ada atau tidak            
            $data['soalid']  = $this->Mworkout1->cek_soal($bab);

            $sis = $this->session->userdata('id_siswa');

            // get data siswa
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get nilai tertinggi di sidebar
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log acivity
            $data['log']  = $this->Loginmodel->getlogact();
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('template_baru/v-wo-next', $data);
            $this->load->view('template/siswa2/v-footer');

        // jika bukan hak akses siswa diredirect ke login
        } else {
            redirect('login');
        }
    }

    // fungsi tambah workout
    public function start() {
    // jika hak akses siswa
    if ($this->session->userdata('id_siswa')) {
        //uuid untuk soal
        $uuid_latihan = uniqid();
        $idbab = $_POST['id_bab'];
        $jumlah_soal = $_POST['jumlahsoal'];
        $kesulitan = $_POST['kesulitan'];

        // array yang menampung data untuk diinsert ke table latihan
        $data['post'] = array(
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan,
            "nm_latihan" => $idbab,
            "create_by" => $this->session->userdata['username'],
            "uuid_latihan" => $uuid_latihan,
            "id_bab" => $idbab
        );

        // insert ke workout
        $this->Mworkout1->insert($data['post']);
        // get uuid latihan
        $id_latihan = $this->Mworkout1->get_latihan_by_uuid($uuid_latihan)[0]['id_latihan'];
        // set id_latihan
        $this->session->set_userdata('id_latihan', $id_latihan);

        // array untuk ge soal random
        $param = array(
            "id_bab" => $idbab,
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan
        );
        
        // get soal randoom
        $data['soal_random'] = $this->Mworkout1->get_random_for_latihan_bab($param);

        // array untuk insert ke tb_grafik_report
        $grafik = array(
            "id_bab" => $idbab,
            "id_latihan" => $id_latihan  
        );
        $this->Mworkout1->inputgrafik($grafik);

        $id_siswa = $this->session->userdata['id_siswa'];
        
        // array untuk insert ke tb_log
        $log = array(
            "id_siswa" => $id_siswa,
            "id_bab" => $idbab  
        );
        $this->Mworkout1->insertlog($log);
       
        //ngecacah terus dimasukin ke relasi
        foreach ($data['soal_random'] as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row['id_bank']
            );
            // insert ke tb_mm_sol_lat
            $this->Mworkout1->insert_tb_mm_sol_lat($data['mm_sol']);
            
        };
        // pengecekan jika id_latihan tidak koosong
        if (!empty($this->session->userdata['id_latihan'])) {
            redirect('workout1/mulaitest');
        // pengecekan jika id_latihan kosong 
        } else {
            redirect('workout1/errortest');
        }
    // jika hak akses bukan siswa diarahkan ke login
    } else {
        redirect('login');
    }

    }

    // fungsi tampil halaman workout dimulai
    public function mulaitest() {
        // pengecekan jika memiliki id latihan
        if (!empty($this->session->userdata['id_latihan'])) {
            $id = $this->session->userdata['id_latihan'];
            
            // get data soal berdasarkan id latihan
            $query = $this->Mworkout1->get_soal($id);
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];
            $this->load->view('t-header-soal');
            $this->load->view('v-daftar-test', $data);
            $this->load->view('t-footer-soal');
        } 
        // jika tidak memiliki id latihan diarahkan ke halaman error
        else {
            redirect('workout1/errortest');
        }
    }


    // fungsi jika workout error
    public function errortest() {
        $this->load->view('t-header-soal');
        $this->load->view('v-error-test.php');
    }

    // fungsi untuk mengecek jawaban workout
    public function cekjawaban() {
        $data = $this->input->post('pil');
        $id = $this->session->userdata['id_latihan'];
        $id_latihan = $this->session->userdata['id_latihan'];
        $id_siswa = $this->session->userdata['id_siswa'];
        // get level workout yang dikerjakan
        $level = $this->Mworkout1->levelLatihan($id_latihan)[0]->level;
        // get data jawaban dari workout yang dikerjakan
        $result = $this->Mworkout1->jawabansoal($id);
        $benar = 0;
        $salah = 0;
        $kosong = 0;
        $koreksi = array();
        $idSalah = array();
        $jumlahsoal = sizeOf($result);
        // pengecekan jawaban workout
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

        $hasil['id_latihan'] = $id_latihan;
        $hasil['id_pengguna'] = $this->session->userdata['email'];;
        $hasil['jmlh_kosong'] = $kosong;
        $hasil['jmlh_benar'] = $benar;
        $hasil['jmlh_salah'] = $salah;
        $hasil['total_nilai'] = $benar;

        // penghitungan score berdasarkan level yang dikerjakan
        if ($level == "1") {
            $hasil['score'] = floatval($benar * ($jumlahsoal * 10) / ($this->input->post('durasi') / 60));
        } else if ($level == "2") {
            $hasil['score'] = floatval($benar * ($jumlahsoal * 20) / ($this->input->post('durasi') / 60));
        } else {
            $hasil['score'] = floatval($benar * ($jumlahsoal * 30) / ($this->input->post('durasi') / 60));
        }

        $hasil['durasi_pengerjaan'] = $this->input->post('durasi');
        $mudah = 4;
        $sedang = 5;
        $sulit = 6;

        // penghitungan score untuk disimpan di tb_grafik_report
        if ($level == "4") {
            $hasil1 = floatval($benar * ($mudah - $salah));
        } else if ($level == "5") {
            $hasil1 = floatval($benar * ($sedang - $salah));
        } else {
            $hasil1 = floatval($benar * ($sulit - $salah));
        }

        // variable untuk menghitung total grafik report
        $hasil2 = floatval($jumlahsoal * 6);

        $date = new DateTime(date("Y-m-d H:i:s"));

        // insert ke table report workout
        $result = $this->Mworkout1->inputreport($hasil);
        // insert ke table grafik report
        $result1 = $this->Mworkout1->update_grafik($id_latihan,$hasil1,$hasil2);
        // update table log selesai jika siswa telah selesai workout
        $this->Mworkout1->logselesai($id_siswa);

        // update status pengerjaan workout menjadi selesai dikerjakan
        $this->Mworkout1->updatelatihan($id_latihan);
        $this->session->unset_userdata('id_latihan');
    }

    // fungsi untuk membuat session workout
    public function create_session_id_latihan($id_latihan){

        $this->session->set_userdata('id_latihan',$id_latihan);

        redirect('/workout1/mulaitest', 'refresh');

    }


    // fungsi untuk tampil form pilih report workout
    public function pilihreport()
    {   
        // jika hak akses siswa
        if ($this->session->userdata('id_siswa')) {
            // get data mata pelajaran
            $data['mapel'] = $this->Mworkout1->getdaftarmapel();
            // get data nilai_tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();
            $sis = $this->session->userdata('id_siswa');
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('template_baru/v-wo-report', $data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }    
    }

    // funngsi untuk tampil hasil report workout
    public function reportmapel($mapel) {
        // jika hak akses siswa
        if ($this->session->userdata('id_siswa')) {
            // get data report workout 
            $data['report'] = $this->Mworkout1->get_report($this->session->userdata['username'], $mapel);
            // get latihan
            $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);
            // get nama mata pelajaran berdasarkan id_mapel
            $data['mapel'] = $this->Mworkout1->get_nama_mapel_bab($mapel);
            // get nama bab berdasarkan id_mapel
            $data['bab'] = $this->Mworkout1->get_nama_bab($mapel);
            $sis = $this->session->userdata('id_siswa');
            // get data siswa
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get data nilai_tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();

            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('template_baru/v-wo-report2', $data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }
    }
    
    // fungsi menampilkan detail report + chart
    public function detailreport($id)
    {   
        // jika hak akses siswa
        if ($this->session->userdata('id_siswa')) {
            // get detail report
            $data['report'] = $this->Mworkout1->get_report_detail($this->session->userdata['username'], $id);
            // get data latihan
            $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);
            $sis = $this->session->userdata('id_siswa');
            // get data siswa
            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
            // get data nilai_tertinggi
            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
            // get data log activity
            $data['log']  = $this->Loginmodel->getlogact();
            $this->load->view('template/siswa2/v-header', $data);
            $this->load->view('template_baru/v-report-detail', $data);
            $this->load->view('template/siswa2/v-footer');
        } else {
            redirect('login');
        }
    }
    
    // membuat session id pembahasan
    public function create_session_id_pembahasan($id_pembahasan){

        $this->session->set_userdata('id_pembahasan',$id_pembahasan);

        redirect('workout1/pembahasanlatihan', 'refresh');

    }

    // fungsi untuk menampilkan pembahasan workout
    public function pembahasanlatihan() {
    // pengecekan id pembahasanlatihan jika tidak kosong
        if (!empty($this->session->userdata['id_pembahasan'])) {
            $id = $this->session->userdata['id_pembahasan'];
            // get soal pembahasan
            $query = $this->Mworkout1->get_soal_pembahasan($id);
            $this->load->view('t-header-soal'); 
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];

            $this->load->view('v-pembahasan', $data);
            $this->load->view('v-footer-pembahasan');
        } else {
            redirect('workout1/errortest');
        }
}


}

 ?>