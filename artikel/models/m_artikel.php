<?php 

/**
* 
*/
class m_artikel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


	public function getDaftarslide(){
    	$this->db->distinct();
		$this->db->select()->from('tb_artikel');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    public function get_gambarartikel($id)

	{

		// $id_siswa=$this->session->userdata['email'] ;	

		$this->db->select('*');

		$this->db->from('tb_artikel');

		$this->db->where('id_artikel',$id); 

		$query = $this->db->get();

		return $query->result_array();

	}

	public function gambar_artikel($id, $photo) {

		$a  =  $this->input->post('judul_artikel');
		$b  =  $this->input->post('editor1');

        $data = array(
            'gambar' => $photo,
            'judul_artikel' => $a,
            'isi_artikel' => $b

        );
        $this->db->where('id_artikel', $id);
        $this->db->update('tb_artikel', $data);
        // var_dump($data);
        redirect(site_url('artikel'));
    }


    public function gambar_artikel1($id) {

        $a  =  $this->input->post('judul_artikel');
        $b  =  $this->input->post('editor1');

        $data = array(  
            'judul_artikel' => $a,
            'isi_artikel' => $b

        );
        $this->db->where('id_artikel', $id);
        $this->db->update('tb_artikel', $data);
        // var_dump($data);
        redirect(site_url('artikel'));
    }


    function insert_artikel($judul_artikel,$isi_artikel,$filename){
        $data = array(
                        'judul_artikel'  =>     $judul_artikel,
                        'isi_artikel' => $isi_artikel,
                        'gambar' =>      $filename);
        $this->db->insert('tb_artikel',$data);
        return $data;

    }


      // DELETE MATA PELAJARAN
    public function delete_artikel($id_artikel) {
        $this->db->where('id_artikel', $id_artikel);
        $this->db->delete('tb_artikel');
    }

    // public function gambar_artikel($id, $photo) {

		
    //     $data = array(
    //         'gambar_artikel' => $photo,
    //     );
    //     // $id_siswa = $this->session->userdata['email'];
    //     $this->db->where('id', $id);
    //     $this->db->update('tb_gambar_front', $data);
    //     // var_dump($data);
    //     redirect(site_url('template/slide'));
    // }

}

 ?>