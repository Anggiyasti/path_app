<?php 

/**
* 
*/
class Modeluser extends CI_Model
{
	// insert siswa ke db
	public function insert_siswa($data)
		{
			return $this->db->insert('tb_siswa', $data);
		}

	// insert guru ke db
	public function insert_guru($data)
		{
			return $this->db->insert('tb_guru', $data);
		}

	// tampil siswa
    public function getdaftarsiswa() {
        $this->db->distinct();
		$this->db->select()->from('tb_siswa');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    // update siswa
    public function update_siswa() {
		$a  =  $this->input->post('nama_depan');
		$b  =  $this->input->post('nama_belakang');
		$c  =  $this->input->post('email');
		$d  =  $this->input->post('password');
		$e  =  $this->input->post('alamat');
		$f  =  $this->input->post('no_tlp');
		$g  =  $this->input->post('id_siswa');
		$h  =  $this->input->post('status');

		$arr = array(
				'nama_depan' => $a,
				'nama_belakang'=> $b,
				'email'=> $c,
				'password' => $d,
				'alamat'=> $e,
				'no_tlp'=> $f,
				'id_siswa' => $g,
				'status' => $h


			);
		$this->db->where('id_siswa', $g);
		return $this->db->update('tb_siswa', $arr);
	}

	// fungsi delete siswa
	public function delete_siswa($id_siswa) {
		$this->db->where('id_siswa', $id_siswa);
        $this->db->set('status', '0');
        $this->db->update('tb_siswa');
	}

	// tampil guru
    public function getdaftarguru() {
        $this->db->distinct();
		$this->db->select()->from('tb_guru');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }

    // update guru
    public function update_guru() {
		$a  =  $this->input->post('nama_guru');
		$b  =  $this->input->post('username');
		$c  =  $this->input->post('email');
		$d  =  $this->input->post('password');
		$e  =  $this->input->post('status');
		$f  =  $this->input->post('id_guru');

		$arr = array(
				'nama_guru' => $a,
				'username' => $b,
				'email'=> $c,
				'password' => $d,
				'status' => $e,
				'id_guru' => $f
			);
		$this->db->where('id_guru', $f);
		return $this->db->update('tb_guru', $arr);
	}

	// fungsi delete guru
	public function delete_guru($id_guru) {
		$this->db->where('id_guru', $id_guru);
        $this->db->set('status', '0');
        $this->db->update('tb_guru');
	}

	// fungsi filter coba
	public function filter_mapel_bab($mapel) {
    	$this->db->distinct();
		$this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel, b.id_mapel, b.judul_bab');
		$this->db->from('tb_mata_pelajaran m');
		$this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
		$this->db->where('b.id_mapel', $mapel);
		 
		$query = $this->db->get();
		return $query->result_array();
    }

    public function getmapel()
	{
		return $this->db->get('tb_mata_pelajaran');
	}

}

 ?>