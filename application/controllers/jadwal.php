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
		// 1
		$id_smt = $this->input->post('id_smt');
		$hari = $this->input->post('hari');
		$waktu = $this->input->post('waktu');
		$akhir = $this->input->post('akhir');
		$id_matkul = $this->input->post('id_matkul1');
		$id_dosen = $this->input->post('id_dosen1');
		$id_dosen2 = $this->input->post('id_dosen2');
		if($id_dosen2==0){
			$id_dosen2 = NULL;
		}
		$id_kls = $this->input->post('id_kls1');
		if($id_matkul==0){
			echo '<script>alert("Belum Isi Matkul!");</script>';
			redirect('jadwal/tambah', 'refresh');
		}
		if($id_dosen==0){
			echo '<script>alert("Belum Isi Dosen!");</script>';
			redirect('jadwal/tambah', 'refresh');
		}
		if($id_kls==0){
			echo '<script>alert("Belum Isi Kelas!");</script>';
			redirect('jadwal/tambah', 'refresh');
		}
		if($hari=="- Pilih Hari -"){
			echo '<script>alert("Belum Isi Hari!");</script>';
			redirect('jadwal/tambah', 'refresh');
		}
		if($waktu=="00:00"){
			echo '<script>alert("Belum Isi Waktu Awal!");</script>';
			redirect('jadwal/tambah', 'refresh');
		}
		if($akhir=="00:00"){
			echo '<script>alert("Belum Isi Waktu Akhir!");</script>';
			redirect('jadwal/tambah', 'refresh');
		}
		
		else{
			$data = array(
				'id_smt' => $id_smt,
				'hari' => $hari,
				'waktu' => $waktu,
				'akhir' => $akhir,
				'id_matkul' => $id_matkul,
				'id_dosen' => $id_dosen,
				'id_dosen2' => $id_dosen2,
				'id_kls' => $id_kls
				);
			$this->m->input_data($data,'jadwal');
			redirect('jadwal/aturjadwal');
		}
		
		
	}
	public function hapus($id_jadwal)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_jadwal' => $id_jadwal);
        $this->m->update_data($where,$data,'jadwal');
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
		$akhir = $this->input->post('akhir');
		$id_matkul = $this->input->post('id_matkul');
		$id_dosen = $this->input->post('id_dosen');
		$id_dosen2 = $this->input->post('id_dosen2');
		if($id_dosen2==0){
			$id_dosen2 = NULL;
		}
		$id_kls = $this->input->post('id_kls');
		$id_smt = $this->input->post('id_smt');
		
		$data = array(
			'id_jadwal' => $id_jadwal,
			'hari' => $hari,
			'waktu' => $waktu,
			'akhir' => $akhir,
			'id_matkul' => $id_matkul,
			'id_dosen' => $id_dosen,
			'id_dosen2' => $id_dosen2,
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

