<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perawat extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listPerawat()
	{
		$query=$this->db->query("SELECT * FROM perawat");
		return $query->result();
	}

	public function getPerawat()
	{
		$this->db->select('perawat.*, user.username as uname');
        $this->db->from('perawat');
        $this->db->join('user','perawat.id_user=user.id');
        $query = $this->db->get();
        return $query->result();
	}

	public function getPerawatWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM perawat WHERE id_perawat='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_perawat' => $value->id_perawat,
					'id_user' => $value->id_user,
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
		$this->db->insert('perawat', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_perawat", $where);
		$this->db->update('perawat', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM perawat where id_perawat='$where'");
	}
}
?>