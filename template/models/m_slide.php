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

		$a  =  $this->input->post('judul');
		$b  =  $this->input->post('resume');
		$c  =  $this->input->post('editor1');
        $d  =  $this->input->post('id_artikel');

        $data = array(
            'gambar' => $photo,
            'judul' => $a,
            'resume' => $b,
            'isi' => $c,
            'id_artikel' => $d,
            // 'gambar_artikel' => $photo

        );
        // $id_siswa = $this->session->userdata['email'];
        $this->db->where('id', $id);
        $this->db->update('tb_gambar_front', $data);
        // var_dump($data);
        redirect(site_url('template/slide'));
    }

    public function gambar_artikel($id, $photo) {

		
        $data = array(
            'gambar_artikel' => $photo,
            

        );
        // $id_siswa = $this->session->userdata['email'];
        $this->db->where('id', $id);
        $this->db->update('tb_gambar_front', $data);
        // var_dump($data);
        redirect(site_url('template/slide'));
    }


        // get mapel 
    public function artikel(){
    $this->db->select('*');
    $a= $this->db->get('tb_artikel');

    return $a->result_array();

    }


}

 ?>