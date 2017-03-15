<?php 
/**
 * 
 */
 class Mlinetopik extends CI_Model
 {

 	 public function get_line_topik($babID, $urutan)
    {
        $this->db->select('namaTopik,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi, step.latihanID,step.id as stepID, step.urutan');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_mata_pelajaran m','m.id_mapel = topik.id_mapel');
        $this->db->where('topik.id_mapel',$babID);
        $this->db->where('topik.part', $urutan);
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
        $query = $this->db->get();
        return $query->result_array()[0]['id_tryout'];
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

    public function get_datMateri($UUID)
    {
        $this->db->select('namaStep,namaTopik,judulMateri,isiMateri,materi.date_created,topik.UUID');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_line_materi materi','materi.id=step.materiID');
        $this->db->where('step.UUID',$UUID);
        $query=$this->db->get();
        return $query->result_array()[0];
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

    //get UUID step by id latihan
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




    public function jawabansoal_part3($id) {
        $this->db->select('soal.id_bank as soalid, soal.jawaban_benar as jawaban ,soal.id_bab');
        $this->db->from('tb_mm_paket_bank as pak');
        $this->db->join('tb_bank_soal as soal ',' pak.id_soal = soal.id_bank');
        $this->db->where('pak.id_paket', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_caritopik($kunciCari)
    {
        $this->db->select('namaTopik,topik.babID,topik.UUID as topikUUID,step.UUID as stepUUID, namaStep, jenisStep, topik.deskripsi,step.urutan,step.id as stepID,step.latihanID,bab.judul_bab');
        $this->db->from('tb_line_topik topik');
        $this->db->join('tb_line_step step','step.topikID=topik.id');
        $this->db->join('tb_bab bab','bab.id_bab=topik.babID');
        $this->db->like('topik.namaTopik',$kunciCari
            );
        $this->db->order_by('topik.namaTopik');
        $this->db->order_by('step.urutan', 'asc');
        $query=$this->db->get();
        return  $query->result_array();
    }

    // get topik untuk side bar by namatopik
    public function get_topik_bynama($kunciCari)
    {
        $this->db->select('id,UUID,namaTopik');
        $this->db->from('tb_line_topik');
        $this->db->like('namaTopik',$kunciCari);
        $this->db->where('status',1);
        $this->db->where('statusLearning',1);
        $this->db->order_by('namaTopik');
        $query=$this->db->get();
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
    public function getmapeltopik(){
        $this->db->distinct();
        $this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->where('m.status = 1');
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
    //limit untuk tampil tryout
    public function tampil_active(){
        $this->db->select('active');
        $this->db->from('tb_tampil_to');
                $query = $this->db->get();
        return $query->result_array();

    }
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
    public function get_total()
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('*, m.nama_mapel, m.id_mapel, sum(r.score) as tot_path, sum(r.jmlh_benar) as benar, 
            sum(r.jmlh_benar)+sum(r.jmlh_salah)+sum(r.jmlh_kosong) as jum_soal');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_report_quiz r', 'm.id_mapel=r.id_mapel');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
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
        $this->db->where('nilai_akhir >=', $akhir);
        $this->db->where('id_mapel', $id);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // get settingpath 
    function get_soal_pendalaman($id){
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_part2');
        $this->db->where('id_mapel', $id);
        $this->db->group_by('id_mapel');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    // get soal
     public function getsoal($id_mapel, $kesulitan, $id_bab1, $id_bab2, $jml_soal) {
        // $this->db->select('id_latihan as idlat, soal as soal, soal.id_bank as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar, soal.jawaban_benar as jaw');
        // $this->db->from('tb_mm_sol_lat as sollat');
        // $this->db->join('tb_bank_soal as soal', 'sollat.id_soal = soal.id_bank');
        // $this->db->where('sollat.id_latihan', $id_latihan);

        $this->db->select('soal as soal, soal.id_bank as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar, soal.jawaban_benar as jaw, soal.status, soal.pembahasan, soal.id_bab');
        $this->db->from('tb_bank_soal as soal');
        $this->db->where('soal.id_mapel', $id_mapel);
        $this->db->where('soal.kesulitan', $kesulitan);
        $this->db->where('soal.id_bab', $id_bab1);
        $this->db->or_where('soal.id_bab', $id_bab2);

        $this->db->where('soal.publish','1');
        $this->db->limit($jml_soal);
        // $this->db->order_by()

        $query = $this->db->get();
        $soal = $query->result_array();

        // $this->db->select('*,id_latihan as idlat, soal as soal, pil.id_soal as pilid,soal.id_bank as soalid, pil.pilihan_jawaban as pilpil, pil.jawaban as piljaw, pil.gambar as pilgam');
        // $this->db->from('tb_mm_sol_lat as sollat');
        // $this->db->join('tb_bank_soal as soal', 'sollat.id_soal = soal.id_bank');
        // $this->db->join('tb_pil_jawab as pil', 'soal.id_bank = pil.id_soal');
        // $this->db->where('sollat.id_latihan', $id_latihan);
        // $query = $this->db->get();
        // $pil = $query->result_array();

        return array(
            'soal' => $soal
            // 'pil' => $pil,
        );
    }

    // get settingpath 
    function get_soal_pendalaman1($id){
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_setting_path');
        $this->db->where('id_mapel', $id);
        $this->db->group_by('id_mapel');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    function getreport()
    {
        $id = $this->session->userdata['id_siswa'];
        $this->db->distinct();
        $this->db->select('*, m.nama_mapel, m.id_mapel, max(r.score) as top');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_report_quiz r', 'm.id_mapel=r.id_mapel');
        $this->db->where('m.status = 1');
        $this->db->where('r.id_pengguna', $id);
        $this->db->group_by('r.id_bab');
        $this->db->order_by('max(r.score)', 'DESC');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }
    
    
    function get_paket2()
    {
       
        $this->db->select('p.id_paket,nm_paket');
        $this->db->from('tb_paket p');
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }

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

     function get_reporttry($id_try)
    {
       
        $this->db->select('p.id_paket, nm_paket, deskripsi,jmlh_kosong,jmlh_benar,jmlh_salah,total_nilai,score');
        $this->db->from('tb_report_quiz3 re');
        $this->db->join('tb_paket p ',' p.id_paket = re.id_paket');
        $this->db->join('tb_mm_tryoutpaket tr ',' tr.id_paket = p.id_paket');
        $this->db->join('tb_tryout try ',' try.id_tryout = tr.id_tryout');
        $this->db->where('tr.id_tryout ', $id_try);
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }
      function get_report_paket($id_pkt)
    {
       
        $this->db->select('p.id_paket, nm_paket, deskripsi,jmlh_kosong,jmlh_benar,jmlh_salah,total_nilai,score');
        $this->db->from('tb_report_quiz3 re');
        $this->db->join('tb_paket p ',' p.id_paket = re.id_paket');
        $this->db->where('p.id_paket ', $id_pkt);
       
        $tampil=$this->db->get();
        return $tampil->result_array();
    }




 }
 ?>