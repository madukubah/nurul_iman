<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Structural extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/structural/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Structural_services');
		$this->services = new Structural_services;
		$this->load->model(array(
			'group_model',
			'organization_model',
			'structural_model',
		));

	}
	public function index( $organization_id )
	{
		$this->data['menu_list_id'] = 'structural_index_' . $organization_id ;
		$organization = $this->organization_model->organization( $organization_id )->row();
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page );
		$table[ "rows" ] = $this->structural_model->structural_by_organization_id( $organization_id )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Foto",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"organization_id" => array(
					'type' => 'hidden',
					'label' => "Foto Bagan Struktur",
					'value' => $organization_id
				),
				"name" => array(
					'type' => 'text',
					'label' => "Nama Bagan Struktur",
					'value' => "",
				),
				"image" => array(
					'type' => 'file',
					'label' => "Foto Bagan Struktur",
					'value' => "",
				),
				"description" => array(
					'type' => 'textarea',
					'label' => "Deskripsi",
					'value' => "-",
				),
			),
			'data' => NULL
		);

		$add_menu= $this->load->view('templates/actions/modal_form_multipart', $add_menu, true ); 

		$this->data[ "header_button" ] =  $add_menu;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Bagan Struktur";
		$this->data["header"] = $organization->name;
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$data['organization_id'] = $this->input->post( 'organization_id' );
		$this->form_validation->set_rules( 'description', 'Deskripsi Kegiatan', 'required|trim' );
        if ($this->form_validation->run() === TRUE )
        {
			$data['image'] = $this->upload_image();
			$data['name'] = $this->input->post( 'name' );
			$data['description'] = $this->input->post( 'description' );

			if( $this->structural_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->structural_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->structural_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->structural_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->structural_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'index/' . $data['organization_id'] );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$organization_id = $this->input->post( 'organization_id' );
		$this->form_validation->set_rules( 'description', 'Deskripsi Kegiatan', 'required|trim' );
        if ($this->form_validation->run() === TRUE )
        {
			if(NULL != $_FILES['image']['name']){
				$data['image'] = $this->upload_image();
			}
			$data['name'] = $this->input->post( 'name' );
			$data['description'] = $this->input->post( 'description' );

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->structural_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->structural_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->structural_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->structural_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->structural_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
		
		$organization_id = $this->input->post( 'organization_id' );  
		$data_param['id'] 	= $this->input->post('id');
		
		if(NULL !== $this->input->post('image_old')){
			if($this->input->post('image_old') != 'default.jpg')
				@unlink( $config['upload_path'].$this->input->post('image_old') );
		}

		if( $this->structural_model->delete( $data_param ) ){
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->structural_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->structural_model->errors() ) );
		}
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}
	public function upload_image(  )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/structural/';

		$config 				= $upload;
		$config['file_name'] 	=  time() . "_" . $file['name'];
		$config['upload_path']	= './' . $upload_path;
		// var_dump($file['name']); die;
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload( 'image' ) )
		{
			// $this->set_error( $this->upload->display_errors() );
			// $this->set_error( 'upload_unsuccessful' );
			return FALSE;
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
