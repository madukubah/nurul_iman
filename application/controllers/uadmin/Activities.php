<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activities extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/activities/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Activities_services');
		$this->services = new Activities_services;
		$this->load->model(array(
			'group_model',
			'activities_model',
			'organization_model',
		));
	}
	public function index( $organization_id )
	{
		$this->data['menu_list_id'] = 'activities_index_' . $organization_id ;
		$organization = $this->organization_model->organization( $organization_id )->row();
		// var_dump($organization); die;
		$page = ($this->uri->segment(4 + 1)) ? ($this->uri->segment(4 + 1) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index';
        $pagination['total_records'] = $this->activities_model->record_count() ;
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page );
		$table[ "rows" ] = $this->activities_model->activities_by_organization_id( $pagination['start_record'], $pagination['limit_per_page'], $organization_id )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Kegiatan",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"organization_id" => array(
					'type' => 'hidden',
					'label' => "Kegiatan Organisasi",
					'value' => $organization_id,
				),
				"name" => array(
					'type' => 'text',
					'label' => "Nama Kegiatan",
					'value' => "",
				),
				"date" => array(
					'type' => 'date',
					'label' => "Tanggal Kegiatan",
					'value' => "",
				),
				"image" => array(
					'type' => 'file',
					'label' => "Foto Kegiatan",
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
		$this->data["block_header"] = "Kegiatan";
		$this->data["header"] = $organization->name;
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$data['organization_id'] = $this->input->post( 'organization_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['date'] = date("Y-m-d", strtotime( $this->input->post('date') ) ) ;
			$data['image'] = $this->upload_image();
			$data['description'] = $this->input->post( 'description' );

			if( $this->activities_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->activities_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->activities_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->activities_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->activities_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'index/' . $data['organization_id'] );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$organization_id = $this->input->post( 'organization_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['name'] = $this->input->post( 'name' );
			$data['date'] = date("Y-m-d", strtotime( $this->input->post('date') ) ) ;
			$data['description'] = $this->input->post( 'description' );
			
			if( NULL != $_FILES['image']['name'] ){
				$data['image'] = $this->upload_image();
			}
				
			$data_param['id'] = $this->input->post( 'id' );

			if( $this->activities_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->activities_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->activities_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->activities_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->activities_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}
	public function upload_image(  )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/activity/';

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
	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
		$organization_id 	= $this->input->post('organization_id');
	  
		$data_param['id'] 	= $this->input->post('id');
		if( $this->activities_model->delete( $data_param ) ){
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->activities_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->activities_model->errors() ) );
		}
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}
}
