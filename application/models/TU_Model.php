<?php

class TU_Model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function getByUsername($username){
		$this->db->select('*');
		$this->db->from('TU');
		$this->db->where('username',$username);
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
		$this->db->from('TU');
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
		$this->db->from('TU');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
	
	public function createTU($data){
		if($this->db->insert('TU', $data)){
			return true;
		}
		else{
			return false;
		}
	}
}
