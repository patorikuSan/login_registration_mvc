<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function get_student_by_email($email){
		// $query = $this->db->query('SELECT * FROM students WHERE email =' .$email);
		$query = ('SELECT * FROM students WHERE email = ?');
		$values = array($email);
		return $this->db->query($query, $values)->row_array();
		// return $query->row();
	}

	public function add_user($data){
		$this->db->insert("students", $data);
	}

}

