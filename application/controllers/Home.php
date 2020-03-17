<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'student_model',
			'gallery_model',
			'teacher_model',
			'activities_model',
			'organization_model',
			
		));
	}
	public function index()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->data['activities'] = $this->activities_model->activities_by_organization_id(0, 3)->result();
		$this->data['student'] = $this->student_model->record_count();
		$this->data['teacher'] = $this->teacher_model->record_count();
		$this->data['total_activity'] = $this->activities_model->activities()->num_rows();
		// var_dump($this->data['student']); die;
		$this->render("public/index");
	}
	public function article( $article )
	{
		$activity = $this->activities_model->activity_by_file_content( $article )->row();

		
		// $data['hit'] = $news->hit + 1;
		// $data_param['id'] = $news->id;
		// $this->event_model->update( $data, $data_param )->row();
		
		$upload_path = 'uploads/activity/';
		
		$config['upload_path'] = './'.$upload_path;
		$file = str_replace( "%20", " ", $article );
		$file_content = file_get_contents(  $config['upload_path'] . $file );
		// var_dump( $activity ); die;
		
		$this->data['activity'] = $activity;
		$this->data['file_content'] = $file_content;
		$this->render("public/plain_article");
	}
	public function tpa()
	{
		$this->data['activities'] = $this->activities_model->activities_by_organization_id(0, NULL, 1)->result();
		$this->data['teachers'] = $this->teacher_model->teachers()->result();
		// var_dump( $this->data['teachers'] ); die;
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/tpa");
	}
	public function rimnis()
	{
		$this->data['activities'] = $this->activities_model->activities_by_organization_id(0, NULL, 3)->result();
		$this->data['structural'] = $this->gallery_model->gallery_by_organization_id(3)->row();
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/remas");
	}
	public function majelis()
	{
		$this->data['activities'] = $this->activities_model->activities_by_organization_id(0, NULL, 2)->result();
		$this->data['structural'] = $this->gallery_model->gallery_by_organization_id(2)->row();
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/majelis");
	}
	public function profile()
	{
		$this->data['student'] = $this->student_model->record_count();
		$this->data['teacher'] = $this->teacher_model->record_count();
		$this->data['total_activity'] = $this->activities_model->activities()->num_rows();
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/profile");
	}
	public function gallery( $organization_id )
	{
		$organization = $this->organization_model->organization( $organization_id )->row();
		$this->data['galleries'] = $this->gallery_model->gallery_by_organization_id( $organization_id, 3 )->result();
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/gallery");
	}
	public function student(  )
	{
		$key = (null !== $this->input->get('registration_number')) ? $this->input->get('registration_number') : null;

		if( $key ){
			$this->data['student'] = $this->student_model->student_by_registration_number( $key )->row();
		}else {
			$this->data['student'] = null;
		}
		// var_dump( $this->data['student'] ); die;

		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/student");
	}	
	public function registration()
	{
		// TODO : tampilkan landing page bagi user yang belum daftar
		$this->render("public/registration");
	}	
}