<?php



/**

 *

 */

class Latihan extends MX_Controller {



    function __construct() {

        parent::__construct();

        $this->load->model('mlatihan');

        $this->load->library('parser');
        $this->load->model('Workout1/Mworkout1');


    }



    public function tambah_latihan_ajax() {
        //uuid untuk soal
        $uuid_latihan = uniqid();
        //var_dump($uuid_latihan);
        $idsub = $_POST['subab'];
        $jumlah_soal = $_POST['jumlahsoal'];
        $kesulitan = $_POST['kesulitan'];

        $data = array(
            'judul_halaman' => 'Latihan - Neon',
            'judul_header' => 'Latihan'

        );

        //get nama mata pelajaran untuk nama paket
        $nama_matapelajaran = $this->mvideos->get_pelajaran_for_paket($idsub)[0]->aliasMataPelajaran;
        //get nama sub bab untuk digabungkan jadi Nama Matapelajaran - Nama Subab
        $nama_subab = $this->Mmatapelajaran->sc_sub_by_subid($idsub)[0]['judulSubBab'];

        $data['post'] = array(
            "jumlahSoal" => $jumlah_soal,
            "tingkatKesulitan" => $kesulitan,
            "nm_latihan" => $nama_matapelajaran . "-" . $nama_subab,
            "create_by" => $this->session->userdata['USERNAME'],
            "uuid_latihan" => $uuid_latihan,
        );

        $param = array(
            "id_subab" => $idsub,
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan
        );

        // insert ke soal
        $this->mlatihan->insert($data['post']);
        $id_latihan = $this->mlatihan->get_latihan_by_uuid($uuid_latihan)[0]['id_latihan'];
        $this->session->set_userdata('id_latihan', $id_latihan);
        // get soal randoom
        $data['soal_random'] = $this->mlatihan->get_random_for_latihan($param);
        //ngecacah teru dimasukin ke relasi
        foreach ($data['soal_random'] as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row['id_soal']
            );
            $this->mlatihan->insert_tb_mm_sol_lat($data['mm_sol']);
        };

    }

    public function tambah_latihan_ajax_bab() {
        //uuid untuk soal
        $uuid_latihan = uniqid();
        $bab = $_POST['bab'];
        // $bab = 82;

        $jumlah_soal = $_POST['jumlahsoal'];
        $kesulitan = $_POST['kesulitan'];

        // $jumlah_soal = 1;
        // $kesulitan = 1;

        //get nama mata pelajaran untuk nama paket
        $nama_matapelajaran = $this->mlatihan->get_nama_bab($bab)[0]['judul_bab'];
        // var_dump($nama_matapelajaran);
        // $nama_matapelajaran = "Pelajaran";
        //get nama sub bab untuk digabungkan jadi Nama Matapelajaran - Nama Subab
        // $nama_subab = $this->Mmatapelajaran->sc_sub_by_subid($idsub)[0]['judulSubBab'];
        // $nama_bab = "Bab";

        $data['post'] = array(
            "jumlahSoal" => $jumlah_soal,
            "tingkatKesulitan" => $kesulitan,
            "nm_latihan" => "Latihan - ".$nama_matapelajaran,
            "create_by" => $this->session->userdata['USERNAME'],
            "uuid_latihan" => $uuid_latihan,
            // "id_subbab" => $idsub
        );

        $param = array(
            "id_bab" => $bab,
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan
        );

        // insert ke soal
        $this->mlatihan->insert($data['post']);
        $id_latihan = $this->mlatihan->get_latihan_by_uuid($uuid_latihan)[0]['id_latihan'];
        $this->session->set_userdata('id_latihan', $id_latihan);
        // get soal randoom
        $data['soal_random'] = $this->mlatihan->get_random_for_latihan_bab($param);
        // $data['mm_sol']=array();
        //ngecacah teru dimasukin ke relasi
        foreach ($data['soal_random'] as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row['id_soal']
            );
            $this->mlatihan->insert_tb_mm_sol_lat($data['mm_sol']);
        };

    }

        public function tambah_latihan_ajax_bab_step() {
        // uuid untuk soal
        $uuid_latihan = uniqid();
        //var_dump($uuid_latihan);
        $bab = $_POST['bab'];
        $idsoal = $_POST['id_soal'];
        // $bab = 4;
        // $idsoal = ['41','42'];
        $jumlah_soal = 1;
        $kesulitan = 1;

       

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
            "nm_latihan" => 1,
            "create_by" => 1,
            "uuid_latihan" => $uuid_latihan,
            "id_bab" => $bab
        );

        // insert ke soal
        $this->Mworkout1->insert($data['post']);
        $id_latihan = $this->Mworkout1->get_latihan_by_uuid($uuid_latihan)[0]['id_latihan'];
        $this->session->set_userdata('id_latihan', $id_latihan);

        $param = array(
            "id_bab" => $bab,
            "jumlah_soal" => $jumlah_soal,
            "kesulitan" => $kesulitan
        );
        // var_dump($param);
        // get soal randoom
        $data['soal_random'] = $this->mlatihan->get_random_for_latihan_bab($param);
       


        // var_dump($data);
        // $data['mm_sol']=array();
        //ngecacah teru dimasukin ke relasi
        foreach ($idsoal as $row) {
            $data['mm_sol'] = array(
                "id_latihan" => $id_latihan,
                "id_soal" => $row
            );
            $this->Mworkout1->insert_tb_mm_sol_lat($data['mm_sol']);
        }

    }


    public function formlatihan() {



        $data = array(

            'judul_halaman' => 'Netjoo - Welcome',

            'judul_header' => 'Welcome'

        );



        $data['files'] = array(

            APPPATH . 'modules/homepage/views/v-header-login.php',

            APPPATH . 'modules/templating/views/t-f-pagetitle.php',

            APPPATH . 'modules/homepage/views/v-footer.php',

        );





        $this->parser->parse('templating/index', $data);

    }



    public function create_session_id_latihan($id_latihan){

        $this->session->set_userdata('id_latihan',$id_latihan);

        redirect('/tesonline/mulaitest', 'refresh');

    }

    public function create_session_id_pembahasan($id_pembahasan){

        $this->session->set_userdata('id_pembahasan',$id_pembahasan);

        redirect('/tesonline/pembahasanlatihan', 'refresh');

    }



}



?>

