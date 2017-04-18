<?php 

/**
* 
*/
class Videobackmodel extends CI_Model
{

	// get bab
	function getbab($provId){

		$kabupaten="<option value='0'>--pilih--</pilih>";

		$this->db->order_by('judul_bab','ASC');
		 $this->db->where('status','1');
		$kab= $this->db->get_where('tb_bab',array('id_mapel'=>$provId));

		foreach ($kab->result_array() as $data ){
		// $kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
		$kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";

		}

		return $kabupaten;

		}

		// get mapel 
	function provinsi(){
	$this->db->order_by('nama_mapel','ASC');
	$provinces= $this->db->get('tb_mata_pelajaran');

	return $provinces->result_array();

	}

	// insert ke db
	public function insertVideo($data_video)
	{		
		$this->db->insert('tb_video', $data_video);
		redirect(site_url('videoback/daftarvideo'));
	}

	
	 // get tampil video
    public function tampilvideo() {
    	$this->db->select('b.id_bab, b.judul_bab, v.id_video, v.judul_video, v.deskripsi, v.nama_file, v.link');
		$this->db->from('tb_bab b');
		$this->db->join('tb_video v', 'v.id_bab = b.id_bab');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
    

    // get data video untuk dipake update video
    public function get_video($id)
	{	
		$this->db->select('*');
		$this->db->from('tb_video v');
		$this->db->join('tb_bab bab','v.id_bab = bab.id_bab');
		$this->db->join('tb_mata_pelajaran mapel ',' mapel.id_mapel = bab.id_mapel');
		$this->db->where('id_video',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	

	// query update video link
	public function up_video($data)
	{	
		// var_dump($data);
		$this->db->set($data['video']);
		$this->db->where('id_video',$data['id_video']);
		$this->db->update('tb_video');
		redirect(site_url('videoback/daftarvideo'));
	}

	

	//query hapus video
	public function del_video($videoID)
	{
		$this->db->where('id_video',$videoID);
		$this->db->delete('tb_video');
	}

	


//get nama file untuk menghapus file video di Videoback->function del_file_video
  function get_nameFile($videoID){
   $this->db->select('nama_file');
   $this->db->from('tb_video');
   $this->db->where('id_video',$videoID);
   $query = $this->db->get();
   return $query->result();
 }

 //get nama file untuk menghapus file video di Videoback->function del_file_video part 4
  function get_nameFile_part4($videoID){
   $this->db->select('nama_file');
   $this->db->from('tb_video_part4');
   $this->db->where('id',$videoID);
   $query = $this->db->get();
   return $query->result();
 }


 // query update video link part 4
	public function up_video_part4($data)
	{	
		// var_dump($data);
		$this->db->set($data['video']);
		$this->db->where('id',$data['id']);
		$this->db->update('tb_video_part4');
		redirect(site_url('videoback/daftarvideo_part4'));
	}

	//query hapus video part 4
	public function del_video_part4($videoID)
	{
		$this->db->where('id',$videoID);
		$this->db->delete('tb_video_part4');
	}

	 // get data video untuk dipake update video part 4
    public function get_video_part4($id)
	{	
		$this->db->select('*');
		$this->db->from('tb_video_part4');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	 // get tampil video part 4
    public function tampilvideo_part4() {
    	$this->db->select('v.id, v.judul_video, v.deskripsi, v.nama_file, v.link');
		$this->db->from('tb_video_part4 v');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    // insert ke db part 4
	public function insertVideo_part4($data_video)
	{		
		$this->db->insert('tb_video_part4', $data_video);
		redirect(site_url('videoback/daftarvideo_part4'));
	}


}

 ?>