<?php 

/**
* 
*/
class Mgrafik extends CI_Model
{
	// get mapel
	public function getdaftarmapel(){
    	$this->db->distinct();
		$this->db->select()->from('tb_mata_pelajaran');
		$this->db->where('status = 1');
		$tampil=$this->db->get();
		return $tampil->result_array();
    }
    // get mapel dan bab
    public function get_mapel_bab($mapel) {
        $this->db->distinct();
        $this->db->select('m.id_mapel, m.nama_mapel, m.alias_mapel, b.id_mapel, b.id_bab, b.judul_bab');
        $this->db->from('tb_mata_pelajaran m');
        $this->db->join('tb_bab b', 'm.id_mapel = b.id_mapel');
        $this->db->where('m.nama_mapel', $mapel);
        // $this->db->select('id_bab, judul_bab, id_mapel');
        // $this->db->from('tb_bab');
        // $this->db->where('id_mapel', $mapel);
         
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_greport($bab){
        $query = "SELECT m.nama_mapel, b.judul_bab, ROUND((SUM( sub_score ) / sum(total)) * 100) AS score, SUM( total ) AS total 
        FROM tb_grafik_report as g 
        RIGHT JOIN tb_bab as b
        ON  g.id_bab = b.id_bab
        JOIN tb_mata_pelajaran as m
        ON b.id_mapel = m.id_mapel
        WHERE g.id_bab ='$bab'";

        // $this->db->select('*, bab.judul_bab, pel.nama_mapel');
        // $this->db->from('tb_latihan latihan');
        // $this->db->join('tb_report_latihan report',
        //     'latihan.id_latihan=report.id_latihan');
        // $this->db->join('tb_bab bab',
        //     'latihan.id_bab=bab.id_bab');
        // $this->db->join('tb_mata_pelajaran pel',
        //     'pel.id_mapel=bab.id_mapel');
        // $this->db->where('create_by', $createdby);
        // $this->db->where('bab.id_mapel', $mapel);
        // $this->db->order_by('tgl_pengerjaan', 'asc');
        // $query = $this->db->get();
        $result = $this->db->query($query);
        return $result->result_array();

    }


    // get data buat grafik bar
    public function chart_model($data)
    {
        $query = "SELECT m.nama_mapel, b.judul_bab, g.total as tot, ROUND(SUM(g.sub_score) / SUM(g.total) * 100) AS score_grafik, SUM( total ) AS total 
            FROM tb_grafik_report as g 
            RIGHT JOIN tb_bab as b
            ON  g.id_bab = b.id_bab
            JOIN tb_mata_pelajaran as m
            ON b.id_mapel = m.id_mapel
            WHERE m.nama_mapel = '$data' group by g.id_bab order by b.judul_bab asc";
        $result = $this->db->query($query);
        return $result->result_array();
    }

   
}

 ?>