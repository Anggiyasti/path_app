<?php 

/**
* 
*/
class Mworkout1 extends CI_Model
{
	// get mapel
	public function getdaftarmapel(){
    	$this->db->distinct();
		$this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel, b.id_mapel, b.id_bab, b.judul_bab, m.gambar');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
		$this->db->where('m.status = 1');
        $this->db->where('b.status = 1');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
    // get mapel dan bab
    public function get_mapel_bab($mapel) {
    	$this->db->distinct();
		$this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel, b.id_mapel, b.id_bab, b.judul_bab');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
		$this->db->where('m.nama_mapel', $mapel);
		 
		$query = $this->db->get();
		return $query->result_array();
    }
    // get soal
     public function get_soal($id_latihan) {

        $this->db->select('soal as soal, soal.id_bank as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar, soal.jawaban_benar as jaw, soal.status, soal.pembahasan, soal.id_bab');
        $this->db->from('tb_bank_soal as soal');
        $this->db->join('tb_mm_sol_lat as sollat', 'sollat.id_soal = soal.id_bank');
        $this->db->where('sollat.id_latihan', $id_latihan);
        $query = $this->db->get();
        $soal = $query->result_array();

        $this->db->select('*,id_latihan as idlat, soal as soal, pil.id_soal as pilid,soal.id_bank as soalid, pil.pilihan_jawaban as pilpil, pil.jawaban as piljaw, pil.gambar as pilgam');
        $this->db->from('tb_mm_sol_lat as sollat');
        $this->db->join('tb_bank_soal as soal', 'sollat.id_soal = soal.id_bank');
        $this->db->join('tb_pil_jawab as pil', 'soal.id_bank = pil.id_soal');
        $this->db->where('sollat.id_latihan', $id_latihan);
        $query = $this->db->get();
        $pil = $query->result_array();

        return array(
            'soal' => $soal,
            'pil' => $pil,
        );
    }



    // get soal untuk path part 3
     public function get_soalll($id_latihan) {
        $this->db->select('soal AS soal,pak.id_paket, soal.id_bank AS soalid, soal.judul_soal AS judul, soal.gambar_soal AS gambar, soal.jawaban_benar AS jaw, soal.status, soal.pembahasan');
        $this->db->from(' tb_bank_soal AS soal');
        $this->db->join('tb_mm_paket_bank pak ',' pak.id_soal = soal.id_bank');
        $this->db->where('pak.id_paket', $id_latihan);
        $query = $this->db->get();
        $soal = $query->result_array();

        $this->db->select('*,id_paket as idpak, soal as soal, pil.id_soal as pilid,soal.id_bank as soalid, pil.pilihan_jawaban as pilpil, pil.jawaban as piljaw, pil.gambar as pilgam');
        $this->db->from('tb_mm_paket_bank as pa');
        $this->db->join('tb_bank_soal as soal', 'pa.id_soal = soal.id_bank');
        $this->db->join('tb_pil_jawab as pil', 'soal.id_bank = pil.id_soal');
        $this->db->where('pa.id_paket',$id_latihan);
        $query = $this->db->get();
        $pil = $query->result_array();

        return array(
            'soal' => $soal,
            'pil' => $pil,
        );
    }

    // get soal
    public function get_soal1($mapel) {
        $this->db->distinct();
        $this->db->select()->from('tb_bank_soal');
        $query = $this->db->get();
        return $query->result_array();
    }

    // get jawaban soal workout
    public function jawabansoal($id) {
        $this->db->select('soal.id_bank as soalid, soal.jawaban_benar as jawaban, soal.id_bab');
        $this->db->from('tb_mm_sol_lat as sollat');
        $this->db->join('tb_bank_soal as soal', 'sollat.id_soal = soal.id_bank');
        $this->db->where('sollat.id_latihan', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    //insert bab ke tb_grafik_report
    public function inputgrafik($data) {
        $this->db->insert('tb_grafik_report', $data);
    }

    // insert ke tb_log
    public function insertlog($data) {
        $this->db->insert('tb_log', $data);
    }

    // update grafik workout
    public function update_grafik($data, $hasil,$hasil1) {
        $query="UPDATE tb_grafik_report set sub_score= $hasil , total= $hasil1 where id_latihan='$data'";

        $result = $this->db->query($query);
    }

    // update tb_log 
    public function logselesai($id_siswa) {

        $this->db->set('tgl_selesai', 'NOW()', FALSE);
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('tb_log');   
    }

    // input ke tb_report_latihan
    public function inputreport($data) {
        $this->db->insert('tb_report_latihan', $data);
    }

    // update latihan
    public function updateLatihan($id) {
        $this->db->set('status_pengerjaan', 2);
        $this->db->where('id_latihan', $id);
        $this->db->update('tb_latihan');
    }

    // get level workout
    public function levelLatihan($id) {
        $this->db->select('kesulitan as level');
        $this->db->from('tb_latihan');
        $this->db->where('id_latihan', $id);
        $query = $this->db->get();
        return $query->result();
    }

    // insert latihan
    public function insert( $data ) {

        $this->db->insert( 'tb_latihan', $data );

    }

    // get id_latihan untuk workout
    public function get_latihan_by_uuid($uuid){

        $this->db->where( 'uuid_latihan', $uuid );      

        $this->db->select('id_latihan');

        $this->db->from( 'tb_latihan' );

        $query = $this->db->get();

        return $query->result_array();
    }

    //random buat bab
    public function get_random_for_latihan_bab( $param ) {
        $this->db->where( 'b.id_bab', $param['id_bab'] );
        $this->db->where( 'b.publish', 1 );
        $this->db->where( 'b.kesulitan', $param['kesulitan'] );
        $this->db->order_by( 'rand()' );
        $this->db->limit( $param['jumlah_soal'] );
        $this->db->select( '*' );
        $this->db->from( 'tb_bank_soal b');
        $this->db->join('tb_pil_jawab p', 'b.id_bank=p.id_soal');
        $this->db->group_by('b.id_bank');

        $query = $this->db->get();
        return $query->result_array();
    }

    // insert ke insert_tb_mm_sol_lat
    public function insert_tb_mm_sol_lat( $data ) {

        $this->db->insert( 'tb_mm_sol_lat', $data );

    }

    //get daftar latihan by created by

    public function get_report($createdby, $mapel){
        $this->db->select('*, bab.judul_bab, pel.nama_mapel');
        $this->db->from('tb_latihan latihan');
        $this->db->join('tb_report_latihan report',
            'latihan.id_latihan=report.id_latihan');
        $this->db->join('tb_bab bab',
            'latihan.id_bab=bab.id_bab');
        $this->db->join('tb_mata_pelajaran pel',
            'pel.id_mapel=bab.id_mapel');
        $this->db->where('create_by', $createdby);
        $this->db->where('bab.id_bab', $mapel);
        $this->db->order_by('report.tgl_pengerjaan', 'desc');
        $query = $this->db->get();
        return $query->result_array();

    }

    // get report detail by created by
    public function get_report_detail($createdby, $id){
        $this->db->select('*, bab.judul_bab');
        $this->db->from('tb_latihan latihan');
        $this->db->join('tb_report_latihan report',
            'latihan.id_latihan=report.id_latihan');
        $this->db->join('tb_bab bab',
            'latihan.id_bab=bab.id_bab');
        $this->db->join('tb_mata_pelajaran pel',
            'pel.id_mapel=bab.id_mapel');
        $this->db->where('create_by', $createdby);
        $this->db->where('latihan.id_latihan', $id);
        $this->db->order_by('tgl_pengerjaan', 'asc');
        $query = $this->db->get();
        return $query->result_array();

    }

    // get latihan
    public function get_latihan($createdby){
        $this->db->select('*');
        $this->db->from('tb_latihan latihan');
        $this->db->where('create_by', $createdby);
        $this->db->where('status_pengerjaan', '1');

        $query = $this->db->get();
        return $query->result_array();

    }

    // get nama mapel
    public function get_nama_mapel_bab($mapel) {
        $this->db->distinct();
        $this->db->select('id_mapel, nama_mapel');
        $this->db->from('tb_mata_pelajaran ');
        $this->db->where('id_mapel', $mapel);
       
        $query = $this->db->get();
        return $query->result_array();
    }

    // get nama bab
    public function get_nama_bab($mapel) {
        $this->db->distinct();
        $this->db->select('b.id_bab, b.judul_bab, m.nama_mapel');
        $this->db->from('tb_bab b');
        $this->db->join('tb_mata_pelajaran m', 'b.id_mapel = m.id_mapel');
        $this->db->where('id_bab', $mapel);
         
        $query = $this->db->get();
        return $query->result_array();
    }


    // get soal untuk pembahasan
     public function get_soal_pembahasan($id_latihan) {

        $this->db->select('soal as soal, soal.id_bank as soalid, soal.judul_soal as judul, soal.gambar_soal as gambar, soal.jawaban_benar as jaw, soal.status, soal.pembahasan, soal.id_bab');
        $this->db->from('tb_bank_soal as soal');
        $this->db->join('tb_mm_sol_lat as sollat', 'sollat.id_soal = soal.id_bank');
        $this->db->where('sollat.id_latihan', $id_latihan);
        $query = $this->db->get();
        $soal = $query->result_array();

        $this->db->select('*,id_latihan as idlat, soal as soal, pil.id_soal as pilid,soal.id_bank as soalid, pil.pilihan_jawaban as pilpil, pil.jawaban as piljaw, pil.gambar as pilgam');
        $this->db->from('tb_mm_sol_lat as sollat');
        $this->db->join('tb_bank_soal as soal', 'sollat.id_soal = soal.id_bank');
        $this->db->join('tb_pil_jawab as pil', 'soal.id_bank = pil.id_soal');
        $this->db->where('sollat.id_latihan', $id_latihan);
        $query = $this->db->get();
        $pil = $query->result_array();

        return array(
            'soal' => $soal,
            'pil' => $pil,
        );
    }

     // get mapel dan bab untuk tampil di workout
    public function get_mapel_bab_wo($id_bab) {
        $this->db->distinct();
        $this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel, b.id_mapel, b.id_bab, b.judul_bab');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
        $this->db->where('b.id_bab', $id_bab);
         
        $query = $this->db->get();
        return $query->result_array();
    }

    // get data buat tampil nilai  tertinggi
    public function nilai_tertinggi()
    {
        $query = "SELECT m.nama_mapel, b.judul_bab, max(r.score) as n, r.id_latihan, l.create_by, l.id_bab
                FROM tb_report_latihan as r
                JOIN tb_latihan as l
                ON  r.id_latihan = l.id_latihan
                JOIN tb_bab as b
                ON l.id_bab = b.id_bab
                JOIN tb_mata_pelajaran as m
                ON b.id_mapel = m.id_mapel
                group by l.id_bab order by b.judul_bab asc";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    // cek bab tersebut ada soal atau tidak
    public function cek_soal($id_bab) {
        $this->db->select('id_bank as soalid');
        $this->db->from('tb_bank_soal');
        $this->db->where('id_bab', $id_bab);

        $query = $this->db->get();
        return $query->result_array();
    }

     // ambil video berdasarkan bab
    public function get_videoby_idbab($id){
        $this->db->select('*');
        $this->db->from('tb_video');
        $this->db->where('id_bab',$id);
        $this->db->where('publish',1);
        $query = $this->db->get();
        return $query->result_array();
    }
}

 ?>