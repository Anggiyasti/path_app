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
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    //ambil semua gambar pada tabel slide
    public function get_gambarslide($id)

	{

		$this->db->select('*');

		$this->db->from('tb_gambar_front gb');
        $this->db->join('tb_artikel  art',' art.id_artikel = gb.id_artikel');

		$this->db->where('id',$id); 

		$query = $this->db->get();

		return $query->result_array();

	}

    //model untuk ubah slide dengan gambar 
	public function gambar_slide($id, $photo) {

		$a  =  $this->input->post('judul');
		$b  =  $this->input->post('resume');
        $d  =  $this->input->post('id_artikel');
        // var_dump($a);

        
            $data = array(
            'gambar' => $photo,
            'judul' => $a,
            'resume' => $b,
            'id_artikel' => $d
        );
       
        // $id_siswa = $this->session->userdata['email'];
        $this->db->where('id', $id);
        $this->db->update('tb_gambar_front', $data);
        // var_dump($data);
        redirect(site_url('template/slide'));
    }

    //model untuk ubah slide tanpa gambar
    public function gambar_slide1($id) {

        $a  =  $this->input->post('judul');
        $b  =  $this->input->post('resume');
        $d  =  $this->input->post('id_artikel');

        $data = array(
         
            'judul' => $a,
            'resume' => $b,
            'id_artikel' => $d
        );
        $this->db->where('id', $id);
        $this->db->update('tb_gambar_front', $data);
        redirect(site_url('template/slide'));

    }




    // ambil artikel untuk dropdown memilih artikel
    public function artikel(){
    $this->db->select('*');
    $a= $this->db->get('tb_artikel');

    return $a->result_array();

    }


}

 ?>