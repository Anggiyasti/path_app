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
        if ($this->session->userdata('id_siswa')) {
            if ($token) {
        //memiliki token
        $date1 = new DateTime($token['tanggal_diaktifkan']);
        // cek dulu statusna udah di aktivin atau belum
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
                            $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
                            $data['mapel'] = $this->Mworkout1->getdaftarmapel();
                            $sis = $this->session->userdata('id_siswa');
                            $data['siswa']  = $this->Loginmodel->get_siswa($sis);
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


        } else {
            redirect('login');
        }
    }

    // untuk menampilkan halaman isi token bila kosong
    function settoken(){
        // $this->load->view('token/v-header');
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('token/v-set-token');
        $this->load->view('template/siswa2/v-footer');
    }

    public function chart()
    {
        $data['c'] = $this->Mworkout1->chart_model();
        $this->load->view('v-chart',$data);
    }

    // fungsi pilihan bab
    public function pilih_bab($no) {
    $noo = urldecode($no);
    
            $data['bab'] = $this->Mworkout1->get_mapel_bab($noo);
            $this->load->view('template/siswa2/v-header');
            $this->load->view('template_baru/v-wo-bab', $data);
            $this->load->view('template/siswa2/v-footer');
    }

    // fungsi mulai workout
    public function mulaitest() {
        if (!empty($this->session->userdata['id_latihan'])) {
            $id = $this->session->userdata['id_latihan'];
            
            
            $this->load->view('t-header-soal');
            $query = $this->Mworkout1->get_soal($id);
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];
            $this->load->view('v-daftar-test', $data);
            $this->load->view('t-footer-soal');
        } else {
            redirect('workout1/errortest');
        }
    }

    // fungsi untuk menampilkan form kesulitan dan jumlah soal
    function next($bab) {
        $data['bab'] = $bab;
        // var_dump($data);
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('template_baru/v-wo-next', $data);
        $this->load->view('template/siswa2/v-footer');
    }

    // fungsi untuk menampilkan form kesulitan dan jumlah soal
    function nextlagi() {
        $data = $this->input->post('id_bab');
        $k = $this->input->post('kesulitan');
        $j = $this->input->post('jumlahsoal');
        var_dump($data, $k, $j);
    }

    // fungsi jika error test
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
    $level = $this->Mworkout1->levelLatihan($id_latihan)[0]->level;
    $result = $this->Mworkout1->jawabansoal($id);
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
    $hasil['id_latihan'] = $id_latihan;
    // $hasil['id_pengguna'] = $this->session->userdata['id'];
    $hasil['id_pengguna'] = $this->session->userdata['email'];;
    $hasil['jmlh_kosong'] = $kosong;
    $hasil['jmlh_benar'] = $benar;
    $hasil['jmlh_salah'] = $salah;
    $hasil['total_nilai'] = $benar;

    if ($level == "mudah") {
        $hasil['score'] = floatval($benar * ($jumlahsoal * 10) / ($this->input->post('durasi') / 60));
    } else if ($level == "sedang") {
        $hasil['score'] = floatval($benar * ($jumlahsoal * 20) / ($this->input->post('durasi') / 60));
    } else {
        $hasil['score'] = floatval($benar * ($jumlahsoal * 30) / ($this->input->post('durasi') / 60));
    }

    $hasil['durasi_pengerjaan'] = $this->input->post('durasi');
    $mudah = 4;
    $sedang = 5;
    $sulit = 6;


    if ($level == "4") {
        $hasil1 = floatval($benar * ($mudah - $salah));
    } else if ($level == "5") {
        $hasil1 = floatval($benar * ($sedang - $salah));
    } else {
        $hasil1 = floatval($benar * ($sulit - $salah));
    }

    $hasil2 = floatval($jumlahsoal * 6);
//
    $date = new DateTime(date("Y-m-d H:i:s"));

    $result = $this->Mworkout1->inputreport($hasil);
    $result1 = $this->Mworkout1->insertst($id_latihan,$hasil1,$hasil2);
    $this->Mworkout1->logselesai($id_siswa);




    $this->Mworkout1->updatelatihan($id_latihan);
    $this->session->unset_userdata('id_latihan');
    // redirect(base_url('login'));
         $id_bab = $this->Mworkout1->getmapelbab($id_latihan);
   
    redirect('workout1/detailreport/'.$id_latihan);
    }



    public function reportmapel($mapel) {
    
    $data['report'] = $this->Mworkout1->get_report($this->session->userdata['username'], $mapel);
    $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);
    $data['mapel'] = $this->Mworkout1->get_nama_mapel_bab($mapel);
    $data['bab'] = $this->Mworkout1->get_nama_bab($mapel);
    $sis = $this->session->userdata('id_siswa');
    $data['siswa']  = $this->Loginmodel->get_siswa($sis);
    $data['nilai'] = $this->Mworkout1->nilai_tertinggi();


        // $this->load->view('template/header');
        // $this->load->view('v-header');
        // $this->load->view('Videoback/layout/header');
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('template_baru/v-wo-report2', $data);
        $this->load->view('template/siswa2/v-footer');
    }

    // fungsi tambah workout
    public function start() {
        //uuid untuk soal
        $uuid_latihan = uniqid();
        //var_dump($uuid_latihan);
        $idbab = $_POST['id_bab'];
        $jumlah_soal = $_POST['jumlahsoal'];
        $kesulitan = $_POST['kesulitan'];

        // coba
        // $data['id_bab'] = $this->input->post('id_bab');
        // var_dump($id_bab);
        $data = array(
            'judul_halaman' => 'Latihan - Neon',
            'judul_header' => 'Latihan'
        );

        // //get nama mata pelajaran untuk nama paket
        // $nama_matapelajaran = $this->->get_pelajaran_for_paket($idsub)[0]->aliasMataPelajaran;
        // //get nama sub bab untuk digabungkan jadi Nama Matapelajaran - Nama Subab
        // $nama_subab = $this->Mmatapelajaran->sc_sub_by_subid($idsub)[0]['judulSubBab'];

        $data['post'] = array(
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan,
            "nm_latihan" => $idbab,
            "create_by" => $this->session->userdata['username'],
            "uuid_latihan" => $uuid_latihan,
            "id_bab" => $idbab
        );

        // insert ke soal
        $this->Mworkout1->insert($data['post']);
        $id_latihan = $this->Mworkout1->get_latihan_by_uuid($uuid_latihan)[0]['id_latihan'];
        $this->session->set_userdata('id_latihan', $id_latihan);

        $param = array(
            "id_bab" => $idbab,
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan
        );
        // var_dump($param);
        // get soal randoom
        $data['soal_random'] = $this->Mworkout1->get_random_for_latihan_bab($param);

         $bab = array(
            "id_bab" => $idbab,
            "id_latihan" => $id_latihan  
        );
         $this->Mworkout1->inputgrafik($bab);


        $id_siswa = $this->session->userdata['id_siswa'];
          $log = array(
            "id_siswa" => $id_siswa,
            "id_bab" => $idbab  
        );
         $this->Mworkout1->insertlog($log);
       
        // var_dump($data);
        // $data['mm_sol']=array();
        //ngecacah teru dimasukin ke relasi
        foreach ($data['soal_random'] as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row['id_bank']
            );
            $this->Mworkout1->insert_tb_mm_sol_lat($data['mm_sol']);
            
        };
        if (!empty($this->session->userdata['id_latihan'])) {
            redirect('workout1/mulaitest');
            // $this->mulaitest();
        } else {
            redirect('workout1/errortest');
        }

    }

    public function create_session_id_latihan($id_latihan){

        $this->session->set_userdata('id_latihan',$id_latihan);

        redirect('/workout1/mulaitest', 'refresh');

    }

    public function wo()
    {   
        
        $id = $this->session->userdata['id_latihan'];
        $this->load->view('t-header-soal');
        $query = $this->Mworkout1->get_soal($id);
        $data['soal'] = $query['soal'];
        $data['pil'] = $query['pil'];
        $this->load->view('v-daftar-test', $data);
        $this->load->view('t-footer-soal');
    }

    public function drop()
    {
        $this->load->view('v-drop');
    }

    public function pilihreport()
    {
        $data['mapel'] = $this->Mworkout1->getdaftarmapel();
        $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('template_baru/v-wo-report', $data);
        $this->load->view('template/siswa2/v-footer');
    }

    // detail report + chart
    public function detailreport($id)
    {
        $data['report'] = $this->Mworkout1->get_report_detail($this->session->userdata['username'], $id);
        $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $this->load->view('template/siswa2/v-header', $data);
        $this->load->view('template_baru/v-report-detail', $data);
        $this->load->view('template/siswa2/v-footer');
    }

    // fungsi pilihan bab
    public function pilih_bab_report($no) {
    $noo = urldecode($no);
            $data['bab'] = $this->Mworkout1->get_mapel_bab($noo);
            $data['mapel'] = $noo;
            $this->load->view('template/siswa/v-head');
            $this->load->view('v-bab-report', $data);
            $this->load->view('template/siswa/v-footer');
    }
    
    // membuat session id pembahasan
    public function create_session_id_pembahasan($id_pembahasan){

        $this->session->set_userdata('id_pembahasan',$id_pembahasan);

        redirect('workout1/pembahasanlatihan', 'refresh');

    }

    public function pembahasanlatihan() {
    if (!empty($this->session->userdata['id_pembahasan'])) {
        $id = $this->session->userdata['id_pembahasan'];
        $this->load->view('t-header-soal');

        $query = $this->Mworkout1->get_soal_pembahasan($id);
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