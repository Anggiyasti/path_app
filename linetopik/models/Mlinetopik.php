<?php 
/**
 * 
 */
 class Mlinetopik extends CI_Model
 {

    // GET LINE TOPIK PART 1
 	 public function get_line_topik($babID, $urutan)
    {
        $this->db->select('namaTopik,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi, step.latihanID,step.id as stepID, step.urutan');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_mata_pelajaran m','m.id_mapel = topik.id_mapel');
        $this->db->where('topik.id_mapel',$babID);
        $this->db->where('topik.part', $urutan);
        $this->db->where('topik.status', 1);
        $this->db->order_by('topik.namaTopik');
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array();

    }

    // get season berdasarkan mapel dan part
    public function get_topik($mapel, $part)
    {
        $this->db->select('t.id,t.UUID,t.namaTopik,bab.id_bab, m.id_mapel, m.nama_mapel, t.part');
        $this->db->from('tb_line_topik t');
        $this->db->join('tb_bab bab','bab.id_bab=t.babID');
        $this->db->join('tb_mata_pelajaran m','m.id_mapel = bab.id_mapel');
        $this->db->where('m.id_mapel',$mapel);
        $this->db->where('t.status',1);
        $this->db->where('t.statusLearning',1);
        $this->db->where('t.part', $part);
        $this->db->order_by('namaTopik');
        $query=$this->db->get();
        return $query->result_array();
    }

     // get season untuk part2
    public function get_topik_p2($mapel)
    {
        $this->db->select('t.id,t.UUID,t.namaTopik,bab.id_bab, m.id_mapel, m.nama_mapel, t.part');
        $this->db->from('tb_line_topik t');
        $this->db->join('tb_bab bab','bab.id_bab=t.babID');
        $this->db->join('tb_mata_pelajaran m','m.id_mapel = bab.id_mapel');
        $this->db->where('m.id_mapel',$mapel);
        $this->db->where('t.status',1);
        $this->db->where('t.statusLearning',1);
        $this->db->order_by('namaTopik');
        $query=$this->db->get();
        return $query->result_array();
    }


 	//untuk mengecek log 
    public function get_log($stepID, $id_siswa)
    {
    	$this->db->select('id');
    	$this->db->from('tb_line_log');
    	$this->db->where('stepID',$stepID);
        $this->db->where('penggunaID',$id_siswa);
    	$query = $this->db->get();
    	if ($query->result_array()==array()) {
    		return true;
    	} else {
    		return false;
    	}
    	
    }


    //untuk mengecek log TRYOUT
    public function get_cek_logtry($id_siswa)
    {
        $this->db->select('id_siswa,id_try,nm_try');
        $this->db->from('tb_log_tryout');
        $this->db->where('id_siswa',$id_siswa);
        $query = $this->db->get();
        if ($query->result_array()==array()) {
            return false;
        } else {
            return true;
        }
        
    }

     //untuk mengecek log paket
    public function get_logpaket($paketID, $id_siswa)
    {
        $this->db->select('id');
        $this->db->from('tb_log_part3');
        $this->db->where('paketID',$paketID);
        $this->db->where('penggunaID',$id_siswa);
        $query = $this->db->get();
        if ($query->result_array()==array()) {
            return true;
        } else {
            return false;
        }
        
    }

    // get id step line by UUID
    public function get_stepID($UUID)
    {
        $this->db->select('id');
        $this->db->from('tb_line_step');
        $this->db->where('UUID',$UUID);
        $query = $this->db->get();
        return $query->result_array()[0]['id'];
    }


     // get id step line by UUID
    public function get_paketID($id_tr)
    {
        $this->db->select('p.id_paket,tr.id_tryout');
        $this->db->from('tb_paket p');
        $this->db->join('tb_mm_tryoutpaket tbtr ',' p.id_paket = tbtr.id_paket');
        $this->db->join('tb_tryout tr ',' tbtr.id_tryout = tr.id_tryout');
        $this->db->where('tr.id_tryout ',$id_tr);
        $this->db->order_by('p.id_paket',' ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    //savelog step line siswa
    public function save_log($datLog)
    {
        $this->db->insert('tb_line_log',$datLog);
    }

     //savelog paket
    public function save_logpaket($datLog)
    {
        $this->db->insert('tb_log_part3',$datLog);
    }


     //savelog paket
    public function save_logtry($datLog)
    {
        $this->db->insert_batch('tb_log_tryout',$datLog);
    }

    // GET DURASI PAKET
    public function durasipaket($id_paket) {
    $this->db->select('durasi');
    $this->db->from('tb_paket');
    $this->db->where('id_paket', $id_paket);
    $query = $this->db->get();
    return $query->result_array();
}

    // get step line berdasarkan UUID step dan info tingkat mp dan bab
    public function get_topic_step2($UUID)
    {
        $UUIDTopik=$this->get_uuidTopik($UUID);
         $this->db->select('namaTopik,topik.babID,topik.UUID as topikUUID,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi,step.urutan,step.id as stepID,step.latihanID,bab.judul_bab');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_bab bab','bab.id_bab=step.id_bab');
        $this->db->where('topik.UUID',$UUIDTopik);
        $this->db->order_by('topik.namaTopik');
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array();
    }

    // GET UUID TOPIK
    public function get_uuidTopik($UUID)
    {
        $this->db->select('topik.UUID');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->where('step.UUID',$UUID);
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array()[0]['UUID'];
    }

    //get UUID step by id latihan
    public function get_UUID($id_latihan)
    {
        $this->db->select('UUID');
        $this->db->from('tb_line_step');
        $this->db->where('latihanID',$id_latihan);
        $query=$this->db->get();
        return $query->result_array()[0]['UUID'];
    }

    //get UUID step by id PAKET
    public function get_id_paket($id_latihan)
    {
        $this->db->select('id_paket');
        $this->db->from('tb_paket');
        $this->db->where('id_paket',$id_latihan);
        $query=$this->db->get();
        return $query->result_array()[0]['id_paket'];
    }

    //get step id and UUID
    public function get_stepID2($id_latihan)
    {
        $this->db->select('id,UUID');
        $this->db->from('tb_line_step');
        $this->db->where('latihanID',$id_latihan);
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    //get step id and UUID
    public function get_paket($id_latihan)
    {
        $this->db->select('id_paket');
        $this->db->from('tb_paket');
        $this->db->where('id_paket',$id_latihan);
        $query = $this->db->get();
        return $query->result_array()[0];
    }

    //mengambil data step line quize 
    public function get_datQuiz($latihanID)
    {
        $this->db->select('jumlah_benar');
        $this->db->from('tb_line_step');
        $this->db->where('latihanID',$latihanID);
        $query=$this->db->get();
        return $query->result_array()['0'];
    }

    // GET JAWABAN SOAL PART 3
    public function jawabansoal_part3($id) {
        $this->db->select('soal.id_bank as soalid, soal.jawaban_benar as jawaban ,soal.id_bab');
        $this->db->from('tb_mm_paket_bank as pak');
        $this->db->join('tb_bank_soal as soal ',' pak.id_soal = soal.id_bank');
        $this->db->where('pak.id_paket', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // input ke tb_report_latihan
    public function inputreport($data) {
        $this->db->insert('tb_report_quiz', $data);
    }

    // input ke tb_report_latihan
    public function inputrepor_part3($data) {
        $this->db->insert('tb_report_quiz3', $data);
    }

    // get mapel
    public function getmapeltopik($jur){
        $this->db->distinct();
        $this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->where('m.status = 1');
        $this->db->where('m.jurusan', $jur);
        $this->db->or_where('m.jurusan', 'SEMUA');
        $this->db->group_by('m.nama_mapel');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // ambil semua tryoout
    public function get_view_to($lim){
        $this->db->select('t.id_tryout, t.nm_tryout,t.publish,t.active');
        $this->db->from('tb_tryout t');
        $this->db->where('t.publish',1);
        $this->db->limit($lim);
        $this->db->order_by('rand()' );
        $query = $this->db->get();
        return $query->result_array();
    }

    // ambil LOG semua tryoout
    public function get_to_log($id){
        $this->db->select('t.id_try,t.nm_try');
        $this->db->from('tb_log_tryout t');
        $this->db->where('t.id_siswa',$id);
        // $this->db->limit($lim);
        // $this->db->order_by('rand()' );
        $query = $this->db->get();
        return $query->result_array();
    }

   // ambil semua LOG tryoout
    public function get_to($lim){
        $this->db->select('t.id_try, t.nm_try');
        $this->db->from('tb_log_tryout t');
       
        $query = $this->db->get();
        if ($query->result_array()==array()) {
            return true;
        } else {
            return false;
        }
    }

    //limit untuk tampil tryout
    public function tampil_active(){
        $this->db->select('active');
        $this->db->from('tb_tampil_to');
        $query = $this->db->get();
        return $query->result_array();

    }

    // GET SOAL TO
    public function get_soal_to($lim){
        $this->db->select('t.id_tryout, t.nm_tryout,t.publish,t.active');
        $this->db->from('tb_tryout t');
        $this->db->where('t.publish',1);
        $this->db->limit($lim);
        $this->db->order_by('rand()' );
        $query = $this->db->get();
        return $query->result_array();
    }


    // get mapel
    public function getparttopik($mapel){
        $this->db->distinct();
        $this->db->select('m.id_mapel, m.nama_mapel, t.part, b.id_bab, b.judul_bab, t.urutan');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_bab b','m.id_mapel=b.id_mapel');
        $this->db->join('tb_line_topik t', 'b.id_bab = t.babID');
        $this->db->where('m.status = 1');
        $this->db->where('m.id_mapel', $mapel);
        $this->db->group_by('t.part');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // update latihan
    public function updatereport($isi, $id_lat) {
        $this->db->where('id_latihan', $id_lat);
        return $this->db->update('tb_report_quiz', $isi);
    }

    // get jumlah total soal yang dikerjakan
    public function get_total($pel)
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('*, m.nama_mapel, m.id_mapel, sum(r.score) as tot_path, sum(r.jmlh_benar) as benar,
        sum(r.jmlh_salah) as salah, sum(r.jmlh_kosong) as kosong,  
            sum(r.jmlh_benar)+sum(r.jmlh_salah)+sum(r.jmlh_kosong) as jum_soal');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_report_quiz r', 'm.id_mapel=r.id_mapel');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
        $this->db->where('r.id_mapel', $pel);
        $tampil=$this->db->get();
        // cek jika hasil query null
        if($tampil->num_rows() == 1) {
            return $tampil->result_array()[0];
        }else{
             return $result='';
        }
    }


    // GET REPORT PART 3
    public function get_hasil_part3($id_try)
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('p.id_paket,nm_paket, sum(r.score) as tot_path, sum(r.jmlh_benar) as benar,sum(r.jmlh_salah) as salah, sum(r.jmlh_kosong) as kosong, sum(r.jmlh_benar)+sum(r.jmlh_salah)+sum(r.jmlh_kosong) as jum_soal,try.nm_tryout');
        $this->db->from('tb_report_quiz3 r');
        $this->db->join('tb_paket p ','p.id_paket = r.id_paket');
        $this->db->join('tb_mm_tryoutpaket tr ','  tr.id_paket = p.id_paket');
        $this->db->join('tb_tryout try ',' try.id_tryout = tr.id_tryout');
        $this->db->where('r.id_pengguna', $id);
        $this->db->where('try.id_tryout', $id_try);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // get jumlah total soal yang dikerjakan
    public function get_total_part3()
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('*, m.nama_mapel, m.id_mapel, sum(r.score) as tot_path, sum(r.jmlh_benar) as benar, 
            sum(r.jmlh_benar)+sum(r.jmlh_salah)+sum(r.jmlh_kosong) as jum_soal ');
        $this->db->from('tb_mata_pelajaran m ');
        $this->db->join('tb_report_quiz3 r ',' m.id_mapel=r.id_mapel ');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

     // get mapel
    public function getmapelbab2($bab){
        $this->db->distinct();
        $this->db->select('m.id_mapel, m.nama_mapel, b.judul_bab');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_bab b', 'm.id_mapel=b.id_mapel');
        $this->db->where('m.status = 1');
        $this->db->where('b.id_bab', $bab);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

     // get settingpath 
    function getpath($awal, $akhir, $id){
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_setting_path');
        $this->db->where('nilai_awal >=', $awal);
        $this->db->where('nilai_akhir <=', $akhir);
        $this->db->where('id_mapel', $id);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

     // get settingpath 
    function get_soal_pendalaman($id,$sim){
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_part2');
        $this->db->where('id_mapel', $id);
        $this->db->where('simulasi', $sim);
        $this->db->group_by('id_mapel');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // get soal
     public function getsoal($id_mapel, $kesulitan, $id_bab1, $id_bab2, $jml_soal) {
        $this->db->select('soal as soal, soal.id_bank as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar, soal.jawaban_benar as jaw, soal.status, soal.pembahasan, soal.id_bab');
        $this->db->from('tb_bank_soal as soal');
        $this->db->where('soal.id_mapel', $id_mapel);
        $this->db->where('soal.kesulitan', $kesulitan);
        $this->db->where('soal.id_bab', $id_bab1);
        $this->db->or_where('soal.id_bab', $id_bab2);

        $this->db->where('soal.publish','1');
        $this->db->limit($jml_soal);

        $query = $this->db->get();
        $soal = $query->result_array();

        return array(
            'soal' => $soal
        );
    }

    // GET REPORT PART 1
    function getreport($lim,$pel)
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('r.id_bab, max(r.score) as top');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_report_quiz r', 'm.id_mapel=r.id_mapel');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
         $this->db->where('m.id_mapel', $pel);
        $this->db->group_by('r.id_bab');
        $this->db->order_by('max(r.score)', 'DESC');
        $this->db->limit($lim);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }
    
    // GET PAKET PART 3
    function get_paket2()
    {
       
        $this->db->select('p.id_paket,nm_paket');
        $this->db->from('tb_paket p');
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // GET PAKET SOAL
    function get_paketsoal($id_try)
    {
       
        $this->db->select('p.id_paket,nm_paket ,deskripsi ,status ,jumlah_soal,durasi');
        $this->db->from('tb_paket p');
        $this->db->join('tb_mm_tryoutpaket mmtp ',' mmtp.id_paket = p.id_paket');
        $this->db->join('tb_tryout tr ',' tr.id_tryout = mmtp.id_tryout');
        $this->db->where('tr.id_tryout ', $id_try);
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // GET REPORT TRYOUT
     function get_reporttry($id_try)
    {
       
        $this->db->select('p.id_paket, nm_paket, deskripsi,jmlh_kosong,jmlh_benar,jmlh_salah,total_nilai,p.jumlah_soal,try.nm_tryout,score');
        $this->db->from('tb_report_quiz3 re');
        $this->db->join('tb_paket p ',' p.id_paket = re.id_paket');
        $this->db->join('tb_mm_tryoutpaket tr ',' tr.id_paket = p.id_paket');
        $this->db->join('tb_tryout try ',' try.id_tryout = tr.id_tryout');
        $this->db->where('tr.id_tryout ', $id_try);
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // GET REPORT PAKET
      function get_report_paket($id_pkt)
    {
       
        $this->db->select('p.id_paket, nm_paket, deskripsi,jmlh_kosong,jmlh_benar,jmlh_salah,total_nilai,score');
        $this->db->from('tb_report_quiz3 re');
        $this->db->join('tb_paket p ',' p.id_paket = re.id_paket');
        $this->db->where('p.id_paket ', $id_pkt);
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

     // get jumlah total soal yang dikerjakan
    public function get_jumlah_soal($pel)
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('*, m.nama_mapel, b.judul_bab, m.id_mapel, sum(r.score) as tot_path, sum(r.jmlh_benar) as benar, sum(r.jmlh_kosong) as kosong, 
            sum(r.jmlh_benar)+sum(r.jmlh_salah)+sum(r.jmlh_kosong) as jum_soal');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_report_quiz r', 'm.id_mapel=r.id_mapel');
        $this->db->join('tb_bab b', 'r.id_bab=b.id_bab');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
        $this->db->where('r.id_mapel', $pel);
        $this->db->group_by('r.id_bab');
        $this->db->order_by('r.jmlh_benar', 'desc');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // get settingpath 
    function get_set_part2($pel){
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_setting_path');
        $this->db->where('id_mapel', $pel);
        $tampil=$this->db->get();
        // cek jika hasil query null
        if($tampil->num_rows() == 1) {
            return $tampil->result_array()[0];
        }else{
             return $result='';
        }
    }

     // get simulasi part 2
    public function get_sim_p2($pel) {
        $this->db->where( 'id_mapel', $pel);
        $this->db->select( 'simulasi, id,level' );
        $this->db->from( 'tb_part2' );

        $query = $this->db->get();
        return $query->result_array();
    }

     // get id step line by UUID
    public function get_stepID_p2($UUID)
    {
        $this->db->select('id');
        $this->db->from('tb_part2');
        $this->db->where('id_mapel',$UUID);
        $query = $this->db->get();
        return $query->result_array();
    }

    //untuk mengecek log 
    public function get_log_p2($stepID, $id_siswa)
    {
        $this->db->select('id');
        $this->db->from('tb_line_log_part2');
        $this->db->where('stepID',$stepID);
        $this->db->where('penggunaID',$id_siswa);
        $query = $this->db->get();
        if ($query->result_array()==array()) {
            return true;
        } else {
            return false;
        }
        
    }

    // get soal
     public function getsoal2($id_bab1, $level) {
        $this->db->distinct();
        $this->db->where( 'id_bab', $id_bab1 );
        $this->db->order_by( 'rand()' );
        $this->db->select( '*' );
        $this->db->from( 'tb_bank_soal as soal' );
        $this->db->join('tb_pil_jawab p', 'soal.id_bank=p.id_soal');
        $this->db->group_by('id_bank');
        $this->db->where('soal.kesulitan', $level);
        $this->db->where('soal.publish',1);
        // $this->db->where('soal.status',1);

        $query = $this->db->get();
        $soal = $query->result_array();
         return array(
            'soal' => $soal
        );
    }

    // insert ke tb_mm
    public function insert_tb_mm_sol_quiz( $data ) {

        $this->db->insert( 'tb_mm_sol_quiz', $data );

    }

    // get id_quiz dan uuid
     public function get_quiz_by_uuid($uuid){

        $this->db->where( 'id_quiz', $uuid );      

        $this->db->select('UUID, id_quiz');

        $this->db->from( 'tb_mm_sol_quiz' );

        $query = $this->db->get();

        return $query->result_array();
    }

     // get soal untuk part2
     public function get_soal_part2($id_latihan) {
        $this->db->select('soal as soal, soal.id_bank as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar, soal.jawaban_benar as jaw, soal.status, soal.pembahasan, solquiz.id_bab');
        $this->db->from('tb_bank_soal as soal');
        $this->db->join('tb_mm_sol_quiz as solquiz', 'solquiz.id_soal = soal.id_bank');

        $this->db->where('solquiz.UUID', $id_latihan);
        $this->db->where('soal.publish', 1);
        $this->db->order_by( 'rand()' );
        $query = $this->db->get();
        $soal = $query->result_array();

        $this->db->select('soal as soal, pil.id_soal as pilid,soal.id_bank as soalid, pil.pilihan_jawaban as pilpil, pil.jawaban as piljaw, pil.gambar as pilgam');
        $this->db->from('tb_mm_sol_quiz as solquiz');
        $this->db->join('tb_bank_soal as soal', 'solquiz.id_soal = soal.id_bank');
        $this->db->join('tb_pil_jawab as pil', 'soal.id_bank = pil.id_soal');
        $this->db->where('solquiz.UUID', $id_latihan);
        $query = $this->db->get();
        $pil = $query->result_array();

        return array(
            'soal' => $soal,
            'pil' => $pil,
        );
    }

     //random buat bab
    public function get_bab_from_mm( $param ) {
        $this->db->where( 'id_siswa', $param);
        $this->db->select( 'id_bab' );
        $this->db->from( 'tb_mm_sol_quiz' );

        $query = $this->db->get();
        return $query->result_array();
    }

     //count bab
    public function get_count( $param ) {
        $query = "select count(m.id_bab) as jml from (select id_bab from tb_mm_sol_quiz group by id_bab ) as m";

        $result = $this->db->query($query);
        return $result->result_array();
    }

    // get report part2
    public function get_report_p2($pel)
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('*, m.nama_mapel, p.simulasi');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_report_part2 r', 'm.id_mapel=r.id_mapel');
        $this->db->join('tb_part2 p', 'r.id_simulasi=p.id');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
        $this->db->where('r.id_mapel', $pel);
        $this->db->order_by('r.jmlh_benar', 'desc');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // input ke tb_report_part2
    public function inputreport_part2($data) {
        $this->db->insert('tb_report_part2', $data);
    }

      //savelog step line siswa
    public function save_log_p2($datLog)
    {
        $this->db->insert('tb_line_log_part2',$datLog);
    }

    // get id mapel dari tb_part2
    public function get_pel($id) {
        $this->db->select('id_mapel');
        $this->db->from('tb_part2');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array()[0]['id_mapel'];
    }

    // get jawaban part 2
    public function jawabansoal_part2($id) {
        $this->db->select('soal.id_bank as soalid, soal.jawaban_benar as jawaban, soal.id_bab');
        $this->db->from('tb_mm_sol_quiz as solquiz');
        $this->db->join('tb_bank_soal as soal', 'solquiz.id_soal = soal.id_bank');
        $this->db->where('solquiz.UUID', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // get count line topik dan step part 1
    public function get_count_p1($pel)
    {
        $this->db->distinct();
        $this->db->select('count(t.id_mapel) as jumlah_part1');
        $this->db->from('tb_line_topik t');
        $this->db->join('tb_line_step s', 't.id=s.topikID');
        $this->db->where('t.id_mapel', $pel);
        $this->db->where('t.status', 1);
        $this->db->where('s.status', 1);

        $tampil=$this->db->get();
        return $tampil->result_array()[0]['jumlah_part1'];
    }

     // get count step dari tb_line_log part 1 berdasarkan pengguna
    public function get_count_log1($pel, $id_siswa)
    {
        $this->db->distinct();
        $this->db->select('COUNT( stepID ) AS jumlah_step');
        $this->db->from('tb_line_log l');
        $this->db->join('tb_line_step s', 'l.stepID=s.id');
        $this->db->join('tb_line_topik t', 's.topikID=t.id');
        $this->db->where('t.id_mapel', $pel);
        $this->db->where('l.penggunaID', $id_siswa);

        $tampil=$this->db->get();
        return $tampil->result_array()[0]['jumlah_step'];
    }

    // get count simulasi
    public function get_count_p2($jur)
    {
        $this->db->distinct();
        $this->db->select('count(p.id) as jumlah_simulasi');
        $this->db->from('tb_part2 p');
        $this->db->join('tb_mata_pelajaran m', 'p.id_mapel=m.id_mapel');
        $this->db->where('m.jurusan', $jur);
        $this->db->or_where('m.jurusan', 'SEMUA');
        
        $tampil=$this->db->get();
        return $tampil->result_array()[0]['jumlah_simulasi'];
    }

     // get count simulasi dari tb_line_log part 2 berdasarkan pengguna
    public function get_count_log2($id_siswa)
    {
        $this->db->select('COUNT( stepID ) AS jumlah_step');
        $this->db->from('tb_line_log_part2');
        $this->db->where('penggunaID', $id_siswa);

        $tampil=$this->db->get();
        return $tampil->result_array()[0]['jumlah_step'];
    }

    // get jurusan pelajaran siswa
    public function get_jurusan($siswa){
        $this->db->select('jurusan_pelajaran');
        $this->db->from('tb_siswa');
        $this->db->where('status = 1');
        $this->db->where('id_siswa', $siswa);
        $tampil=$this->db->get();
        return $tampil->result_array()[0]['jurusan_pelajaran'];
    }

    // update status path siswa 
    public function update_status_siswa($id_siswa, $stat) {
        $arr = array(
            'status_path'=> $stat
        );

        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('tb_siswa', $arr);
    }

    // get jurusan pelajaran siswa
    public function get_status_p($siswa){
        $this->db->select('status_path');
        $this->db->from('tb_siswa');
        $this->db->where('status = 1');
        $this->db->where('id_siswa', $siswa);
        $tampil=$this->db->get();
        return $tampil->result_array()[0]['status_path'];
    }

     // cek status pathnya aktif atau tidak
    public function status_path(){
        $this->db->select('status');
        $this->db->from('tb_status_path');
        $this->db->where('id', 1);

        $tampil=$this->db->get();
        return $tampil->result_array()[0]['status'];
    }

     // get jumlah paket yang harus dikerjakan
    public function get_jml_paket_by_siswa($id_siswa)
    {
        $this->db->select('count(m.id_paket) as jmlh_paket');
        $this->db->from('tb_mm_tryoutpaket m');
        $this->db->join('tb_log_tryout l', 'm.id_tryout=l.id_try');
        $this->db->where('l.id_siswa', $id_siswa);

        $tampil=$this->db->get();
        // cek jika hasil query null
        if($tampil->num_rows() == 1) {
            return $tampil->result_array()[0]['jmlh_paket'];;
        }else{
             return $result='';
        }
    }

     // get jumlah paket yang telah dikerjakan
    public function get_jml_log_by_siswa($id_siswa)
    {
        $this->db->select('count(m.id_paket) as jmlh_log');
        $this->db->from('tb_mm_tryoutpaket m');
        $this->db->join('tb_log_tryout l', 'm.id_tryout=l.id_try');
        $this->db->join('tb_log_part3 lp', 'm.id_paket = lp.paketID');
        $this->db->where('l.id_siswa', $id_siswa);

        $tampil=$this->db->get();
        // cek jika hasil query null
        if($tampil->num_rows() == 1) {
            return $tampil->result_array()[0]['jmlh_log'];;
        }else{
             return $result='';
        }
    }


 
  // ambil semua tryoout
    public function get_view_video(){
        $this->db->select('*');
        $this->db->from('tb_video_part4 v');
        $this->db->where('v.publish',1);
        $query = $this->db->get();
        return $query->result_array();
    }

    // ambil semua video
    public function get_videobyid($id){
        $this->db->select('*');
        $this->db->from('tb_video_part4 v');
        $this->db->where('id',$id);
        $this->db->where('v.publish',1);
        $query = $this->db->get();
        return $query->result_array();
    }


    //query hapus log line
    public function del_logline($id)
    {
        $this->db->where('penggunaID',$id);
        $this->db->delete('tb_line_log');
    }

     //query hapus log line part 2
    public function del_loglinepart2($id)
    {
        $this->db->where('penggunaID',$id);
        $this->db->delete('tb_line_log_part2');
    }
      //query hapus log line part 3
    public function del_loglinepart3($id)
    {
        $this->db->where('penggunaID',$id);
        $this->db->delete('tb_log_part3');
    }

      //query hapus log tryout
    public function del_logtryout($id)
    {
        $this->db->where('id_siswa',$id);
        $this->db->delete('tb_log_tryout');
    }
     //query hapus report part2
    public function del_reportpart2($id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->delete('tb_report_part2');
    }

    //query hapus report quiz
    public function del_reportquiz($id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->delete('tb_report_quiz');
    }

     //query hapus report quiz 3
    public function del_reportquiz3($id)
    {
        $this->db->where('id_pengguna',$id);
        $this->db->delete('tb_report_quiz3');
    }
 }
 ?>