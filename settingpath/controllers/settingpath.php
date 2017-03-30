<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class settingpath extends MX_Controller {

	public function __construct() {
       parent::__construct();
        $this->load->helper('url');
        $this->load->model('mpath');
        $this->load->model('login/Loginmodel');
        $this->load->model('videoback/Videobackmodel');
        $this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
    }

    public function index()
    {
       $data['mapel']=$this->mpath->getmapel();
        $data['part2'] = $this->mpath->get_set_path();
      	if ($this->session->userdata('id_admin')) {
          	$this->load->view('admin/layout/header');
          	$this->load->view('v-part2', $data);
          	$this->load->view('admin/layout/footer');
	    } elseif ($this->session->userdata('id_guru')) {
	        $this->load->view('guru/layout/header');
	        $this->load->view('v-part2', $data);
	        $this->load->view('guru/layout/footer');
      } else {
        redirect('login');
    }

    // FUNGSI JUMLAH BAB 
    function get_jumlah_bab(){
      $id=$this->input->post('id');
      $data['part2'] = $this->mpath->get_set_path();
      if ($this->session->userdata('id_admin')) {
            $this->load->view('admin/layout/header');
            $this->load->view('v-part2', $data);
            $this->load->view('admin/layout/footer');
      } elseif ($this->session->userdata('id_guru')) {
          $this->load->view('guru/layout/header');
          $this->load->view('v-part2', $data);
          $this->load->view('guru/layout/footer');
      }
  }
    }

    // fungsi tampil bab di ajax
    function ambil_data2(){
      $id_mapel=$this->input->post('id');
      $data['id_mapel'] =$id_mapel;
         $data['path'] = array(
                     array(
                          'id_mapel' => $id_mapel,
                         'nilai_awal' => 0,
                         'nilai_akhir' => 25,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 25,
                         'nilai_akhir' => 30,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 30,
                         'nilai_akhir' => 35,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 35,
                         'nilai_akhir' => 40,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 40,
                         'nilai_akhir' => 45,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 45,
                         'nilai_akhir' => 50,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 50,
                         'nilai_akhir' => 55,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 55,
                         'nilai_akhir' => 60,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 60,
                         'nilai_akhir' => 65,
                         'jumlah' => 0,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 65,
                         'nilai_akhir' => 100,
                         'jumlah' => 0,
                         
                     )
                 );

        $modul=$this->input->post('modul');
        $id=$this->input->post('id');

        if($modul=="getbab"){
        // cek id_mapelnya dulu
          if ($result = $this->mpath->cekmapel($id_mapel)) {
            
          } else {
            $this->mpath->insert_path($data);
          }
        }
        
    }

    // FUNGSI TAMBAH SETTING PATH
    public function tambah_path()
    {
      $id_mapel = $this->input->post('id_mapel');
      $n1 = $this->input->post('jumlah1');
      $n2 = $this->input->post('jumlah2');
      $n3 = $this->input->post('jumlah3');
      $n4 = $this->input->post('jumlah4');
      $n5 = $this->input->post('jumlah5');
      $n6 = $this->input->post('jumlah6');
      $n7 = $this->input->post('jumlah7');
      $n8 = $this->input->post('jumlah8');
      $n9 = $this->input->post('jumlah9');
      $n10 = $this->input->post('jumlah10');

      $data['id_mapel'] = $id_mapel;
      // array untuk update
      $data['path'] = array(
                     array(
                          'id_mapel' => $id_mapel,
                         'nilai_awal' => 0,
                         'nilai_akhir' => 25,
                         'jumlah' => $n1,
                         'jumlah_soal' => $this->input->post('jmlh_soal1') + $n1
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 25,
                         'nilai_akhir' => 30,
                         'jumlah' => $n2,
                         'jumlah_soal' => $this->input->post('jmlh_soal2') + $n2
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 30,
                         'nilai_akhir' => 35,
                         'jumlah' => $n3,
                         'jumlah_soal' => $this->input->post('jmlh_soal3') + $n3
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 35,
                         'nilai_akhir' => 40,
                         'jumlah' => $n4,
                         'jumlah_soal' => $this->input->post('jmlh_soal4') + $n4
                          
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 40,
                         'nilai_akhir' => 45,
                         'jumlah' => $n5,
                         'jumlah_soal' => $this->input->post('jmlh_soal5') + $n5
                          
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 45,
                         'nilai_akhir' => 50,
                         'jumlah' => $n6,
                         'jumlah_soal' => $this->input->post('jmlh_soal6') + $n6
                        
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 50,
                         'nilai_akhir' => 55,
                         'jumlah' => $n7,
                         'jumlah_soal' => $this->input->post('jmlh_soal7') + $n7
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 55,
                         'nilai_akhir' => 60,
                         'jumlah' => $n8,
                         'jumlah_soal' => $this->input->post('jmlh_soal8') + $n8
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 60,
                         'nilai_akhir' => 65,
                         'jumlah' => $n9,
                         'jumlah_soal' => $this->input->post('jmlh_soal9') + $n9
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 65,
                         'nilai_akhir' => 100,
                         'jumlah' => $n10,
                         'jumlah_soal' => $this->input->post('jmlh_soal10') + $n10
                     )
                 );
      
      // cek jumlah bab
      $bab = $this->mpath->cekbab($id_mapel)[0]['jmlh_bab'];
      $total = $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10;

        
          // cek id_mapelnya dulu
          if ($result = $this->mpath->cekmapel($id_mapel)) {
            $this->mpath->update_path($data);
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Update</div>');
          redirect('settingpath');
          } else {
            $this->mpath->insert_path($data);
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Insert</div>');
          redirect('settingpath');
          }
    }

    // FUNGSI TAMBAH SERTTING PART 2
    public function tambahsimulasi() 
    {
        if ($this->input->post()) {
          $post = $this->input->post();
          // jika simulasi hanya 1
          $jml_to = $post['jmlh_to'];
        
          if ($jml_to == 1) {
            $param= array(
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>1, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal1'], 
                        "level"=>$post['level1']
                      )
                  );
            } else if ($jml_to == 2) {
             $param= array(
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>1, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal1'], 
                        "level"=>$post['level1']
                      ),
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>2, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal2'], 
                        "level"=>$post['level2']
                      )
                    );
            } else if ($jml_to == 3) {
              $param= array(
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>1, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal1'], 
                        "level"=>$post['level1']
                      ),
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>2, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal2'], 
                        "level"=>$post['level2']
                      ),
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>3, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal3'], 
                        "level"=>$post['level3']
                      )
                    );

            } else if ($jml_to == 4) {
              $param= array(
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>1, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal1'], 
                        "level"=>$post['level1']
                      ),
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>2, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal2'], 
                        "level"=>$post['level2']
                      ),
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>3, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal3'], 
                        "level"=>$post['level3']
                      ),
                    array(
                        "id_mapel"=>$post['id_mapel'],
                        "simulasi"=>4, 
                        "jmlh_to"=>$post['jmlh_to'], 
                        "jmlh_soal"=>$post['jmlh_soal4'], 
                        "level"=>$post['level4']
                      )
                    );

            } else  {
          
            $param= array(
                      array(
                          "id_mapel"=>$post['id_mapel'],
                          "simulasi"=>1, 
                          "jmlh_to"=>$post['jmlh_to'], 
                          "jmlh_soal"=>$post['jmlh_soal1'], 
                          "level"=>$post['level1']
                        ),
                      array(
                          "id_mapel"=>$post['id_mapel'],
                          "simulasi"=>2, 
                          "jmlh_to"=>$post['jmlh_to'], 
                          "jmlh_soal"=>$post['jmlh_soal2'], 
                          "level"=>$post['level2']
                        ),
                      array(
                          "id_mapel"=>$post['id_mapel'],
                          "simulasi"=>3, 
                          "jmlh_to"=>$post['jmlh_to'], 
                          "jmlh_soal"=>$post['jmlh_soal3'], 
                          "level"=>$post['level3']
                        ),
                      array(
                          "id_mapel"=>$post['id_mapel'],
                          "simulasi"=>4, 
                          "jmlh_to"=>$post['jmlh_to'], 
                          "jmlh_soal"=>$post['jmlh_soal4'], 
                          "level"=>$post['level4']
                        ),
                      array(
                          "id_mapel"=>$post['id_mapel'],
                          "simulasi"=>5, 
                          "jmlh_to"=>$post['jmlh_to'], 
                          "jmlh_soal"=>$post['jmlh_soal5'], 
                          "level"=>$post['level5']
                        )
                    );
        }
          $this->mpath->insert_simulasi_part2($param);
        }
        
    }

    public function cekdulu()
    {
      if ($this->input->post()) {
        $post = $this->input->post();
        $id_mapel = $this->input->post('id_mapel');
        // array untuk insert
        $data['path'] = array(
                     array(
                          'id_mapel' => $id_mapel,
                         'nilai_awal' => 0,
                         'nilai_akhir' => 25,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 25,
                         'nilai_akhir' => 30,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 30,
                         'nilai_akhir' => 35,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 35,
                         'nilai_akhir' => 40,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 40,
                         'nilai_akhir' => 45,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 45,
                         'nilai_akhir' => 50,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 50,
                         'nilai_akhir' => 55,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 55,
                         'nilai_akhir' => 60,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 60,
                         'nilai_akhir' => 65,
                         
                     ),
                     array(
                      'id_mapel' => $id_mapel,
                         'nilai_awal' => 65,
                         'nilai_akhir' => 100,
                         
                     )
                 );
        // cek id_mapelnya dulu
      if ($result = $this->mpath->cekmapel($id_mapel)) {
        $this->mpath->update_path($data);
        echo "update";
      } else {
        $this->mpath->insert_path($data);
        echo "insert";
      }
      }
    }

    // FUNGSI UNTUK VIEW FORM STATUS PATH
    public function stat_path()
    {

      if ($this->session->userdata('id_admin')) {
          $this->load->view('admin/layout/header');
          $this->load->view('v-status-path');
          $this->load->view('admin/layout/footer');
      } elseif ($this->session->userdata('id_guru')) {
          $this->load->view('guru/layout/header');
          $this->load->view('v-status-path');
          $this->load->view('guru/layout/footer');
      } else {
        redirect('login');
      }
      
    }
    // END

    // FUNGSI UNTUK UPDATE STATUS PATH
    public function update_stat_path()
    {
      if ($this->input->post()) {
        $post = $this->input->post();
        $status =$this->input->post('status');

        $this->mpath->update_status_path($status);
      }
    }
    // END/

}