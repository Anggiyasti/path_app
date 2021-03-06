<?php 

/**
* 
*/
class Login extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Loginmodel');
        $this->load->model('Workout1/Mworkout1');

		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'email'));
        $this->load->library('session');
		$this->load->database();
        
       if ($this->session->userdata('is_logged_in')==TRUE) {

            if ($this->session->userdata('email')=='id_admin'){

               redirect('admin');

            }else if($this->session->userdata('email')=='id_guru'){

               redirect('guru');

            }else if($this->session->userdata('email')=='id_siswa'){

               redirect('Login/cek_login_siswa');

            }else{

               
            }

    }

    }

	public function index()
	{
        if ($this->session->userdata('id_admin')){
            redirect('admin');

        }
        else if ($this->session->userdata('id_guru')){
            redirect('guru');

        }
        else if ($this->session->userdata('id_siswa')){
            redirect('login/cek_login_siswa');

        }
        else{
        $this->load->view('layout_login/header');
        $this->load->view('login_form');
        $this->load->view('layout_login/footer');
	
    }
	}

// fungsi untuk login yang dipake
    public function login_user()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5($this->input->post('password'));

        $siswa = $this->Loginmodel->login_user($username,$password);
        $guru = $this->Loginmodel->login_guru($username,$password);
        $admin = $this->Loginmodel->login_admin($username,$password);       
        
            // memeriksa jika yang login adalah siswa
            if ($siswa = $this->Loginmodel->login_user($username,$password)) {
                $sees_data= array();
                foreach ($siswa as $row) {
                    $sees_data = array(
                    'id_siswa' => $row->id_siswa,
                    'username' => $row->nama_depan,
                    'email' => $row->email,
                    'status' => $row->status,
                    'is_logged_in' => TRUE,
                );
                $this->session->set_flashdata('pesan1', 'Logged in Successfully');
                $this->session->set_userdata($sees_data);
                $siswa = $this->Loginmodel->get_siswa($this->session->userdata['id_siswa']);

                    

                    
                redirect('login/cek_login_siswa');
                }  
        } // memeriksa jika yang login adalah guru  
        elseif ($guru = $this->Loginmodel->login_guru($username,$password)) {
                $sees_data= array();
                foreach ($guru as $row) {
                    $sees_data = array(
                    'id_guru' => $row->id_guru,
                    'username' => $row->username,
                    'email' => $row->email,
                    'is_logged_in' => TRUE,
                );
                    # code...
                $this->session->set_flashdata('pesan1', 'Logged in Successfully');
                $this->session->set_userdata($sees_data);
                $guru = $this->Loginmodel->get_guru($this->session->userdata['id_guru']);

                  
                redirect('cek_login_guru');
                }  
            
        }
        // memeriksa jika yang login adalah admin
        elseif ($admin = $this->Loginmodel->login_admin($username,$password)) {
                $sees_data= array();
                foreach ($admin as $row) {
                    $sees_data = array(
                    'id_admin' => $row->id_admin,
                    'username' => $row->username,
                    'status' => $row->status,
                    'is_logged_in' => TRUE,
                );
                    # code...
                $this->session->set_flashdata('pesan1', 'Logged in Successfully');
                $this->session->set_userdata($sees_data);
               

                   
                redirect('cek_login_admin');
                } 

            
        }
        //ketika user dan pass tidak terdafatar
        else {
            $this->session->set_flashdata('pesan2', 'Username atau password salah');
            redirect('Login');
           
      
        }}

    //fungsi tampil home ketika login siswa
    function cek_login_siswa(){
        //hak akses jika siswa
       if ($this->session->userdata('id_siswa')) {
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
         //get nilai tertinggi
        $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
        $data['log']  = $this->Loginmodel->getlogact();
        $data['jur']  = $this->Loginmodel->get_siswa($sis)[0]->jurusan_pelajaran;
        $data['status']  = $this->Loginmodel->get_siswa($sis)[0]->status_path;
        //get tampil foto slide 
        $data['data']= $this->Loginmodel->tampilphoto();
        $data['dataa']= $this->Loginmodel->tampilphoto2(); 
        $data['dataaa']= $this->Loginmodel->tampilphoto3();   
            $this->load->view('template/siswa2/v-header',$data);
            $this->load->view('siswa/home2',$data);
            $this->load->view('template/siswa2/v-footer');
        }
        else{
            redirect('Login');
        }
    }

    //fungsi untuk halaman artikel 
    function tampil_article($id){

       if ($this->session->userdata('id_siswa')) {
        $sis = $this->session->userdata('id_siswa');
        $data['siswa']  = $this->Loginmodel->get_siswa($sis);
        $data['nilai'] = $this->Mworkout1->nilai_tertinggi();
        $data['log']  = $this->Loginmodel->getlogact();
        $data['data']= $this->Loginmodel->tampilarticle($id);


            $this->load->view('template/siswa2/v-header',$data);
            $this->load->view('siswa/v-article',$data);
            $this->load->view('template/siswa2/v-footer');
            

        }
        else{
            redirect('Login');
        }
    }

    //fungsi tampil home ketika login guru  
    function cek_login_guru(){
        if ($this->session->userdata('id_guru')) {
        $data['mapel']  = $this->Loginmodel->getMapel();
        $this->load->view('guru/layout/header');
        $this->load->view('guru/layout/nav',$data);
        $this->load->view('guru/layout/footer');
    }
    else{
            redirect('Login');
        }


}
//fungsi tampil home ketika login admin  
function cek_login_admin(){
        if ($this->session->userdata('id_admin')) {
        
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/nav');
        $this->load->view('admin/layout/footer');
    }
    else{
            redirect('Login');
        }


}
    //fungsi logout siswa
    function logout_siswa(){
        $this->session->unset_userdata("id_siswa");

        $this->session->unset_userdata("username");

        $this->session->sess_destroy();


        redirect(site_url('login'));
    }

    //fungsi logout guru
     function logout_guru(){
      
        $this->session->unset_userdata("id_guru");

        $this->session->unset_userdata("username");

        $this->session->sess_destroy();


        redirect(site_url('login'));
    }

    //fungsi logout admin
    function logout_admin(){
      
        $this->session->unset_userdata("id_admin");

        $this->session->unset_userdata("username");
        $this->session->unset_userdata("status");

        $this->session->sess_destroy();


        redirect(site_url('login'));
    }


    public function is_logged_in() {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in != true) {
            redirect('login');
            die();
        }
    }


    public function createSession($id) {


        if ($result = $this->Loginmodel->get_user($id)) {

            //variabelSession
            $sess_array = array();

            foreach ($result as $row) {

                //membuat session
                $sess_array = array(

                    'id_guru' => $row->id_guru,

                    'id_siswa' => $row->id_siswa,

                    'username' => $row->username,

                    'nama_depan' => $row->nama_depan,

                  

                );

                $this->session->set_userdata($sess_array);

                $guru = $this->Loginmodel->get_guru($this->session->userdata['id_guru']);
                $siswa = $this->Loginmodel->get_siswa($this->session->userdata['id_siswa']);


                if ($guru) {

                   foreach ($guru as $value) {

                        $this->session->set_userdata('id_guru', $value->id_guru);
                    }
                        redirect(site_url('guru/dashboard/'));

                } elseif ($siswa) {

                    foreach ($siswa as $value) {

                        $this->session->set_userdata('id_siswa', $value->id_siswa);

                    }

                    redirect(site_url('guru/dashboard/'));


                } else {

                    echo 'tidak ada hak akses';

                }

            }

            return TRUE;

        }

    }

    



// akhir fungsi yg dipake

   

}

?>