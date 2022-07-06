<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
	public function getcekabsensi()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = "SELECT guru.id_guru,guru.nama_guru,guru.nip,guru.jenis_kelamin,guru.keterangan,guru.telepon, absensi_guru.id_absensi_guru,absensi_guru.id_guru,absensi_guru.tanggal,absensi_guru.keterangan,absensi_guru.status from guru join absensi_guru on guru.id_guru=absensi_guru.id_guru where absensi_guru.tanggal='$tgl'";
		return $this->db->query($query)->result_array();
	}

	public function getcekabsensisiswa()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = "SELECT siswa.id_siswa,siswa.nisn,siswa.nama_siswa, absensi_siswa.id_absensi_siswa,absensi_siswa.id_siswa,absensi_siswa.tanggal,absensi_siswa.keterangan,absensi_siswa.status from siswa join absensi_siswa on siswa.id_siswa=absensi_siswa.id_siswa where absensi_siswa.tanggal='$tgl'";
		return $this->db->query($query)->result_array();
	}

	public function getcekabsensitgl()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = "SELECT guru.id_guru,guru.nama_guru,guru.nip,guru.jenis_kelamin,guru.keterangan,guru.telepon, absensi_guru.id_absensi_guru,absensi_guru.id_guru,absensi_guru.tanggal,absensi_guru.keterangan,absensi_guru.status from guru join absensi_guru on guru.id_guru=absensi_guru.id_guru where absensi_guru.tanggal='$tgl'";
		return $this->db->query($query)->row_array();
	}

	public function cektgl()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$query = $this->db->get_where('absensi_guru', array('tanggal' => $tgl))->result_array();
		return $query;
	}

	public function getcheckin($id)
	{
		$query = $this->db->get_where('guru', array('id_guru' => $id))->row_array();
		return $query;
	}

	public function getpdfabsensisiswa($tgl1, $tgl2)
	{
		
		$query = "SELECT siswa.*, absensi_siswa.* from absensi_siswa join siswa on absensi_siswa.id_siswa=siswa.id_siswa where absensi_siswa.tanggal between '$tgl1' AND '$tgl2'";
		return $this->db->query($query)->result_array();
	}

	public function getpdfabsensiguru($tgl1, $tgl2)
	{
		
		$query = "SELECT guru.*, absensi_guru.* from absensi_guru join guru on absensi_guru.id_guru=guru.id_guru where absensi_guru.tanggal between '$tgl1' AND '$tgl2'";
		return $this->db->query($query)->result_array();
	}

	public function getnisnsiswa($nisn)
	{
		$query = $this->db->get_where('siswa', array('nisn' => $nisn))->row_array();
		return $query;
	}

	public function getnilaisiswa($nisn)
	{
		$query = $this->db->get_where('siswa', array('nisn' => $nisn));

		foreach ($query->result() as $row)
		{
		 	$id = $row->id_siswa;
		}

		$query = "SELECT nilai_siswa.*, siswa.*, mapel.*, guru.* from nilai_siswa join siswa on nilai_siswa.id_siswa=siswa.id_siswa join mapel on nilai_siswa.id_mapel=mapel.id_mapel join guru on nilai_siswa.id_guru=guru.id_guru where nilai_siswa.id_siswa='$id'";
		return $this->db->query($query)->result_array();
	}
}
