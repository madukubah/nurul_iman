<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

	function __construct()
	{
			parent::__construct();
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/index2");


	}
	public function remas()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/remas");


	}
	public function majelis()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/majelis");


	}
	public function registration()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/registration");


	}	
}