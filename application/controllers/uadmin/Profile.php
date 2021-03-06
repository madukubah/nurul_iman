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
			'gallery_model',
			'profile_model',
			'activities_model',
			'mosque_model',
			'organization_model',
		));
	}
	public function index(  )
	{
		$this->data['profile'] = $this->profile_model->profile()->row();

		$profile_table = $this->services->get_table_profile_config( $this->current_page );
		$profile_table[ "rows" ] = $this->profile_model->profile()->result();
		$profile_table = $this->load->view('templates/tables/plain_table', $profile_table, true);
		$this->data[ "profile_table" ] = $profile_table;

		$main_carousels = $this->services->get_table_carousel_config( $this->current_page );
		$main_carousels[ "rows" ] = $this->gallery_model->gallery_by_organization_id(5, 3, 'main-slider')->result();
		// var_dump($main_carousels[ "rows" ]); die;
		$main_carousels = $this->load->view('templates/tables/plain_table_image', $main_carousels, true);
		$this->data[ "main_carousels" ] = $main_carousels;

		$second_carousels = $this->services->get_table_carousel_config( $this->current_page );
		$second_carousels[ "rows" ] = $this->gallery_model->gallery_by_organization_id(5, 3, 'second-slider')->result();
		$second_carousels = $this->load->view('templates/tables/plain_table_image', $second_carousels, true);
		$this->data[ "second_carousels" ] = $second_carousels;
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
		$this->render( "uadmin/profile/index" );
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

	public function edit_profile(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		$this->form_validation->set_rules( $this->services->validation_config_profile() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['address'] = $this->input->post( 'address' );
			$data['email'] = $this->input->post( 'email' );
			$data['phone'] = $this->input->post( 'phone' );

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->profile_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->profile_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->profile_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->profile_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->profile_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) );
	}

	public function edit_carousel(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  
		
		$this->form_validation->set_rules( $this->services->validation_config_carousel() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['type'] = 3;
			if(NULL != $_FILES['image']['name']){
				$data['file'] = $this->upload_image( $data['name'] );
				if( !$data['file'] ){
					redirect( site_url($this->current_page) );
				}
			}

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->gallery_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->gallery_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->gallery_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->gallery_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->gallery_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) );
	}

	public function upload_image( $name )
	{
		$upload = $this->config->item('upload', 'ion_auth');
		$name = str_replace( " ", "_",   $name  ); // spasi -> _

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/gallery/';

		$config 				= $upload;
		$config['file_name'] 	=  time() . "_" . $name;
		$config['upload_path']	= './' . $upload_path;
		// var_dump($file['name']); die;
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload( 'image' ) )
		{
			$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->upload->display_errors() ) );
		}
		else
		{
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $config['upload_path'].$this->input->post('image_old') );
			}
			$file_data = $this->upload->data();
			return $file_data['file_name'];
		}
	}
}
