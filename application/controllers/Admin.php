<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('crud');
	}

	public function index()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Dashboard';
		$data['active'] = 'dashboard';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['user'] = $user;

        $data['hitung_bidtan'] = $this->db->get('bidang_tanah')->num_rows();
        $data['hitung_lokasi'] = $this->db->get('lokasi')->num_rows();
        $data['hitung_pentan'] = $this->db->get('penilaian_tanah')->num_rows();
        $data['hitung_penhas'] = $this->db->get('penyerahan_hasil')->num_rows();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/index', $data);
		$this->load->view('admin/templates/footer', $data);
    }

	// ###### MENU PENETAPAN LOKASI ######

	public function penetapanlokasi()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

        $data['title'] = 'Penetapan Lokasi';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/penetapanlokasi', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpenlok()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

		$this->load->view('admin/laporan/penlok', $data);
    }

    public function cetakpenlok($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['penlok'] = $this->db->get_where('penetapan_lokasi', ['id_penlok' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpenlok', $data);
    }

    public function caripenlok()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required');
        $data['title'] = 'Penetapan Lokasi';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM penetapan_lokasi where id_penlok like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/penetapanlokasi', $data);
		$this->load->view('admin/templates/footer', $data);
    }

	public function tambahpenlok()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('kategori_pembangunan', 'Kategori Pembangunan', 'required');
        $this->form_validation->set_rules('rencana_pembangunan', 'Rencana Pembangunan', 'required');
        $this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'required');
        $this->form_validation->set_rules('nilai_anggaran', 'Nilai Anggaran', 'required');
        $this->form_validation->set_rules('tanggal_permohonan', 'Tanggal Permohonan', 'required');
        $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required');

        $data['title'] = 'Tambah Penetapan Lokasi';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/penetapanlokasi', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'kategori_pembangunan' => htmlspecialchars($this->input->post('kategori_pembangunan', true)),
                'rencana_pembangunan' => htmlspecialchars($this->input->post('rencana_pembangunan', true)),
                'sumber_anggaran' => htmlspecialchars($this->input->post('sumber_anggaran', true)),
                'nilai_anggaran' => htmlspecialchars($this->input->post('nilai_anggaran', true)),
                'tanggal_permohonan' => htmlspecialchars($this->input->post('tanggal_permohonan', true)),
                'nama_pemohon' => htmlspecialchars($this->input->post('nama_pemohon', true))
            ];

            $this->db->insert('penetapan_lokasi', $data);
            
            redirect('Admin/penetapanlokasi');
        }
    }

	public function editpenlok($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('kategori_pembangunan', 'Kategori Pembangunan', 'required');
        $this->form_validation->set_rules('rencana_pembangunan', 'Rencana Pembangunan', 'required');
        $this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'required');
        $this->form_validation->set_rules('nilai_anggaran', 'Nilai Anggaran', 'required');
        $this->form_validation->set_rules('tanggal_permohonan', 'Tanggal Permohonan', 'required');
        $this->form_validation->set_rules('nama_pemohon', 'Nama Pemohon', 'required');

        $data['title'] = 'Edit Penetapan Lokasi';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penlok'] = $this->db->get_where('penetapan_lokasi', ['id_penlok' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/penetapanlokasi', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'kategori_pembangunan' => htmlspecialchars($this->input->post('kategori_pembangunan', true)),
                'rencana_pembangunan' => htmlspecialchars($this->input->post('rencana_pembangunan', true)),
                'sumber_anggaran' => htmlspecialchars($this->input->post('sumber_anggaran', true)),
                'nilai_anggaran' => htmlspecialchars($this->input->post('nilai_anggaran', true)),
                'tanggal_permohonan' => htmlspecialchars($this->input->post('tanggal_permohonan', true)),
                'nama_pemohon' => htmlspecialchars($this->input->post('nama_pemohon', true))
            ];

			$this->db->set($data);
            $this->db->where('id_penlok', $id);
            $this->db->update('penetapan_lokasi');
            
            redirect('Admin/penetapanlokasi');
        }
    }

	public function hapuspenlok($id)
    {
        $where = array('id_penlok' => $id);
        $this->db->where($where);
        $this->db->delete('penetapan_lokasi');
        redirect('Admin/penetapanlokasi');
    }

	// ###### MENU LOKASI ######

	public function lokasi()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Lokasi';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['lokasi'] = $this->db->get('lokasi')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/lokasi', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function carilokasi()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Lokasi';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM lokasi where id_penlok like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/lokasi', $data);
		$this->load->view('admin/templates/footer', $data);
    }

	public function tambahlokasi()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data['title'] = 'Tambah Lokasi';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/lokasi', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'kabupaten_kota' => htmlspecialchars($this->input->post('kabupaten_kota', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'desa_kelurahan' => htmlspecialchars($this->input->post('desa_kelurahan', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $this->db->insert('lokasi', $data);
            
            redirect('Admin/lokasi');
        }
    }

	public function editlokasi($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $data['title'] = 'Edit Lokasi';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

		$data['lokasi'] = $this->db->get_where('lokasi', ['id_lokasi' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/lokasi', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'kabupaten_kota' => htmlspecialchars($this->input->post('kabupaten_kota', true)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
                'desa_kelurahan' => htmlspecialchars($this->input->post('desa_kelurahan', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_lokasi', $id);
            $this->db->update('lokasi');
            
            redirect('Admin/lokasi');
        }
    }

	public function hapuslokasi($id)
    {
        $where = array('id_lokasi' => $id);
        $this->db->where($where);
        $this->db->delete('lokasi');
        redirect('Admin/lokasi');
    }

	// ###### MENU PELAKSANA ######

	public function pelaksana()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pelaksana';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pelaksana'] = $this->db->get('pelaksana')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pelaksana', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpelaksana()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pelaksana'] = $this->db->get('pelaksana')->result_array();

		$this->load->view('admin/laporan/pelaksana', $data);
    }

    public function cetakpelaksana($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pelaksana'] = $this->db->get_where('pelaksana', ['id_pelaksana' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpelaksana', $data);
    }

    public function caripelaksana()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pelaksana';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM pelaksana where nama_pelaksana like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/pelaksana', $data);
		$this->load->view('admin/templates/footer', $data);
    }

	public function tambahpelaksana()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nip', 'NIP/NRP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('satgas', 'Satgas', 'required');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');

        $data['title'] = 'Tambah Pelaksana';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['kegiatan'] = $this->db->get('kegiatan')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/pelaksana', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_pegawai' => htmlspecialchars($this->input->post('nip', true)),
                'nama_pelaksana' => htmlspecialchars($this->input->post('nama', true)),
                'satgas' => htmlspecialchars($this->input->post('satgas', true)),
                'id_kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
            ];

            $this->db->insert('pelaksana', $data);
            
            redirect('Admin/pelaksana');
        }
    }

	public function editpelaksana($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nip', 'NIP/NRP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('satgas', 'Satgas', 'required');
        $this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');

        $data['title'] = 'Edit pelaksana';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pelaksana'] = $this->db->get_where('pelaksana', ['id_pelaksana' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/pelaksana', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_pegawai' => htmlspecialchars($this->input->post('nip', true)),
                'nama_pelaksana' => htmlspecialchars($this->input->post('nama', true)),
                'satgas' => htmlspecialchars($this->input->post('satgas', true)),
                'id_kegiatan' => htmlspecialchars($this->input->post('kegiatan', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_pelaksana', $id);
            $this->db->update('pelaksana');
            
            redirect('Admin/pelaksana');
        }
    }

	public function hapuspelaksana($id)
    {
        $where = array('id_pelaksana' => $id);
        $this->db->where($where);
        $this->db->delete('pelaksana');
        redirect('Admin/pelaksana');
    }

	// ###### MENU KEGIATAN ######

	public function kegiatan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Kegiatan';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['kegiatan'] = $this->db->get('kegiatan')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/kegiatan', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporankegiatan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['kegiatan'] = $this->db->get('kegiatan')->result_array();

		$this->load->view('admin/laporan/kegiatan', $data);
    }

    public function cetakkegiatan($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['kegiatan'] = $this->db->get_where('kegiatan', ['id_kegiatan' => $id])->row_array();

		$this->load->view('admin/laporan/cetakkegiatan', $data);
    }

    public function carikegiatan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Kegiatan';
		$data['active'] = 'perencanaan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		
		$query = "SELECT * FROM kegiatan where nomor_kegiatan like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/kegiatan', $data);
		$this->load->view('admin/templates/footer', $data);
    }

	public function tambahkegiatan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('nomor_kegiatan', 'Nomor Kegiatan', 'required');
        $this->form_validation->set_rules('rencana_penggunaan', 'Rencana Pembangunan', 'required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');

        $data['title'] = 'Tambah Kegiatan';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/kegiatan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
				'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'nomor_kegiatan' => htmlspecialchars($this->input->post('nomor_kegiatan', true)),
				'rencana_penggunaan' => htmlspecialchars($this->input->post('rencana_penggunaan', true)),
                'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                'desa_kelurahan' => htmlspecialchars($this->input->post('desa_kelurahan', true)),
				'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
				'kabupaten_kota' => htmlspecialchars($this->input->post('kabupaten_kota', true)),
            ];

            $this->db->insert('kegiatan', $data);
            
            redirect('Admin/kegiatan');
        }
    }

	public function editkegiatan($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('nomor_kegiatan', 'Nomor Kegiatan', 'required');
        $this->form_validation->set_rules('rencana_penggunaan', 'Rencana Pembangunan', 'required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten/Kota', 'required');

        $data['title'] = 'Edit Kegiatan';
		$data['active'] = 'perencanaan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['kegiatan'] = $this->db->get_where('kegiatan', ['id_kegiatan' => $id])->row_array();
        $data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/kegiatan', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
				'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'nomor_kegiatan' => htmlspecialchars($this->input->post('nomor_kegiatan', true)),
				'rencana_penggunaan' => htmlspecialchars($this->input->post('rencana_penggunaan', true)),
                'nama_kegiatan' => htmlspecialchars($this->input->post('nama_kegiatan', true)),
                'desa_kelurahan' => htmlspecialchars($this->input->post('desa_kelurahan', true)),
				'kecamatan' => htmlspecialchars($this->input->post('kecamatan', true)),
				'kabupaten_kota' => htmlspecialchars($this->input->post('kabupaten_kota', true)),
				'id_pelaksana' => '82391'
            ];

			$this->db->set($data);
            $this->db->where('id_kegiatan', $id);
            $this->db->update('kegiatan');
            
            redirect('Admin/kegiatan');
        }
    }

	public function hapuskegiatan($id)
    {
        $where = array('id_kegiatan' => $id);
        $this->db->where($where);
        $this->db->delete('kegiatan');
        redirect('Admin/kegiatan');
    }

	// ###### MENU BIDANG TANAH ######

	public function bidangtanah()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Bidang Tanah';
		$data['active'] = 'persiapan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/bidangtanah', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanbidtan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

		$this->load->view('admin/laporan/bidangtanah', $data);
    }

    public function cetakbidtan($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['bidtan'] = $this->db->get_where('bidang_tanah', ['id_bidang_tanah' => $id])->row_array();

		$this->load->view('admin/laporan/cetakbidtan', $data);
    }

    public function caribidtan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Bidang Tanah';
		$data['active'] = 'persiapan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM bidang_tanah where id_bidang_tanah like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/bidangtanah', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahbidtan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required');
        $this->form_validation->set_rules('nama_penggarap', 'Pemilik/Penggarap', 'required');
        $this->form_validation->set_rules('tipe_aset', 'Tipe Aset', 'required');
		$this->form_validation->set_rules('luas', 'Luas', 'required');
		$this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
		$this->form_validation->set_rules('pelepasan_bidang', 'Pelepasan Bidang', 'required');
        $this->form_validation->set_rules('perkiraan_dampak', 'Perkiraan Dampak', 'required');

        $data['title'] = 'Tambah Bidang Tanah';
		$data['active'] = 'persiapan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/bidangtanah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
				'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'nama_penggarap' => htmlspecialchars($this->input->post('nama_penggarap', true)),
                'tipe_aset' => htmlspecialchars($this->input->post('tipe_aset', true)),
                'luas' => htmlspecialchars($this->input->post('luas', true)),
				'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
				'pelepasan_bidang' => htmlspecialchars($this->input->post('pelepasan_bidang', true)),
				'perkiraan_dampak' => htmlspecialchars($this->input->post('perkiraan_dampak', true)),
            ];

            $this->db->insert('bidang_tanah', $data);
            
            redirect('Admin/bidangtanah');
        }
    }

    public function editbidtan($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_penlok', 'Nomor Penlok', 'required|trim');
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required');
        $this->form_validation->set_rules('nama_penggarap', 'Pemilik/Penggarap', 'required');
        $this->form_validation->set_rules('tipe_aset', 'Tipe Aset', 'required');
		$this->form_validation->set_rules('luas', 'Luas', 'required');
		$this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
		$this->form_validation->set_rules('pelepasan_bidang', 'Pelepasan Bidang', 'required');
        $this->form_validation->set_rules('perkiraan_dampak', 'Perkiraan Dampak', 'required');

        $data['title'] = 'Edit Bidang Tanah';
		$data['active'] = 'persiapan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['bidtan'] = $this->db->get_where('bidang_tanah', ['id_bidang_tanah' => $id])->row_array();
        $data['penetapan_lokasi'] = $this->db->get('penetapan_lokasi')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/bidangtanah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
				'id_penlok' => htmlspecialchars($this->input->post('nomor_penlok', true)),
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'nama_penggarap' => htmlspecialchars($this->input->post('nama_penggarap', true)),
                'tipe_aset' => htmlspecialchars($this->input->post('tipe_aset', true)),
                'luas' => htmlspecialchars($this->input->post('luas', true)),
				'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
				'pelepasan_bidang' => htmlspecialchars($this->input->post('pelepasan_bidang', true)),
				'perkiraan_dampak' => htmlspecialchars($this->input->post('perkiraan_dampak', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_bidang_tanah', $id);
            $this->db->update('bidang_tanah');
            
            redirect('Admin/bidangtanah');
        }
    }

    public function hapusbidtan($id)
    {
        $where = array('id_bidang_tanah' => $id);
        $this->db->where($where);
        $this->db->delete('bidang_tanah');
        redirect('Admin/bidangtanah');
    }

	// ###### MENU ALAS HAK ######
    
	public function alashak()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Alas Hak';
		$data['active'] = 'persiapan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['alas_hak'] = $this->db->get('alas_hak')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/alashak', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function carialha()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Alas Hak';
		$data['active'] = 'persiapan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM alas_hak where id_bidang_tanah like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/alashak', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahalha()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('jenis_alas_hak', 'Jenis Alas Hak', 'required');
        $this->form_validation->set_rules('luas_alas_hak', 'Luas Alas Hak', 'required');

        $data['title'] = 'Tambah Alas Hak';
		$data['active'] = 'persiapan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/alashak', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'jenis_alas_hak' => htmlspecialchars($this->input->post('jenis_alas_hak', true)),
                'luas_alas_hak' => htmlspecialchars($this->input->post('luas_alas_hak', true)),
            ];

            $this->db->insert('alas_hak', $data);
            
            redirect('Admin/alashak');
        }
    }

    public function editalha($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('jenis_alas_hak', 'Jenis Alas Hak', 'required');
        $this->form_validation->set_rules('luas_alas_hak', 'Luas Alas Hak', 'required');

        $data['title'] = 'Edit Alas Hak';
		$data['active'] = 'persiapan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['alha'] = $this->db->get_where('alas_hak', ['id_alas_hak' => $id])->row_array();
        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/alashak', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'jenis_alas_hak' => htmlspecialchars($this->input->post('jenis_alas_hak', true)),
                'luas_alas_hak' => htmlspecialchars($this->input->post('luas_alas_hak', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_alas_hak', $id);
            $this->db->update('alas_hak');
            
            redirect('Admin/alashak');
        }
    }

    public function hapusalha($id)
    {
        $where = array('id_alas_hak' => $id);
        $this->db->where($where);
        $this->db->delete('alas_hak');
        redirect('Admin/alashak');
    }

    // ###### MENU PIHAK YANG BERHAK ######

	public function pihakberhak()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pihak Yang Berhak';
		$data['active'] = 'persiapan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pihak_berhak'] = $this->db->get('pihak_berhak')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pihakberhak', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpihber()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pihak_berhak'] = $this->db->get('pihak_berhak')->result_array();

		$this->load->view('admin/laporan/pihakberhak', $data);
    }

    public function cetakpihber($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pihber'] = $this->db->get_where('pihak_berhak', ['id_pihak' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpihber', $data);
    }

    public function caripihber()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pihak Yang Berhak';
		$data['active'] = 'persiapan';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM pihak_berhak where nik like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/pihakberhak', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahpihber()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kepemilikan', 'Kepemilikan', 'required');
        
        $data['title'] = 'Tambah Pihak Berhak';
		$data['active'] = 'persiapan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/pihakberhak', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kepemilikan' => htmlspecialchars($this->input->post('kepemilikan', true)),
            ];

            $this->db->insert('pihak_berhak', $data);
            
            redirect('Admin/pihakberhak');
        }
    }

    public function editpihber($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kepemilikan', 'Kepemilikan', 'required');

        $data['title'] = 'Edit Pihak Berhak';
		$data['active'] = 'persiapan';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pihber'] = $this->db->get_where('pihak_berhak', ['id_pihak' => $id])->row_array();
        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/pihakberhak', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'nik' => htmlspecialchars($this->input->post('nik', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kepemilikan' => htmlspecialchars($this->input->post('kepemilikan', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_pihak', $id);
            $this->db->update('pihak_berhak');
            
            redirect('Admin/pihakberhak');
        }
    }

    public function hapuspihber($id)
    {
        $where = array('id_pihak' => $id);
        $this->db->where($where);
        $this->db->delete('pihak_berhak');
        redirect('Admin/pihakberhak');
    }

    // ###### MENU PENGUMUMAN ######

	public function pengumuman()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pengumuman';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pengumuman'] = $this->db->get('pengumuman')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pengumuman', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpengumuman()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pengumuman'] = $this->db->get('pengumuman')->result_array();

		$this->load->view('admin/laporan/pengumuman', $data);
    }

    public function cetakpengumuman($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pengumuman'] = $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpengumuman', $data);
    }

    public function caripengumuman()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pengumuman';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM pengumuman where nomor_pengumuman like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/pengumuman', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahpengumuman()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_pengumuman', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('id_bidang_tanah', 'NIK', 'required');
        $this->form_validation->set_rules('id_pelaksana', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_pengumuman', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Alamat', 'required');
        $this->form_validation->set_rules('id_berita', 'Kepemilikan', 'required');
        
        $data['title'] = 'Tambah Pengumuman';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $data['berita_acara'] = $this->db->get('berita_acara')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/pengumuman', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nomor_pengumuman' => htmlspecialchars($this->input->post('nomor_pengumuman', true)),
				'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
                'id_pelaksana' => htmlspecialchars($this->input->post('id_pelaksana', true)),
                'tanggal_pengumuman' => htmlspecialchars($this->input->post('tanggal_pengumuman', true)),
				'selesai_pengumuman' => htmlspecialchars($this->input->post('tanggal_selesai', true)),
                'id_berita' => htmlspecialchars($this->input->post('id_berita', true)),
            ];

            $this->db->insert('pengumuman', $data);
            
            redirect('Admin/pengumuman');
        }
    }

    public function editpengumuman($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_pengumuman', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('id_bidang_tanah', 'NIK', 'required');
        $this->form_validation->set_rules('id_pelaksana', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_pengumuman', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tanggal_selesai', 'Alamat', 'required');
        $this->form_validation->set_rules('id_berita', 'Kepemilikan', 'required');

        $data['title'] = 'Edit Pengumuman';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pengumuman'] = $this->db->get_where('pengumuman', ['id_pengumuman' => $id])->row_array();
        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $data['berita_acara'] = $this->db->get('berita_acara')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/pengumuman', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nomor_pengumuman' => htmlspecialchars($this->input->post('nomor_pengumuman', true)),
				'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
                'id_pelaksana' => htmlspecialchars($this->input->post('id_pelaksana', true)),
                'tanggal_pengumuman' => htmlspecialchars($this->input->post('tanggal_pengumuman', true)),
				'selesai_pengumuman' => htmlspecialchars($this->input->post('tanggal_selesai', true)),
                'id_berita' => htmlspecialchars($this->input->post('id_berita', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_pengumuman', $id);
            $this->db->update('pengumuman');
            
            redirect('Admin/pengumuman');
        }
    }

    public function hapuspengumuman($id)
    {
        $where = array('id_pengumuman' => $id);
        $this->db->where($where);
        $this->db->delete('pengumuman');
        redirect('Admin/pengumuman');
    }

    // ###### MENU BERITA ACARA ######

	public function beritaacara()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Berita Acara';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['berita_acara'] = $this->db->get('berita_acara')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/beritaacara', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function cariberita()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Berita Acara';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM berita_acara where nomor_berita like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/beritaacara', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahberita()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_berita', 'Nomor Berita', 'required|trim');
        $this->form_validation->set_rules('jenis_berita', 'Jenis Berita', 'required');
        $this->form_validation->set_rules('tanggal_berita', 'Tanggal', 'required');
        
        $data['title'] = 'Tambah Berita Acara';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pengumuman'] = $this->db->get('pengumuman')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/beritaacara', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nomor_berita' => htmlspecialchars($this->input->post('nomor_berita', true)),
				'jenis_berita' => htmlspecialchars($this->input->post('jenis_berita', true)),
                'tanggal_berita' => htmlspecialchars($this->input->post('tanggal_berita', true)),
            ];

            $this->db->insert('berita_acara', $data);
            
            redirect('Admin/beritaacara');
        }
    }

    public function editberita($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nomor_berita', 'Nomor Berita', 'required|trim');
        $this->form_validation->set_rules('jenis_berita', 'Jenis Berita', 'required');
        $this->form_validation->set_rules('tanggal_berita', 'Tanggal', 'required');
        
        $data['title'] = 'Edit Berita Acara';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['berac'] = $this->db->get_where('berita_acara', ['id_berita' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/beritaacara', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nomor_berita' => htmlspecialchars($this->input->post('nomor_berita', true)),
				'jenis_berita' => htmlspecialchars($this->input->post('jenis_berita', true)),
                'tanggal_berita' => htmlspecialchars($this->input->post('tanggal_berita', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_berita', $id);
            $this->db->update('berita_acara');
            
            redirect('Admin/beritaacara');
        }
    }

    public function hapusberita($id)
    {
        $where = array('id_berita' => $id);
        $this->db->where($where);
        $this->db->delete('berita_acara');
        redirect('Admin/beritaacara');
    }

    // ###### MENU PENILAIAN TANAH ######

	public function penilaiantanah()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Penilaian Tanah';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penilaian_tanah'] = $this->db->get('penilaian_tanah')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/penilaiantanah', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpentan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['penilaian_tanah'] = $this->db->get('penilaian_tanah')->result_array();

		$this->load->view('admin/laporan/penilaiantanah', $data);
    }

    public function cetakpentan($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pentan'] = $this->db->get_where('penilaian_tanah', ['id_penilaian' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpentan', $data);
    }

    public function caripentan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Penilaian Tanah';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM penilaian_tanah where id_bidang_tanah like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/penilaiantanah', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahpentan()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('penilai_tanah', 'Penilai Tanah', 'required');
        $this->form_validation->set_rules('id_pelaksana', 'Satgas', 'required');
        $this->form_validation->set_rules('nilai_tanah', 'Nilai Tanah', 'required');
        $this->form_validation->set_rules('nilai_bangunan', 'Nilai Bangunan', 'required');
        $this->form_validation->set_rules('nilai_benda_lain', 'Nilai Benda Lain', 'required');
        $this->form_validation->set_rules('nilai_kerugian', 'Nilai Kerugian', 'required');

        $data['title'] = 'Tambah Penilaian Tanah';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $total = $this->input->post('nilai_tanah')+$this->input->post('nilai_bangunan')+$this->input->post('nilai_benda_lain')+$this->input->post('nilai_kerugian');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/penilaiantanah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'penilai_tanah' => htmlspecialchars($this->input->post('penilai_tanah', true)),
                'id_pelaksana' => htmlspecialchars($this->input->post('id_pelaksana', true)),
                'nilai_tanah' => htmlspecialchars($this->input->post('nilai_tanah', true)),
				'nilai_bangunan' => htmlspecialchars($this->input->post('nilai_bangunan', true)),
                'nilai_benda_lain' => htmlspecialchars($this->input->post('nilai_benda_lain', true)),
                'nilai_kerugian' => htmlspecialchars($this->input->post('nilai_kerugian', true)),
				'total_nilai_ganti_rugi' => $total
            ];

            $this->db->insert('penilaian_tanah', $data);
            
            redirect('Admin/penilaiantanah');
        }
    }

    public function editpentan($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('penilai_tanah', 'Penilai Tanah', 'required');
        $this->form_validation->set_rules('id_pelaksana', 'Satgas', 'required');
        $this->form_validation->set_rules('nilai_tanah', 'Nilai Tanah', 'required');
        $this->form_validation->set_rules('nilai_bangunan', 'Nilai Bangunan', 'required');
        $this->form_validation->set_rules('nilai_benda_lain', 'Nilai Benda Lain', 'required');
        $this->form_validation->set_rules('nilai_kerugian', 'Nilai Kerugian', 'required');

        $data['title'] = 'Edit Penilaian Tanah';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pentan'] = $this->db->get_where('penilaian_tanah', ['id_penilaian' => $id])->row_array();
        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $total = $this->input->post('nilai_tanah')+$this->input->post('nilai_bangunan')+$this->input->post('nilai_benda_lain')+$this->input->post('nilai_kerugian');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/penilaiantanah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'penilai_tanah' => htmlspecialchars($this->input->post('penilai_tanah', true)),
                'id_pelaksana' => htmlspecialchars($this->input->post('id_pelaksana', true)),
                'nilai_tanah' => htmlspecialchars($this->input->post('nilai_tanah', true)),
				'nilai_bangunan' => htmlspecialchars($this->input->post('nilai_bangunan', true)),
                'nilai_benda_lain' => htmlspecialchars($this->input->post('nilai_benda_lain', true)),
                'nilai_kerugian' => htmlspecialchars($this->input->post('nilai_kerugian', true)),
				'total_nilai_ganti_rugi' => $total
            ];

			$this->db->set($data);
            $this->db->where('id_penilaian', $id);
            $this->db->update('penilaian_tanah');
            
            redirect('Admin/penilaiantanah');
        }
    }

    public function hapuspentan($id)
    {
        $where = array('id_penilaian' => $id);
        $this->db->where($where);
        $this->db->delete('penilaian_tanah');
        redirect('Admin/penilaiantanah');
    }

    // ###### MENU HASIL MUSYAWARAH ######

	public function hasilmusyawarah()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Hasil Musyawarah';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['hasil_musyawarah'] = $this->db->get('hasil_musyawarah')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/hasilmusyawarah', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanhamus()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['hasil_musyawarah'] = $this->db->get('hasil_musyawarah')->result_array();

		$this->load->view('admin/laporan/hasilmusyawarah', $data);
    }

    public function cetakhamus($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['hamus'] = $this->db->get_where('hasil_musyawarah', ['id_musyawarah' => $id])->row_array();

		$this->load->view('admin/laporan/cetakhamus', $data);
    }

    public function carihamus()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Hasil Musyawarah';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM hasil_musyawarah where id_bidang_tanah like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/hasilmusyawarah', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahhamus()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('nama_hadir', 'Nama yang Hadir', 'required');
        $this->form_validation->set_rules('jenis_ganti_rugi', 'Jenis Ganti Rugi', 'required');
        $this->form_validation->set_rules('hasil_musyawarah', 'Hasil Musyawarah', 'required');

        $data['title'] = 'Tambah Hasil Musyawarah';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $bidtan = $this->db->get_where('bidang_tanah', ['id_bidang_tanah' => $this->input->post('id_bidang_tanah')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/hasilmusyawarah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
                'nama_penggarap' => $bidtan['nama_penggarap'],
                'nama_hadir' => htmlspecialchars($this->input->post('nama_hadir', true)),
				'jenis_ganti_rugi' => htmlspecialchars($this->input->post('jenis_ganti_rugi', true)),
                'hasil_musyawarah' => htmlspecialchars($this->input->post('hasil_musyawarah', true)),
            ];

            $this->db->insert('hasil_musyawarah', $data);
            
            redirect('Admin/hasilmusyawarah');
        }
    }

    public function edithamus($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('nama_hadir', 'Nama yang Hadir', 'required');
        $this->form_validation->set_rules('jenis_ganti_rugi', 'Jenis Ganti Rugi', 'required');
        $this->form_validation->set_rules('hasil_musyawarah', 'Hasil Musyawarah', 'required');

        $data['title'] = 'Edit Penilaian Tanah';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['hamus'] = $this->db->get_where('hasil_musyawarah', ['id_musyawarah' => $id])->row_array();
        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $bidtan = $this->db->get_where('bidang_tanah', ['id_bidang_tanah' => $this->input->post('id_bidang_tanah')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/hasilmusyawarah', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
                'nama_penggarap' => $bidtan['nama_penggarap'],
                'nama_hadir' => htmlspecialchars($this->input->post('nama_hadir', true)),
				'jenis_ganti_rugi' => htmlspecialchars($this->input->post('jenis_ganti_rugi', true)),
                'hasil_musyawarah' => htmlspecialchars($this->input->post('hasil_musyawarah', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_musyawarah', $id);
            $this->db->update('hasil_musyawarah');
            
            redirect('Admin/hasilmusyawarah');
        }
    }

    public function hapushamus($id)
    {
        $where = array('id_musyawarah' => $id);
        $this->db->where($where);
        $this->db->delete('hasil_musyawarah');
        redirect('Admin/hasilmusyawarah');
    }

    // ###### MENU PELEPASAN HAK ######

	public function pelepasanhak()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pelepasan Hak';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pelepasan_hak'] = $this->db->get('pelepasan_hak')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pelepasanhak', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpelhak()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pelepasan_hak'] = $this->db->get('pelepasan_hak')->result_array();

		$this->load->view('admin/laporan/pelepasanhak', $data);
    }

    public function cetakpelhak($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['pelhak'] = $this->db->get_where('pelepasan_hak', ['id_pelepasan' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpelhak', $data);
    }

    public function caripelhak()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pelepasan Hak';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM pelepasan_hak where id_bidang_tanah like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/pelepasanhak', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahpelhak()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('nomor_kwitansi', 'Nomor Kwitansi', 'required');
        $this->form_validation->set_rules('tanggal_kwitansi', 'Tanggal Kwitansi', 'required');
        $this->form_validation->set_rules('tanggal_pembayaran', 'Tanggal Pemayaran', 'required');
        $this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('id_musyawarah', 'Jenis Ganti Rugi', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');

        $data['title'] = 'Tambah Pelepasan Hak';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $data['pelaksana'] = $this->db->get('pelaksana')->result_array();
        $data['lokasi'] = $this->db->get('lokasi')->result_array();
        $data['hasil_musyawarah'] = $this->db->get('hasil_musyawarah')->result_array();

        $bidtan = $this->db->get_where('bidang_tanah', ['id_bidang_tanah' => $this->input->post('id_bidang_tanah')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/pelepasanhak', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
                'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
				'nama_penggarap' => $bidtan['nama_penggarap'],
                'nomor_kwitansi' => htmlspecialchars($this->input->post('nomor_kwitansi', true)),
                'tanggal_kwitansi' => htmlspecialchars($this->input->post('tanggal_kwitansi', true)),
				'tanggal_pembayaran' => htmlspecialchars($this->input->post('tanggal_pembayaran', true)),
                'id_musyawarah' => htmlspecialchars($this->input->post('id_musyawarah', true)),
                'nomor_rekening' => htmlspecialchars($this->input->post('nomor_rekening', true)),
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
            ];

            $this->db->insert('pelepasan_hak', $data);
            
            redirect('Admin/pelepasanhak');
        }
    }

    public function editpelhak($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('nomor_kwitansi', 'Nomor Kwitansi', 'required');
        $this->form_validation->set_rules('tanggal_kwitansi', 'Tanggal Kwitansi', 'required');
        $this->form_validation->set_rules('tanggal_pembayaran', 'Tanggal Pemayaran', 'required');
        $this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('id_musyawarah', 'Jenis Ganti Rugi', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');

        $data['title'] = 'Edit Pelepasan Hak';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pelhak'] = $this->db->get_where('pelepasan_hak', ['id_pelepasan' => $id])->row_array();
        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $data['pelaksana'] = $this->db->get('pelaksana')->result_array();
        $data['lokasi'] = $this->db->get('lokasi')->result_array();
        $data['hasil_musyawarah'] = $this->db->get('hasil_musyawarah')->result_array();

        $bidtan = $this->db->get_where('bidang_tanah', ['id_bidang_tanah' => $this->input->post('id_bidang_tanah')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/pelepasanhak', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'nama_penggarap' => $bidtan['nama_penggarap'],
                'nomor_kwitansi' => htmlspecialchars($this->input->post('nomor_kwitansi', true)),
                'tanggal_kwitansi' => htmlspecialchars($this->input->post('tanggal_kwitansi', true)),
				'tanggal_pembayaran' => htmlspecialchars($this->input->post('tanggal_pembayaran', true)),
                'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
                'id_musyawarah' => htmlspecialchars($this->input->post('id_musyawarah', true)),
                'nomor_rekening' => htmlspecialchars($this->input->post('nomor_rekening', true)),
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_pelepasan', $id);
            $this->db->update('pelepasan_hak');
            
            redirect('Admin/pelepasanhak');
        }
    }

    public function hapuspelhak($id)
    {
        $where = array('id_pelepasan' => $id);
        $this->db->where($where);
        $this->db->delete('pelepasan_hak');
        redirect('Admin/pelepasanhak');
    }

    // ###### MENU PENYERAHAN HASIL ######

	public function penyerahanhasil()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Penyerahan Hasil';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penyerahan_hasil'] = $this->db->get('penyerahan_hasil')->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/penyerahanhasil', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function laporanpenhas()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['penyerahan_hasil'] = $this->db->get('penyerahan_hasil')->result_array();

		$this->load->view('admin/laporan/penyerahanhasil', $data);
    }

    public function cetakpenhas($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}

		$data['penhas'] = $this->db->get_where('penyerahan_hasil', ['id_penyerahan' => $id])->row_array();

		$this->load->view('admin/laporan/cetakpenhas', $data);
    }

    public function caripenhas()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Penyerahan Hasil';
		$data['active'] = 'hasil';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM penyerahan_hasil where id_bidang_tanah like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/penyerahanhasil', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahpenhas()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('nama_penggarap', 'Nama Penggarap', 'required');
        $this->form_validation->set_rules('nomor_kwitansi', 'Nomor Kwitansi', 'required');
        $this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');

        $data['title'] = 'Tambah Penyerahan Hasil';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['bidang_tanah'] = $this->db->get('bidang_tanah')->result_array();
        $data['pelepasan_hak'] = $this->db->get('pelepasan_hak')->result_array();
        $data['pelaksana'] = $this->db->get('pelaksana')->result_array();
        $data['lokasi'] = $this->db->get('lokasi')->result_array();

        $pelhak = $this->db->get_where('pelepasan_hak', ['nomor_kwitansi' => $this->input->post('nomor_kwitansi')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/penyerahanhasil', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
                'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
				'nama_penggarap' => htmlspecialchars($this->input->post('nama_penggarap', true)),
                'id_pelepasan' => htmlspecialchars($this->input->post('nomor_kwitansi', true)),
                'tgl_kwitansi' => $pelhak['tanggal_kwitansi'],
				'tgl_pembayaran' => $pelhak['tanggal_pembayaran']
            ];

            $this->db->insert('penyerahan_hasil', $data);
            
            redirect('Admin/penyerahanhasil');
        }
    }

    public function editpenhas($id)
    {
        if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('id_bidang_tanah', 'Nomor Bidang Tanah', 'required|trim');
        $this->form_validation->set_rules('nama_penggarap', 'Nama Penggarap', 'required');
        $this->form_validation->set_rules('nomor_kwitansi', 'Nomor Kwitansi', 'required');
        $this->form_validation->set_rules('tanggal_kwitansi', 'Tanggal Kwitansi', 'required');
        $this->form_validation->set_rules('tanggal_pembayaran', 'Tanggal Pemayaran', 'required');
        $this->form_validation->set_rules('id_lokasi', 'Desa/Kelurahan', 'required');
        $this->form_validation->set_rules('id_musyawarah', 'Jenis Ganti Rugi', 'required');
        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');

        $data['title'] = 'Edit Penyerahan Hasil';
		$data['active'] = 'hasil';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['penhas'] = $this->db->get_where('penyerahan_hasil', ['id_penyerahan' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/penyerahanhasil', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'id_bidang_tanah' => htmlspecialchars($this->input->post('id_bidang_tanah', true)),
				'nama_penggarap' => htmlspecialchars($this->input->post('nama_penggarap', true)),
                'nomor_kwitansi' => htmlspecialchars($this->input->post('nomor_kwitansi', true)),
                'tanggal_kwitansi' => htmlspecialchars($this->input->post('tanggal_kwitansi', true)),
				'tanggal_pembayaran' => htmlspecialchars($this->input->post('tanggal_pembayaran', true)),
                'id_lokasi' => htmlspecialchars($this->input->post('id_lokasi', true)),
                'id_musyawarah' => htmlspecialchars($this->input->post('id_musyawarah', true)),
                'nomor_rekening' => htmlspecialchars($this->input->post('nomor_rekening', true)),
                'nama_bank' => htmlspecialchars($this->input->post('nama_bank', true)),
            ];

			$this->db->set($data);
            $this->db->where('id_penyerahan', $id);
            $this->db->update('penyerahan_hasil');
            
            redirect('Admin/penyerahanhasil');
        }
    }

    public function hapuspenhas($id)
    {
        $where = array('id_penyerahan' => $id);
        $this->db->where($where);
        $this->db->delete('penyerahan_hasil');
        redirect('Admin/penyerahanhasil');
    }

    // ###### MENU PEGAWAI ######

	public function pegawai()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pegawai';
		$data['active'] = 'pegawai';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['pegawai'] = $this->db->get_where('user', ['role' => 2])->result_array();

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/pegawai', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function caripegawai()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $data['title'] = 'Pegawai';
		$data['active'] = 'pegawai';
		$data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$query = "SELECT * FROM user where nip like '%" . $this->input->post('cari') . "%'";
        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();
        $data['text'] = $this->input->post('cari');

		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/topbar', $data);
        $this->load->view('admin/cari/pegawai', $data);
		$this->load->view('admin/templates/footer', $data);
    }

    public function tambahpegawai()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $data['title'] = 'Tambah Pegawai';
		$data['active'] = 'pegawai';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambah/pegawai', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
				'pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => htmlspecialchars($this->input->post('password', true)),
                'role' => 2
            ];

            $this->db->insert('user', $data);
            
            redirect('Admin/pegawai');
        }
    }

    public function editpegawai($id)
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('pangkat', 'Pangkat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $data['title'] = 'Edit Pegawai';
		$data['active'] = 'pegawai';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pegawai'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/edit/pegawai', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
				'pangkat' => htmlspecialchars($this->input->post('pangkat', true)),
                'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => htmlspecialchars($this->input->post('password', true)),
                'role' => 2
            ];

            $this->db->set($data);
            $this->db->where('id_user', $id);
            $this->db->update('user');
            
            redirect('Admin/pegawai');
        }
    }

    

    public function hapuspegawai($id)
    {
        $where = array('id_user' => $id);
        $this->db->where($where);
        $this->db->delete('user');
        redirect('Admin/pegawai');
    }

    // ###### MENU TAMBAH USER ######

	public function tambahuser()
    {
		if ($this->session->userdata('role') == 3) {
			redirect('auth');
		}
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $data['title'] = 'Tambah User';
		$data['active'] = 'tambah';
        $data['hitung'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->num_rows();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar', $data);
            $this->load->view('admin/tambahuser', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => htmlspecialchars($this->input->post('password', true)),
                'role' => 1
            ];

            $this->db->insert('user', $data);
            
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Akun Admin Berhasil dibuat</div>');
            redirect('Admin/tambahuser');
        }
    }
}
