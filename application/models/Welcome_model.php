<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_model extends CI_Model {

	public function create($data) {
		return $this->db->insert('users', $data);
	}

	public function read($id = NULL) {
		if(!empty($id)) {
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id', $id);
			return $this->db->get()->result();
		}
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('first_name', 'ASC');
		return $this->db->get()->result();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('users', $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete('users');
	}
}