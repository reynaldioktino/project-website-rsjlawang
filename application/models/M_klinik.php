<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_klinik extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listKlinik()
	{
		$query=$this->db->query("SELECT * FROM klinik");
		return $query->result();
	}

	public function getKlinik()
	{
		$this->db->select('*');
        $this->db->from('klinik');
        $query = $this->db->get();
        return $query->result();
	}

	public function getKlinikWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM klinik WHERE id_klinik='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_klinik' => $value->id_klinik,
					'kode' => $value->kode,
					'nama' => $value->nama
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('klinik', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_klinik", $where);
		$this->db->update('klinik', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM klinik where id_klinik='$where'");
	}
}
?>