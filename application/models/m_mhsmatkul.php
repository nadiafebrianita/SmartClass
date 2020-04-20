<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhsmatkul extends CI_Model {
	function __construct()
	{
        parent::__construct();
        $this->load->model('m_mhs');
	}
	public function input_data($data){
		$this->db->select('*')
		->from('mhsmatkul')
		->where('nim',$data['nim'])
		->where('id_jadwal',$data['id_jadwal']);
		$query = $this->db->get()->result();
		if(empty($query)){
			// $this->db->select('matkul.id_matkul')
			// ->from('jadwal')
			// ->join('matkul','jadwal.id_matkul=matkul.id_matkul')
			// ->where('jadwal.id_jadwal',$data['id_jadwal']);
			// $query = $this->db->get()->result();
			// $pilih=$query[0]->id_matkul;
			// $this->session->unset_userdata('pilih');
			// $this->session->set_userdata('pilih',"$pilih");	

			$this->db->insert('mhsmatkul', $data);
			return true;
		}
		else{
			return false;
		}
	}
	public function ddmhs()
	{
		$this->db->select('*');
		$this->db->from('mhs');
		$query = $this->db->get();
		return $query;
	}
	public function ddmhsprodi($prodi)
	{
		$this->db->select('*');
		$this->db->from('mhs')->where('id_prodi',$prodi);
		$query = $this->db->get();
		return $query;
	}
	//Dropdown milih mata kuliah
	public function ddmatkul() //admin fakultas
	{
		$this->db->select('jadwal.id_jadwal, matkul.nama_matkul')
		->from('matkul')
		->join('jadwal', 'matkul.id_matkul=jadwal.id_matkul')
		->group_by('matkul.nama_matkul')
		->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query;
	}
	public function ddfiltermatkul($prodi) //admin prodi
	{
		$sql = "SELECT mhsmatkul.id_jadwal, matkul.id_matkul, matkul.nama_matkul
		FROM mhsmatkul JOIN jadwal ON mhsmatkul.id_jadwal=jadwal.id_jadwal JOIN matkul ON matkul.id_matkul=jadwal.id_matkul 
		WHERE matkul.id_prodi='$prodi' GROUP BY matkul.id_matkul";
		$query=$this->db->query($sql);
		// $matkul=$this->session->userdata('pilih');
		// var_dump($query->result());die;
		return $query;
	}
	public function ddmatkulprodi($prodi)
	{
		$this->db->select('jadwal.id_jadwal, matkul.nama_matkul, matkul.id_prodi')
		->from('matkul')
		->join('jadwal', 'matkul.id_matkul=jadwal.id_matkul')
		->where('matkul.id_prodi', $prodi)
		->order_by("matkul.nama_matkul", "asc")
		->group_by("matkul.nama_matkul");
		$query = $this->db->get();
		return $query;
	}
	public function ddprodi()
	{
		$this->db->select('prodi.id_prodi, prodi.nama_prodi')
		->from('jadwal')
		->join('matkul','matkul.id_matkul=jadwal.id_matkul')
		->join('prodi','prodi.id_prodi=matkul.id_prodi')
		->group_by('prodi.id_prodi');
		$query = $this->db->get();
		return $query;
	}
	public function matkul(){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('smt', 'jadwal.id_smt=smt.id_smt');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul');
		$this->db->join('prodi', 'prodi.id_prodi=matkul.id_prodi')
		->where('smt.status','Aktif');
		$this->db->order_by("prodi.nama_prodi", "asc");
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function userdata($pilih){
		$this->db->select('matkul.id_matkul')
		->from('mhsmatkul')
		->join('jadwal','jadwal.id_jadwal=mhsmatkul.id_jadwal')
		->join('matkul','jadwal.id_matkul=matkul.id_matkul')
		->where('matkul.id_matkul',$pilih);
		$query = $this->db->get()->result();
		if(empty($query)){
			$this->session->unset_userdata('pilih');
		}
	}
	public function matkulprodi($prodi,$id_matkul){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, matkul.id_prodi');
		$this->db->from('mhs');
		$this->db->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim');
		$this->db->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal');
		$this->db->join('matkul', 'matkul.id_matkul=jadwal.id_matkul')->where('matkul.id_prodi',$prodi)->where('matkul.id_matkul',$id_matkul);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function selected($id_prodi){
		$this->db->select('mhsmatkul.id_mhsmatkul, mhs.nim, mhs.nama_mhs, matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi')
		->from('mhs')
		->join('mhsmatkul', 'mhs.nim=mhsmatkul.nim')
		->join('jadwal', 'mhsmatkul.id_jadwal=jadwal.id_jadwal')
		->join('matkul', 'matkul.id_matkul=jadwal.id_matkul')
		->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
		->where('prodi.id_prodi',$id_prodi)
		->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	//IMPORT//CEK//
	public function cekmhs($datascan,$datamhs,$data){
		$this->db->trans_start();
		for($i = 0; $i < count($data); $i++){
			$this->db->select('nim, id_jadwal')->from('mhsmatkul')->where('nim',$data[$i]['nim'])->where('id_jadwal',$data[$i]['id_jadwal']);
			$ada=$this->db->get()->result();
			if(empty($ada)){
				$this->db->select('nim')->from('mhs')->where('nim',$data[$i]['nim']);
				$nim=$this->db->get()->result();
				if(!empty($nim) && $nim[0]->nim==$data[$i]['nim']){
					$this->db->insert('mhsmatkul', $data[$i]);
				}
				else{
					$this->db->select('matkul.id_prodi')->from('matkul')->join('jadwal', 'jadwal.id_matkul=matkul.id_matkul')->where('jadwal.id_jadwal',$data[$i]['id_jadwal']);
					$id_prodi = $this->db->get()->result();
					$datamhs[$i]['id_prodi'] = $id_prodi[0]->id_prodi;
					$this->m_mhs->insert($datamhs[$i],$datascan[$i]);
					$this->db->insert('mhsmatkul', $data[$i]);
				}
			}
		}
		$this->db->trans_complete();
		return true;
	}
}
		