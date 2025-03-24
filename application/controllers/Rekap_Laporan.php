<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_Laporan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_cuti');
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

            $this->load->view('super_admin/rekap_laporan', $data);
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }

    public function view_admin()
    {
        if ($this->session->userdata('logged_in') == true and $this->session->userdata('id_user_level') == 2) {

            $data['admin_data'] = $this->m_user->get_all_admin()->result_array();
            $data['admin'] = $this->m_user->get_all_admin()->result_array();
            $data['jenis_kelamin'] = $this->m_jenis_kelamin->get_all_jenis_kelamin()->result_array();

            $this->load->view('admin/rekap_laporan', $data);
        } else {

            $this->session->set_flashdata('loggin_err', 'loggin_err');
            redirect('Login/index');
        }
    }
	
    
}