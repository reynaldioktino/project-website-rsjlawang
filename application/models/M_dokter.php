<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokter extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listDokter()
	{
		$query=$this->db->query("SELECT * FROM dokter");
		return $query->result();
	}

	public function getDokter()
	{
		$this->db->select('dokter.*, user.username as uname, klinik.nama as klinik');
        $this->db->from('dokter');
        $this->db->join('user','dokter.id_user=user.id');
        $this->db->join('klinik','dokter.id_klinik=klinik.id_klinik');
        $query = $this->db->get();
        return $query->result();
	}

	public function namaDokter($uname) {
		$this->db->select('dokter.nama as nama_dokter');
	    $this->db->from('user');
	    $this->db->join('dokter','dokter.id_user=user.id');
	    $this->db->where('user.username', $uname);
	    $query = $this->db->get();
		$hasil = $query->row();
		return $hasil->nama_dokter;
	}

	public function getDokterWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM dokter WHERE id_dokter='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_dokter' => $value->id_dokter,
					'id_user' => $value->id_user,
					'id_klinik' => $value->id_klinik,
					'nip' => $value->nip,
					'nama' => $value->nama,
					'alamat' => $value->alamat,
					'no_tlp' => $value->no_tlp,
					'jk' => $value->jk
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('dokter', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_dokter", $where);
		$this->db->update('dokter', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM dokter where id_dokter='$where'");
	}
}
?>