<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/profile/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Profile_services');
		$this->services = new Profile_services;
		$this->load->model(array(
			'group_model',
			'activities_model',
			'mosque_model',
			'organization_model',
		));
	}
	public function index(  )
	{
		#################################################################3
		$form_data = $this->services->get_form_data(  );
		$form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;
		$this->data[ "contents" ] = $form_data;

		// var_dump($form_data); die;
		$add_menu = array(
			"name" => "Edit Profile",
			"button_color" => "success",
			"url" => site_url( $this->current_page."edit/"),
			'data' => NULL
		);

		$add_menu= $this->load->view('templates/actions/link', $add_menu, true ); 

		$this->data[ "header_button" ] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Profil Mesjid";
		$this->data["header"] = "Profil Mesjid";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function edit(  )
	{
		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			// buat content html

			$config =  $this->services->get_file_upload_config( $title );
			if( file_put_contents( $config['upload_path'].$config['file_name'], $this->input->post( 'summernote' ))  )
			{
				$data['file_content'] = $config['file_name'];
				if( $this->input->post( 'file_content' ) != "default.html" )
					if( !@unlink( $config['upload_path'].$this->input->post( 'file_content' ) ) ) return;
			}
			else
			{
				$data['file_content'] = "default.html";
			}

			$data_param['id'] = $this->input->post( 'id' );
			if($data_param['id']){
				$result = $this->mosque_model->update( $data, $data_param  );
			}else {
				$result = $this->mosque_model->create( $data );
			}

			if( $result ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->mosque_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->mosque_model->errors() ) );
			}
			redirect( site_url($this->current_page) );
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->mosque_model->errors() ? $this->mosque_model->errors() : $this->session->flashdata('message')));
		  if(  validation_errors() || $this->mosque_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		  
			$alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page . 'edit/';
			$this->data["block_header"] = "Edit Profile ";
			$this->data["header"] = "Edit Profile ";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $form_data = $this->services->get_form_data(  );
            $form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;

            $this->data[ "contents" ] =  $form_data;
            $this->render( "uadmin/mosque/plain_content_form" );
		}
	}
}
