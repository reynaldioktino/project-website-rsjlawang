<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_icd9 extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listIcd9()
	{
		$query=$this->db->query("SELECT * FROM icd9");
		return $query->result();
	}

	public function getIcd9()
	{
		$this->db->select('*');
        $this->db->from('icd9');
        $query = $this->db->get();
        return $query->result();
	}

	public function getIcd9WhereId($where)
	{
		$query=$this->db->query("SELECT * FROM icd9 WHERE id='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'kode' => $value->kode,
					'keterangan' => $value->keterangan
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('icd9', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('icd9', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM icd9 where id='$where'");
	}
}
?>