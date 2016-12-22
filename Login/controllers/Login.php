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
        $this->load->view('template/header');
        $this->load->view('template/sidebar-login');
        $this->load->view('form_login');
        // $this->load->view('layout/footer');
		// $this->load->view('v-login2');
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

                    

                    
                redirect('Login/cek_login_siswa');
                }  
        }   elseif ($guru = $this->Loginmodel->login_guru($username,$password)) {
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

                  
                redirect('guru');
                }  
            
        }
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
                $admin = $this->Loginmodel->get_admin($this->session->userdata['id_admin']);

                   
                redirect('admin');
                } 

            
        }

        else {
            $this->session->set_flashdata('pesan2', 'Username atau password salah');
    //      $this->session->set_userdata('is_logged_in', false);
            redirect('Login');
           
        // }
        }}
    function cek_login_siswa(){

       if ($this->session->userdata('id_siswa')) {
      
            $this->load->view('siswa/layout/header');
            $this->load->view('siswa/layout/sidebar');
            $this->load->view('siswa/layout/nav');
        }
        else{
            redirect('Login');
        }
    }
    function cek_login_guru(){
        if ($this->session->userdata('id_guru')) {
        $data['mapel']  = $this->Loginmodel->getMapel();
        $this->load->view('guru/layout/header',$data);
        $this->load->view('guru/layout/nav');
        $this->load->view('guru/layout/footer');
    }
    else{
            redirect('Login');
        }


}

    function logout_siswa(){
        $this->session->unset_userdata("id_siswa");

        $this->session->unset_userdata("username");

        $this->session->sess_destroy();



        // $this->session->set_flashdata('notif', ' Terimakasih sudah belajar bersama kami');

        redirect(site_url('login'));
    }
     function logout_guru(){
      
        $this->session->unset_userdata("id_guru");

        $this->session->unset_userdata("username");

        $this->session->sess_destroy();



        // $this->session->set_flashdata('notif', ' Terimakasih sudah belajar bersama kami');

        redirect(site_url('login'));
    }

    function logout_admin(){
      
        $this->session->unset_userdata("id_admin");

        $this->session->unset_userdata("username");
        $this->session->unset_userdata("status");

        $this->session->sess_destroy();



        // $this->session->set_flashdata('notif', ' Terimakasih sudah belajar bersama kami');

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

                    // $guru = $this->Mlogin->cekGuru($this->session->userdata['id']);

                    foreach ($siswa as $value) {

                        $this->session->set_userdata('id_siswa', $value->id_siswa);

                    }

                    redirect(site_url('guru/dashboard/'));

                // } elseif ($hakAkses == 'siswa') {

                //     redirect(site_url('welcome'));

                // } elseif ($hakAkses == 'user') {

                //      redirect(site_url('welcome'));

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