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
        $pagination['base_url'] = base_url( $this->current_page ) .'/index/' . $organization_id . '/';
        $pagination['total_records'] = count($this->activities_model->activities_by_organization_id( 0, NULL, $organization_id )->result());
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] =  4+1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page, ($pagination['start_record'] + 1) );
		$table[ "rows" ] = $this->activities_model->activities_by_organization_id( $pagination['start_record'], $pagination['limit_per_page'], $organization_id )->result();
		$table = $this->load->view('templates/tables/plain_table_image', $table, true);
		$this->data[ "contents" ] = $table;
		$add_menu = array(
			"name" => "Tambah Kegiatan",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add?organization_id=" . $organization_id),
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
		$this->data["block_header"] = "Kegiatan";
		$this->data["header"] = $organization->name;
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}


	public function add(  )
	{
		$organization_id = $this->input->get( 'organization_id' );
		$this->data['menu_list_id'] = 'activities_index_' . $organization_id ;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['organization_id'] = $organization_id;
			$data['name'] = $this->input->post( 'name' );
			$data['preview'] = $this->input->post( 'preview' );
			$data['date'] = date("Y-m-d", strtotime( $this->input->post('date') ) ) ;
			
			$name = str_replace( ".", "_",   $data['name']  ); // Load librari upload
			$name = str_replace( "/", "_",   $name  ); // Load librari upload
			$data['image'] = $this->upload_image( $name, $organization_id );
			
			// buat content html
			$config =  $this->services->get_file_upload_config( $name );

			if( file_put_contents( $config['upload_path'].$config['file_name'] , $this->input->post( 'summernote' ))  )
			{
				$data['file_content'] = $config['file_name'];
			}
			else
			{
				$data['file_content'] = "default.html";
			}

			if( $this->activities_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->activities_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->activities_model->errors() ) );
			}
			redirect( site_url($this->current_page) . 'index/' . $organization_id );
		}
        else
        {
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->activities_model->errors() ? $this->activities_model->errors() : $this->session->flashdata('message')));
			if(  validation_errors() || $this->activities_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		  
			$alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page . 'add';
			$this->data["block_header"] = "Buat Kegiatan ";
			$this->data["header"] = "Buat Kegiatan ";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $form_data = $this->services->get_form_data( $organization_id );
            $form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;

            $this->data[ "contents" ] =  $form_data;
            $this->render( "uadmin/activities/plain_content_form" );
		}
		
	}

	public function edit( $activity_id )
	{
		// echo var_dump( $data );return;
		$organization_id = $this->input->get( 'organization_id' );
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['organization_id'] = $organization_id;
			$data['name'] = $this->input->post( 'name' );
			$data['preview'] = $this->input->post( 'preview' );
			$data['date'] = date("Y-m-d", strtotime( $this->input->post('date') ) ) ;
			
			if( NULL != $_FILES['image']['name'] ){
				$data['image'] = $this->upload_image();
			}
			
			// buat content html

			$config =  $this->services->get_file_upload_config( $data['name'] );
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

			if( $this->activities_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->activities_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->activities_model->errors() ) );
			}
			redirect( site_url($this->current_page) . 'index/' . $organization_id );
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->activities_model->errors() ? $this->activities_model->errors() : $this->session->flashdata('message')));
		  if(  validation_errors() || $this->activities_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		  
			$alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page . 'edit/' . $activity_id;
			$this->data["block_header"] = "Buat Kegiatan ";
			$this->data["header"] = "Buat Kegiatan ";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $form_data = $this->services->get_form_data( $organization_id, $activity_id );
            $form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;

            $this->data[ "contents" ] =  $form_data;
            $this->render( "uadmin/activities/plain_content_form" );
		}
		
	}
	public function upload_image( $name = NULL, $organization_id = NULL )
	{
		$upload = $this->config->item('upload', 'ion_auth');

		$filename = "ACTIVITY_".$name."_".time();
		// $file = $_FILES[ 'image' ];
		$upload_path = 'uploads/activity/';

		$config 				= $upload;
		$config['file_name'] 	=  time() . "_" . $filename;
		$config['upload_path']	= './' . $upload_path;
		// var_dump($file['name']); die;
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload( 'image' ) )
		{
			$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->upload->display_errors() ) );
			redirect( site_url($this->current_page) . 'index/' . $organization_id );
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
		$upload_path = 'uploads/activity/';

		$config['upload_path'] = './'.$upload_path;
		if( !($_POST) ) redirect( site_url($this->current_page) );

		$organization_id 	= $this->input->post('organization_id');
	  
		$data_param['id'] 	= $this->input->post('id');
		if( $this->activities_model->delete( $data_param ) ){
			if( !@unlink( $config['upload_path'].$this->input->post( 'file_content' ) ) )
				if( !@unlink( $config['upload_path'].$this->input->post( 'image_old' ) ) )
					$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->activities_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->activities_model->errors() ) );
		}
		redirect( site_url($this->current_page) . 'index/' . $organization_id );
	}
}
