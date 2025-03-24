<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->model('m_jenis_kelamin');
    }

    public function view_super_admin()
    {
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            $data['admin_data'] = $this->m_user->get_all_admin()->result_array();
            $data['admin'] = $this->m_user->get_all_admin()->result_array();
            $data['super_admin_data'] = $this->m_user->get_all_super_admin()->result_array();
            $data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();

            $this->load->view('super_admin/admin', $data);
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }

    // Super_Admin Tambah Admin
    public function tambah_admin()
    {
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('id_user_level') == 3) {
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $email = $this->input->post("email");
            $nama_lengkap = $this->input->post("nama_lengkap");
            $id_jenis_kelamin = $this->input->post("id_jenis_kelamin");
            $no_telp = $this->input->post("no_telp");
            $alamat = $this->input->post("alamat");
            $id_user_level = 2;
            $id = md5($username . $email . $password);
    
            // Cek apakah no_telp atau email sudah ada
            $existing_user = $this->m_user->check_user_exists($email, $no_telp);
            
            if ($existing_user) {
                // Jika data sudah ada, tampilkan pesan error
                $this->session->set_flashdata('eror', 'Data sudah ada');
                redirect('Admin/view_super_admin');
            } else {
                // Jika data belum ada, lanjutkan proses penambahan data
                $hasil = $this->m_user->pendaftaran_user($id, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat);
    
                if ($hasil == false) {
                    $this->session->set_flashdata('eror', 'eror');
                    redirect('Admin/view_super_admin');
                } else {
                    $this->session->set_flashdata('input', 'input');
                    redirect('Admin/view_super_admin');
                }
            }
        } else {
            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }

    public function edit_admin()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            $id_user = $this->input->post("id_user");
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $email = $this->input->post("email");
            $id_user_level = 2;


            $hasil = $this->m_user->update_user($id_user, $username, $password, $email, $id_user_level);

            if ($hasil == false) {
                $this->session->set_flashdata('eror_edit', 'eror_edit');
                redirect('Admin/view_super_admin');
            } else {
                $this->session->set_flashdata('edit', 'edit');
                redirect('Admin/view_super_admin');
            }
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }

    public function hapus_admin()
    {

        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 3) {

            $id_user = $this->input->post("id_user");

            $hasil = $this->m_user->delete_admin($id_user);

            if ($hasil == false) {
                $this->session->set_flashdata('eror_hapus', 'eror_hapus');
                redirect('Admin/view_super_admin');
            } else {
                $this->session->set_flashdata('hapus', 'hapus');
                redirect('Admin/view_super_admin');
            }
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }
}
