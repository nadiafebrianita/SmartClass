<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
        parent::__construct();
        $this->load->model('m_matkul');
        $this->load->model('m');
		$this->load->helper('url');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function aturmatkul()
	{
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$data['u']=$this->m_matkul->show_matkulprodi($prodi);
			$this->load->view('header2');
			$this->load->view('v2_aturmatkul',$data);	
		}
		else{
			$data['u']=$this->m_matkul->show_matkul();
			$data['ddprodi']=$this->m_matkul->ddprodi();
			$data['p']=1;
			$this->load->view('header');
			$this->load->view('v_aturmatkul',$data);		
		}
		$this->load->view('footer');
	}
	public function prodi()
	{
		$id_prodi = $this->input->post('id_prodi');
        if($id_prodi=="0"){
            redirect('matkul/aturmatkul');
        }
        else{
            //$where = array('id_prodi' => $id_prodi);
			$data['u']=$this->m_matkul->selected($id_prodi);
			$data['ddprodi']=$this->m_matkul->ddprodi();
			$this->load->view('header');
			$this->load->view('v_aturmatkul',$data);
			$this->load->view('footer');	
			}
	}
	public function tambah()
    {
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$data['dd'] = $this->m_matkul->dd($prodi);
			$this->load->view('header2');
		}
		else{
			$data['ddprodi'] = $this->m_matkul->ddprodiall();
			$this->load->view('header');
		}
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
		$res = $this->m_matkul->input_data($data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
			redirect('matkul/aturmatkul');
		}else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data, Mata Kuliah Sudah Terdaftar");
			redirect('matkul/aturmatkul');
		}
	}
	
	public function edit($id_matkul)
	{
		$data['u'] = $this->m_matkul->edit_data($id_matkul);
		
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$data['dd'] = $this->m_matkul->dd($prodi);
			$this->load->view('header2');
			$this->load->view('v_editmatkul',$data);
			$this->load->view('footer');	
		}
		else{
			$data['ddprodi'] = $this->m_matkul->ddprodi();
			$this->load->view('header');
			$this->load->view('v_editmatkul',$data);
			$this->load->view('footer');	
		}
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
		$res = $this->m->update_data($where,$data,'matkul');

		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Data"); 
			redirect('matkul/aturmatkul');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengubah Data");
			redirect('matkul/aturmatkul');
		}
	}
	public function hapus($id_matkul)
	{
		$where = array('id_matkul' => $id_matkul);
		$res=$this->m->hapus_data($where,'matkul');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
			redirect('matkul/aturmatkul');
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
			redirect('matkul/aturmatkul');
		}
	}
	//IMPORT EXCEL
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			
			// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			$upload = $this->m->upload_file($this->filename);
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
			// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel/PHPExcel.php';
			
			$csvreader = PHPExcel_IOFactory::createReader('CSV');
			$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
			$sheet = $loadcsv->getActiveSheet()->getRowIterator();
			
			// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
			// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
			$data['sheet'] = $sheet; 
			}else{ // Jika proses upload gagal
			$data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
		$this->load->view('v_matkulform', $data);
		$this->load->view('footer');
		}
	public function import(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$csvreader = PHPExcel_IOFactory::createReader('CSV');
		$loadcsv = $csvreader->load('csv/'.$this->filename.'.csv'); // Load file yang tadi diupload ke folder csv
		$sheet = $loadcsv->getActiveSheet()->getRowIterator();
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data = [];
		$dataprodi = [];
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
			$get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
			foreach ($cellIterator as $cell) {
				array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
			}
			// <-- END
			// Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
			$kode = strtoupper($get[1]); 
			$nama = ucwords(strtolower($get[2])); 
			$prodi = ucwords(strtolower($get[3]));
			$id_prodi = $this->input->post('id_prodi');
			// Kita push (add) array data ke variabel data
			array_push($dataprodi,[
				'nama_prodi'=>$prodi
			]);
			array_push($data, [
				'kode_matkul'=>$kode, // Insert data nis
				'nama_matkul'=>$nama,
				'id_prodi'=>$id_prodi
			]);
			}
			$numrow++; // Tambah 1 setiap kali looping
		}
		$res = $this->m_matkul->insert_multiple($dataprodi,$data);
		if($res==true){
			$this->session->set_flashdata('true', "Berhasil Mengimpor Data"); 
			redirect('matkul/aturmatkul');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengimpor Data");
			redirect('matkul/aturmatkul');
		}	
	}
}
