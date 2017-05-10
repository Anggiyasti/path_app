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
        $this->db->limit('3'); 
		$tampil=$this->db->get();

		return $tampil->result_array();
    }
    public function getDaftarslide_passing(){
        $this->db->distinct();
        $this->db->select()->from('tb_gambar_front');
        $this->db->where('id','4'); 

        $tampil=$this->db->get();
        return $tampil->result_array();
    }

    //ambil semua gambar pada tabel slide
    public function get_gambarslide($id)

	{

		$this->db->select('*');

		$this->db->from('tb_gambar_front gb');
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

    //model untuk ubah slide dengan gambar 
    public function gambar_slide_passing($id, $photo) {

        $a  =  $this->input->post('judul');
     
        // var_dump($a);

        
            $data = array(
            'gambar' => $photo,
            'id_artikel' => $d
        );
       
        // $id_siswa = $this->session->userdata['email'];
        $this->db->where('id', $id);
        $this->db->update('tb_gambar_front', $data);
        // var_dump($data);
      
        $this->session->set_flashdata('info', '<div class="alert alert-success text-center"> Ubah Berhasil</div>');
        redirect(site_url('template/slide/tampilslide_passing'));
    }



    // ambil artikel untuk dropdown memilih artikel
    public function artikel($id){
    $this->db->select('*');
    $this->db->where('id_artikel != '.$id.'');
    $a= $this->db->get('tb_artikel');

    return $a->result_array();

    }

    //ambil semua gambar pada tabel slide
    public function get_judul($id)

    {

        $this->db->select('a.id_artikel, a.judul_artikel');

        $this->db->from('tb_artikel a');
        $this->db->where('a.id_artikel',$id); 

        $query = $this->db->get();

        return $query->result_array()[0];

    }

}

 ?>