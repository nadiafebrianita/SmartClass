<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_matkul');
        $this->load->model('m');
        $this->load->helper('url');
    }

	public function aturmatkul()
	{
		$data['u']=$this->m_matkul->show_matkul();
		$this->load->view('header');
        $this->load->view('v_aturmatkul',$data);	
		$this->load->view('footer');
	}
	public function tambah()
    {
        $data['dropdown'] = $this->m_matkul->dropdown();
		$this->load->view('header');
		$this->load->view('v_tambahmatkul', $data);
		$this->load->view('footer');
	}
	
	public function tambah_aksi(){
		$kode_matkul = $this->input->post('kode_matkul');
		$nama_matkul = $this->input->post('nama_matkul');
		$id_prodi = $this->input->post('id_prodi');
 
		$data = array(
			'kode_matkul' => $kode_matkul,
			'nama_matkul' => $nama_matkul,
			'id_prodi' => $id_prodi
			);
		$this->m->input_data($data,'matkul');
		redirect('matkul/aturmatkul');
	}
	
	public function edit($id_matkul)
	{
		$where = array('id_matkul' => $id_matkul);
		$data['dropdown'] = $this->m_matkul->dropdown();
		$data['u'] = $this->m->edit_data($where,'matkul')->result();
		$this->load->view('header');
		$this->load->view('v_editmatkul',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$id_matkul = $this->input->post('id_matkul');
		$kode_matkul = $this->input->post('kode_matkul');
		$nama_matkul = $this->input->post('nama_matkul');
		$id_prodi = $this->input->post('id_prodi');
		
		$data = array(
			'kode_matkul' => $kode_matkul,
			'nama_matkul' => $nama_matkul,
			'id_prodi' => $id_prodi
			);
	
		$where = array('id_matkul' => $id_matkul);
		$this->m->update_data($where,$data,'matkul');
		redirect('matkul/aturmatkul');
	}
	public function hapus($id_matkul){
		$where = array('id_matkul' => $id_matkul);
		$this->m->hapus_data($where,'matkul');
		redirect('matkul/aturmatkul');
	}

	//SEARCH//
	public function search(){
		// Ambil data NIS yang dikirim via ajax post
		$keyword = $this->input->post('keyword');
		$siswa = $this->m_matkul->search($keyword);
		
		// Kita load file view.php sambil mengirim data siswa hasil query function search di SiswaModel
		$hasil = $this->load->view('aturmatkul', array('matkul'=>$siswa), true);
		
		// Buat sebuah array
		$callback = array(
		  'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		);
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	  }
}
