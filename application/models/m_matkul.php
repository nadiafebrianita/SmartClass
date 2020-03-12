<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model {
	public function show_matkul(){
        $this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function show_matkulprodi($prodi){
        $this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas')->where('prodi.id_prodi',$prodi);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function selected($id_prodi){
        $this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas')->where('prodi.id_prodi',$id_prodi);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function input_data($data){
		$this->db->select('*')
		->from('matkul')
		->where('kode_matkul',$data['kode_matkul'])
		->where('nama_matkul',$data['nama_matkul'])
		->where('id_prodi',$data['id_prodi']);
		$query = $this->db->get()->result();
		if(empty($query)){
			$this->db->insert('kelas', $data);
			return true;
		}
		else{
			return false;
		}
	}
	public function edit_data($id_matkul){		
		$this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi. id_prodi, prodi.nama_prodi')
		->from('matkul')
		->join('prodi','prodi.id_prodi=matkul.id_prodi')
		->where('matkul.id_matkul',$id_matkul);
		$query = $this->db->get();
		return $query->result ();
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

	public function ddprodiall()
	{
		$query = $this->db->get('prodi');
		return $query;
	}
	public function dd($prodi)
	{
		$query = $this->db->get_where('prodi',array('id_prodi' => $prodi));
		return $query;
	}

	public function insert_multiple($dataprodi,$data)
	{
		$this->db->trans_start();
		for($i = 0; $i < count($dataprodi); $i++){
			$this->db->select('id_prodi, nama_prodi')->from('prodi')->where('nama_prodi',$dataprodi[$i]['nama_prodi']);
			$prodi=$this->db->get()->result();
			$cekprodi = $prodi[0]->nama_prodi;
			if(!empty($prodi) && $cekprodi==$dataprodi[$i]['nama_prodi']){
				$id_prodi = $prodi[0]->id_prodi;
				$data[$i]['id_prodi'] = $id_prodi;

				$this->db->select('*')->from('matkul')->where('kode_matkul',$data[$i]['kode_matkul'])->where('nama_matkul',$data[$i]['nama_matkul'])->where('id_prodi',$id_prodi);
				$ada=$this->db->get()->result();
				if(empty($ada)){	
					$this->db->insert('matkul', $data[$i]);
				}
			}
			else {
				echo "<script>alert('Import Gagal!');history.go(-1);</script>";
			}
		}
		$this->db->trans_complete();
		return true;
	}
}