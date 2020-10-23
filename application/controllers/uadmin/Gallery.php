<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/gallery/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Gallery_services');
		$this->services = new Gallery_services;
		$this->load->model(array(
			'group_model',
			'gallery_model',
			'organization_model',
		));

	}
	public function index( $organization_id )
	{
		$organization = $this->organization_model->organization( $organization_id )->row();

		$page = ($this->uri->segment(4 + 1)) ? ($this->uri->segment(4 + 1) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index/' . $organization_id . '/';
        $pagination['total_records'] = count($this->gallery_model->gallery_by_organization_id( $organization_id, 3 )->result());
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4 + 1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);

		#################################################################3
		$table = $this->services->get_table_config( $this->current_page, ($pagination['start_record'] + 1) );
		$table[ "rows" ] = $this->gallery_model->gallery_by_organization_id( $organization_id, 3, NULL, $pagination['start_record'], $pagination['limit_per_page'] )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Galeri",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"image" => array(
					'type' => 'file',
					'label' => "Foto",
				),
				"description" => array(
					'type' => 'text',
					'label' => "Preview",
					'value' => "",
				),
				"organization_id" => array(
					'type' => 'hidden',
					'label' => "organization_id",
					'value' => $organization_id,
				),
				"name" => array(
					'type' => 'hidden',
					'label' => "organization_name",
					'value' => 'Galeri ' . $organization->name,
				),
				"_order" => array(
					'type' => 'number',
					'label' => "Urutan",
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
		$this->data["block_header"] = "Galeri";
		$this->data["header"] = $organization->name;
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		$organization_id = $this->input->post( 'organization_id' );
		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['organization_id'] = $organization_id;
			$data['type'] = 3;
			$data['name'] = $this->input->post( 'name' );
			$data['description'] = $this->input->post( 'description' );
			$data['file'] = $this->upload_image( $data['name'] );
			$data['_order'] = $this->input->post( '_order' );

			if( $this->gallery_model->create( $data ) ){
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
		
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		$organization_id = $this->input->post( 'organization_id' );
		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['organization_id'] = $organization_id;
			$data['description'] = $this->input->post( 'description' );
			$data['name'] = $this->input->post( 'name' );
			if(NULL != $_FILES['image']['name']){
				$data['file'] = $this->upload_image( $data['name'] );
				if( !$data['file'] ){
					redirect( site_url($this->current_page) . 'index/' . $organization_id );
				}
			}
			$data['_order'] = $this->input->post( '_order' );

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
		
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$path = 'uploads/gallery/';
		$organization_id = $this->input->post( 'organization_id' );
		$data_param['id'] 	= $this->input->post('id');
		if( $this->gallery_model->delete( $data_param ) ){
			if(NULL !== $this->input->post('image_old')){
				if($this->input->post('image_old') != 'default.jpg')
					@unlink( $path.$this->input->post('image_old') );
			}
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->gallery_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->gallery_model->errors() ) );
		}
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}
	public function upload_image( $name )
	{
		$upload = $this->config->item('upload', 'ion_auth');
		$name = str_replace( " ", "_",   $name  ); // spasi -> _
		$name = str_replace( ".", "_",   $name  ); // spasi -> _
		$name = str_replace( ",", "_",   $name  ); // spasi -> _

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/gallery/';

		$config 				= $upload;
		$config['file_name'] 	=  time() . "_";// . $name;
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
