<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Savings extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/savings/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Savings_services');
		$this->services = new Savings_services;
		$this->load->model(array(
			'savings_model',
			'student_model',
		));
		$this->data["menu_list_id"] = "savings_index";

	}

	public function index()
	{
		$search = $this->input->get( 'search', TRUE );
		$year = $this->input->get("year", TRUE );
		$year || $year = date('Y');

		// $this->services = new Student_services;
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) -  1 ) : 0;
		
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index';
        $pagination['limit_per_page'] = 100;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4;
		//set pagination
		#################################################################3
		$table = $this->services->get_table_config_( $this->current_page, $pagination['start_record'] + 1 );
		// $table[ "rows" ] = array();// $this->student_model->students( $pagination['start_record'], $pagination['limit_per_page'] )->result();

		if( isset( $search ) && $search != "" )
			$table[ "rows" ] = $this->savings_model->search( $search, $year )->result(  );
		else
			$table[ "rows" ] = $this->savings_model->savings_( $pagination['start_record'], $pagination['limit_per_page'], $year )->result();
		
		$pagination['total_records'] = count( $this->savings_model->savings_( 0, NULL, $year )->result() );

		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);


		$table = $this->load->view('uadmin/savings/savings_table', $table, true);

		#################################################################3
		
		$form_filter["form_data"] = array(
				"year" => array(
						'type' => 'select',
						'label' => "Tahun",
						'options' => array(
							2019 => "2019",
							2020 => "2020",
							2021 => "2021",
							2022 => "2022",
						),
						'selected' => $year
				),
				"search" => array(
					'type' => 'hidden',
					'label' => "nama / no induk",
					'value' => $search
				),
		);
		$form_filter["form"] = $this->load->view('templates/form/plain_form_horizontal', $form_filter, TRUE);
		$form_filter = $this->load->view('uadmin/savings/filter_horizontal', $form_filter, TRUE);
		$search_ = array(
			"name" => "Cari",
			"modal_id" => "search_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page),
			"form_data" => array(
				"year" => array(
					'type' => 'hidden',
					'label' => "nama / no induk",
					'value' =>  $year
				),
				"search" => array(
					'type' => 'text',
					'label' => "nama / no induk",
					'value' => $search
				),
			),
			'data' => NULL
		);

		$search_ = $this->load->view('templates/actions/modal_form_get', $search_, true );
		$this->data[ "header_button" ] =  $search_;

		$this->data[ "contents" ] =$form_filter. $table;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "";
		$this->data["header"] = "Data Iuran Tahun ".$year;
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}

	public function student( $student_id = null )
	{
		$year = $this->input->get("year", TRUE );
		// var_dump( $this->savings_model->accumulation( "month" )->result() );die;
		if( $student_id == null ) redirect(site_url(  $this->current_page ));  
		$student 				= $this->student_model->student( $student_id )->row();


		$page = ($this->uri->segment(4 + 1)) ? ($this->uri->segment(4 + 1) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/student/'. $student_id;
        $pagination['total_records'] = $this->savings_model->count_by_student_id( $student_id ) ;
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4 + 1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page, $pagination['start_record'] + 1 );
		if( isset( $search ) )
			$table[ "rows" ] = $this->savings_model->search( $search )->result(  );
		else
			$table[ "rows" ] = $this->savings_model->savings( $pagination['start_record'], $pagination['limit_per_page'], $student_id, $year )->result();
			
		$table = $this->load->view('templates/tables/plain_table', $table, true);
		$this->data[ "contents" ] = $table;
		$add_savings = array(
			"name" => "Tambah Iuran",
			"modal_id" => "add_Savings_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			"form_data" => array(
				"student_id" => array(
					'type' => 'hidden',
					'label' => "Nominal",
					'value' => $student->id,
				),
				"nominal" => array(
					'type' => 'number',
					'label' => "Nominal",
					'value' => "",
				),
				"date" => array(
					'type' => 'date',
					'label' => "Tanggal",
					'value' => date( "m/d/Y" ),
				),
			),
			'data' => NULL
		);

		$add_savings= $this->load->view('templates/actions/modal_form', $add_savings, true ); 

		$this->data[ "header_button" ] =  $add_savings;
		$month_accumulation = $this->savings_model->accumulation( "month", $student_id, date("m") )->row();
		$total_accumulation = $this->savings_model->accumulation( NULL, $student_id )->row();
		$this->data[ "month_accumulation" ] = ( $month_accumulation != null )? number_format( $month_accumulation->nominal ) : 0 ;
		$this->data[ "total_accumulation" ] = ( $total_accumulation != null )? number_format( $total_accumulation->nominal ) : 0 ;

		// var_dump( $total_accumulation );die;

		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Iuran Santri ". $student->name;
		$this->data["header"] = "List Iuran";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

		$this->render( "uadmin/savings/student" );
	}


	public function add(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['student_id'] = $this->input->post( 'student_id' );
			$data['nominal'] 	= $this->input->post( 'nominal' );
			$data['date'] 		= date("Y-m-d", strtotime( $this->input->post('date') ) ) ;
			$data['month'] 		= date("m", strtotime( $this->input->post('date') ) ) ;
			$data['year'] 		= date("Y", strtotime( $this->input->post('date') ) ) ;
			$data['timestamp'] 	= strtotime( $this->input->post('date'));


			if( $this->savings_model->create( $data ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->savings_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->savings_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->savings_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->savings_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . "student/" . $this->input->post( 'student_id' ) );
	}

	public function edit_yearly(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		$this->form_validation->set_rules( 'student_id', 'student_id', 'required|trim' );
        if ($this->form_validation->run() === TRUE )
        {

			$data_array = [];
			$months = array(
				1 => 'jan',
				2 => 'feb',
				3 => 'mar',
				4 => 'apr',
				5 => 'mei',
				6 => 'jun',
				7 => 'jul',
				8 => 'ags',
				9 => 'sep',
				10 => 'okt',
				11 => 'nov',
				12 => 'des',
			);
			foreach( $months as $ind => $month )
			{
				$data_array []= [
					'student_id' 	=> $this->input->post( 'student_id' ),
					'nominal' 		=> $this->input->post( $month ),
					'date' 			=> $this->input->post( 'year' ).'-'.$ind.'-15',
					'timestamp' 	=> strtotime( $this->input->post( 'year' ).'-'.$ind.'-15' ) ,
					'month' 		=> $ind ,
					'year' 			=> $this->input->post( 'year' ) ,
					
				];
			}
			// echo var_dump( $data_array );die;

			$this->savings_model->delete( [ 
				'year' => $this->input->post( 'year' ) , 
				'student_id' 	=> $this->input->post( 'student_id' ) 
			] );

			if( $this->savings_model->create_batch( $data_array ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->savings_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->savings_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->savings_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->savings_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url( ) . "uadmin/student/detail/" . $this->input->post( 'student_id' ) );
	}

	public function edit(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( $this->services->validation_config() );
        if ($this->form_validation->run() === TRUE )
        {
			$data['nominal'] = $this->input->post( 'nominal' );
			$data['timestamp'] = time();

			$data_param['id'] = $this->input->post( 'id' );

			if( $this->savings_model->update( $data, $data_param  ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->savings_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->savings_model->errors() ) );
			}
		}
        else
        {
          $this->data['message'] = (validation_errors() ? validation_errors() : ($this->m_account->errors() ? $this->savings_model->errors() : $this->session->flashdata('message')));
          if(  validation_errors() || $this->savings_model->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
		}
		
		redirect( site_url($this->current_page) . "student/" . $this->input->post( 'student_id' ) );		
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
	  
		$data_param['id'] 	= $this->input->post('id');
		if( $this->savings_model->delete( $data_param ) ){
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->savings_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->savings_model->errors() ) );
		}
		redirect( site_url($this->current_page) . "student/" . $this->input->post( 'student_id' ) );
		
	}
}
