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
		$key = (null !== $this->input->get('name')) ? $this->input->get('name') : null;

		if( $key ){
			$this->data['students'] = $this->student_model->search( $key )->result();
		}else {
			$this->data['students'] = $this->student_model->students()->result();
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