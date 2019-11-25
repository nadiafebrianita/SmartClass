<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhsmatkul extends CI_Controller {
    private $filename = "import_data"; // Kita tentukan nama filenya
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
    public function tambah(){
		$data['ddmatkul'] = $this->m_mhsmatkul->ddmatkul();
		$data['ddmhs'] = $this->m_mhsmatkul->ddmhs();
		$this->load->view('header');
		$this->load->view('v_tambahmhsmatkul',$data);
		$this->load->view('footer');
	}
	public function tambah_aksi(){
		$id_jadwal = $this->input->post('id_jadwal');
		$nim = $this->input->post('nim');
 
		$data = array(
			'id_jadwal' => $id_jadwal,
			'nim' => $nim
			);
		$this->m->input_data($data,'mhsmatkul');
		redirect('mhsmatkul/matkul');
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
        $nim = $this->input->post('nim');
        $data['m'] = $this->input->post('nim');
        $where = array('nim' => $nim);

        $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
        $data['u']=$this->m_mhsmatkul->tampilmhs($nim);
        $data['s']=$this->m_mhsmatkul->selectedmhs($nim);
        $this->load->view('header');
        $this->load->view('v_mhsm2',$data);
        $this->load->view('footer');
    }
    public function tambahmatkul()
    {
        $nim = $this->input->post('nim');
        $id_jadwal = $this->input->post('id_jadwal');
        $data = array(
			'nim' => $nim,
            'id_jadwal' => $id_jadwal);
        $this->m->input_data($data,'mhsmatkul');
        redirect('mhsmatkul/mhs');
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

        $data['ddmhs']=$this->m_mhsmatkul->ddmhs();
        $data['u']=$this->m_mhsmatkul->tampilmatkul($id_jadwal);
        $data['s']=$this->m_mhsmatkul->selectedmatkul($id_jadwal);
        $this->load->view('header');
        $this->load->view('v_matkulm2',$data);
        $this->load->view('footer');
    }
    public function tambahmhs()
    {
        $nim = $this->input->post('nim');
        $id_jadwal = $this->input->post('id_jadwal');
        $data = array(
			'nim' => $nim,
            'id_jadwal' => $id_jadwal);
        $this->m->input_data($data,'mhsmatkul');
        redirect('mhsmatkul/matkul');
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
    
    //IMPORT EXCEL
    public function form(){
        $data = array(); // Buat variabel $data sebagai array
        $data['ddmatkul'] = $this->m_mhsmatkul->ddmatkul();
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
        $this->load->view('v_mhsmatkulform', $data);
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
        $datamhs = [];
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
                $id_jadwal= $this->input->post('id_jadwal');
                $id_scan = $this->input->post('id_scan');
                $a = explode(' ',trim($nama));
                $alias = $a[0];

                if($id_jadwal=="- Pilih Mata Kuliah -"){
                    echo "<script>alert('Mata Kuliah Belum Diisi');history.go(-1);</script>";
                }
                else{
                    array_push($datascan,[
                        'alias'=>$alias
                    ]);
                    array_push($datamhs, [
                        'nim'=>$nim,
                        'nama_mhs'=>$nama,
                        'id_scan'=>$id_scan
                    ]);
                    array_push($data, [
                        'nim'=>$nim,
                        'id_jadwal'=>$id_jadwal
                    ]);
                }
            }
          $numrow++; // Tambah 1 setiap kali looping
        }
        $this->m_mhsmatkul->cekmhs($datascan,$datamhs,$data);
        redirect("mhsmatkul/matkul");
      }
    }
