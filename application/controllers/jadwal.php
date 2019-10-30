<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m');
        $this->load->model('m_jadwal');
        $this->load->helper('url');
    }

	public function aturjadwal()
	{
		$data['jadwal']=$this->m_jadwal->show_jadwal();
		$this->load->view('header');
		$this->load->view('v_aturjadwal',$data);
		$this->load->view('footer');	
		
	}
	public function show_jadwal()
	{
		$data['jadwal']=$this->m_jadwal->show_jadwal();
		$this->load->view('header');
		$this->load->view('v_jadwal',$data);
		$this->load->view('footer');	
		
	}
	public function tambah(){
		$data['ddsmt'] = $this->m_jadwal->ddsmt();
		$data['ddmatkul'] = $this->m_jadwal->ddmatkul();
		$data['dddosen'] = $this->m_jadwal->dddosen();
		$data['ddkelas'] = $this->m_jadwal->ddkelas();
		$this->load->view('header');
		$this->load->view('v_tambahjadwal',$data);
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$id_smt = $this->input->post('id_smt');
		$hari = $this->input->post('hari');
		$waktu = $this->input->post('waktu');
		$id_matkul = $this->input->post('id_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_kls = $this->input->post('id_kls');
 
		$data = array(
			'id_smt' => $id_smt,
			'hari' => $hari,
			'waktu' => $waktu,
			'id_matkul' => $id_matkul,
			'id_dosen' => $id_dosen,
			'id_kls' => $id_kls
			);
		$this->m->input_data($data,'jadwal');
		redirect('jadwal/aturjadwal');
	}
	public function hapus($id_jadwal){
		$where = array('id_jadwal' => $id_jadwal);
		$this->m->hapus_data($where,'jadwal');
		redirect('jadwal/aturjadwal');
	}

	public function edit($id_jadwal)
	{
		$where = array('id_jadwal' => $id_jadwal);
		$data['ddsmt'] = $this->m_jadwal->ddsmt();
		$data['ddmatkul'] = $this->m_jadwal->ddmatkul();
		$data['dddosen'] = $this->m_jadwal->dddosen();
		$data['ddkelas'] = $this->m_jadwal->ddkelas();
		$data['u'] = $this->m->edit_data($where,'jadwal')->result();
		$this->load->view('header');
		$this->load->view('v_editjadwal',$data);
	    $this->load->view('footer');
	}

	public function update(){
		$id_jadwal = $this->input->post('id_jadwal');
		$hari = $this->input->post('hari');
		$waktu = $this->input->post('waktu');
		$id_matkul = $this->input->post('id_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_kls = $this->input->post('id_kls');
		$id_smt = $this->input->post('id_smt');
		
		$data = array(
			'id_jadwal' => $id_jadwal,
			'hari' => $hari,
			'waktu' => $waktu,
			'id_matkul' => $id_matkul,
			'id_dosen' => $id_dosen,
			'id_kls' => $id_kls,
			'id_smt' => $id_smt);
	
		$where = array('id_jadwal' => $id_jadwal);
		
		$this->m->update_data($where,$data,'jadwal');
		redirect('jadwal/aturjadwal');
	}

	//TAMBAH OPSI LAIN
	public function tambahmatkul()
    {
        $data['dropdown'] = $this->m_matkul->dropdown();
		$this->load->view('header');
		$this->load->view('v_tambahmatkul', $data);
		$this->load->view('footer');
	}
	//BELUM YAAA

	
	
}

