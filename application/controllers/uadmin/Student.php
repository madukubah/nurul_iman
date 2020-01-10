<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/student/';
	
	public function __construct(){
		parent::__construct();
		$this->load->library('services/Student_services');
		$this->services = new Student_services;
		$this->load->model(array(
			'student_model',
			'savings_model',
			'estimation_model',
		));
		$this->data["menu_list_id"] = "student_index";

	}

	public function upload_photo()
	{
		if( !($_POST) ) redirect( site_url($this->current_page) );

		$data['name'] = $this->input->post('name');
		$this->load->library('upload'); // Load librari upload
		$config = $this->services->get_photo_upload_config($data['name']);

		$this->upload->initialize($config);

		if ($this->upload->do_upload("photo")) {
			$data['photo'] = $this->upload->data()["file_name"];
			if ( $this->input->post('old_image') != "default.jpg")
				if (!@unlink($config['upload_path'] . $this->input->post('old_image'))) {};
		} else {
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->upload->display_errors()));
		}

		$data_param['id'] = $this->input->post('id');

		if ($this->student_model->update($data, $data_param)) 
		{
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->student_model->messages()));
		} else {
			$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->student_model->errors()));
		}
		redirect(site_url($this->current_page) . "detail/" . $data_param['id']  );

	}
	public function index()
	{	
		$search = $this->input->get( 'search', TRUE );
		$status = $this->input->get("status", TRUE );

		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) -  1 ) : 0;
		// echo $page; return;
        //pagination parameter
        $pagination['base_url'] = base_url( $this->current_page ) .'/index';
        $pagination['total_records'] = $this->student_model->record_count() ;
        $pagination['limit_per_page'] = 100;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		#################################################################3
		$table = $this->services->get_table_config( $this->current_page, $pagination['start_record'] + 1 );

		if( isset( $search ) )
			$table[ "rows" ] = $this->student_model->search( $search )->result(  );
		else
			$table[ "rows" ] = $this->student_model->students( $pagination['start_record'], $pagination['limit_per_page'], $status )->result();

		$table = $this->load->view('uadmin/student/student_table', $table, true);
		$form_filter["form_data"] = array(
				"status" => array(
						'type' => 'select',
						'label' => "Tahun",
						'options' => array(
							1 => "Aktif",
							0 => "Non Aktif",
						),
						// 'selected' => $year
				),
		);
		$form_filter["form"] = $this->load->view('templates/form/plain_form_horizontal', $form_filter, TRUE);
		$form_filter = $this->load->view('uadmin/savings/filter_horizontal', $form_filter, TRUE);

		$this->data[ "contents" ] =$form_filter. $table;
		$add_link = array(
			"name" => "Tambah Student",
			"modal_id" => "add_student_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add/"),
			'data' => NULL
		);

		$add_link= $this->load->view('templates/actions/link', $add_link, true ); 

		$import_ = array(
			"name" => "Import",
			"modal_id" => "import_",
			"button_color" => "success",
			"url" => site_url( $this->current_page."import/"),
			"form_data" => array(
				"document_file" => array(
					'type' => 'file',
					'label' => "File ( dalam Excel )",
				),
			),
			'data' => NULL
		);

		$import_= $this->load->view('templates/actions/modal_form_multipart', $import_, true ); 

		$search_ = array(
			"name" => "Cari",
			"modal_id" => "search_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page),
			"form_data" => array(
				"search" => array(
					'type' => 'text',
					'label' => "nama / no induk",
					'value' => $search
				),
			),
			'data' => NULL
		);

		$search_ = $this->load->view('templates/actions/modal_form_get', $search_, true );
	
		$this->data[ "header_button" ] =  $add_link.$import_.$search_;
		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Santri";
		$this->data["header"] = "Santri";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "templates/contents/plain_content" );
	}

	
	public function import(  )
	{
		$this->load->library('upload'); // Load librari upload
		$filename = "excel";
		$upload_path = 'uploads/excel/';
		$config['upload_path'] = './'.$upload_path;
		$config['allowed_types'] = "xls|xlsx";
		$config['overwrite']="true";
		$config['max_size']="2048";
		$config['file_name'] = ''.$filename;
		$this->upload->initialize($config);
		// echo var_dump( $_FILES ); return;
		if( $this->upload->do_upload("document_file") )
    	{
			$filename = $this->upload->data()["file_name"];
			// echo var_dump( $this->upload->data() );
			// return;
			// Load plugin PHPExcel nya
			include APPPATH.'third_party/PHPExcel.php';
			
			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load( $upload_path . $filename); // Load file yang telah diupload ke folder excel
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

			$numrow = 1;
			$entries = array();
			$_gender = [ 'laki-laki' => 1, 'perempuan' => 0 ];
			foreach($sheet as $row){
				// Cek $numrow apakah lebih dari 1
				// Artinya karena baris pertama adalah nama-nama kolom
				// Jadi dilewat saja, tidak usah diimport
				if($numrow > 1 &&  !empty( $row['A'] ) ){
					// $data_uji["data_name"] = $row['A'] ;
					$student_data["name"] = $row['A'];
					$student_data["registration_number"] = $row['B'];
					$student_data["ttl"] = $row['C'];
					$gender = strtolower(  $row['D'] );
					
					$student_data["gender"] = $_gender[ $gender ];
					$student_data["entry_date"] = date('Y-m-d' , strtotime( $row['E'] ) ) ;
					$student_data["parent_name"] = $row['F'];
					$student_data["parent_job"] = $row['G'];
					$student_data["study"] = $row['H'];
					$student_data["address"] = $row['I'];
					$student_data["phone"] = $row['J'];
					$student_data["phone"] || $student_data["phone"] = '-' ;

					$student_data['photo'] = "default.jpg";


					
					##########################################################
					// echo var_dump( $student_data ).'<br>' ;
					$entries[]= $student_data;
				}
				
				$numrow++; // Tambah 1 setiap kali looping
			}

			if( $this->student_model->create_batch( $entries ) ){
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->student_model->messages() ) );
			}else{
				$this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->student_model->errors() ) );
			}
		}
		else
		{
			echo $this->upload->display_errors();
		}
		redirect( site_url( $this->current_page )  );
		return;
	}

	public function add(  )
	{
		$this->form_validation->set_rules( $this->services->validation_config() );
		if ($this->form_validation->run() === TRUE )
        {
			$data['registration_number'] = $this->input->post('registration_number');
			$data['name'] = $this->input->post('name');
			$data['ttl'] = $this->input->post('ttl');

			$data['address'] = $this->input->post('address');
			$data['parent_name'] = $this->input->post('parent_name');
			$data['phone'] = $this->input->post('phone');
			$data['gender'] = $this->input->post('gender');
			$data['entry_date'] =  date("Y-m-d", strtotime( $this->input->post('entry_date') ) ) ;
			$data['parent_job'] = $this->input->post('parent_job');
			$data['study'] = $this->input->post('study');
			$data['timestamp'] = time();
			$data['status'] = $this->input->post('status');

			$this->load->library('upload'); // Load librari upload
			$config = $this->services->get_photo_upload_config($data['name']);

			$this->upload->initialize($config);
			// echo var_dump( $_FILES ); return;	
			if ($_FILES['photo']['name'] != "")
				if ($this->upload->do_upload("photo")) {
					$data['photo'] = $this->upload->data()["file_name"];
				} else {
					$data['photo'] = "default.jpg";
					// $this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->upload->display_errors()));
					// redirect(site_url($this->current_page) . "village/" . $this->input->post('village_id'));
				}
			else $data['photo'] = "default.jpg";

			if ($this->student_model->create($data)) {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->student_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->student_model->errors()));
			}
			redirect(site_url($this->current_page) );

		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            if(  !empty( validation_errors() ) || $this->ion_auth->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );

            $alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page;
			$this->data["block_header"] = "Tambah Santri ";
			$this->data["header"] = "Tambah Santri";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $form_data = $this->services->get_form_data();
            $form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;

            $this->data[ "contents" ] =  $form_data;
            
            $this->render( "templates/contents/plain_content_form_multipart" );
		}
	}

	public function detail( $student_id = null )
	{
		$year = $this->input->get("year", TRUE );
		$year || $year = date('Y');
		$month = (int) date('m');
		if( $student_id == null ) redirect(site_url(  $this->current_page ));  

		$table = $this->services->get_table_config_savings_( $this->current_page );
		$table[ "rows" ] = $this->savings_model->savings_( 0, null, null, $student_id )->result();
		// var_dump($table[ "rows" ]); die;
		$table = $this->load->view('uadmin/student/savings_table', $table, true);

		$add_savings = array(
			"name" => "Tambah Iuran",
			"modal_id" => "add_saving_",
			"button_color" => "primary",
			"url" => site_url( $this->current_page."add_saving/"),
			"form_data" => array(
				"student_id" => array(
					'type' => 'hidden',
					'label' => "Nama Group",
					'value' => $student_id,
				),
				"nominal" => array(
					'type' => 'number',
					'label' => "Iuran",
					'value' => '',
				),
				"date" => array(
					'type' => 'date',
					'label' => "Tanggal",
					'value' => date( "m/d/Y" ),
				),
				'month' => array(
					'type' => 'select',
					'label' => "Bulan",
					'options' => Util::MONTH,
					'selected' => $month
				),
				'year' => array(
					'type' => 'select',
					'label' => "Tahun",
					'options' => array(
						2019 => "2019",
						2020 => "2020",
						2021 => "2021",
						2022 => "2022",
					),
					'selected' => $year,
				)
			),
			'data' => NULL
		);

		$add_savings= $this->load->view('templates/actions/modal_form', $add_savings, true );

		$form_data = $this->services->get_form_data( $student_id );
		unset( $form_data["form_data"]["photo"] );
		$form_data = $this->load->view('templates/form/plain_form_readonly', $form_data , TRUE ) ;

		$form_estimation = $this->services->get_form_estimation( $student_id );
		$form_estimation = $this->load->view('templates/form/plain_form_readonly', $form_estimation , TRUE ) ;

		$student 				= $this->student_model->student( $student_id )->row();

		$this->data[ "btn_saving" ] =  $add_savings;
		$this->data[ "contents" ] 	=  $form_data;
		$this->data[ "estimation" ] =  $form_estimation;
		$this->data[ "student" ] 	=  $student;
		$this->data[ "savings" ] 	=  $table;

		#################################################################3

		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Data Santri ";
		$this->data["header"] = "Data Santri";
		$this->data["sub_header"] = '';

		
		$this->render( "uadmin/student/detail" );
	}
	public function edit( $student_id = null )
	{
		if( $student_id == null ) redirect(site_url(  $this->current_page ));  

		$this->form_validation->set_rules( $this->services->validation_config() );
		if ($this->form_validation->run() === TRUE )
        {
			$data['registration_number'] = $this->input->post('registration_number');
			$data['name'] = $this->input->post('name');
			$data['ttl'] = $this->input->post('ttl');

			$data['address'] = $this->input->post('address');
			$data['parent_name'] = $this->input->post('parent_name');
			$data['phone'] = $this->input->post('phone');
			$data['gender'] = $this->input->post('gender');
			$data['entry_date'] =  date("Y-m-d", strtotime( $this->input->post('entry_date') ) ) ;
			$data['parent_job'] = $this->input->post('parent_job');
			$data['study'] = $this->input->post('study');
			$data['timestamp'] = time();
			$data['status'] = $this->input->post('status');

			
			$data_param['id'] = $this->input->post('id');

			if ($this->student_model->update($data, $data_param)) 
			{
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->student_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->student_model->errors()));
			}
			redirect(site_url($this->current_page) . "detail/" . $data_param['id']  );
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            if(  !empty( validation_errors() ) || $this->ion_auth->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );

			$form_data = $this->services->get_form_data( $student_id );
			unset( $form_data["form_data"]["photo"] );
			$form_data = $this->load->view('templates/form/plain_form', $form_data , TRUE ) ;
			
			$student 				= $this->student_model->student( $student_id )->row();

			$change_photo = array(
				"name" => "Ganti Foto",
				"modal_id" => "add_group_",
				"button_color" => "primary",
				"url" => site_url( $this->current_page."upload_photo/"),
				"form_data" => array(
					"id" => array(
						'type' => 'hidden',
						'label' => "Nama Group",
						'value' => $student->id,
					),
					"name" => array(
						'type' => 'hidden',
						'label' => "Nama Group",
						'value' => $student->name,
					),
					"old_image" => array(
						'type' => 'hidden',
						'label' => "old_image",
						'value' => $student->photo,
					),
					"photo" => array(
						'type' => 'file',
						'label' => "Foto",
					),
				),
				'data' => NULL
			);
	
			$change_photo= $this->load->view('templates/actions/modal_form_multipart', $change_photo, true ); 
			
			$form_estimation = $this->services->get_form_estimation( $student_id );
			$form_estimation = $this->load->view('templates/form/plain_form', $form_estimation , TRUE ) ;
			$this->data[ "estimation" ] =  $form_estimation;

			$this->data[ "change_photo" ] 	=  $change_photo;
			$this->data[ "student" ] 		=  $student;
            $alert = $this->session->flashdata('alert');
			$this->data["key"] = $this->input->get('key', FALSE);
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->data["current_page"] = $this->current_page;
			$this->data["block_header"] = "Tambah Santri ";
			$this->data["header"] = "Tambah Santri";
			$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

            $this->data[ "contents" ] =  $form_data;
            $this->render( "uadmin/student/edit" );
		}
	}
	public function edit_estimation(  )
	{
		if( !($_POST) ) redirect( site_url($this->current_page) );

		$this->form_validation->set_rules( 'description', 'Penilaian', 'required|trim' );
		if ($this->form_validation->run() === TRUE )
        {
			$data['student_id'] = $this->input->post('student_id');
			$data['description'] = $this->input->post('description');
			
			$data_param['id'] = $this->input->post('id');
			if(!$data_param['id']){
				$id = $this->estimation_model->create($data);
			}else {
				$id = $this->estimation_model->update($data, $data_param);
			}

			if ( $id ) 
			{
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::SUCCESS, $this->estimation_model->messages()));
			} else {
				$this->session->set_flashdata('alert', $this->alert->set_alert(Alert::DANGER, $this->estimation_model->errors()));
			}
			redirect(site_url($this->current_page) . "detail/" . $this->input->post('student_id') );
		}
	}
	public function add_saving(  )
	{
		if( !($_POST) ) redirect(site_url(  $this->current_page ));  

		// echo var_dump( $data );return;
		$this->form_validation->set_rules( 'nominal', 'Iuran', 'required|trim' );
		$this->form_validation->set_rules( 'date', 'Tanggal', 'required|trim' );
        if ($this->form_validation->run() === TRUE )
        {
			$data['student_id'] = $this->input->post( 'student_id' );
			$data['nominal'] = $this->input->post( 'nominal' );
			$data['date'] = date("Y-m-d", strtotime( $this->input->post('date') ) ) ;
			$data['timestamp'] = time();


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
		
		redirect( site_url($this->current_page) . "detail/" . $this->input->post( 'student_id' ) );
	}

	public function delete(  ) {
		if( !($_POST) ) redirect( site_url($this->current_page) );
		
		$this->load->library('upload'); // Load librari upload
		$config = $this->services->get_photo_upload_config( time() );

		$data_param['id'] 	= $this->input->post('id');
		if( $this->student_model->delete( $data_param ) ){
			if ( $this->input->post('photo') != "default.jpg")
				if (!@unlink($config['upload_path'] . $this->input->post('photo'))) {};

		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::SUCCESS, $this->student_model->messages() ) );
		}else{
		  $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->student_model->errors() ) );
		}
		redirect( site_url($this->current_page)  );
	}
}
