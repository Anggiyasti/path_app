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
    
    // public function getdaftarguru() {
    //     $this->db->distinct();
    //     $this->db->select()->from('tb_guru');
        
    //     $tampil=$this->db->get();
    //     return $tampil->result_array();
    // }

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




    public function login_user($username,$password)
    {

        // $email = $this->input->post('email');
        // // $username = $this->input->post('nama_depan');
        // $password = md5($this->input->post('password'));

        // $sql = "SELECT email,nama_depan, password, status FROM tb_siswa WHERE nama_depan = '{$username}'  OR email = '{$email}' AND password = 
        // '{$password}' AND status='1' LIMIT 1";
        // $result = $this->db->query($sql);
        // $row = $result->row();

        // if ($result->num_rows() == 1) {
        //     return true;
        // }
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

    public function login_guru($username,$password)
    {
        // $email = $this->input->post('email');
        // $username = $this->input->post('username');
        // $password = md5($this->input->post('password'));

        // $sql = "SELECT email,username, password, status FROM tb_guru WHERE username = '{$username}'  OR email = '{$email}' AND password = 
        // '{$password}' AND status='1' LIMIT 1";
        // $result = $this->db->query($sql);
        // $row = $result->row();

        // if ($result->num_rows() == 1) {
        //     return true;
        // }

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

 function get_siswa($id_siswa){
        $this->db->select('tb_siswa.id_siswa,photo,jurusan,univ');

        $this->db->from('tb_siswa');
        $this->db->where('id_siswa',$id_siswa);


        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result(); //if data is true

        } else {

            return false; //if data is wrong

        }
    //     $query = $this->db->get_where('tb_siswa',array('nama_depan'=>$nama_depan));
    //     $query = $query->result_array();
    //     if ($query) {
    //         return $query[0];
    //     }
    // }
}

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

    //     $query = $this->db->get_where('tb_siswa',array('nama_depan'=>$nama_depan));
    //     $query = $query->result_array();
    //     if ($query) {
    //         return $query[0];
    //     }
    // }
    
}

 ?>