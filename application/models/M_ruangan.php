<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ruangan extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listRuang()
	{
		$query=$this->db->query("SELECT * FROM ruangan");
		return $query->result();
	}

	public function getKuota($id_ruang) {
		$this->db->select('kapasitas');
	    $this->db->from('ruangan');
	    $this->db->where('id_ruangan', $id_ruang);
	    $query = $this->db->get();
		$hasil = $query->row();
		return $hasil->kapasitas;
	}

	public function getRuang()
	{
		$this->db->select('*');
        $this->db->from('ruangan');
        $query = $this->db->get();
        return $query->result();
	}

	public function getRuangWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM ruangan WHERE id_ruangan='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_ruangan' => $value->id_ruangan,
					'nama' => $value->nama,
					'kapasitas' => $value->kapasitas
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('ruangan', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_ruangan", $where);
		$this->db->update('ruangan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM ruangan where id_ruangan='$where'");
	}
}
?>