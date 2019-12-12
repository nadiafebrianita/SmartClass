<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mhs extends CI_Model {
	public function show_mhs(){
        $this->db->select('mhs.nama_mhs, mhs.nim, user_scan.alias');
		$this->db->from('mhs');
		$this->db->join('user_scan', 'user_scan.id_scan=mhs.id_scan')->where('mhs.del',NULL);
		$this->db->order_by("nim", "asc");
		$this->db->order_by("nama_mhs", "asc");
		$query = $this->db->get();
		return $query->result ();
	}
	public function edit_data($where){		
		$this->db->select('user_scan.id_scan, user_scan.alias');
		$this->db->from('mhs');
		$this->db->join('user_scan', 'mhs.id_scan=user_scan.id_scan')->where($where);

		return $this->db->get();
	}
	public function insert($data, $datascan)
	{
		$this->db->trans_start();
		$this->db->insert('user_scan', $datascan); 
		$id_scan = $this->db->insert_id(); 

		$data['id_scan'] = $id_scan;
		$this->db->insert('mhs', $data);

		$this->db->trans_complete(); 

		return $this->db->insert_id(); 
	}
	// Fungsi untuk melakukan proses upload file
	public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './csv/';
		$config['allowed_types'] = 'csv';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function insert_multiple($datascan,$data)
	{
		$this->db->trans_start();
		for($i = 0; $i < count($datascan); $i++){
			$this->db->select('nim, nama_mhs')->from('mhs')->where('nim',$data[$i]['nim'])->where('nama_mhs',$data[$i]['nama_mhs']);
			$ada=$this->db->get()->result();
			if(empty($ada)){
				$this->db->insert('user_scan', $datascan[$i]);
				$id_scan = $this->db->insert_id(); 

				$data[$i]['id_scan'] = $id_scan;
				$this->db->insert('mhs', $data[$i]);
			}		
		}
		$this->db->trans_complete();
		// die;
	}
}