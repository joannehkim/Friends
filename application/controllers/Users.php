<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->view('main');
	}

	public function register()
	{
		$this->load->model('User');
		$this->load->library("form_validation");

		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("alias", "Alias", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
		$this->form_validation->set_rules("password_confirm", "Password Confirmation", "trim|required|matches[password]");
		$this->form_validation->set_rules("birthday", "Birthday", "trim|required");

		if($this->form_validation->run() === FALSE) {

			$this->session->set_flashdata('errors', validation_errors());
			redirect("/");			
		}
		else {
			$user = $this->User->newUser($this->input->post());

			$this->session->set_userdata('currentUser', $user);

			redirect("/Users/friends");
		}
	}

	public function login()
	{
		$this->load->model('User');
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");

		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/");
		}
		else {
			$user = $this->User->findUserByEmail($this->input->post('email'));

			if ($user && $user['password'] == md5($this->input->post('password'))) {
				$this->session->set_userdata('currentUser', $user);
				redirect("/Users/friends");
			}
			else {
				$this->session->set_flashdata('errors', 'Invalid email/password!');
				redirect('/');
			}
		}
	}
	public function friends()
	{
		$this->load->model('User');
		$currentUser = $this->session->userdata('currentUser')['id'];

		$data['listFriends'] = $this->User->listFriends($currentUser);
		$data['listNonFriends'] = $this->User->listNonFriends($currentUser);

		$this->load->view('friends', $data);
	}

	public function viewProfile($user)
	{
		$this->load->model('User');
		
		$data['viewProfile'] = $this->User->viewProfile($user);

		$this->load->view('viewProfile', $data);
	}

	public function add($user)
	{
		$this->load->model('User');
		$this->User->add($user);

		redirect('/Users/friends');
	}

	public function remove($user)
	{
		$this->load->model('User');
		$this->User->remove($user);

		redirect('/Users/friends');

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

}


