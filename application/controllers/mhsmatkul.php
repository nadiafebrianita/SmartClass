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

	// public function index()
	// {
	// 	$data['u']=$this->m_mhsmatkul->show_mhsmatkul();
    //     $this->load->view('header');
    //     $this->load->view('v_mhsmatkul',$data);
    //     $this->load->view('footer');
    // }
    // public function pilih()
    // {
    //     $p = $this->input->post('pilih');
    //     switch($p)
    //     {
    //         case "2":
    //         redirect('mhsmatkul/mhs');
    //         break;
    //         case "3":
    //         redirect('mhsmatkul/matkul');
    //         break;
    //         default:
    //         redirect('mhsmatkul');
    //     }
    // }
    public function tambah(){
        $data['ddmhs'] = $this->m_mhsmatkul->ddmhs();
        $prodi = $this->session->userdata("id_prodi");
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
		
        $res = $this->m->input_data($data,'mhsmatkul');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menambahkan Data"); 
            redirect('mhsmatkul/matkul');
        }else{
			$this->session->set_flashdata('err', "Gagal Menambahkan Data");
            redirect('mhsmatkul/matkul');
        }
	}

    //MAHASISWA//
	public function mhs()
	{
        $prodi=$this->session->userdata("id_prodi");
        if(!empty($prodi)){
            $data['u']=$this->m_mhsmatkul->mhsprodi($prodi);
            $this->load->view('header2');
            $this->load->view('v2_mhsm',$data);    
        }
        else{
            $data['ddmhs']=$this->m_mhsmatkul->ddmhs();
            $data['u']=$this->m_mhsmatkul->mhs();
            $this->load->view('header');
            $this->load->view('v_mhsm',$data);    
        }
        $this->load->view('footer');
    }
    // public function tampilmhs()
	// {
    //     $nim = $this->input->post('nim');
    //     if($nim=="0"){
    //         redirect('mhsmatkul/mhs');
    //     }
    //     else{
    //         // $data['m'] = $this->input->post('nim');
    //         $where = array('nim' => $nim);
    //         $data['ddmhs']=$this->m_mhsmatkul->ddmhs();
    //         // $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
    //         $data['u']=$this->m_mhsmatkul->tampilmhs($nim);
    //         // $data['s']=$this->m_mhsmatkul->selectedmhs($nim);
    //         $this->load->view('header');
    //         $this->load->view('v_mhsm',$data);
    //         $this->load->view('footer');
    //     }
    // }
    // public function tambahmatkul()
    // {
    //     $nim = $this->input->post('nim');
    //     $id_jadwal = $this->input->post('id_jadwal');
    //     $data = array(
	// 		'nim' => $nim,
    //         'id_jadwal' => $id_jadwal);
    //     $this->m->input_data($data,'mhsmatkul');
    //     redirect('mhsmatkul/mhs');
    // }
    public function hapus($id_mhsmatkul)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_mhsmatkul' => $id_mhsmatkul);
        
        $res = $this->m->update_data($where,$data,'mhsmatkul');
		if($res==true)
		{
			$this->session->set_flashdata('true', "Berhasil Menghapus Data"); 
			redirect('mhsmatkul/mhs');
		}else{
			$this->session->set_flashdata('err', "Gagal Menghapus Data");
			redirect('mhsmatkul/mhs');
		}
	}
    //MATA KULIAH//
	public function matkul()
	{
        $prodi = $this->session->userdata("id_prodi");
        if(!empty($prodi)){
            $data['u']=$this->m_mhsmatkul->matkulprodi($prodi);
            $this->load->view('header2');
            $this->load->view('v2_matkulm',$data);    
        }
        else{
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
            $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
			$this->load->view('header');
			$this->load->view('v_matkulm',$data);
			$this->load->view('footer');	
			}
	}
    // public function tampilmatkul()
	// {
    //     $id_jadwal = $this->input->post('id_jadwal');
    //     if($id_jadwal=="0"){
    //         redirect('mhsmatkul/matkul');
    //     }
    //     else{
    //         //$data['m'] = $id_jadwal;
    //         $where = array('id_jadwal' => $id_jadwal);
    //         $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
    //         $data['ddprodi']=$this->m_mhsmatkul->ddprodi();
    //         // $data['ddmhs']=$this->m_mhsmatkul->ddmhs();
    //         $data['u']=$this->m_mhsmatkul->tampilmatkul($id_jadwal);
    //         $data['s']=$this->m_mhsmatkul->selectedmatkul($id_jadwal);
    //         //$matkul = $data['s'][0]->nama_matkul;
    //         $this->load->view('header');
    //         $this->load->view('v_matkulm',$data);
    //         $this->load->view('footer');
    //     }
    // }
    // public function filter()
	// {
    //     $id_prodi = $this->input->post('id_prodi');
    //     $id_jadwal = $this->input->post('id_jadwal');
    //     //var_dump($id_jadwal);die;
    //     // if($id_prodi=="0" && $id_jadwal=="0"){
    //     //     redirect('mhsmatkul/matkul');
    //     // }
    //     // if($id_prodi!=="0" && $id_jadwal=="0"){
    //     //     $where = array('id_prodi' => $id_prodi);
    //     //     //$data['p']=1;
    //     //     $data['u']=$this->m_mhsmatkul->selected($id_prodi);
    //     //     $data['ddprodi']=$this->m_mhsmatkul->ddprodi();
    //     //     $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
    //     //     $this->load->view('header');
    //     //     $this->load->view('v_matkulm',$data);
    //     //     $this->load->view('footer');
    //     // }
    //     if($id_prodi=="0" && $id_jadwal!=="0"){
    //         //$data['m'] = $id_jadwal;
    //         //$where = array('id_jadwal' => $id_jadwal);
    //         $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
    //         $data['ddprodi']=$this->m_mhsmatkul->ddprodi();
    //         //$data['j']=1;
    //         // $data['ddmhs']=$this->m_mhsmatkul->ddmhs();
    //         $data['u']=$this->m_mhsmatkul->tampilmatkul($id_jadwal);
    //         $data['s']=$this->m_mhsmatkul->selectedmatkul($id_jadwal);
    //         //$matkul = $data['s'][0]->nama_matkul;
    //         $this->load->view('header');
    //         $this->load->view('v_matkulm',$data);
    //         $this->load->view('footer');
    //     }
    //     else{
    //         // $where1 = array('id_prodi' => $id_prodi);
    //         // $where2 = array('id_jadwal' => $id_jadwal);
    //         $data['ddmatkul']=$this->m_mhsmatkul->ddmatkul();
    //         $data['ddprodi']=$this->m_mhsmatkul->ddprodi();
    //         $data['u']=$this->m_mhsmatkul->filter($id_jadwal, $id_prodi);
    //         $data['s']=$this->m_mhsmatkul->selectedmatkul($id_jadwal);
    //         //$data['j']=$this->m_mhsmatkul->selectedprodi($id_prodi);
    //         $data['p']=1;
    //         //var_dump($data['u'][0]);die;
    //         $this->load->view('header');
    //         $this->load->view('v_matkulm',$data);
    //         $this->load->view('footer');
    //     }
		
    // }
    // public function tambahmhs()
    // {
    //     $nim = $this->input->post('nim');
    //     $id_jadwal = $this->input->post('id_jadwal');
    //     $data = array(
	// 		'nim' => $nim,
    //         'id_jadwal' => $id_jadwal);
    //     $this->m->input_data($data,'mhsmatkul');
    //     redirect('mhsmatkul/matkul');
    // }
    public function hapusmhs($id_mhsmatkul)
	{
		$del = "1";
		$data = array(
            'del' => $del);
        $where = array('id_mhsmatkul' => $id_mhsmatkul);
        
        $res = $this->m->update_data($where,$data,'mhsmatkul');
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
        $prodi=$this->session->userdata('id_prodi');
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
