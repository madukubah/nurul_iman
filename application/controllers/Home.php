<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'student_model',
		));
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/index");
	}
	public function tpa()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/tpa");
	}
	public function rimnis()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/remas");
	}
	public function majelis()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/majelis");
	}
	public function profile()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/profile");
	}
	public function student(  )
	{
		$key = (null !== $this->input->get('registration_number')) ? $this->input->get('registration_number') : null;

		if( $key ){
			$this->data['student'] = $this->student_model->student_by_registration_number( $key )->row();
		}else {
			$this->data['student'] = null;
		}

		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/student");
	}	
	public function registration()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/registration");
	}	
}