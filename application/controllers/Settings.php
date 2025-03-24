<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->model('m_jenis_kelamin');
	}

	// super_admin view
	public function view_super_admin()
	{
		$data['super_admin_data'] = $this->m_user->get_admin_by_id($this->session->userdata('id_user'))->result_array();
		$data['super_admin'] = $this->m_user->get_super_admin_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('super_admin/settings', $data);
	}

	// admin view
	public function view_admin()
	{
		$data['admin_data'] = $this->m_user->get_admin_by_id($this->session->userdata('id_user'))->result_array();
		$data['admin'] = $this->m_user->get_admin_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('admin/settings', $data);
	}

	// pegawai view
	public function view_pegawai()
	{
		$data['pegawai_data'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->result_array();
		$data['pegawai'] = $this->m_user->get_pegawai_by_id($this->session->userdata('id_user'))->row_array();
		$data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();
		$this->load->view('pegawai/settings', $data);
	}

	// lengkapi data super_admin
	public function lengkapi_data_super_admin()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$jabatan = $this->input->post("jabatan");

		// Konfigurasi upload file
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20489;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('pangkat')) {
			// Jika gagal upload
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('form_cuti/view_super_admin');
		} else {
			// Jika berhasil upload
			$upload_data = $this->upload->data();
			$pangkat = $upload_data['file_name']; // Nama file yang diupload

			$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat, $nip, $pangkat, $jabatan);

			if ($hasil == false) {
				$this->session->set_flashdata('error', 'Gagal memperbarui data.');
				redirect('form_cuti/view_super_admin');
			} else {
				$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
				redirect('Cuti/view_super_admin');
			}
		}
	}

	// lengkapi data admin
	public function lengkapi_data_admin()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$jabatan = $this->input->post("jabatan");

		// Konfigurasi upload file
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20489;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('pangkat')) {
			// Jika gagal upload
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('form_cuti/view_admin');
		} else {
			// Jika berhasil upload
			$upload_data = $this->upload->data();
			$pangkat = $upload_data['file_name']; // Nama file yang diupload

			$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat, $nip, $pangkat, $jabatan);

			if ($hasil == false) {
				$this->session->set_flashdata('error', 'Gagal memperbarui data.');
				redirect('form_cuti/view_admin');
			} else {
				$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
				redirect('Cuti/view_admin');
			}
		}
	}

	// lengkapi data pegawai
	public function lengkapi_data()
	{
		$id = $this->input->post("id");
		$nama_lengkap = $this->input->post("nama_lengkap");
		$no_telp = $this->input->post("no_telp");
		$alamat = $this->input->post("alamat");
		$id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
		$nip = $this->input->post("nip");
		$jabatan = $this->input->post("jabatan");

		// Konfigurasi upload file
		$config['upload_path'] = './assets/upload/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20489;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('pangkat')) {
			// Jika gagal upload
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);
			redirect('form_cuti/view_pegawai');
		} else {
			// Jika berhasil upload
			$upload_data = $this->upload->data();
			$pangkat = $upload_data['file_name']; // Nama file yang diupload

			$hasil = $this->m_user->update_user_detail($id, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat, $nip, $pangkat, $jabatan);

			if ($hasil == false) {
				$this->session->set_flashdata('error', 'Gagal memperbarui data.');
				redirect('form_cuti/view_pegawai');
			} else {
				$this->session->set_flashdata('success', 'Data berhasil diperbarui.');
				redirect('form_cuti/view_pegawai');
			}
		}
	}



	public function settings_account_super_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if ($password == $re_password) {
			$hasil = $this->m_user->update_user($id, $username, $password);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_edit', 'eror_edit');
				redirect('Settings/view_super_admin');
			} else {
				$this->session->set_flashdata('edit', 'edit');
				redirect('Settings/view_super_admin');
			}
		} else {
			$this->session->set_flashdata('password_err', 'password_err');
			redirect('Settings/view_super_admin');
		}
	}

	public function settings_account_admin()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if ($password == $re_password) {
			$hasil = $this->m_user->update_user($id, $username, $password);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_edit', 'eror_edit');
				redirect('Settings/view_admin');
			} else {
				$this->session->set_flashdata('edit', 'edit');
				redirect('Settings/view_admin');
			}
		} else {
			$this->session->set_flashdata('password_err', 'password_err');
			redirect('Settings/view_admin');
		}
	}

	public function settings_account_pegawai()
	{
		$id = $this->session->userdata('id_user');
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$re_password = $this->input->post("re_password");

		// echo var_dump($id);
		// echo var_dump($username);
		// echo var_dump($password);
		// echo var_dump($re_password);
		// die();

		if ($password == $re_password) {
			$hasil = $this->m_user->update_user($id, $username, $password);

			if ($hasil == false) {
				$this->session->set_flashdata('eror_edit', 'eror_edit');
				redirect('Settings/view_pegawai');
			} else {
				$this->session->set_flashdata('edit', 'edit');
				redirect('Settings/view_pegawai');
			}
		} else {
			$this->session->set_flashdata('password_err', 'password_err');
			redirect('Settings/view_pegawai');
		}
	}
}
