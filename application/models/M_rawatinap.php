<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rawatinap extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function getRawatinapMasuk()
	{
		$this->db->select('rawat_inap.*, pasien.nama as pasien, ruangan.nama as ruang, pendaftaran.no_pendaftaran as no_pendaftaran');
        $this->db->from('rawat_inap');
        $this->db->join('ruangan','ruangan.id_ruangan=rawat_inap.id_ruangan');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=rawat_inap.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $this->db->where('rawat_inap.status', 'Belum Keluar');
        $query = $this->db->get();
        return $query->result();
	}

	public function getRawatinapKeluar()
	{
		$this->db->select('rawat_inap.*, pasien.nama as pasien, ruangan.nama as ruang, pendaftaran.no_pendaftaran as no_pendaftaran');
        $this->db->from('rawat_inap');
        $this->db->join('ruangan','ruangan.id_ruangan=rawat_inap.id_ruangan');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=rawat_inap.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $this->db->where('rawat_inap.status', 'Keluar');
        $query = $this->db->get();
        return $query->result();
	}


	public function getRawatinap()
	{
		$this->db->select('rawat_inap.*, pasien.nama as pasien, ruangan.nama as ruang, pendaftaran.no_pendaftaran as no_pendaftaran');
        $this->db->from('rawat_inap');
        $this->db->join('ruangan','ruangan.id_ruangan=rawat_inap.id_ruangan');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=rawat_inap.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $query = $this->db->get();
        return $query->result();
	}

	public function getRawatWhereId($kode) {
		$this->db->select('rawat_inap.*, pasien.nama as pasien, ruangan.nama as ruang, pendaftaran.no_pendaftaran as no_pendaftaran');
        $this->db->from('rawat_inap');
        $this->db->join('ruangan','ruangan.id_ruangan=rawat_inap.id_ruangan');
        $this->db->join('pendaftaran','pendaftaran.id_pendaftaran=rawat_inap.id_pendaftaran');
        $this->db->join('pasien','pasien.id_pasien=pendaftaran.id_pasien');
        $this->db->where('id_rawatinap', $kode);
        $query = $this->db->get();
        return $query->result();
	}

	public function getRawatinapWhereIdEdit($where)
	{
		$query=$this->db->query("SELECT rawat_inap.*, pasien.nama as pasien, ruangan.nama as ruang, pendaftaran.no_pendaftaran as no_pendaftaran FROM rawat_inap INNER JOIN ruangan ON ruangan.id_ruangan=rawat_inap.id_ruangan INNER JOIN pendaftaran ON pendaftaran.id_pendaftaran=rawat_inap.id_pendaftaran INNER JOIN pasien ON pasien.id_pasien=pendaftaran.id_pasien WHERE id_rawatinap='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'id_rawatinap' => $value->id_rawatinap,
					'no_pendaftaran' => $value->no_pendaftaran,
					'pasien' => $value->pasien,
					'ruang' => $value->ruang,
					'tgl_masuk' => $value->tgl_masuk,
					'tgl_keluar' => $value->tgl_keluar,
					'status' => $value->status,
					'keterangan' => $value->keterangan
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('rawat_inap', $data);
	}

	public function update($data, $kode){
		$this->db->set($data);
		$this->db->where("id_rawatinap", $kode);
		$this->db->update('rawat_inap', $data);
	}

	public function delete($where){
		$this->db->query("DELETE FROM rawat_inap where id_rawatinap='$where'");
	}

}
?>