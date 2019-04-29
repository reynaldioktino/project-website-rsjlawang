<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_diagnosaSekunder extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listDokter()
	{
		$query=$this->db->query("SELECT * FROM dokter");
		return $query->result();
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('diagnosa_sekunder', $data);
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