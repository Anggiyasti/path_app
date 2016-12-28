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
    }

    public function index()
    {
        $data['mapel'] = $this->Mworkout1->getdaftarmapel();
        $this->load->view('template/header');
        $this->load->view('v-header');
        $this->load->view('v-show-mapel', $data);
    }
    public function chart()
    {
        $data['c'] = $this->Mworkout1->chart_model();
        $this->load->view('v-chart',$data);
    }

    // fungsi pilihan bab
    public function pilih_bab($no) {
            $data['bab'] = $this->Mworkout1->get_mapel_bab($no);
            $this->load->view('template/header');
            $this->load->view('v-header');
            $this->load->view('v-pilih-bab', $data);
    }

    // fungsi mulai workout
    public function mulaitest() {
        if (!empty($this->session->userdata['id_latihan'])) {
            $id = $this->session->userdata['id_latihan'];
            $kesulitan = $this->input->post('kesulitan');
            $this->load->view('t-header-soal');
            // $this->load->view('template/header');
            // $this->load->view('v-header');
            $query = $this->Mworkout1->get_soal($id);
            $data['soal'] = $query['soal'];
            $data['pil'] = $query['pil'];
            $this->load->view('v-daftar-test', $data);
            $this->load->view('t-footer-soal');
        } else {
            $this->errorTest();
        }
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
    $hasil['id_pengguna'] =1;
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
//
    $result = $this->Mworkout1->inputreport($hasil);
    $this->Mworkout1->updateLatihan($id_latihan);
    $this->session->unset_userdata('id_latihan');
    redirect(base_url('index.php/workout1'));
    }

    public function daftarlatihan() {
    $data['report'] = $this->Mworkout1->get_report2($this->session->userdata['username']);
    $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);

        // $this->load->view('template/header');
        // $this->load->view('template/sidebar');
        // $this->load->view('Videoback/layout/header');
        // $this->load->view('workout1/v-report', $data);
        // $this->load->view('Videoback/layout/footer');
        $this->load->view('v-detail-report', $data);
    }

    public function reportmapel($mapel) {
    $data['report'] = $this->Mworkout1->get_report($this->session->userdata['username'], $mapel);
    $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);
    $data['mapel'] = $this->Mworkout1->get_nama_mapel_bab($mapel);
    $data['bab'] = $this->Mworkout1->get_nama_bab($mapel);


        // $this->load->view('template/header');
        // $this->load->view('v-header');
        // $this->load->view('Videoback/layout/header');
        $this->load->view('v-report', $data);
    }

    // fungsi tambah workout
    public function tambah_latihan_ajax() {
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
       
        // var_dump($data);
        // $data['mm_sol']=array();
        //ngecacah teru dimasukin ke relasi
        foreach ($data['soal_random'] as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row['id_bank']
            );
            $this->Mworkout1->insert_tb_mm_sol_lat($data['mm_sol']);
            redirect('workout1/mulaitest');
        };

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
        $this->load->view('template/header');
        $this->load->view('v-header');
        $this->load->view('v-mapel-report', $data);
    }


    public function detailreport($id)
    {
        $data['report'] = $this->Mworkout1->get_report_detail($this->session->userdata['username'], $id);
        $data['latihan'] = $this->Mworkout1->get_latihan($this->session->userdata['username']);
        $this->load->view('template/header');
        $this->load->view('v-header');
        $this->load->view('v-detail-report', $data);
        // $this->load->view('t-footer-soal');
    }

    // fungsi pilihan bab
    public function pilih_bab_report($no) {
            $data['bab'] = $this->Mworkout1->get_mapel_bab($no);
            $data['mapel'] = $no;
            $this->load->view('template/header');
            $this->load->view('v-header');
            $this->load->view('v-bab-report', $data);
    }

    public function create_session_id_pembahasan($id_pembahasan){

        $this->session->set_userdata('id_pembahasan',$id_pembahasan);

        redirect('workout1/pembahasanlatihan', 'refresh');

    }

    public function pembahasanlatihan() {
    if (!empty($this->session->userdata['id_pembahasan'])) {
        $id = $this->session->userdata['id_pembahasan'];
        $this->load->view('t-header-soal');

        $query = $this->Mworkout1->get_soal($id);
        $data['soal'] = $query['soal'];
        $data['pil'] = $query['pil'];

        $this->load->view('v-pembahasan', $data);
        $this->load->view('v-footer-pembahasan');
    } else {
        $this->errorTest();
    }
}

 public function pembahasanlatihan2() {
    if (!empty($this->session->userdata['id_pembahasan'])) {
        $id = $this->session->userdata['id_pembahasan'];
        $this->load->view('t-header-soal');

        $query = $this->Mworkout1->get_soal($id);
        $data['soal'] = $query['soal'];
        $data['pil'] = $query['pil'];

        $this->load->view('v-pembahasan', $data);
        $this->load->view('v-footer-pembahasan');
    } else {
        $this->errorTest();
    }
}

}

 ?>