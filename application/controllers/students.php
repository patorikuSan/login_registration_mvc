<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

public function __construct(){
	parent::__construct();
	$this->load->library('form_validation');
	$this->load->model('Student_model');
}

public function index(){
	$this->load->view('partials/header');
	$this->load->view('auth');
	$this->load->view('partials/footer');
	
}

public function login(){
	$email = $this->input->post('email');
	$password = $this->input->post('password');
	$this->load->model('Student_model');
	$student = $this->Student_model->get_student_by_email($email);
	if($student && $student['password'] == $password){
		$user = array(
			'id' => $student['id'],
			'email' => $student['email'],
			// 'student_name' => $student['first_name']. ' ' .$student['last_name'],
			'first_name' => $student['first_name'],
			'last_name' => $student['last_name'],
			'is_logged_in' => true
		);
		$this->session->set_userdata($user);
		redirect("/students/profile");

	} else {
		$this->session->set_flashdata("error login", "Invalid email or password");
		redirect("/");
	}
}

public function register(){
	$this->form_validation->set_rules('first_name','First name', 'required');
	$this->form_validation->set_rules('last_name', 'Last name', 'required');
	$this->form_validation->set_rules('email','Email','required|is_unique[students.email]');
	$this->form_validation->set_rules('password','Password','required|min_length[8]');
	$this->form_validation->set_rules('confirm_pass','Confirm Password','required|matches[password]');

	$data = array(
		"first_name" => $this->input->post("first_name"), 
		"last_name" => $this->input->post("last_name"),
		"email" => $this->input->post("email"),
		"password" => $this->input->post("password"),
		"confirm_pass" => $this->input->post("confirm_pass")
	);

	if($this->form_validation->run() == FALSE){
		$this->load->view("auth");
	} else {
		$this->Student_model->add_user($data);
		$this->load->view("form_success");
	}
}

public function profile(){
	if($this->session->userdata('is_logged_in') === TRUE){
		$this->load->view('partials/header');
		$this->load->view('display');
		$this->load->view('partials/footer');
	} else {
		redirect("student/login");
	}
		
}

public function logout(){
	$this->session->destroy();
	redirect("/students/index");
}
		

}
