<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model{

	// GET DATA TOKEN
	function get_token($data,$status){
		$this->db->order_by('tb_token.id');

		if ($data!="all") {
			$this->db->where('masaAktif',$data);
		}
		if ($status==1) {
			$this->db->where('siswaID is not null');
		}else{
			$this->db->where('siswaID is null');

		}
		$this->db->select( '*,tb_token.id as tokenid,tb_token.status as tokenStatus' )->from( 'tb_token' ); 
		$this->db->join('tb_siswa', 'tb_token.siswaID = tb_siswa.id_siswa', 'left outer');
		$query = $this->db->get(); 
		return $query->result(); 
	}

	// INSERT KE TOKEN
	function insert_token($data){
		$this->db->insert( 'tb_token', $data );		
	}

	// GET JUMLAH STOK TOKEN
	function get_jumlah_token_stok($param=""){
		$this->db->select( 'id' )->from( 'tb_token' ); 
		$this->db->where('siswaID is NULL');
		if ($param==30 || $param==100 || $param==365) {
			$this->db->where('masaAktif',$param);
		}
		$query = $this->db->get(); 
		return $query->num_rows(); 
	}

	//get mahasiswa yang belum memiliki voucher
	function get_siswa_unvoucher(){
		$query = "SELECT s.`id_siswa`, s.`nama_depan`,s.`nama_belakang` FROM tb_siswa s 
		WHERE s.id_siswa NOT IN
		(
		SELECT t.`siswaID` FROM `tb_token` t
		JOIN tb_siswa s ON s.`id_siswa` = t.`siswaID`
		) AND s.`status`=1";

		$result = $this->db->query($query);
		return $result->result_array();
	}

	// get token kosong yang mau di set ke mahasiswa
	function token_kosong($data){
		$this->db->select( 'id' )->from( 'tb_token' );
		$this->db->where('masaAktif',$data['jenis_token']);
		$this->db->where('siswaID',NULL);
		$this->db->limit($data['jumlah_token']);
		$this->db->order_by('id','desc');
		$query = $this->db->get(); 
		return $query->result();  	
	}
	// update token untuk mahasiswa
	function set_token_to_mahasiswa($param){
		$sekarang = date('Y-m-d h:m:s');
		$this->db->where('id', $param['id_token']);
		$this->db->set('siswaID', $param['siswaID']);
		$this->db->update('tb_token');
	}

	// get token untuk diset ke mahasiswa
	function get_token_to_set($data){
		$this->db->select( '*' )->from( 'tb_token' );
		$this->db->where('siswaID',$data['id_siswa']);
		$this->db->where('nomorToken',$data['kode_token']);
		$query = $this->db->get(); 
		return $query->result();  	
	}

	//update token untuk siswa
	function set_token_single($data){
		$this->db->where('nomorToken', $data['kode_token']);
		$this->db->set('siswaID', $data['id_siswa']);
		$this->db->set('tanggal_diaktifkan', date('Y-m-d h:m:s'));
		$this->db->set('status', 1);

		$this->db->update('tb_token');
	}

	//drop token
	function drop_token($data){
		$this->db->where('id', $data['id']);
        $this->db->delete('tb_token');
	}

	// UPDATE TOKEN
	function update_token($data){
	$this->db->where('id', $data['id']);
	$this->db->set('tanggal_diaktifkan', date('Y-m-d h:m:s'));
	$this->db->set('status', 1);
	$this->db->update('tb_token');
	}

	// get data token siswa front
	function get_token_siswa($id_siswa){
		$this->db->order_by('tb_token.id');
		$this->db->select( '*,tb_token.id as tokenid,tb_token.status as tokenStatus' )->from( 'tb_token' ); 
		$this->db->join('tb_siswa', 'tb_token.siswaID = tb_siswa.id_siswa', 'left outer');
		$this->db->where('tb_token.siswaID', $id_siswa);
		$query = $this->db->get(); 
		return $query->result(); 
	}
	
}
?>