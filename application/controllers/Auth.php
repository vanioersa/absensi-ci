<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_model');
	}
	public function index()
	{
		$this->load->view('auth/login');
	}

	public function fungsi_login()
	{

		$email = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		$data = ['email' => $email,];
		$query = $this->m_model->getwhere('user', $data);
		$result = $query->row_array();

		if (!empty($result) && md5($password) === $result['password']) {
			$data = [
				'loged_in' => TRUE,
				'email'    => $result['email'],
				'username' => $result['username'],
				'role'     => $result['role'],
				'id'       => $result['id'],
			];
			$this->session->set_userdata($data);
			if ($this->session->userdata('role') == 'admin') {
				redirect(base_url() . "admin");
			} elseif ($this->session->userdata('role') == 'karyawan') {
				redirect(base_url() . "karyawan");
			} else {
				redirect(base_url() . "auth");
			}
		} else {
			redirect(base_url() . "auth");
		}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('auth'));
	}
	public function register() 
	{
		$this->load->view('auth/register');
	}

	public function aksi_register()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        // $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if (!$number || strlen($password) < 8) {
            $this->session->set_flashdata('eror', 'gagal register');
            redirect('auth/register');
        } else {
            $kode_pass = md5($password);
            $data = array(
                "username" => $username,
                "email" => $email,
                "nama_depan" => $nama_depan,
                "nama_belakang" => $nama_belakang,
                "password" => $kode_pass,
                "role" => $role,
            );
            $this->m_model->register($username, $email, $nama_depan, $nama_belakang, $password, $role, $data);
            redirect('auth');
        }
    }

	public function registeri() 
	{
		$this->load->view('auth/registeri');
	}

	public function aksi_registeri()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        // $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if (!$number || strlen($password) < 8) {
            $this->session->set_flashdata('eror', 'gagal register');
            redirect('auth/registeri');
        } else {
            $kode_pass = md5($password);
            $data = array(
                "username" => $username,
                "email" => $email,  
                "password" => $kode_pass,
                "nama_depan" => $nama_depan,
                "nama_belakang" => $nama_belakang,
                "role" => $role,
            );
            $this->m_model->registeri($username, $email, $nama_depan, $nama_belakang, $password, $role, $data);
            redirect('auth');
        }
    }

	public function registerii() 
	{
		$this->load->view('auth/registerii');
	}

	public function aksi_registerii()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        // $uppercase = preg_match('@[A-Z]@', $password);
        // $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if (!$number || strlen($password) < 8) {
            $this->session->set_flashdata('eror', 'gagal register');
            redirect('auth/registerii');
        } else {
            $kode_pass = md5($password);
            $data = array(
                "username" => $username,
                "email" => $email,  
                "password" => $kode_pass,
                "nama_depan" => $nama_depan,
                "nama_belakang" => $nama_belakang,
                "role" => $role,
            );
            $this->m_model->registerii($username, $email, $nama_depan, $nama_belakang, $password, $role, $data);
            redirect('auth');
        }
    }
}
