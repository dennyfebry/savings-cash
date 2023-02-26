<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_login' , 'loginModel');
	}
	public function index()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$check_login = $this->loginModel->checkLogin($username, $password);

			if($check_login->num_rows() > 0){
				$row = $check_login->row(1);
				$data = array(
					'username'    	=> $row->username,
					'login'			=> true,
				);
				$this->session->set_userdata($data);
				redirect('Home');
			}else{
				$this->session->set_flashdata('danger', 'Username / Password anda salah');
				redirect('Login');
			}
			die();
		}
		$this->load->view('login');
	}
}
