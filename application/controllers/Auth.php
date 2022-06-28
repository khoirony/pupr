<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('crud');
	}

	public function index()
    {
		// $this->session->sess_destroy();
        $data['title'] = 'PUPR SNVT PJPA';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('auth/header', $data);
        $this->load->view('auth/index', $data);
		$this->load->view('auth/footer', $data);
    }

	public function login()
	{
		if ($this->session->userdata('role') == 1) {
			redirect('admin');
		}else if ($this->session->userdata('role') == 2){
			redirect('admin');
		}else if ($this->session->userdata('role') == 3){
			redirect('auth');
		}
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/footer', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if ($user) {
			if ($password == $user['password']) {
				$data = [
					'username' => $user['username'],
					'role' => $user['role']
				];
				$this->session->set_userdata($data);

				if($user['role'] == 1){
					redirect('admin');
				}else if($user['role'] == 2){
					redirect('admin');
				}else{
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Username is not registered!</div>');
			redirect('auth/login');
		}
	}

	public function registrasipegawai()
	{
		if ($this->session->userdata('role') == 1) {
			redirect('admin');
		}else if ($this->session->userdata('role') == 2){
			redirect('admin');
		}else if ($this->session->userdata('role') == 3){
			redirect('auth');
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->input->post('username')])->row_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/registrasipegawai');
			$this->load->view('auth/footer', $data);
		} else {
			if ($user) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Username already registered!</div>');
				redirect('auth/registrasipegawai');
			}else{
				$data = [
					'username' => htmlspecialchars($this->input->post('username', true)),
					'nip' => htmlspecialchars($this->input->post('nip', true)),
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
					'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
					'image' => 'default.jpg',
					'password' => htmlspecialchars($this->input->post('password1', true)),
					'role' => 2
				];
	
				$this->crud->input_data($data,'user');
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
				redirect('auth/login');
			}
		}
	}

	public function registrasipengunjung()
	{
		if ($this->session->userdata('role') == 1) {
			redirect('admin');
		}else if ($this->session->userdata('role') == 2){
			redirect('admin');
		}else if ($this->session->userdata('role') == 3){
			redirect('auth');
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->input->post('username')])->row_array();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('auth/header', $data);
			$this->load->view('auth/registrasipengunjung');
			$this->load->view('auth/footer', $data);
		} else {
			if ($user) {
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Username already registered!</div>');
				redirect('auth/registrasipengunjung');
			}else{
				$data = [
					'username' => htmlspecialchars($this->input->post('username', true)),
					'image' => 'default.jpg',
					'password' => htmlspecialchars($this->input->post('password1', true)),
					'role' => 3
				];
	
				$this->crud->input_data($data,'user');
				$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
				redirect('auth/login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');

		redirect('auth');
	}

	public function profile()
    {
        $data['title'] = 'Profile Struktur Organisasi';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$this->load->view('auth/header', $data);
        $this->load->view('auth/profile', $data);
		$this->load->view('auth/footer', $data);
    }

	public function bidang()
    {
        $data['title'] = 'Data Bidang Tanah';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

		$this->load->view('auth/header', $data);
        $this->load->view('auth/bidang', $data);
		$this->load->view('auth/footer', $data);
    }

	public function kegiatan()
    {
        $data['title'] = 'Data Kegiatan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$data['kegiatan'] = $this->db->get('kegiatan')->result_array();

		$this->load->view('auth/header', $data);
        $this->load->view('auth/kegiatan', $data);
		$this->load->view('auth/footer', $data);
    }

	public function lokasi()
    {
        $data['title'] = 'Peta Lokasi Bidang Tanah';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$this->load->view('auth/header', $data);
        $this->load->view('auth/lokasi', $data);
		$this->load->view('auth/footer', $data);
    }

	public function cetakbidang()
    {
		$data['title'] = 'Data Bidang Tanah';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

		$this->load->view('auth/cetakbidang', $data);
	}

	public function excelbidang()
    {
		$data['title'] = 'Data Bidang Tanah';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

		$this->load->view('auth/excelbidang', $data);
	}

	public function cetakkegiatan()
    {
		$data['title'] = 'Data Kegiatan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$data['kegiatan'] = $this->db->get('kegiatan')->result_array();

		$this->load->view('auth/cetakkegiatan', $data);
	}

	public function excelkegiatan()
    {
		$data['title'] = 'Data Kegiatan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $user;

		$data['kegiatan'] = $this->db->get('kegiatan')->result_array();

		$this->load->view('auth/excelkegiatan', $data);
	}
}
