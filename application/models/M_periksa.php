<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_periksa extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getMaxId() {
		$this->db->select_max('id_periksa');
		$this->db->from('periksa');
		$query = $this->db->get();
		return $query->row('id_periksa') + 1;
	}

	public function listPeriksa()
	{
		$query=$this->db->query("SELECT * FROM periksa");
		return $query->result();
	}

	function getIdPeriksa($kode) {
		$this->db->select('id_periksa');
		$this->db->from('periksa');
		$this->db->where('kode', $kode);
		return $this->db->get()->row();
	}

	public function getPeriksa()
	{
		$this->db->select('periksa.*, pasien.nama as pasien, dokter.nama as dokter, icd10.jenis_penyakit as icd10');
        $this->db->from('periksa');
        $this->db->join('dokter','periksa.id_dokter=dokter.id_dokter');
        $this->db->join('icd10','periksa.id_icd10=icd10.id');
        $this->db->join('pendaftaran','periksa.id_pendaftaran=pendaftaran.id_pendaftaran');
        $this->db->join('pasien','pendaftaran.id_pasien=pasien.id_pasien');
        $query = $this->db->get();
        return $query->result();
	}

	public function getPeriksaWhereId($where)
	{
		$this->db->select('periksa.*, pasien.nama as pasien, dokter.nama as dokter');
        $this->db->from('periksa');
        $this->db->join('dokter','periksa.id_dokter=dokter.id_dokter');
        $this->db->join('pendaftaran','periksa.id_pendaftaran=pendaftaran.id_pendaftaran');
        $this->db->join('pasien','pendaftaran.id_pasien=pasien.id_pasien');
        $this->db->where('id_periksa', $where);
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_periksa' => $value->id_periksa,
					'kode' => $value->kode,
					'pasien' => $value->pasien,
					'dokter' => $value->dokter,
					'tgl_periksa' => $value->tgl_periksa,
					'keluhan' => $value->keluhan,
					'id_icd10' => $value->id_icd10,
					'catatan' => $value->catatan,
					'kondisi_umum' => $value->kondisi_umum
				);
			}
		}
		return $data;
	}

	//return result digunakan untuk mengembalikan nilai berupa array
	//ps: kalau masukin data ke database gak perlu return result soale nggak ngembaliin apa2 
	public function insert($data)
	{
		$this->db->insert('periksa', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("id_periksa", $where);
		$this->db->update('periksa', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM periksa where id_periksa='$where'");
	}
}
?>