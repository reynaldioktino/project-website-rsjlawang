<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tindakan extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listTindakan()
	{
		$query=$this->db->query("SELECT * FROM tindakan");
		return $query->result();
	}

	public function getTindakan()
	{
		$this->db->select('tindakan.*, perawat.nama as perawat, dokter.nama as dokter, icd9.keterangan as icd9, ruangan.nama as ruangan, periksa.kode as kp');
        $this->db->from('tindakan');
        $this->db->join('dokter','tindakan.id_dokter=dokter.id_dokter');
        $this->db->join('icd9','tindakan.id_icd9=icd9.id');
        $this->db->join('perawat','tindakan.id_perawat=perawat.id_perawat');
        $this->db->join('ruangan','tindakan.id_ruangan=ruangan.id_ruangan');
        $this->db->join('periksa','tindakan.id_periksa=periksa.id_periksa');
        $query = $this->db->get();
        return $query->result();
	}

	public function getTindakanWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM tindakan WHERE id_tindakan='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_tindakan' => $value->id_tindakan,
					'id_dokter' => $value->id_dokter,
					'id_perawat' => $value->id_perawat,
					'id_periksa' => $value->id_periksa,
					'id_ruangan' => $value->id_ruangan,
					'tgl_tindakan' => $value->tgl_tindakan,
					'id_icd9' => $value->id_icd9,
					'catatan' => $value->catatan
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('tindakan', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_tindakan", $where);
		$this->db->update('tindakan', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM tindakan where id_tindakan='$where'");
	}
}
?>