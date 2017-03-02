<?php 

/**
* 
*/
class m_slide extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


	public function getDaftarslide(){
    	$this->db->distinct();
		$this->db->select()->from('tb_gambar_front');
		// $this->db->where('status = 1');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    public function get_gambarslide($id)

	{

		// $id_siswa=$this->session->userdata['email'] ;	

		$this->db->select('*');

		$this->db->from('tb_gambar_front');

		$this->db->where('id',$id); 

		$query = $this->db->get();

		return $query->result_array();

	}

	public function gambar_slide($id, $photo) {
        $data = array(
            'gambar' => $photo
        );
        // $id_siswa = $this->session->userdata['email'];
        $this->db->where('id', $id);
        $this->db->update('tb_gambar_front', $data);
        // var_dump($data);
        redirect(site_url('template/slide'));
    }

}

 ?>