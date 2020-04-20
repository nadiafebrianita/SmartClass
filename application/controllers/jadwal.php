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
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function aturjadwal()
	{
		$prodi = $this->session->userdata("id_prodi");
		if(!empty($prodi)){
			$col='smt.status';
			$val='Aktif';
			$data['jadwal']=$this->m_jadwal->show_jadwalprodi($col,$val,$prodi);
			$this->load->view('header2');
			$this->load->view('v2_aturjadwal',$data);	
		}
		else{
			$col='smt.status';
			$val='Aktif';
			$data['jadwal']=$this->m_jadwal->show_jadwal($col,$val);
			$data['ddprodi']=$this->m_jadwal->ddprodi();
			$data['p']=1;
			$this->load->view('header');
			$this->load->view('v_aturjadwal',$data);		
		}		
		$this->load->view('footer');
	}

	public function prodi()
	{
		$col = 'smt.status';
		$val = 'aktif';
		$id_prodi = $this->input->post('id_prodi');
        if($id_prodi=="0"){
            redirect('jadwal/aturjadwal');
        }
        else{
			$data['jadwal']=$this->m_jadwal->show_jadwalprodi($col,$val,$id_prodi);
			$data['ddprodi']=$this->m_jadwal->ddprodi();
			$this->load->view('header');
			$this->load->view('v_aturjadwal',$data);
			$this->load->view('footer');	
			}
	}
	public function tambah(){
		$prodi = $this->session->userdata("id_prodi");

		$data['ddsmt'] = $this->m_jadwal->ddsmt();
		$data['dddosen'] = $this->m_jadwal->dddosen();

		if(!empty($prodi)){
			$data['ddmatkulprodi'] = $this->m_jadwal->ddmatkulprodi($prodi);
			$data['ddkelas'] = $this->m_jadwal->ddkelas();
			$this->load->view('header2');
		}
		else{
			$data['ddmatkul'] = $this->m_jadwal->ddmatkul();
			$data['ddkelas'] = $this->m_jadwal->ddkelas();
			$this->load->view('header');
		}
		$this->load->view('v_tambahjadwal',$data);
		$this->load->view('footer');	
	}
	public function tambah_aksi(){
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
		$col='smt.status';
		$val='aktif';
		$res = $this->m_jadwal->cek($data,$col,$val);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
			redirect('jadwal/aturjadwal');
		}else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data");
			redirect('jadwal/aturjadwal');
		}		
	}
	public function hapus($id_jadwal)
	{
        $where = array('id_jadwal' => $id_jadwal);
		$res=$this->m->hapus_data($where,'jadwal');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
			redirect('jadwal/aturjadwal');
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
			redirect('jadwal/aturjadwal');
		}
	}

	public function edit($id_jadwal){
		$where = array('id_jadwal' => $id_jadwal);
		$prodi = $this->session->userdata("id_prodi");

		$data['ddsmt'] = $this->m_jadwal->ddsmt();
		$data['dddosen'] = $this->m_jadwal->dddosen();
		$data['ddkelas'] = $this->m_jadwal->ddkelas();
		$data['u'] = $this->m_jadwal->edit_data($id_jadwal);
		if(!empty($prodi)){
			$data['ddmatkulprodi'] = $this->m_jadwal->ddmatkulprodi($prodi);
			$this->load->view('header2');
		}
		else{
			$data['ddmatkul'] = $this->m_jadwal->ddmatkul();
			$this->load->view('header');
		}
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
		$res = $this->m->update_data($where,$data,'jadwal');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengubah Data"); 
			redirect('jadwal/aturjadwal');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengubah Data");
			redirect('jadwal/aturjadwal');
		}
	}

	//IMPORTTT
	public function form(){
		$data = array(); // Buat variabel $data sebagai array
		$data['ddsmtall']=$this->m_jadwal->ddsmtall();
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
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
		$this->load->view('v_jadwalform', $data);
		$this->load->view('footer');
	}
	public function importsmt(){
		$col = 'smt.id_smt';
		$val = $this->input->post('id_smt');
		$prodi = $this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$db = $this->m_jadwal->show_jadwalprodi($col,$val,$prodi);
		}
		else{
			$db = $this->m_jadwal->show_jadwal($col,$val);
		}
		$id_smt = $this->m_jadwal->ddsmt()->result();
		for($i = 0; $i < count($db); $i++){
			$data = array(
				'hari'=>$db[$i]->hari,
				'waktu'=>$db[$i]->waktu,
				'akhir'=>$db[$i]->akhir,
				'id_matkul'=>$db[$i]->id_matkul,
				'id_dosen'=>$db[$i]->id_dosen,
				'id_dosen2'=>$db[$i]->id_dosen2,
				'id_kls'=>$db[$i]->id_kls,
				'id_smt'=>$id_smt[0]->id_smt
			);
			$col = 'smt.status';
			$val = 'aktif';
			$cek = $this->m_jadwal->cek($data,$col,$val);
		}
		if($cek==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengimpor Data"); 
			redirect('jadwal/aturjadwal');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengimpor Data");
			redirect('jadwal/aturjadwal');
		}

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
		$res = $this->m_jadwal->insert_multiple($datasmt,$datamatkul,$datadosen1,$datadosen2,$datakls,$data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengimpor Data"); 
			redirect('jadwal/aturjadwal');
		}else{
			$this->session->set_flashdata('err', "Gagal Mengimpor Data");
			redirect('jadwal/aturjadwal');
		}
	}
}

