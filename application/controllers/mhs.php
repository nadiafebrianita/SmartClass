<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {
	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhs');
        $this->load->model('m');
		$this->load->helper(array('form', 'url', 'text'));
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }

	public function index()
	{
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$data['mhs']=$this->m_mhs->show_mhsprodi($prodi);	
			$this->load->view('header2');
		}
		else{
			$data['mhs']=$this->m_mhs->show_mhs();
			$this->load->view('header');
		}
		$this->load->view('v_mhs',$data);
		$this->load->view('footer');
		
	}
	public function edit($nim)
	{
		$where = array('nim' => $nim);
		$data['u'] = $this->m->edit_data($where,'mhs')->result();
		$data['a'] = $this->m_mhs->edit_data($where)->result();
		$this->load->view('header');
		$this->load->view('v_editmhs',$data);
	    $this->load->view('footer');
	}
	
	public function update(){
		$nama_mhs = $this->input->post('nama_mhs');
		$nim = $this->input->post('nim');
		$id_scan = $this->input->post('id_scan');
		$alias = $this->input->post('alias');
		
		$data = array(
			'nama_mhs' => $nama_mhs,
			'nim' => $nim,
			);
		$datascan = array(
			'alias' => $alias
			);
	
		$where = array('nim' => $nim);
		$where1 = array('id_scan' => $id_scan);

		$this->m->update_data($where,$data,'mhs');
		$this->m->update_data($where1,$datascan,'user_scan');

		redirect('mhs/index');
	}

	public function tambah(){
		$prodi=$this->session->userdata('id_prodi');
		$data['ddprodi']=$this->m_mhs->ddprodi();
		if(!empty($prodi)){
			$this->load->view('header2');
		}
		else{
			$this->load->view('header');
		}
		$this->load->view('v_tambahmhs',$data);
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$id_scan = $this->input->post('id_scan');
		$nama_mhs = $this->input->post('nama_mhs');
		$nim = $this->input->post('nim');
		$a = explode(' ',trim($nama_mhs));
		$alias = $a[0];
		$prodi=$this->session->userdata('id_prodi');
		if(!empty($prodi)){
			$id_prodi = $prodi;
		}
		$id_prodi = $this->input->post('id_prodi');

		$datascan = array(
			'id_scan' => $id_scan,
			'alias' => $alias
			);
	
		$data = array(
			'nama_mhs' => $nama_mhs,
			'nim' => $nim,
			'id_scan' => $id_scan,
			'id_prodi' => $id_prodi
			);
			var_dump($data);die;
		$this->m_mhs->insert($data, $datascan);
		redirect('mhs/index');
	}
	public function hapus($nim)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('nim' => $nim);
        $this->m->update_data($where,$data,'mhs');
        redirect('mhs');
	}

	    //IMPORT EXCEL
		public function form(){
			$data = array(); // Buat variabel $data sebagai array
			if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
			  
				// lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
			  $upload = $this->m_mhs->upload_file($this->filename);
			  
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
			$this->load->view('v_mhsform', $data);
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
			$datascan = [];
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
				$nim = $get[1]; // Ambil data NIS dari kolom A di csv
				$nama = ucwords(strtolower($get[2])); // Ambil data nama dari kolom B di csv
				$id_scan = $this->input->post('id_scan');
				$a = explode(' ',trim($nama));
				$alias = $a[0];
				// Kita push (add) array data ke variabel data
				array_push($datascan,[
					'alias'=>$alias
				]);
				array_push($data, [
					'nim'=>$nim, // Insert data nis
					'nama_mhs'=>$nama,
					'id_scan'=>$id_scan
				]);
			  }
			  $numrow++; // Tambah 1 setiap kali looping
			}
			//var_dump($data); die;
			$this->m_mhs->insert_multiple($datascan,$data);
			redirect("mhs"); // Redirect ke halaman awal (ke controller siswa fungsi index)
		  }
		}
