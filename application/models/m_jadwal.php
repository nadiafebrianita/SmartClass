<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
	public function show_jadwal(){
        $this->db->select('jadwal.id_jadwal, smt.nama_smt, smt.status, smt.del, jadwal.hari, jadwal.waktu, jadwal.akhir, jadwal.id_dosen2, matkul.nama_matkul, matkul.del, kelas.nama_kls, kelas.del, a.del, jadwal.id_dosen, u.alias, prodi.del, fakultas.del');
		$this->db->from('smt');
		$this->db->join('jadwal', 'smt.id_smt=jadwal.id_smt');
		$this->db->join('kelas', 'kelas.id_kls=jadwal.id_kls');
		$this->db->join('matkul', 'jadwal.id_matkul=matkul.id_matkul');
		$this->db->join('prodi', 'matkul.id_prodi=prodi.id_prodi');
		$this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
		$this->db->join('dosen a', 'jadwal.id_dosen=a.id_dosen');
		$this->db->join('user_scan u', 'u.id_scan=a.id_scan')->where('jadwal.del',NULL)->where('a.del',NULL)->where('smt.del',NULL)->where('matkul.del',NULL)->where('kelas.del',NULL)->where('prodi.del',NULL)->where('fakultas.del',NULL);
		$this->db->order_by("jadwal.hari", 'MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY');
		$this->db->order_by("jadwal.waktu", "asc");
		$this->db->order_by("kelas.nama_kls", "asc");
		$this->db->where("smt.status", "Aktif");
		$query = $this->db->get();
		return $query->result ();
	}
	public function dosen2(){
		$this->db->select('user_scan.alias');
		$this->db->from('jadwal');
		$this->db->join('dosen', 'jadwal.id_dosen2=dosen.id_dosen');
		$this->db->join('user_scan', 'user_scan.id_scan=dosen.id_scan');
		$query = $this->db->get();
		return $query->result ();
	}
	public function ddsmt()
	{
		$query = $this->db->get_where('smt', array('status' => "aktif"));
		return $query;
	}
	public function ddmatkul()
	{
		$this->db->order_by("nama_matkul", "asc");
		$query = $this->db->get('matkul');
		return $query;
	}
	public function dddosen()
	{
		$this->db->select('dosen.id_dosen,dosen.nama_dosen,user_scan.id_scan,user_scan.alias');
		$this->db->from('dosen');
		$this->db->join('user_scan', 'user_scan.id_scan=dosen.id_scan');
		$this->db->order_by("user_scan.alias", "asc");
		$query = $this->db->get();
		return $query;
	}
	public function ddkelas()
	{
		$query = $this->db->get('kelas');
		return $query;
	}
	public function insert_multiple($datasmt,$datamatkul,$datadosen1,$datadosen2,$datakls,$data)
	{
		$this->db->trans_start();
		for($i = 0; $i < count($datamatkul); $i++){
			//cek smt
			$ceksmt = strtolower("Aktif");
			$this->db->select('id_smt, status')->from('smt')->where('status',$ceksmt);
			$smt=$this->db->get()->result();
			//cek matkul
			$cekmatkul = strtolower($datamatkul[$i]['nama_matkul']);
			$this->db->select('id_matkul, nama_matkul')->from('matkul')->where('nama_matkul',$cekmatkul);
			$matkul=$this->db->get()->result();
			$dbmatkul = strtolower($matkul[0]->nama_matkul);
			//cek dosen1
			$cekdosen = strtolower($datadosen1[$i]['alias']);
			$this->db->select('user_scan.alias, dosen.id_scan, dosen.id_dosen')->from('user_scan')->join('dosen','user_scan.id_scan=dosen.id_scan')
			->where('alias',$cekdosen);
			$dosen=$this->db->get()->result();
			$dbdosen = strtolower($dosen[0]->alias);
			//cek kelas
			$cekkls = strtolower($datakls[$i]['nama_kls']);
			$this->db->select('id_kls, nama_kls')->from('kelas')->where('nama_kls',$cekkls);
			$kls=$this->db->get()->result();
			$dbkls = strtolower($kls[0]->nama_kls);
			//cek dosen2
			$cekdosen2 = strtolower($datadosen2[$i]['alias']);
			$this->db->select('user_scan.alias, dosen.id_scan, dosen.id_dosen')->from('user_scan')->join('dosen','user_scan.id_scan=dosen.id_scan')
			->where('alias',$cekdosen2);
			$dosen2=$this->db->get()->result();
			
			if(!empty($dosen2)){
				$dbdosen2 = strtolower($dosen2[0]->alias);
				if(!empty($smt) && !empty($matkul) && $dbmatkul==$cekmatkul && !empty($dosen) && $dbdosen==$cekdosen && !empty($dosen2) && $dbdosen2==$cekdosen2 && !empty($kls) && $dbkls==$cekkls){
					$id_smt = $smt[0]->id_smt;
					$data[$i]['id_smt'] = $id_smt;
					$id_matkul = $matkul[0]->id_matkul;
					$data[$i]['id_matkul'] = $id_matkul;
					$id_dosen = $dosen[0]->id_dosen;
					$data[$i]['id_dosen'] = $id_dosen;
					$id_dosen2 = $dosen2[0]->id_dosen;
					$data[$i]['id_dosen2'] = $id_dosen2;
					$id_kls = $kls[0]->id_kls;
					$data[$i]['id_kls'] = $id_kls;
	
					$this->db->insert('jadwal', $data[$i]);
				}
				else {
					echo "<script>alert('Import Gagal!');history.go(-1);</script>";
				}
			}
			else {
				if(!empty($smt) && !empty($matkul) && $dbmatkul==$cekmatkul && !empty($dosen) && $dbdosen==$cekdosen && !empty($kls) && $dbkls==$cekkls){
					$id_smt = $smt[0]->id_smt;
					$data[$i]['id_smt'] = $id_smt;
					$id_matkul = $matkul[0]->id_matkul;
					$data[$i]['id_matkul'] = $id_matkul;
					$id_dosen = $dosen[0]->id_dosen;
					$data[$i]['id_dosen'] = $id_dosen;
					$data[$i]['id_dosen2'] = NULL;
					$id_kls = $kls[0]->id_kls;
					$data[$i]['id_kls'] = $id_kls;
	
					$this->db->insert('jadwal', $data[$i]);
				}
			}
		}
		$this->db->trans_complete();
	}
}