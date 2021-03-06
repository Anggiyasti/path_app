<?php 
/**
* 
*/
class Materi extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mmateri');
		$this->load->library('parser');
		$this->load->helper(array('form', 'url', 'file', 'html'));
        $this->load->library('form_validation');
	}

	function ambil_data(){
      //fungsi ambil data unruk dropdown
    $modul=$this->input->post('modul');
    $id=$this->input->post('id');

    if($modul=="getbab"){
    echo $this->Mmateri->getbab($id);
  }
  }

	// Menampilkan form materi
	public function form_materi()
	{
	$data['mapel']=$this->Mmateri->getmapel();
		if ($this->session->userdata('id_admin')) {

    	$this->load->view('admin/layout/header');
        // $this->load->view('layout/nav');
        $this->load->view('v-form-materi',$data);
        $this->load->view('admin/layout/footer');
    }
      //hak akses jika guru

      elseif ($this->session->userdata('id_guru')) {
    	$this->load->view('guru/layout/header');
        $this->load->view('v-form-materi',$data);
        $this->load->view('guru/layout/footer');
    }
	}

	// upload materi
	public function uploadMateri()
	{

		
		$judulMateri=htmlspecialchars($this->input->post('judul'));
		$id_bab = htmlspecialchars($this->input->post('id_bab'));
		$isiMateri = $this->input->post('editor1');
		$publish= htmlspecialchars($this->input->post('stpublish'));
 		if ($this->session->userdata('id_admin')) {
 		$penggunaID = $this->session->userdata['id_admin'];
 		}
 		elseif ($this->session->userdata('id_guru')) {
 		$penggunaID = $this->session->userdata['id_guru'];
 		}
 		$UUID = uniqid();
		$datMateri=array(
						'judulMateri'=>$judulMateri,
						'isiMateri'=>$isiMateri,
						'id_bab'=>$id_bab,
						'penggunaID'=>$penggunaID,
						'publish'=>$publish,
						'UUID'=>$UUID);

		// var_dump($datMateri);
		$this->Mmateri->in_materi($datMateri);
		redirect(site_url('materi/list_all_materi'));
	}

	// tampil list materi
	public function list_all_materi ()
	{
		if ($this->session->userdata('id_admin')) {

    $this->load->view('admin/layout/header');
        // $this->load->view('layout/nav');
        $this->load->view('v-all-materi.php');
        $this->load->view('admin/layout/footer');
    }
      //hak akses jika guru

      elseif ($this->session->userdata('id_guru')) {
    	$this->load->view('guru/layout/header');
        $this->load->view('v-all-materi.php');
        $this->load->view('guru/layout/footer');
    }
    else{
    	redirect("");
    }
		
	}
	// get ajax list materi
	public function ajax_get_all_materi()
	{
		$materi= $this->load->Mmateri->get_all_materi();
        $data = array();
        //mengambil nilai list
        $baseurl = base_url();
        $no='1';
        foreach ( $materi as $list_materi ) {
            $n='1';
            
            $row = array();
            if ($list_materi['publish']=='1') {
              $publish='Publish';
            }else{
              $publish='Tidak Publish';
            }
            $row[] = $no;
            $row[] = $list_materi['judulMateri'];
            $row[] =$list_materi['nama_mapel'];
            $row[] =$list_materi['judul_bab'];
            $row[] =$list_materi['isiMateri'];
            $row[] =$list_materi['tgl'];
            $row[] =  $publish;
            $row[] = '  <a class="btn btn-sm btn-primary btn-outline detail-'.$list_materi['materiID'].'"  title="Lihat"
              data-id='."'".json_encode($list_materi)."'".'
              onclick="detail('."'".$list_materi['materiID']."'".')"
              >
              <i class=" ico-eye "></i>
                </a> 
              <a class="btn btn-sm btn-warning" href="materi/form_update_materi/'.$list_materi['UUID'].'"  title="Ubah Video"
              )"
              >
              <i class="ico-file5"></i>
              </a> 
              <a class="btn btn-sm btn-danger"  
              title="Hapus" onclick="drop_materi('."'".$list_materi['UUID']."'".')">
              <i class="ico-remove"></i></a> 
               ';
          
         

          $data[] = $row;
          $n++;
          $no++;

        }

        $output = array(
            "data"=>$data,
            );
        echo json_encode( $output );
	}

	// menampilkan  form update materi
	public function form_update_materi($UUID)
	{
		$data['singleMateri']=$this->Mmateri->get_single_materi($UUID);
		// $subBabID = $data['singleMateri'] ['subBabID'];
		$data['infomateri']=$this->Mmateri->get_tingkat_info($UUID);
		if ($this->session->userdata('id_admin')) {

    $this->load->view('admin/layout/header');
        // $this->load->view('layout/nav');
        $this->load->view('v-update-materi',$data);
        $this->load->view('admin/layout/footer');
    }
      //hak akses jika guru

      elseif ($this->session->userdata('id_guru')) {
    	$this->load->view('guru/layout/header');
        $this->load->view('v-update-materi',$data);
        $this->load->view('guru/layout/footer');
    }
	}

	// update materi
	public function updateMateri()
	{	
		$data['UUID'] = $this->input->post('UUID');
		$judulMateri=htmlspecialchars($this->input->post('judul'));
		$isiMateri = $this->input->post('editor1');
		$publish= htmlspecialchars($this->input->post('stpublish'));
 		if ($this->session->userdata('id_admin')) {
 		$penggunaID = $this->session->userdata['id_admin'];
 		}
 		elseif ($this->session->userdata('id_guru')) {
 		$penggunaID = $this->session->userdata['id_guru'];
 		}
		$data['datMateri']=array(
						'judulMateri'=>$judulMateri,
						'isiMateri'=>$isiMateri,
						'penggunaID'=>$penggunaID,
						'publish'=>$publish);

		
		$this->Mmateri->ch_materi($data);
		redirect(site_url('materi/list_all_materi'));
	}

	public function del_materi($UUID)
	{
		$this->Mmateri->drop_materi($UUID);
	}
}
?>