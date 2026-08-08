<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if (empty($this->session->userdata('username')) || empty($this->session->userdata('id_users'))) {
			redirect('login');
		}
	}
	public function index()
	{
		$judul['atas'] = "Halaman Utama Administrator";
		$judul['menuatas'] = "Beranda";
		$data['s'] = $this->db->get('siswa')->num_rows();
		$data['gk'] = $this->db->get('guru')->num_rows();
		$data['k'] = $this->db->get('kelas')->num_rows();
		$data['u'] = $this->db->get('users')->num_rows();
		$data['tp'] = $this->db->get('tahun_pelajaran')->num_rows();
		$this->load->view('component/header', $judul);
		$this->load->view('beranda', $data);
		$this->load->view('component/footer');
	}
	public function siswa()
	{
		$judul['atas'] = "Halaman Siswa";
		$judul['menuatas'] = "Siswa";
		$data['sis'] = $this->admin_model->joinsiswa();
		$this->load->view('component/header', $judul);
		$this->load->view('siswa', $data);
		$this->load->view('component/footer');
	}
	public function tambah_siswa()
	{
		$judul['atas'] = "Halaman Tambah Siswa";
		$judul['menuatas'] = "Form Tambah Siswa";
		$this->load->view('component/header', $judul);
		$data['combo'] = $this->admin_model->comboxdinamis();
		$data['error'] = "";
		$this->load->view('form_siswa', $data);
		$this->load->view('component/footer');
	}
	public function simpan_siswa()
	{
		$this->form_validation->set_rules('nis', '', 'required', array('required' => 'Nis Wajib di Isi'));
		$this->form_validation->set_rules('nama_siswa', '', 'required', array('required' => 'Nama Siswa Wajib di Isi'));
		$this->form_validation->set_rules('jk', '', 'required', array('required' => 'Jenis Kelamin Wajib Di Isi'));
		$this->form_validation->set_rules('th', '', 'required', array('required' => 'Tahun Pelajaran Wajib di Isi'));
		$this->form_validation->set_rules('alamat_siswa', '', 'required', array('required' => 'Alamat Wajib di Isi'));

		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Tambah Siswa";
			$judul['menuatas'] = "Form Tambah Siswa";
			$this->load->view('component/header', $judul);
			$data['combo'] = $this->admin_model->comboxdinamis();
			$data['error'] = "";
			$this->load->view('form_siswa', $data);
			$this->load->view('component/footer');
		} else {
			if ($_FILES['foto']['name']) {
				$config['upload_path'] = './assets/siswa/';
				$config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
				$config['max_size'] = 1024;
				$config['encrypt_name'] = True;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$judul['atas'] = "Halaman Tambah Siswa";
					$judul['menuatas'] = "Form Tambah Siswa";
					$this->load->view('component/header', $judul);
					$data['combo'] = $this->admin_model->comboxdinamis();
					$data['error'] = $this->upload->display_errors(' ');
					$this->load->view('form_siswa', $data);
					$this->load->view('component/footer');
				} else {
					$gbr = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/siswa/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '50%';
					$config['width'] = 400;
					$config['height'] = 600;
					$config['new_image'] = './assets/siswa/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$foto = $gbr['file_name'];
					$data = array(
						'id_tahun_pelajaran' => $this->input->post('th'),
						'nisn' => $this->input->post('nis'),
						'nama_siswa' => $this->input->post('nama_siswa'),
						'jk_siswa' => $this->input->post('jk'),
						'almt_siswa' => $this->input->post('alamat_siswa'),
						'foto' => $foto
					);
					$query = $this->admin_model->simpandata('siswa', $data);
					if ($query) {
						$this->session->set_flashdata('info', 'Data Siswa Berhasil Tersimpan');
						redirect('Admin/siswa');
					} else {
						$this->session->set_flashdata('info', 'Data Siswa Gagal Tersimpan');
						redirect('Admin/siswa');
					}
				}
			} else {
				$data = array(
					'id_tahun_pelajaran' => $this->input->post('th'),
					'nisn' => $this->input->post('nis'),
					'nama_siswa' => $this->input->post('nama_siswa'),
					'jk_siswa' => $this->input->post('jk'),
					'almt_siswa' => $this->input->post('alamat_siswa')
				);
				$query = $this->admin_model->simpandata('siswa', $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data Siswa Berhasil Tersimpan');
					redirect('Admin/siswa');
				} else {
					$this->session->set_flashdata('info', 'Data Siswa Gagal Tersimpan');
					redirect('Admin/siswa');
				}
			}
		}
	}

	public function formedit_siswa($id)
	{
		$judul['atas'] = "Halaman Form Edit Siswa";
		$judul['menuatas'] = "Form Edit Siswa";
		$data['s'] = $this->admin_model->formedit('siswa', 'id_siswa', $id);
		$this->load->view('component/header', $judul);
		$data['combo'] = $this->admin_model->comboxdinamis();
		$data['error'] = "";
		$this->load->view('formedit_siswa', $data);
		$this->load->view('component/footer');
	}
	public function edit_siswa()
	{
		$this->form_validation->set_rules('nis', '', 'required', array('required' => 'Nis Wajib di Isi'));
		$this->form_validation->set_rules('nama_siswa', '', 'required', array('required' => 'Nama Siswa Wajib di Isi'));
		$this->form_validation->set_rules('jk', '', 'required', array('required' => 'Jenis Kelamin Wajib Di Isi'));
		$this->form_validation->set_rules('th', '', 'required', array('required' => 'Tahun Pelajaran Wajib di Isi'));
		$this->form_validation->set_rules('alamat_siswa', '', 'required', array('required' => 'Alamat Wajib di Isi'));
		$id = $this->input->post('id_siswa');
		$foto = $this->input->post('foto');
		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Form Edit Siswa";
			$judul['menuatas'] = "Form Edit Siswa";
			$data['s'] = $this->admin_model->formedit('siswa', 'id_siswa', $id);
			$this->load->view('component/header', $judul);
			$data['combo'] = $this->admin_model->comboxdinamis();
			$data['error'] = "";
			$this->load->view('formedit_siswa', $data);
			$this->load->view('component/footer');
		} else {
			if ($_FILES['foto']['name']) {
				$config['upload_path'] = './assets/siswa/';
				$config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
				$config['max_size'] = 1024;
				$config['encrypt_name'] = True;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$judul['atas'] = "Halaman Form Edit Siswa";
					$judul['menuatas'] = "Form Edit Siswa";
					$data['s'] = $this->admin_model->formedit('siswa', 'id_siswa', $id);
					$this->load->view('component/header', $judul);
					$data['combo'] = $this->admin_model->comboxdinamis();
					$data['error'] = $this->upload->display_errors(' ');
					$this->load->view('formedit_siswa', $data);
					$this->load->view('component/footer');
				} else {
					$gbr = $this->upload->data();
					if (!empty($foto) && file_exists('./assets/siswa/' . $foto)) {
						unlink('./assets/siswa/' . $foto);
					}
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/siswa/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '50%';
					$config['width'] = 400;
					$config['height'] = 600;
					$config['new_image'] = './assets/siswa/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$foto_baru = $gbr['file_name'];
					$data = array(
						'id_tahun_pelajaran' => $this->input->post('th'),
						'nisn' => $this->input->post('nis'),
						'nama_siswa' => $this->input->post('nama_siswa'),
						'jk_siswa' => $this->input->post('jk'),
						'almt_siswa' => $this->input->post('alamat_siswa'),
						'foto' => $foto_baru
					);
					$query = $this->admin_model->editdata('siswa', 'id_siswa', $id, $data);

					if ($query) {
						$this->session->set_flashdata('info', 'Data Siswa Berhasil Tersimpan');
						redirect('Admin/siswa');
					} else {
						$this->session->set_flashdata('info', 'Data Siswa Gagal Tersimpan');
						redirect('Admin/siswa');
					}
				}
			} else {
				$data = array(
					'id_tahun_pelajaran' => $this->input->post('th'),
					'nisn' => $this->input->post('nis'),
					'nama_siswa' => $this->input->post('nama_siswa'),
					'jk_siswa' => $this->input->post('jk'),
					'almt_siswa' => $this->input->post('alamat_siswa')
				);
				$query = $this->admin_model->editdata('siswa', 'id_siswa', $id, $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data Siswa Berhasil Tersimpan');
					redirect('Admin/siswa');
				} else {
					$this->session->set_flashdata('info', 'Data Siswa Gagal Tersimpan');
					redirect('Admin/siswa');
				}
			}
		}
	}

	public function hapus_siswa($id)
	{
		$data = $this->admin_model->formedit('siswa', 'id_siswa', $id);
		$this->admin_model->hapusdata('siswa', $id, 'id_siswa');
		if ($this->db->affected_rows()) {
			if (!empty($data->foto) && file_exists('./assets/siswa/' . $data->foto)) {
				unlink('./assets/siswa/' . $data->foto);
			}
			$this->session->set_flashdata('info', 'Data Siswa Berhasil Di Hapus');
			redirect('Admin/siswa');
		} else {
			$this->session->set_flashdata('info', 'Data Siswa Gagal Di Hapus');
			redirect('Admin/siswa');
		}
	}

	public function guru()
	{
		$judul['atas'] = "Halaman Guru";
		$judul['menuatas'] = "Guru";
		$data['gr'] = $this->admin_model->tampildata('guru', 'id_guru');
		$this->load->view('component/header', $judul);
		$this->load->view('guru', $data);
		$this->load->view('component/footer');
	}
	public function tambah_guru()
	{
		$judul['atas'] = "Halaman Tambah Guru";
		$judul['menuatas'] = "Form Tambah Guru";
		$this->load->view('component/header', $judul);
		$this->load->view('form_guru', array('error' => ''));
		$this->load->view('component/footer');
	}
	public function simpan_guru()
	{
		$this->form_validation->set_rules('nama_guru', '', 'required', array('required' => 'Nama wajib di isi'));
		$this->form_validation->set_rules('jk', '', 'required', array('required' => 'Jenis Kelamin wajib di isi'));
		$this->form_validation->set_rules('tlp_guru', '', 'required', array('required' => 'No telpon wajib di isi'));
		$this->form_validation->set_rules('alamat_guru', '', 'required', array('required' => 'alamat wajib di isi'));
		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Tambah Guru";
			$judul['menuatas'] = "Form Tambah Guru";
			$this->load->view('component/header', $judul);
			$this->load->view('form_guru', array('error' => ''));
			$this->load->view('component/footer');
		} else {
			if ($_FILES['foto']['name']) {
				$config['upload_path'] = './assets/guru/';
				$config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
				$config['max_size'] = 1024;
				$config['encrypt_name'] = True;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$error = array('error' => $this->upload->display_errors(' '));
					$judul['atas'] = "Halaman Tambah Guru";
					$judul['menuatas'] = "Form Tambah Guru";
					$this->load->view('component/header', $judul);
					$this->load->view('form_guru', $error);
					$this->load->view('component/footer');
				} else {
					$gbr = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/guru/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '50%';
					$config['width'] = 400;
					$config['height'] = 600;
					$config['new_image'] = './assets/guru/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$foto = $gbr['file_name'];
					$data = array(
						'nip' => $this->input->post('nip'),
						'nama_guru' => $this->input->post('nama_guru'),
						'jk_guru' => $this->input->post('jk'),
						'alamat_guru' => $this->input->post('alamat_guru'),
						'tlp_guru' => $this->input->post('tlp_guru'),
						'foto_guru' => $foto
					);
					$query = $this->admin_model->simpandata('guru', $data);
					if ($query) {
						$this->session->set_flashdata('info', 'Data guru  Berhasil  Tersimpan');
						redirect('Admin/guru');
					} else {
						$this->session->set_flashdata('info', 'Data guru Gagal  Tersimpan');
						redirect('Admin/guru');
					}
				}
			} else {
				$data = array(
					'nip' => $this->input->post('nip'),
					'nama_guru' => $this->input->post('nama_guru'),
					'jk_guru' => $this->input->post('jk'),
					'alamat_guru' => $this->input->post('alamat_guru'),
					'tlp_guru' => $this->input->post('tlp_guru')
				);
				$query = $this->admin_model->simpandata('guru', $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data guru  Berhasil  Tersimpan');
					redirect('Admin/guru');
				} else {
					$this->session->set_flashdata('info', 'Data guru Gagal  Tersimpan');
					redirect('Admin/guru');
				}
			}
		}
	}

	public function edit_guru()
	{
		$this->form_validation->set_rules('nama_guru', '', 'required', array('required' => 'Nama wajib di isi'));
		$this->form_validation->set_rules('jk', '', 'required', array('required' => 'Jenis Kelamin wajib di isi'));
		$this->form_validation->set_rules('tlp_guru', '', 'required', array('required' => 'No telpon wajib di isi'));
		$this->form_validation->set_rules('alamat_guru', '', 'required', array('required' => 'alamat wajib di isi'));
		$id = $this->input->post('id_guru');
		$foto = $this->input->post('foto');
		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Edit Guru";
			$judul['menuatas'] = "Form Edit Guru";
			$data['g'] = $this->admin_model->formedit('guru', 'id_guru', $id);
			$data['error'] = "";
			$this->load->view('component/header', $judul);
			$this->load->view('formedit_guru', $data);
			$this->load->view('component/footer');
		} else {
			if ($_FILES['foto']['name']) {
				$config['upload_path'] = './assets/guru/';
				$config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
				$config['max_size'] = 1024;
				$config['encrypt_name'] = True;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('foto')) {
					$judul['atas'] = "Halaman Edit Guru";
					$judul['menuatas'] = "Form Edit Guru";
					$data['g'] = $this->admin_model->formedit('guru', 'id_guru', $id);
					$data['error'] = $this->upload->display_errors(' ');
					$this->load->view('component/header', $judul);
					$this->load->view('formedit_guru', $data);
					$this->load->view('component/footer');
				} else {
					$gbr = $this->upload->data();
					if (!empty($foto) && file_exists('./assets/guru/' . $foto)) {
						unlink('./assets/guru/' . $foto);
					}
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/guru/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '50%';
					$config['width'] = 400;
					$config['height'] = 600;
					$config['new_image'] = './assets/guru/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$foto_baru = $gbr['file_name'];
					$data = array(
						'nip' => $this->input->post('nip'),
						'nama_guru' => $this->input->post('nama_guru'),
						'jk_guru' => $this->input->post('jk'),
						'alamat_guru' => $this->input->post('alamat_guru'),
						'tlp_guru' => $this->input->post('tlp_guru'),
						'foto_guru' => $foto_baru
					);
					$query = $this->admin_model->editdata('guru', 'id_guru', $id, $data);
					if ($query) {
						$this->session->set_flashdata('info', 'Data guru Berhasil Tersimpan');
						redirect('Admin/guru');
					} else {
						$this->session->set_flashdata('info', 'Data guru Gagal Tersimpan');
						redirect('Admin/guru');
					}
				}
			} else {
				$data = array(
					'nip' => $this->input->post('nip'),
					'nama_guru' => $this->input->post('nama_guru'),
					'jk_guru' => $this->input->post('jk'),
					'alamat_guru' => $this->input->post('alamat_guru'),
					'tlp_guru' => $this->input->post('tlp_guru')
				);
				$query = $this->admin_model->editdata('guru', 'id_guru', $id, $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data guru Berhasil Tersimpan');
					redirect('Admin/guru');
				} else {
					$this->session->set_flashdata('info', 'Data guru Gagal Tersimpan');
					redirect('Admin/guru');
				}
			}
		}
	}
	public function hapusguru($id)
	{
		$data = $this->admin_model->formedit('guru', 'id_guru', $id);
		$this->admin_model->hapusdata('guru', $id, 'id_guru');
		if ($this->db->affected_rows()) {
			if (!empty($data->foto_guru) && file_exists('./assets/guru/' . $data->foto_guru)) {
				unlink('./assets/guru/' . $data->foto_guru);
			}
			$this->session->set_flashdata('info', 'Data guru Berhasil Di hapus');
			redirect('Admin/guru');
		} else {
			$this->session->set_flashdata('info', 'Data guru Gagal Di hapus');
			redirect('Admin/guru');
		}
	}
	public function formedit_guru($id)
	{
		$judul['atas'] = "Halaman Form Edit Guru";
		$judul['menuatas'] = "Form Edit Guru";
		$data['g'] = $this->admin_model->formedit('guru', 'id_guru', $id);
		$data['error'] = "";
		$this->load->view('component/header', $judul);
		$this->load->view('formedit_guru', $data);
		$this->load->view('component/footer');
	}

	public function kelas()
	{
		$judul['atas'] = "Halaman kelas";
		$judul['menuatas'] = "Kelas";
		$data['k'] = $this->admin_model->tampildata('kelas', 'id_kelas');
		$this->load->view('component/header', $judul);
		$this->load->view('kelas', $data);
		$this->load->view('component/footer');
	}
	public function tambah_kelas()
	{
		$judul['atas'] = "Halaman Tambah Kelas";
		$judul['menuatas'] = "Form Tambah Kelas";
		$this->load->view('component/header', $judul);
		$this->load->view('form_kelas');
		$this->load->view('component/footer');
	}
	public function simpan_kelas()
	{
		$this->form_validation->set_rules('kode_kelas', '', 'required', array('required' => 'Kode Kelas Wajib di Isi'));
		$this->form_validation->set_rules('nama_kelas', '', 'required', array('required' => 'Nama Kelas Wajib di Isi'));
		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Tambah Kelas";
			$judul['menuatas'] = "Form Kelas";
			$this->load->view('component/header', $judul);
			$this->load->view('form_kelas');
			$this->load->view('component/footer');
		} else {
			$data = array(
				'kode_kelas' => $this->input->post('kode_kelas'),
				'nama_kelas' => $this->input->post('nama_kelas')
			);
			$query = $this->admin_model->simpandata('kelas', $data);
			if ($query) {
				$this->session->set_flashdata('info', 'Data Kelas Berhasil Tersimpan');
				redirect('Admin/kelas');
			} else {
				$this->session->set_flashdata('info', 'Data Kelas Gagal Tersimpan');
				redirect('Admin/kelas');
			}
		}
	}
	public function hapuskelas($id)
	{
		$this->admin_model->hapusdata('kelas', $id, 'id_kelas');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('info', ' Tahun Kelas Berhasil Terhapus');
			redirect('Admin/kelas');
		} else {
			$this->session->set_flashdata('info', ' Tahun Kelas Gagal  Terhapus');
			redirect('Admin/kelas');
		}
	}
	public function formedit_kelas($id)
	{
		$judul['atas'] = "Halaman Form Edit Kelas";
		$judul['menuatas'] = "Form Edit Kelas";
		$data['ke'] = $this->admin_model->formedit('kelas', 'id_kelas', $id);
		$this->load->view('component/header', $judul);
		$this->load->view('formedit_kelas', $data);
		$this->load->view('component/footer');
	}
	public function edit_kelas()
	{
		$id = $this->input->post('id');
		$data = array(
			'kode_kelas' => $this->input->post('kode_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas')
		);
		$query = $this->admin_model->editdata('kelas', 'id_kelas', $id, $data);
		if ($query) {
			$this->session->set_flashdata('info', 'Data  Kelas Berhasil  Ter Edit');
			redirect('Admin/kelas');
		} else {
			$this->session->set_flashdata('info', 'Data Kelas  Gagal  Ter Edit');
			redirect('Admin/kelas');
		}
	}

	public function tahunajaran()
	{
		$judul['atas'] = "Halaman Tahun Pelajaran";
		$judul['menuatas'] = "Tahun Pelajaran";
		$this->load->view('component/header', $judul);
		$data['th'] = $this->admin_model->tampildata('tahun_pelajaran', 'id_tahun_pelajaran');
		$this->load->view('tahunpelajaran', $data);
		$this->load->view('component/footer');
	}

	public function tambah_th()
	{
		$judul['atas'] = "Halaman Tahun Pelajaran";
		$judul['menuatas'] = "Form Tambah Pelajaran";
		$this->load->view('component/header', $judul);
		$this->load->view('form_th');
		$this->load->view('component/footer');
	}
	public function  simpan_th()
	{
		$this->form_validation->set_rules('th', 'tahun_pelajaran', 'required');
		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Tahun Pelajaran";
			$judul['menuatas'] = "Form Tambah Pelajaran";
			$this->load->view('component/header', $judul);
			$this->load->view('form_th');
			$this->load->view('component/footer');
		} else {
			$data = array(
				'tahun_pelajaran' => $this->input->post('th')
			);
			$query = $this->admin_model->simpandata('tahun_pelajaran', $data);
			if ($query) {
				$this->session->set_flashdata('info', 'Data Tahun Pelajaran Berhasil  Tersimpan');
				redirect('Admin/tahunajaran');
			} else {
				$this->session->set_flashdata('info', 'Data Tahun Pelajaran Gagal  Tersimpan');
				redirect('Admin/tahunajaran');
			}
		}
	}

	public function hapusth($id)
	{
		$this->admin_model->hapusdata('tahun_pelajaran', $id, 'id_tahun_pelajaran');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data Tahun Pelajaran Berhasil Terhapus');
			redirect('Admin/tahunajaran');
		} else {
			$this->session->set_flashdata('info', 'Data Tahun Pelajaran Gagal  Terhapus');
			redirect('Admin/tahunajaran');
		}
	}
	public function formedit_th($id)
	{
		$judul['atas'] = "Halaman Form Edit Tahun Pelajaran";
		$judul['menuatas'] = "Form Edit Pelajaran";
		$data['tp'] = $this->admin_model->formedit('tahun_pelajaran', 'id_tahun_pelajaran', $id);
		$this->load->view('component/header', $judul);
		$this->load->view('formedit_th', $data);
		$this->load->view('component/footer');
	}
	public function edit_th()
	{
		$id = $this->input->post('id');
		$data = array(
			'tahun_pelajaran' => $this->input->post('th')
		);
		$query = $this->admin_model->editdata('tahun_pelajaran', 'id_tahun_pelajaran', $id, $data);
		if ($query) {
			$this->session->set_flashdata('info', 'Data Tahun Pelajaran Berhasil  Ter Edit');
			redirect('Admin/tahunajaran');
		} else {
			$this->session->set_flashdata('info', 'Data Tahun Pelajaran Gagal  Ter Edit');
			redirect('Admin/tahunajaran');
		}
	}
	//SHXploit
	public function users()
	{
		if ($this->session->userdata('level') == 'admin') {
			$judul['atas'] = "Halaman Users";
			$judul['menuatas'] = "Admin";
			$this->load->view('component/header', $judul);
			$data['use'] = $this->admin_model->tampildata('users', 'id_users');
			$this->load->view('users', $data);
			$this->load->view('component/footer');
		} else if ($this->session->userdata('level') == 'user') {
			$id = $this->session->userdata('id_users');
			$judul['atas'] = "Halaman Form Edit Users";
			$judul['menuatas'] = "Form Edit Users";
			$data['us'] = $this->admin_model->formedit('users', 'id_users', $id);
			$this->load->view('component/header', $judul);
			$this->load->view('formedit_users_session', $data);
			$this->load->view('component/footer');
		} else {
		}
	}
	public function tambah_users()
	{
		$judul['atas'] = "Halaman Tambah Users";
		$judul['menuatas'] = "Form Tambah Users";
		$this->load->view('component/header', $judul);
		$this->load->view('form_users');
		$this->load->view('component/footer');
	}
	public function  simpan_users()
	{
		$this->form_validation->set_rules('nama_lengkap', '', 'required', array('required' => 'Nama Lengkap Wajib Di Isi'));
		$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[12]', array('required' => 'Username wajib di isi', 'trim' => '', 'min_length' => 'Minimal 5 Huruf', 'max_length' => 'Maksimal 12 Huruf'));
		$this->form_validation->set_rules('password', '', 'trim|required|min_length[5]|max_length[12]', array('required' => 'Username wajib di isi', 'trim' => '', 'min_length' => 'Minimal 5 Karakter', 'max_length' => 'Maksimal 12 Karakter'));
		$this->form_validation->set_rules('conpassword', '', 'required|matches[password]', array('required' => 'Nama Password Wajib Di Isi', 'matches' => 'Password dan Konfirmasi Password Tidak Sama'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('level', '', 'required', array('required' => 'Level wajib di isi'));

		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Simpan Users";
			$judul['menuatas'] = "Form Simpan Users";
			$this->load->view('component/header', $judul);
			$this->load->view('form_users');
			$this->load->view('component/footer');
		} else {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
				'level' => $this->input->post('level')
			);
			$query = $this->admin_model->simpandata('users', $data);
			if ($query) {
				$this->session->set_flashdata('info', 'Data Users Berhasil  Tersimpan');
				redirect('Admin/users');
			} else {
				$this->session->set_flashdata('info', 'Data Users Gagal  Tersimpan');
				redirect('Admin/users');
			}
		}
	}
	public function hapus_users($id)
	{
		$this->admin_model->hapusdata('users', $id, 'id_users');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('info', 'Data Users Berhasil Terhapus');
			redirect('Admin/users');
		} else {
			$this->session->set_flashdata('info', 'Data Users Gagal  Terhapus');
			redirect('Admin/users');
		}
	}
	public function formedit_users($id)
	{
		$judul['atas'] = "Halaman Form Edit Users";
		$judul['menuatas'] = "Form Edit Users";
		$data['us'] = $this->admin_model->formedit('users', 'id_users', $id);
		$this->load->view('component/header', $judul);
		$this->load->view('formedit_users', $data);
		$this->load->view('component/footer');
	}


	public function edit_users()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('nama_lengkap', '', 'required', array('required' => 'Nama Lengkap Wajib Di Isi'));
		$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[12]', array('required' => 'Username wajib di isi', 'trim' => '', 'min_length' => 'Minimal 5 Huruf', 'max_length' => 'Maksimal 12 Huruf'));
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[12]', array('trim' => '', 'min_length' => 'Minimal 5 Karakter', 'max_length' => 'Maksimal 12 Karakter'));
		$this->form_validation->set_rules('conpassword', 'Password Confirmation', 'matches[password]', array('matches' => 'Password dan Konfirmasi Password Tidak Sama'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('level', '', 'required', array('required' => 'Level wajib di isi'));

		if ($this->form_validation->run() == FALSE) {

			$judul['atas'] = "Halaman Form Edit Users";
			$judul['menuatas'] = "Form Edit Users";
			$data['us'] = $this->admin_model->formedit('users', 'id_users', $id);
			$this->load->view('component/header', $judul);
			$this->load->view('formedit_users', $data);
			$this->load->view('component/footer');
		} else {
			if ($this->input->post('password')) {
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'email' => $this->input->post('email'),
					'level' => $this->input->post('level')
				);
				$query = $this->admin_model->editdata('users', 'id_users', $id, $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data User Berhasil  Ter Edit');
					redirect('Admin/users');
				} else {
					$this->session->set_flashdata('info', 'Data  User Gagal  Ter Edit');
					redirect('Admin/users');
				}
			} else {
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'level' => $this->input->post('level')
				);
				$query = $this->admin_model->editdata('users', 'id_users', $id, $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data User Berhasil  Ter Edit');
					redirect('Admin/users');
				} else {
					$this->session->set_flashdata('info', 'Data  User Gagal  Ter Edit');
					redirect('Admin/users');
				}
			}
		}
	}
	public function  simpan_users_session()
	{
		$this->form_validation->set_rules('nama_lengkap', '', 'required', array('required' => 'Nama Lengkap Wajib Di Isi'));
		$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[12]', array('required' => 'Username wajib di isi', 'trim' => '', 'min_length' => 'Minimal 5 Huruf', 'max_length' => 'Maksimal 12 Huruf'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]', array('required' => 'Username wajib di isi', 'trim' => '', 'min_length' => 'Minimal 5 Karakter', 'max_length' => 'Maksimal 12 Karakter'));
		$this->form_validation->set_rules('conpassword', 'Password Confirmation', 'required|matches[password]', array('required' => 'Nama Password Wajib Di Isi', 'matches' => 'Password dan Konfirmasi Password Tidak Sama'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Simpan Users";
			$judul['menuatas'] = "Form Simpan Users";
			$this->load->view('component/header', $judul);
			$this->load->view('form_users');
			$this->load->view('component/footer');
		} else {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),

			);
			$query = $this->admin_model->simpandata('users', $data);
			if ($query) {
				$this->session->set_flashdata('info', 'Data Users Berhasil  Tersimpan');
				redirect('Admin/users');
			} else {
				$this->session->set_flashdata('info', 'Data Users Gagal  Tersimpan');
				redirect('Admin/users');
			}
		}
	}
	public function edit_users_session()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('nama_lengkap', '', 'required', array('required' => 'Nama Lengkap Wajib Di Isi'));
		$this->form_validation->set_rules('username', '', 'trim|required|min_length[5]|max_length[12]', array('required' => 'Username wajib di isi', 'trim' => '', 'min_length' => 'Minimal 5 Huruf', 'max_length' => 'Maksimal 12 Huruf'));
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[12]', array('trim' => '', 'min_length' => 'Minimal 5 Karakter', 'max_length' => 'Maksimal 12 Karakter'));
		$this->form_validation->set_rules('conpassword', 'Password Confirmation', 'matches[password]', array('matches' => 'Password dan Konfirmasi Password Tidak Sama'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');


		if ($this->form_validation->run() == FALSE) {

			$judul['atas'] = "Halaman Form Edit Users";
			$judul['menuatas'] = "Form Edit Users";
			$data['us'] = $this->admin_model->formedit('users', 'id_users', $id);
			$this->load->view('component/header', $judul);
			$this->load->view('formedit_users_session', $data);
			$this->load->view('component/footer');
		} else {
			if ($this->input->post('password')) {
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'email' => $this->input->post('email'),

				);
				$query = $this->admin_model->editdata('users', 'id_users', $id, $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data User Berhasil  Ter Edit');
					redirect('Admin/users');
				} else {
					$this->session->set_flashdata('info', 'Data  User Gagal  Ter Edit');
					redirect('Admin/users');
				}
			} else {
				$data = array(
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),

				);
				$query = $this->admin_model->editdata('users', 'id_users', $id, $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data User Berhasil  Ter Edit');
					redirect('Admin/users');
				} else {
					$this->session->set_flashdata('info', 'Data  User Gagal  Ter Edit');
					redirect('Admin/users');
				}
			}
		}
	}

	public function pengaturan()
	{
		$id = $this->session->userdata('id_users');
		$judul['atas'] = "Halaman Pengaturan Akun";
		$judul['menuatas'] = "Pengaturan Akun";
		$data['us'] = $this->admin_model->formedit('users', 'id_users', $id);
		$this->load->view('component/header', $judul);
		$data['error'] = "";
		$this->load->view('pengaturan', $data);
		$this->load->view('component/footer');
	}

	public function simpan_pengaturan()
	{
		$id = $this->session->userdata('id_users');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', array('required' => 'Nama Lengkap Wajib Di Isi'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[20]', array('required' => 'Username wajib di isi', 'min_length' => 'Minimal 4 karakter', 'max_length' => 'Maksimal 20 karakter'));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[20]', array('min_length' => 'Minimal 5 karakter', 'max_length' => 'Maksimal 20 karakter'));
			$this->form_validation->set_rules('conpassword', 'Konfirmasi Password', 'required|matches[password]', array('required' => 'Konfirmasi Password Wajib Di Isi', 'matches' => 'Password dan Konfirmasi Password Tidak Sama'));
		}

		if ($this->form_validation->run() == FALSE) {
			$judul['atas'] = "Halaman Pengaturan Akun";
			$judul['menuatas'] = "Pengaturan Akun";
			$data['us'] = $this->admin_model->formedit('users', 'id_users', $id);
			$data['error'] = "";
			$this->load->view('component/header', $judul);
			$this->load->view('pengaturan', $data);
			$this->load->view('component/footer');
		} else {
			$nama_lengkap = $this->input->post('nama_lengkap');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$user_lama = $this->admin_model->formedit('users', 'id_users', $id);

			$data = array(
				'nama_lengkap' => $nama_lengkap,
				'username' => $username,
				'email' => $email
			);

			if ($this->input->post('password')) {
				$data['password'] = md5($this->input->post('password'));
				$this->session->set_userdata('password', $data['password']);
			}

			if (isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != '') {
				$config['upload_path'] = './assets/users/';
				$config['allowed_types'] = 'gif|jpg|png|JPG|jpeg';
				$config['max_size'] = 2048;
				$config['encrypt_name'] = True;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$gbr = $this->upload->data();
					if ($user_lama && !empty($user_lama->foto) && file_exists('./assets/users/' . $user_lama->foto)) {
						unlink('./assets/users/' . $user_lama->foto);
					}
					$config['image_library'] = 'gd2';
					$config['source_image'] = './assets/users/' . $gbr['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['quality'] = '70%';
					$config['width'] = 300;
					$config['height'] = 300;
					$config['new_image'] = './assets/users/' . $gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data['foto'] = $gbr['file_name'];
					$this->session->set_userdata('foto', $gbr['file_name']);
				} else {
					$judul['atas'] = "Halaman Pengaturan Akun";
					$judul['menuatas'] = "Pengaturan Akun";
					$data['us'] = $user_lama;
					$data['error'] = $this->upload->display_errors(' ');
					$this->load->view('component/header', $judul);
					$this->load->view('pengaturan', $data);
					$this->load->view('component/footer');
					return;
				}
			}

			$query = $this->admin_model->editdata('users', 'id_users', $id, $data);
			if ($query) {
				$this->session->set_userdata('nama_lengkap', $nama_lengkap);
				$this->session->set_userdata('username', $username);
				$this->session->set_userdata('email', $email);
				$this->session->set_flashdata('info', 'Pengaturan Akun & Foto Profil Berhasil Diperbarui!');
				redirect('pengaturan');
			} else {
				$this->session->set_flashdata('info', 'Pengaturan Akun Gagal Diperbarui!');
				redirect('pengaturan');
			}
		}
	}
}
