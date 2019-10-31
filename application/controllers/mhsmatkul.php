<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhsmatkul extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhsmatkul');
        $this->load->helper('url');
    }

	public function index()
	{
		$data['dd']=$this->m_mhsmatkul->dd();
		$data['u']=$this->m_mhsmatkul->show_mhsmatkul();
        $this->load->view('header');
        $this->load->view('v_mhsmatkul',$data);
        $this->load->view('footer');
    }
	public function mhs()
	{
		$data['dd']=$this->m_mhsmatkul->dd();
		$data['u']=$this->m_mhsmatkul->show_mhsmatkul();
        $this->load->view('header');
        $this->load->view('v_mhsm',$data);
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
            $this->load->view('v_matkulm');
            break;
            default:
            redirect('mhsmatkul');
        }
    }
}
