<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhsmatkul extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhsmatkul');
        $this->load->model('m');
        $this->load->helper('url');
        $this->load->library('session');
    }

	public function index()
	{
		$data['u']=$this->m_mhsmatkul->show_mhsmatkul();
        $this->load->view('header');
        $this->load->view('v_mhsmatkul',$data);
        $this->load->view('footer');
    }
    public function pilih()
    {
        $p = $this->input->post('pilih');
        switch($p)
        {
            case "2":
            redirect('mhsmatkul/mhs');
            break;
            case "3":
            redirect('mhsmatkul/matkul');
            break;
            default:
            redirect('mhsmatkul');
        }
    }
    //MAHASISWA//
	public function mhs()
	{
        $data['ddmhs']=$this->m_mhsmatkul->ddmhs();
        $data['u']=$this->m_mhsmatkul->tampilallmhs();
        $this->load->view('header');
        $this->load->view('v_mhsm',$data);
        $this->load->view('footer');
    }
    public function tampilmhs()
	{
        $id_mhs = $this->input->post('id_mhs');
        $data['m'] = $this->input->post('id_mhs');
        $where = array('id_mhs' => $id_mhs);

        $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul($id_mhs);
        $data['u']=$this->m_mhsmatkul->tampilmhs($id_mhs);
        $data['s']=$this->m_mhsmatkul->selectedmhs($id_mhs);
        $this->load->view('header');
        $this->load->view('v_mhsm2',$data);
        $this->load->view('footer');
    }
    public function tampilmhs2()
	{
        $id_mhs = $this->mhsmatkul->tambahmatkul($id_mhs);;
        $data['m'] = $id_mhs;
        $where = array('id_mhs' => $id_mhs);

        $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
        $data['u']=$this->m_mhsmatkul->tampilmhs($id_mhs);
        $data['s']=$this->m_mhsmatkul->selectedmhs($id_mhs);
        $this->load->view('header');
        $this->load->view('v_mhsm2',$data);
        $this->load->view('footer');
    }
    public function tambahmatkul()
    {
        $id_mhs = $this->input->post('id_mhs');
        $id_jadwal = $this->input->post('id_jadwal');
        $data = array(
			'id_mhs' => $id_mhs,
            'id_jadwal' => $id_jadwal);
        $this->m->input_data($data,'mhsmatkul');
        redirect('mhsmatkul/mhs');
        //$this->session->set_flashdata($id_mhs, $myVar);
    }
    public function hapus($id_mhsmatkul)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_mhsmatkul' => $id_mhsmatkul);
        $this->m->update_data($where,$data,'mhsmatkul');
        redirect('mhsmatkul/mhs');
	}
    //MATA KULIAH//
	public function matkul()
	{
        $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
        $data['u']=$this->m_mhsmatkul->tampilallmatkul();
        $this->load->view('header');
        $this->load->view('v_matkulm',$data);
        $this->load->view('footer');
    }
    public function tampilmatkul()
	{
        $id_jadwal = $this->input->post('id_jadwal');
        $data['m'] = $this->input->post('id_jadwal');
        $where = array('id_jadwal' => $id_jadwal);

        $data['ddmhs']=$this->m_mhsmatkul->ddmhs($id_jadwal);
        $data['u']=$this->m_mhsmatkul->tampilmatkul($id_jadwal);
        $data['s']=$this->m_mhsmatkul->selectedmatkul($id_jadwal);
        $this->load->view('header');
        $this->load->view('v_matkulm2',$data);
        $this->load->view('footer');
    }
    public function tambahmhs()
    {
        $id_mhs = $this->input->post('id_mhs');
        $id_jadwal = $this->input->post('id_jadwal');
        $data = array(
			'id_mhs' => $id_mhs,
            'id_jadwal' => $id_jadwal);
        $this->m->input_data($data,'mhsmatkul');
        redirect('mhsmatkul/matkul');
        //$this->session->set_flashdata($id_mhs, $myVar);
    }
    public function hapusmhs($id_mhsmatkul)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_mhsmatkul' => $id_mhsmatkul);
        $this->m->update_data($where,$data,'mhsmatkul');
        redirect('mhsmatkul/matkul');
	}
}
