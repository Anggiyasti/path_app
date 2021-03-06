<?php 

/**
* 
*/
class Loginmodel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

    // fungsi untuk login yg dipake cuma 1 yg lainnya ga kepake

    public function get_siswa1($nama_depan){
        $query = $this->db->get_where('tb_siswa',array('nama_depan'=>$nama_depan));
        $query = $query->result_array();
        if ($query) {
            return $query[0];
        }
    }

    function getmapel(){
    $this->db->order_by('nama_mapel','ASC');
    $provinces= $this->db->get('tb_mata_pelajaran');

    return $provinces->result_array();

    }

    function getsiswa(){
    return $this->db->get('tb_siswa');

    }



    //model untuk mengecek user siswa 
    public function login_user($username,$password)
    {

        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->where('password',$password);
        $this->db->where("(nama_depan ='$username' OR email = '$username' OR id_siswa = '$username')", NULL, FALSE);
        $this->db->where('status','1');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        else{
            return FALSE;
        }
    // }

   
    }

    //model untuk mengecek user guru 
    public function login_guru($username,$password)
    {

        $this->db->select('*');
        $this->db->from('tb_guru');
        $this->db->where('password',$password);
        $this->db->where("(username ='$username' OR email = '$username')", NULL, FALSE);
        $this->db->where('status','1');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        else{
            return FALSE;
        }
       
    }
    //model untuk mengecek user admin
    public function login_admin($username,$password)
    {
        

        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->where('password',$password);
        $this->db->where("(username ='$username' or id_admin='$username')", NULL, FALSE);
        $this->db->where('status','8');
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        }
        else{
            return FALSE;
        }
       
    }
    //mengambil data guru
    function get_guru($id_guru){
        $this->db->select('tb_guru.id_guru');

        $this->db->from('tb_guru');

        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result(); //if data is true

        } else {

            return false; //if data is wrong

        }
}
//mengambil data siswa
 function get_siswa($id_siswa){
        $this->db->select('tb_siswa.id_siswa,photo,jurusan,univ,facebook,twitter,instagram, jurusan_pelajaran, status_path');

        $this->db->from('tb_siswa');
        $this->db->where('id_siswa',$id_siswa);


        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result(); //if data is true

        } else {

            return false; //if data is wrong

        }
   
}
//mengambil data admin
function get_admin($id_admin){
        $this->db->select('tb_admin.id_admin');

        $this->db->from('tb_admin');

        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result(); //if data is true

        } else {

            return false; //if data is wrong

        }
}

    function get_user($id){
         $this->db->select('*');

        $this->db->from('tb_siswa','tb_guru');

        $this->db->where('email', $id);

        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result(); //if data is true

        } else {

            return false; //if data is wrong

        }


    }

    // tampil passing grade berdasarkan prodi
    public function getlogmax() {
        $this->db->distinct();
        $this->db->select('m.nama_mapel, b.judul_bab, MAX( r.score ) as max, r.id_latihan, l.create_by, l.id_bab');
        $this->db->from('tb_report_latihan r');
        $this->db->join('tb_latihan l ','r.id_latihan = l.id_latihan');
        $this->db->join('tb_bab  b','l.id_bab = b.id_bab');
        $this->db->join('tb_mata_pelajaran m ', 'b.id_mapel = m.id_mapel');
        $this->db->group_by('l.id_bab');
        $this->db->order_by('b.judul_bab ','asc ');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }


    public function getlogmulai()
    {
        $query = "SELECT l.create_by, l.date_create, l.id_bab, b.judul_bab
                    from tb_latihan as l
                    join tb_bab as b on l.id_bab = b.id_bab
                    order by create_by desc limit 5";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    public function getlogselesai()
    {
        $query = "SELECT l.create_by,l.id_bab, b.judul_bab, r.tgl_pengerjaan
                    from tb_report_latihan as r
                    join tb_latihan as l on r.id_latihan = l.id_latihan
                    join tb_bab as b on l.id_bab = b.id_bab
                    order by create_by desc limit 5";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    function getlogact(){
    $this->db->distinct();
        $this->db->select('*, s.nama_depan, s.photo, b.judul_bab');
        $this->db->from('tb_bab b');
        $this->db->join('tb_log l', 'b.id_bab = l.id_bab');
        $this->db->join('tb_siswa s', 'l.id_siswa = s.id_siswa');
        $this->db->order_by('tgl_selesai');
        $result = $this->db->get();
        return $result->result_array();
    }


      // tampil slide foto home 1
    public function tampilphoto() {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_gambar_front');
        $this->db->where('id', '1');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }
     // tampil slide foto home 2
      public function tampilphoto2() {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_gambar_front');
        $this->db->where('id', '2');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }
      // tampil slide foto home 3
      public function tampilphoto3() {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_gambar_front');
        $this->db->where('id', '3');
        $tampil=$this->db->get();
        return $tampil->result_array();
    }


        // tampil articel
    public function tampilarticle($id) {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tb_artikel');
        $this->db->where('id_artikel',$id);
        $tampil=$this->db->get();
        return $tampil->result_array();
    }


    
}

 ?>