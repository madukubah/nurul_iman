<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Caretaker extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/caretaker/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Caretaker_services');
		$this->services = new Caretaker_services;
		$this->load->model(array(
			'gallery_model',
		));

	}
	public function index( $organization_id )
	{
		$this->data['menu_list_id'] = 'caretaker_index_' . $organization_id ;
		$page = ($this->uri->segment(4 + 1)) ? ($this->uri->segment(4 + 1) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index/' . $organization_id . '/';
        $pagination['total_records'] = count($this->gallery_model->gallery_by_organization_id( $organization_id, 2 )->result());
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4 + 1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page, ($pagination['start_record']+1) );
		$table[ "rows" ] = $this->gallery_model->gallery_by_organization_id( $organization_id, 2, NULL, $pagination['start_record'], $pagination['limit_per_page'] )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Pengurus",
			"modal_id" => "add_group_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"organization_id" => array(
					'type' => 'hidden',
					'label' => "Foto Bagan Struktur",
					'value' => $organization_id
				),
                  "_order" => array(
                    'type' => 'number',
                    'label' => "Urutan",
                    'value' => 1,
                  ),
				"name" => array(
					'type' => 'text',
					'label' => "Nama Pengurus",
					'value' => "",
				),
				"image" => array(
					'type' => 'file',
					'label' => "Foto Pengurus",
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
		$this->data["block_header"] = "Data Pengurus";
		$this->data["header"] = "Data Pengurus";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		$data['organization_id'] = $this->input->post( 'organization_id' );
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['type'] = 2;
			$data['file'] = $this->upload_image();
			$data['_order'] = $this->input->post( '_order' );
			$data['name'] = $this->input->post( 'name' );
			$data['description'] = $this->input->post( 'description' );
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
		
		redirect( site_url($this->current_page) . 'index/' . $data['organization_id'] );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		$organization_id = $this->input->post( 'organization_id' );
		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			if(NULL != $_FILES['image']['name']){
				$data['file'] = $this->upload_image();
				if( !$data['file'] ){
					redirect( site_url($this->current_page) . 'index/' . $organization_id );
				}
			}
			$data['name'] = $this->input->post( 'name' );
			$data['_order'] = $this->input->post( '_order' );
			$data['description'] = $this->input->post( 'description' );
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
		$path = './uploads/gallery/';
		if( !($_POST) ) redirect( site_url($this->current_page) );

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
	public function upload_image(  )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$file = $_FILES[ 'image' ];
		$upload_path = 'uploads/gallery/';
		
		$file['name'] = str_replace( " ", "_",    $file['name']  ); // spasi ->
        $file['name'] = str_replace( ".", "_",   $file['name']  ); // spasi -> _
		$file['name'] = str_replace( ",", "_",   $file['name']  ); // spasi -> _
		
		$config 				= $upload;
		$config['file_name'] 	=  time() . "_";// . $file['name'];
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
