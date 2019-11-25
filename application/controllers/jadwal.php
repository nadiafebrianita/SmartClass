<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

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
		$data['dosen2'] = $this->m_jadwal->dosen2();
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

	//IMPORTTT
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
		$this->load->view('header');
		$this->load->view('v_jadwalform', $data);
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
		$datasmt = [];
		$datamatkul = [];
		$datadosen1 = [];
		$datadosen2 = [];
		$datakls = [];
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
			$hari = ucwords(strtolower($get[1])); 
			$waktuawal = $get[2]; 
			$waktuakhir = $get[3]; 
			$matkul = ucwords(strtolower($get[4])); 
			$dosen1 = strtoupper($get[5]); 
			$dosen2 = strtoupper($get[6]); 
			$kls = strtoupper($get[7]);
			$id_smt = 0;
			$id_matkul = 0;
			$id_dosen = 0;
			$id_dosen2 = 0;
			$id_kls = 0;
			// Kita push (add) array data ke variabel data
			array_push($datasmt,[
				'id_smt'=>$id_smt
			]);
			array_push($datamatkul,[
				'nama_matkul'=>$matkul
			]);
			array_push($datadosen1, [
				'alias'=>$dosen1
			]);
			array_push($datadosen2, [
				'alias'=>$dosen2
			]);
			array_push($datakls, [
				'nama_kls'=>$kls
			]);
			array_push($data, [
				'hari'=>$hari,
				'waktu'=>$waktuawal,
				'akhir'=>$waktuakhir,
				'id_matkul'=>$id_matkul,
				'id_dosen'=>$id_dosen,
				'id_dosen2'=>$id_dosen2,
				'id_kls'=>$id_kls,
				'id_smt'=>$id_smt
			]);
			}
			$numrow++; // Tambah 1 setiap kali looping
		}
		$this->m_jadwal->insert_multiple($datasmt,$datamatkul,$datadosen1,$datadosen2,$datakls,$data);
		redirect("jadwal/aturjadwal");
	}
	
}

