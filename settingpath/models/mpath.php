<?php 



/**
 * 
 */
 class mpath extends CI_Model
 {

 	// get mapel 
	function getmapel(){
	$this->db->order_by('nama_mapel','ASC');
	$this->db->where('status = 1');
	$provinces= $this->db->get('tb_mata_pelajaran');

	return $provinces->result_array();
	}

   // get settting path
	function getpart2($id){

		$bab="";
		$n=1;

		$this->db->select('nilai_awal, nilai_akhir, jumlah');
		$this->db->from('tb_setting_path');
		$this->db->where('id_mapel', $id);
		$kab= $this->db->get();
		if ($kab->result_array()==array()) {

		} else {
			foreach ($kab->result_array() as $data ){
			// $kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
			$bab.= "
				<div class=form-group>
					<label class=col-sm-2>$data[nilai_awal]% - $data[nilai_akhir] % </label>
					<div class=col-sm-2>
						<input class=form-control name=jumlah$n id=jj$n value=$data[jumlah] onkeyup=valid() />
					</div>
					<label class=col-sm-2>Jumlah Soal</label>
					<div class=col-sm-2>
						<select class=form-control name=jmlh_soal$n id=jmlh_soal$n onchange=totalin()>
							<option value=0>Pilih</option>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                            <option value=5>5</option>
                        </select>
					</div>
					<label class=col-sm-2>Total</label>
					<div class=col-sm-4>
						<label id=ntotal$n> </label>
						
					</div>

				</div>
					";
			$n++;
			}
		}

		return $bab;

	}

	// get jumlah bab
	function getbab2($id){

		$bab="";
		$this->db->select('judul_bab, count(judul_bab) as jumlah_bab');
		$this->db->from('tb_bab');
		$this->db->where('id_mapel', $id);
		
		$kab= $this->db->get();
		foreach ($kab->result_array() as $data ){
		// $kabupaten.= "<option value='$data[id_bab]'>$data[judul_bab]</option>";
		$bab.= "<p>Jumlah Bab $data[jumlah_bab]</p>
				<input type=text id=jml_bab name=jml_bab value=$data[jumlah_bab] hidden />
		";

		}

		return $bab;

	}

	// get settingpath 
	function get_set_path(){
		$this->db->distinct();
		$this->db->select('*');
        $this->db->from('tb_setting_path');
		$tampil=$this->db->get();
		return $tampil->result_array();
	}

	// update setting path 
	public function update_path($data) {
        $this->db->where('id_mapel',$data['id_mapel']);
        $this->db->update_batch('tb_setting_path', $data['path'], 'nilai_awal');
        // redirect('login');	
    }

    // pengecekan mapel
	function cekmapel($id){
		$this->db->distinct();
		$this->db->select('id_mapel');
        $this->db->from('tb_setting_path');
        $this->db->where('id_mapel', $id);
		
        $this->db->limit(1);



        $query = $this->db->get();

        if ($query->num_rows() == 1) {

            return $query->result(); //if data is true

        } else {

            return false; //if data is wrong

        }
	}

	// insert ke tabel 
	function insert_path($data){
		$this->db->insert_batch( 'tb_setting_path', $data['path']);		
	}

	// insert ke tabel 
	function insert_simulasi_part2($data){
		$this->db->insert_batch( 'tb_part2', $data );		
	}

	// cek jumlah bab
	function cekbab($id){
		$this->db->distinct();
		$this->db->select('count(b.id_bab) as jmlh_bab');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_bab b', 'm.id_mapel=b.id_mapel');
        $this->db->where('m.id_mapel', $id);
		$tampil=$this->db->get();
		return $tampil->result_array();
	}

	// update setting path 
	public function update_status_path($data) {
		$arr = array(
			'status'=> $data
		);

        $this->db->where('id =1');
        $this->db->update('tb_status_path', $arr);
    }

 }

?>