<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detailResep extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getObatWhereIdResep($id_resep) {
		$this->db->select('resep_det.*, obat.nama as obat');
        $this->db->from('resep_det');
        $this->db->join('obat','obat.id=resep_det.id_obat');
        $this->db->where('id_resep', $id_resep);
        $query = $this->db->get();
        return $query->result();
	}

	function getDetailResep($id_resep) {
		$this->db->select('resep_det.*, obat.nama as obat, resep.kode as kode_resep');
        $this->db->from('resep_det');
        $this->db->join('resep','resep.id_resep=resep_det.id_resep');
        $this->db->join('obat','obat.id=resep_det.id_obat');
        $this->db->where('resep_det.id_resep', $id_resep);
        $query = $this->db->get();
        return $query->result();
	}

	public function getDetailResepWhereIdEdit($where)
	{
		// $query=$this->db->query("SELECT * FROM resep INNER JOIN periksa ON periksa.id_periksa=resep.id_periksa WHERE id_resep='$where'");
		$this->db->select('resep_det.*, resep.kode as kode_resep');
        $this->db->from('resep_det');
        $this->db->join('resep','resep.id_resep=resep_det.id_resep');
        $this->db->where('resep_det.id', $where);
        //$this->db->order_by('status', 'desc');
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id' => $value->id,
					'kode_resep' => $value->kode_resep,
					'id_obat' => $value->id_obat,
					'aturan' => $value->aturan
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('resep_det', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id", $where);
		$this->db->update('resep_det', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM resep_det where id='$where'");
	}
}
?>