<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model {
	public function show_matkul(){
        $this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi, prodi.del, fakultas.del');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas')->where('matkul.del',NULL)->where('prodi.del',NULL)->where('fakultas.del',NULL);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function selected($id_prodi){
        $this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi, prodi.del, fakultas.del');
		$this->db->from('prodi');
		$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas')->where('matkul.del',NULL)->where('prodi.del',NULL)->where('fakultas.del',NULL)->where('prodi.id_prodi',$id_prodi);
		$this->db->order_by("matkul.nama_matkul", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	
	public function dropdown()
	{
		$query = $this->db->get('prodi');
		return $query;
	}
	public function ddprodi()
	{
		$query = $this->db->get('prodi');
		return $query;
	}

	// public function search($keyword){
	// 	$this->db->select('matkul.id_matkul, matkul.kode_matkul, matkul.nama_matkul, prodi.nama_prodi');
	// 	$this->db->from('prodi');
	// 	$this->db->join('matkul', 'prodi.id_prodi=matkul.id_prodi');
	// 	$this->db->like('matkul.kode_matkul', $keyword);
	// 	$this->db->or_like('matkul.nama_matkul', $keyword);
	// 	$this->db->or_like('prodi.nama_prodi', $keyword);
	// 	$query = $this->db->get();
	// 	return $query->result ();
	//   }

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
	}
}