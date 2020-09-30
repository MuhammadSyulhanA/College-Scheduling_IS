<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akses extends CI_Controller{

	public function __construct(){
        parent::__construct();
		$this->load->model(array(
					'm_user',
					'm_jadwalpelajaran'
		));
	}

	 function Index(){
		$this->load->view("login");
	}

	function ActLogin(){
		$username = $_POST['username'];
        $password = $_POST['password'];
        $securepass = sha1(md5($password));
		//$cek_login_aktif = $this->m_jadwalpelajaran->get("nama='$username' and password='$password' and status='Y'");
		//$data['rs_jadwal'] = $this->m_jadwalpelajaran->get();
		$cek_login_aktif = $this->m_user->GetUser("username = '$username' and pass = '$securepass' and status='Y'")->num_rows();
        $tampil_aktif = $this->m_user->GetUser("username = '$username' and pass = '$securepass' and status='Y'")->row_array();
        $cek_login_tidak_aktif = $this->m_user->GetUser("username = '$username' AND pass = '$securepass' and status='N'")->num_rows();
        $tampil_tidak_aktif = $this->m_user->GetUser("username = '$username' AND pass = '$securepass' and status='N'")->row_array();
        if ($cek_login_aktif == 1) {
            $this->session->set_userdata('ses_id',$tampil_aktif['id']);
            $this->session->set_userdata('ses_nama', $tampil_aktif['username']);
            $this->session->set_userdata('ses_status', $tampil_aktif['status']);
            $this->session->set_userdata('ses_level', $tampil_aktif['level']);
            redirect('web');
        }else{
            if ($cek_login_tidak_aktif == 1) {
                $this->session->set_userdata('ses_id',$tampil_tidak_aktif['id']);
                $this->session->set_userdata('ses_nama', $tampil_tidak_aktif['username']);
                $this->session->set_userdata('ses_status', $tampil_tidak_aktif['status']);
                $this->session->set_userdata('ses_level', $tampil_tidak_aktif['level']);
                redirect('login');
            }else{
                $this->session->set_flashdata("validasiLogin", "<script>alert('Tidak Ada Akun Yang Sesuai, Silahkan Periksa Kembali')</script>");
                header('location:'.base_url());
            }
        }
    }

	function render_view($data){
      $this->load->view('page',$data);
	}
	
	
    public function bersih($teks) {
        return mysqli_real_escape_string($teks);
    }

    function LogApp(){
    	 $this->session->unset_userdata('ses_id');
        $this->session->unset_userdata('ses_nama');
        $this->session->unset_userdata('ses_status');
        $this->session->unset_userdata('ses_level');
        redirect(base_url()."login");
    }
}

