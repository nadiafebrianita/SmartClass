<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhsmatkul extends CI_Controller {
    private $filename = "import_data"; // Kita tentukan nama filenya
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhsmatkul');
        $this->load->model('m_matkul');
        $this->load->model('m');
        $this->load->helper('url');
        $this->load->library('session');
		if($this->session->userdata('status') != "login"){
			redirect(site_url("admin/login"));
		}
    }
    public function tambah(){
        $prodi = $this->session->userdata("id_prodi");
        $data['ddmhs'] = $this->m_mhsmatkul->ddmhs();
        $data['ddmhsprodi'] = $this->m_mhsmatkul->ddmhsprodi($prodi);
        if(!empty($prodi)){
            $data['ddmatkulprodi'] = $this->m_mhsmatkul->ddmatkulprodi($prodi);
            $this->load->view('header2');
        }
        else{
            $data['ddmatkul'] = $this->m_mhsmatkul->ddmatkul();
            $this->load->view('header');
        }
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
            
        $res = $this->m_mhsmatkul->input_data($data);
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
            redirect('mhsmatkul/matkul');
        }else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data");
            redirect('mhsmatkul/matkul');
        }
	}
    //MATA KULIAH//
	public function matkul()
	{
        $prodi = $this->session->userdata("id_prodi");
        $id_prodi = $this->input->post('id_prodi');
        $id_matkul = $this->input->post('id_matkul');
        $cek = $this->session->userdata('pilih');
        if($id_matkul!==NULL){
            if($cek!==$id_matkul){
                $this->session->unset_userdata('pilih');
                if($id_matkul!==0){
                $this->session->set_userdata('pilih',"$id_matkul");   
                } 
            }    
        }

        if(!empty($prodi)){
            //admin jurusan
            $pilih=$this->session->userdata('pilih');
            $this->m_mhsmatkul->userdata($pilih);
            $data['u']=$this->m_mhsmatkul->matkulprodi($prodi,$pilih);
            $data['ddfiltermatkul']=$this->m_mhsmatkul->ddfiltermatkul($prodi);
            $data['pilih']=$pilih;
            //var_dump($data['pilih']);die;
            $this->load->view('header2');
            $this->load->view('v2_matkulm',$data);
        }
        else{
            //admin fakultas
            $data['ddprodi']=$this->m_mhsmatkul->ddprodi();
            $data['u']=$this->m_mhsmatkul->matkul();
            $data['p']=1;
            $this->load->view('header');
            $this->load->view('v_matkulm',$data);    
        }
        $this->load->view('footer');
    }
    public function prodi()
	{
		$id_prodi = $this->input->post('id_prodi');
        if($id_prodi=="0"){
            redirect('mhsmatkul/matkul');
        }
        else{
            $where = array('id_prodi' => $id_prodi);
            $data['u']=$this->m_mhsmatkul->selected($id_prodi);
            $data['ddprodi']=$this->m_mhsmatkul->ddprodi();
			$this->load->view('header');
			$this->load->view('v_matkulm',$data);
			$this->load->view('footer');	
			}
	}
    public function hapusmhs($id_mhsmatkul)
	{
        $where = array('id_mhsmatkul' => $id_mhsmatkul);
		$res=$this->m->hapus_data($where,'mhsmatkul');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
            redirect('mhsmatkul/matkul');
        }else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
            redirect('mhsmatkul/matkul');
        }
    }
    
    //IMPORT EXCEL
    public function form(){
        $prodi=$this->session->userdata('id_prodi');
        $data = array(); // Buat variabel $data sebagai array
        $data['ddmatkul'] = $this->m_mhsmatkul->ddmatkul();
        $data['ddmatkulprodi'] = $this->m_mhsmatkul->ddmatkulprodi($prodi);
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
        if(!empty($prodi)){
            $this->load->view('header2');
        }
        else{
            $this->load->view('header');
        }
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
                        'id_prodi'=>"",
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
        $res = $this->m_mhsmatkul->cekmhs($datascan,$datamhs,$data);
        if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Mengimpor Data"); 
            redirect('mhsmatkul/matkul');
        }
        else{
			$this->session->set_flashdata('err', "Gagal Mengimpor Data");
            redirect('mhsmatkul/matkul');
        }	      
        }
    }
