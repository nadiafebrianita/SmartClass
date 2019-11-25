<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhsmatkul extends CI_Model {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhs');
    }
	// public function show_mhsmatkul(){
    //     $this->db->select('mhsmatkul.id_mhsmatkul, mhs.nama_mhs, matkul.nama_matkul');
	// 	$this->db->from('matkul');
	// 	$this->db->join('jadwal', 'matkul.id_matkul=jadwal.id_matkul');
	// 	$this->db->join('mhsmatkul', 'jadwal.id_jadwal=mhsmatkul.id_jadwal');
	// 	$this->db->join('mhs', 'mhsmatkul.id_mhs=mhs.id_mhs');
	// 	$query = $this->db->get();
	// 	return $query->result ();
	// }
	//Dropdown milih nama mahasiswa
	public function ddmhs()
	{
		$this->db->select('*');
		$this->db->from('mhs')->where('del',NULL);
		$query = $this->db->get();
		return $query;
	}
	//Dropdown milih mata kuliah
	public function ddmatkul()
	{
		$this->db->select('jadwal.id_jadwal, jadwal.del, matkul.nama_matkul, matkul.del');
		$this->db->from('matkul');
		$this->db->join('jadwal', 'matkul.id_matkul=jadwal.id_matkul')->where('matkul.del',NULL)->where('jadwal.del',NULL);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query;
	}
	//Tampil data mhs berdasarkan dd
	public function tampilallmhs(){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.kode_matkul, matkul.nama_matkul, mhsmatkul.del, jadwal.del');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul')->where('mhsmatkul.del',NULL)->where('mhs.del',NULL)->where('jadwal.del',NULL);
		$this->db->order_by("mhs.nama_mhs", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function tampilmhs($nim){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.kode_matkul, matkul.nama_matkul, mhsmatkul.del');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul')->where('mhs.nim',$nim)->where('mhsmatkul.del',NULL);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function selectedmhs($nim){
		$this->db->select('mhs.nim, mhs.nama_mhs');
		$this->db->from('mhs')->where('mhs.nim',$nim);
		$query = $this->db->get();
		return $query->result ();
	}
	//Tampil data matkul berdasarkan dd
	public function tampilmatkul($id_jadwal){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.id_matkul, matkul.nama_matkul, mhsmatkul.del');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul')->where('jadwal.id_jadwal',$id_jadwal)->where('mhsmatkul.del',NULL);
		$this->db->order_by("mhs.nama_mhs", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function tampilallmatkul(){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, mhsmatkul.del');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul')->where('mhsmatkul.del',NULL);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function selectedmatkul($id_jadwal){
		$this->db->select('matkul.id_matkul, jadwal.id_matkul, matkul.nama_matkul');
		$this->db->from('matkul');
		$this->db->join('jadwal', 'matkul.id_matkul=jadwal.id_matkul')->where('jadwal.id_jadwal',$id_jadwal);
		$query = $this->db->get();
		return $query->result ();
	}

	//IMPORT//CEK//
	public function cekmhs($datascan,$datamhs,$data){
		$this->db->trans_start();
		// foreach($datascan as $scan){
		for($i = 0; $i < count($data); $i++){
			// $a = $data[$i]['nim']; var_dump($a);die;
			$this->db->select('nim')->from('mhs')->where('nim',$data[$i]['nim']);
			$nim=$this->db->get()->result();
			if(!empty($nim) && $nim[0]->nim==$data[$i]['nim']){
				$this->db->insert('mhsmatkul', $data[$i]);
			}
			else{
				$this->m_mhs->insert($datamhs[$i],$datascan[$i]);
				$this->db->insert('mhsmatkul', $data[$i]);
			}
		}
		$this->db->trans_complete();
	}
}
		