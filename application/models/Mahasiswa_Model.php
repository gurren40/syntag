<?php

class Mahasiswa_Model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function getByNIM($NIM){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('NIM',$NIM);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function getByID($id){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('id',$id);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function getAll(){
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
	
	public function createMahasiswa($data){
		if($this->db->insert('mahasiswa', $data)){
			return true;
		}
		else{
			return false;
		}
	}
}
