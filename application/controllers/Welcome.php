<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('view');
	}

	public function receive () {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','name','required');
		$this->form_validation->set_rules('dob', 'date of birth', 'required');
		$this->form_validation->set_rules('email','email','trim|required|valid_email');
		$this->form_validation->set_rules('color','color','trim|required');
		if($this->form_validation->run() == FALSE)
		{
			echo validation_errors();
		}
		else 
		{
			$data = array (
				'name' 	=> 	$this->input->post('name', true),
				'email' => 	$this->input->post('email', true),
				'dob'	=> 	$this->input->post('dob', true),
				'color'	=>	$this->input->post('color', true)	
			);
			$this->load->model('User');
			if(!$this->User->insert_entry($data))
			{	
				echo "<p>I think i have a problem with my database, can we try again later?</p>";
			}               
			else
			{
				echo "<p>Hey ".$data['name']."!. I didn't know that ".$data['color']." was your favorite color. That is really cool!</p>";
			}	
		}
	}
}
