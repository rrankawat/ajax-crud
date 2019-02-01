<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->view('templates/header');
		$this->load->view('crud');
		$this->load->view('templates/footer');
	}

	public function create() {
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'city' => $this->input->post('city'),
			'updated_at' => NULL
		);
		if($this->welcome_model->create($data)) {
			$alert = array(
				'class' => 'success',
				'msg' => 'A user has been created'
			);
			echo json_encode($alert);
		}
	}

	public function read() {
		$items = $this->welcome_model->read();
		echo json_encode($items);
	}

	public function update() {
		$id = $this->input->post('id');
		$data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'city' => $this->input->post('city')
		);

		if($this->welcome_model->update($id, $data)) {
			$alert = array(
				'class' => 'success',
				'msg' => 'User data has been updated'
			);
			echo json_encode($alert);
		}
	}

	public function delete() {
		$id = $this->input->post('id');
		if($this->welcome_model->delete($id)) {
			$alert = array(
				'class' => 'success',
				'msg' => 'A user has been deleted'
			);
			echo json_encode($alert);
		}
	}
}
