<?php
defined( 'BASEPATH' ) or exit( 'No direct script access allowed' );
class MPaketsoal extends CI_Model {

	##

	var $table = 'tb_paket';

	var $column_order = array('id_paket','nm_paket','deskripsi','status','jumlah_soal','durasi');

	var $column_search = array('nm_paket','deskripsi','jumlah_soal');

	var $order = array('id_paket'=>'desc');

	##

	// #Star var buat list soal by paket#

	var $table1 = 'tb_paket';

	var $column_order1 = array('id','id_soal','judul_soal','sumber','soal','kesulitan');

	var $column_search1 = array('judul_soal','sumber','soal','kesulitan');

	var $order1 = array('id'=>'desc');

	// #End var buat list soal by paket#



	

	public function get_by_id($id){

		$this->db->from($this->table);

		$this->db->where('id_paket',$id);

		$query = $this->db->get();



		return $query->row();

	}



	public function insertpaketsoal( $data ) {

		$this->db->insert( 'tb_paket', $data );

	}



	#ambil semua paket soal yang berstatus 1

	public function getpaketsoal() { 
	$this->db->order_by('id_paket','desc');
	  $this->db->select( '*' )->from( 'tb_paket' ); 

	  $this->db->where( 'status', 1 ); 

	  $query = $this->db->get(); 



	  return $query->result_array(); 

	 }

	 ##



	#ambil paket soal yang belum terdaftar di to tertentu 

	public function get_paket_unregistered($id_to) {

		$query = "SELECT p.deskripsi,p.id_paket, p.nm_paket FROM tb_paket p 

		WHERE p.id_paket NOT IN

		(

		SELECT paket.id_paket FROM tb_paket paket

		JOIN `tb_mm_tryoutpaket` mm ON mm.`id_paket` = paket.`id_paket`

		WHERE id_tryout = $id_to AND paket.id_paket )";

		$result = $this->db->query($query);

		return $result->result_array();

	}

	##





	public function getpaket_by_id($idpaket) {

		$this->db->select( '*' )->from( 'tb_paket' );

		$this->db->where('id_paket',$idpaket);

		$this->db->where( 'status', 1 );

		$query = $this->db->get();

		$result = $query->result_array();

		  // You should use $q->num_rows() to detect the number of returned rows

		if($query->num_rows() == 1) {

			return $result[0];

		}

		return $result;

	}



	public function droppaket( $id ) {

		$this->db->set( 'status', 0 );

		$this->db->where( 'id_paket', $id );

		$this->db->update( 'tb_paket' );

	}



	function rubahpaket( $id, $data ) {

		$this->db->where( 'id_paket', $id );

		$this->db->update( 'tb_paket', $data );

	}



	function hitung_semua() {

		$this->db->from( $this->table );

		return $this->db->count_all_results();

	}



	function hitung_filter() {

		$this->_get_datatables_query();

		$query = $this->db->get();

		return $query->num_rows();

	}



	function get_datatables() {

		$this->_get_datatables_query();

		if ( $_POST['length'] != -1 )

			$this->db->limit( $_POST['length'], $_POST['start'] );

		$query = $this->db->get();

		return $query->result();

	}



	private function _get_datatables_query() {



		$this->db->from( $this->table );



		$i = 0;



		foreach ( $this->column_search as $item ) // loop column

		{

			if ( $_POST['search']['value'] ) // if datatable send POST for search

			{



				if ( $i===0 ) // first loop

				{

					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

					$this->db->like( $item, $_POST['search']['value'] );

				}

				else {

					$this->db->or_like( $item, $_POST['search']['value'] );

				}



				if ( count( $this->column_search ) - 1 == $i ) //last loop

					$this->db->group_end(); //close bracket

				}

				$i++;

			}



		if ( isset( $_POST['order'] ) ) // here order processing

		{

			$this->db->order_by( $this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir'] );

		}

		else if ( isset( $this->order ) ) {

			$order = $this->order;

			$this->db->order_by( key( $order ), $order[key( $order )] );

		}

	}



	#Start function insert add soal pakert#

	public function insert_soal_paket($mmpaket)

	{



		$this->db->insert_batch('tb_mm_paket_bank',$mmpaket);

		echo "masuk model";

		// var_dump($mmpaket);

	}

	//menampilkan list soal paket by paker

	public function soal_by_paketID($idpaket)

	{



		$this->db->select('*,mpaket.id_soal as id_soal_fk, soal.id_bank as id_soal ');

		$this->db->from('tb_bank_soal soal');

		$this->db->join('tb_mm_paket_bank mpaket ','mpaket.id_soal = soal.id_bank');

		$this->db->where('id_paket',$idpaket);

		$query = $this->db->get();

		return $query->result_array();

	}



	function hitung_semuasoal() {

		$this->db->from( $this->table );

		return $this->db->count_all_results();

	}



	function hitung_filtersoal() {

		$this->_get_datatables_query();

		$query = $this->db->get();

		return $query->num_rows();

	}



	private function _get_datalistsoal_query() {



		$this->db->from( $this->table1 );



		$i = 0;



		foreach ( $this->column_search1 as $item ) // loop column

		{

			if ( $_POST['search']['value'] ) // if datatable send POST for search

			{



				if ( $i===0 ) // first loop

				{

					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

					$this->db->like( $item, $_POST['search']['value'] );

				}

				else {

					$this->db->or_like( $item, $_POST['search']['value'] );

				}



				if ( count( $this->column_search1 ) - 1 == $i ) //last loop

					$this->db->group_end(); //close bracket

				}

				$i++;

			}



		if ( isset( $_POST['order'] ) ) // here order processing

		{

			$this->db->order_by( $this->column_order1[$_POST['order']['0']['column']], $_POST['order']['0']['dir'] );

		}

		else if ( isset( $this->order ) ) {

			$order = $this->order;

			$this->db->order_by( key( $order ), $order[key( $order )] );

		}

	}



	public function drop_soal_paket($id)

	{	

		$this->db->where('id',$id);

		$this->db->delete('tb_mm_paket_bank');

	}



	#END function insert add soal pakert#



	#Untuk halaman  addPaketTo#

	//get id Paket

	public function get_id_by_UUID($UUID)

	{

		$this->db->select('id_tryout, nm_tryout');

		$this->db->from('tb_tryout');

		$this->db->where('UUID',$UUID);

		$query = $this->db->get();

        // return $query->result_array();

		$result = $query->result_array();

		  // You should use $q->num_rows() to detect the number of returned rows

		if($query->num_rows() == 1) {

		   // Return the first row:

			return $result[0];

		}

		return $result;



	}



	public function paket_by_paketUUID($id_to)

	{

		$this->db->select('id,mto.id_paket as id_paket_fk,paket.id_paket as paketID,nm_paket,deskripsi');

		$this->db->from('tb_paket paket');

		$this->db->join('tb_mm-tryoutpaket mto','mto.id_paket = paket.id_paket');

		$this->db->where('mto.id_tryout',$id_to);

		$query = $this->db->get();

		return $query->result_array();



	}



	public function get_soal_by_idpaket($idpaket){

		$this->db->select('*');

		$this->db->from('tb_mm_paket_bank paketbank');

		$this->db->join('tb_bank_soal bank ',' paketbank.id_soal = bank.id_bank');

		$this->db->where('paketbank.id_paket',$idpaket);

		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_jumlah_soal($idpaket){
		$this->db->select('id');
		$this->db->from('tb_mm_paket_bank paketbank');
		$this->db->join('tb_bank_soal bank ',' paketbank.id_soal = bank.id_bank');

		$this->db->where('paketbank.id_paket',$idpaket);

		$query = $this->db->get();

		return $query->num_rows();
	}


	#ambil soal yang belum terdaftar dalam paket soal.
    public function get_soal_terdaftar($data){
       $paket = $data['id_paket'];
       $id_bab = $data['id_bab'];   
              
        $myquery ="SELECT * FROM tb_bank_soal as bank
            WHERE bank.publish = 1
            AND bank.id_bab = $id_bab
			AND bank.jawaban_benar <>''
            AND bank.id_bank NOT IN
            (
             SELECT pb.id_soal
             FROM tb_bank_soal b
             JOIN tb_mm_paket_bank pb 
             ON pb.id_soal= b.id_bank
             JOIN tb_paket p ON
             p.id_paket = pb.id_paket
            AND p.id_paket = $paket)"
            ;

    $result = $this->db->query($myquery);
    
    return $result->result_array();
    }

    public function scBab($mapel)
	{
		$this->db->select('id_bab,judul_bab');
		$this->db->from('tb_bab');
		$this->db->where('id_mapel', $mapel);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function scPelajaran()
	{
		$this->db->select('id_mapel,nama_mapel');
        $this->db->from('tb_mata_pelajaran');
                // $this->db->where('status',1);
                // $this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}



	##########################









}
?>