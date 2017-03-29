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
         
        $query = $this->db->get();
        return $query->result_array();
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

    // get total grafik report
    public function hitung_total($mapel)
    {
        $query = "select g.nama_mapel, sum(g.score_grafik) as total_grafik from (SELECT m.nama_mapel, b.judul_bab, g.total as tot, ROUND(SUM(g.sub_score) / SUM(g.total) * 100) AS score_grafik, SUM( total ) AS total FROM tb_grafik_report as g LEFT JOIN tb_bab as b ON g.id_bab = b.id_bab JOIN tb_mata_pelajaran as m ON b.id_mapel = m.id_mapel WHERE m.nama_mapel = '$mapel' group by g.id_bab order by b.judul_bab asc) as g";

         $result = $this->db->query($query);
        return $result->result_array();

    }
    // get jumlah bab
    public function hitung_bab($mapel)
    {
        $query = "select count(tb_baru.id_bab) as jumlah, tb_baru.nama_mapel from (SELECT g.id_bab, b.judul_bab, m.nama_mapel FROM tb_grafik_report g
            join tb_bab b on g.id_bab = b.id_bab
            join tb_mata_pelajaran m on b.id_mapel = m.id_mapel
            where m.nama_mapel='$mapel'
            group by g.id_bab) as tb_baru
            ";
    $result = $this->db->query($query);
        return $result->result_array();
    }

   

   
}

 ?>