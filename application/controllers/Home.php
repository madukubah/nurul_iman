<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
		$this->load->library('services/Student_services');
		$this->services = new Student_services;
		$this->load->model(array(
			'student_model',
			'gallery_model',
			'teacher_model',
			'activities_model',
			'profile_model',
			'organization_model',
			'savings_model',
		));
	}
	public function index()
	{
		$data['carousels'] = $this->gallery_model->gallery_by_organization_id(5, 3, NULL, 0, NULL, 'main-slider')->result();
		
		$this->data['carousel'] = $this->load->view('public/carousel', $data, true);
		$this->data['activities']["TPA Nurul Iman"] = $this->activities_model->activities_by_organization_id(0, 1, 1)->row();
		$this->data['activities']["Majelis Ta'lim Nurul Iman"] = $this->activities_model->activities_by_organization_id(0, 1, 2)->row();
		$this->data['activities']["RIMNIS Nurul Iman"] = $this->activities_model->activities_by_organization_id(0, 1, 3)->row();
		$this->data['activities']["Masjid Nurul Iman"] = $this->activities_model->activities_by_organization_id(0, 1, 4)->row();
		// $this->data['activities'] = $this->activities_model->activities_by_organization_id(0, 4)->result();

		$this->data['tpa'] = (object) [
			'activities' => count($this->activities_model->activities_by_organization_id(0, NULL, 1)->result()),
			'student' => $this->student_model->record_count(),
			'teacher' => $this->teacher_model->record_count(),
		];
		$this->data['masjid'] = (object) [
			'activities' => count($this->activities_model->activities_by_organization_id(0, NULL, 4)->result()),
			'caretaker' => count($this->gallery_model->gallery_by_organization_id( 4, 2 )->result()),
		];
		$this->data['rimnis'] = (object) [
			'activities' => count($this->activities_model->activities_by_organization_id(0, NULL, 3)->result()),
			'caretaker' => count($this->gallery_model->gallery_by_organization_id( 3, 2 )->result()),
		];
		$this->data['majelis'] = (object) [
			'activities' => count($this->activities_model->activities_by_organization_id(0, NULL, 2)->result()),
			'caretaker' => count($this->gallery_model->gallery_by_organization_id( 2, 2 )->result()),
		];

		$this->data['lead_of_masjid'] = $this->gallery_model->gallery_by_organization_id(4, 2, 'Ketua')->row();
		$this->data['lead_of_rimnis'] = $this->gallery_model->gallery_by_organization_id(3, 2, 'Ketua')->row();
		$this->data['lead_of_majelis'] = $this->gallery_model->gallery_by_organization_id(2, 2, 'Ketua')->row();
		$this->data['lead_of_tpa'] = $this->teacher_model->get_leader()->row();
		// var_dump($this->data['student']); die;
		$this->render("public/index");
	}
	public function article( $article )
	{
		$activity = $this->activities_model->activity_by_file_content( $article )->row();
		// $data['hit'] = $news->hit + 1;
		// $data_param['id'] = $news->id;
		// $this->event_model->update( $data, $data_param )->row();
		$upload_path = 'uploads/activity/';(int) 
		
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
		$page = ($this->uri->segment(4-1)) ? ($this->uri->segment(4-1) -  1 ) : 0;
		// echo $page; return;	
        //pagination parameter
        $pagination['base_url'] = base_url( 'home/tpa/' );
        $pagination['total_records'] = count($this->activities_model->activities_by_organization_id(0, NULL, 1)->result());
        $pagination['limit_per_page'] = 6;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] =  4-1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);
		
		$this->data['organizers'] = $this->teacher_model->teachers()->result();
		$this->data['activities'] = $this->activities_model->activities_by_organization_id($pagination['start_record'], $pagination['limit_per_page'], 1)->result();
		$this->data['structural'] = $this->gallery_model->gallery_by_organization_id(1)->row();
		$this->data['logo'] = $this->gallery_model->gallery_by_organization_id(1, 4)->row();
		$this->data['leader'] = $this->teacher_model->get_leader()->row();
		$this->render("public/tpa");
	}
	public function rimnis()
	{
		$page = ($this->uri->segment(4-1)) ? ($this->uri->segment(4-1) -  1 ) : 0;
		// echo $page; return;	
        //pagination parameter
        $pagination['base_url'] = base_url( 'home/rimnis/' );
        $pagination['total_records'] = count($this->activities_model->activities_by_organization_id(0, NULL, 3)->result());
        $pagination['limit_per_page'] = 6;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] =  4-1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);

		$this->data['organizers'] = $this->gallery_model->gallery_by_organization_id( 3, 2 )->result();
		$this->data['activities'] = $this->activities_model->activities_by_organization_id($pagination['start_record'], $pagination['limit_per_page'], 3)->result();
		$this->data['structural'] = $this->gallery_model->gallery_by_organization_id(3)->row();
		$this->data['logo'] = $this->gallery_model->gallery_by_organization_id(3, 4)->row();
		$this->data['leader'] = $this->gallery_model->gallery_by_organization_id(3, 2, 'Ketua')->row();
		$this->render("public/remas");
	}
	public function majelis()
	{
		$page = ($this->uri->segment(4-1)) ? ($this->uri->segment(4-1) -  1 ) : 0;
		// echo $page; return;	
        //pagination parameter
        $pagination['base_url'] = base_url( 'home/majelis/' );
        $pagination['total_records'] = count($this->activities_model->activities_by_organization_id(0, NULL, 2)->result());
        $pagination['limit_per_page'] = 6;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] =  4-1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);

		$this->data['organizers'] = $this->gallery_model->gallery_by_organization_id( 2, 2 )->result();
		$this->data['activities'] = $this->activities_model->activities_by_organization_id($pagination['start_record'], $pagination['limit_per_page'], 2)->result();
		$this->data['structural'] = $this->gallery_model->gallery_by_organization_id(2)->row();
		$this->data['logo'] = $this->gallery_model->gallery_by_organization_id(2, 4)->row();
		$this->data['leader'] = $this->gallery_model->gallery_by_organization_id(2, 2, 'Ketua')->row();
		$this->render("public/majelis");
	}
	public function masjid()
	{
		$page = ($this->uri->segment(4-1)) ? ($this->uri->segment(4-1) -  1 ) : 0;
		// echo $page; return;	
        //pagination parameter
        $pagination['base_url'] = base_url( 'home/majelis/' );
        $pagination['total_records'] = count($this->activities_model->activities_by_organization_id(0, NULL, 4)->result());
        $pagination['limit_per_page'] = 6;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] =  4-1;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);

		$this->data['organizers'] = $this->gallery_model->gallery_by_organization_id( 4, 2 )->result();
		$this->data['structural'] = $this->gallery_model->gallery_by_organization_id(4)->row();
		$this->data['logo'] = $this->gallery_model->gallery_by_organization_id(4, 4)->row();
		$this->data['activities'] = $this->activities_model->activities_by_organization_id($pagination['start_record'], $pagination['limit_per_page'], 4)->result();
		$this->data['leader'] = $this->gallery_model->gallery_by_organization_id(4, 2, 'Ketua')->row();
		$this->render("public/masjid");
	}
	public function profile()
	{
		$data['carousels'] = $this->gallery_model->gallery_by_organization_id(5, 3, NULL, 0, NULL, 'main-slider')->result();
		
		// $this->data['carousel'] = $this->load->view('public/carousel', $data, true);
		// $this->data['carousels'] = $this->gallery_model->gallery_by_organization_id(5, 3, NULL, 0, NULL, 'second-slider')->result();
		// $this->data['profile'] = $this->profile_model->profile()->row();
		// $this->data['student'] = $this->student_model->record_count();
		// $this->data['teacher'] = $this->teacher_model->record_count();
		// $this->data['total_activity'] = $this->activities_model->activities()->num_rows();
		$this->render("public/profile");
	}
	public function gallery( $organization_id )
	{
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4) -  1 ) : 0;
		// echo $page; return;	
        //pagination parameter
        $pagination['base_url'] = base_url( 'home/gallery/' ) . $organization_id . '/';
		$pagination['total_records'] = count($this->gallery_model->gallery_by_organization_id( $organization_id, 3, null)->result());
        $pagination['limit_per_page'] = 8;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] =  4;
		//set pagination
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);

		$this->data['organization'] = $this->organization_model->organization( $organization_id )->row();
		$this->data['galleries'] = $this->gallery_model->gallery_by_organization_id( $organization_id, 3, null, $pagination['start_record'], $pagination['limit_per_page'] )->result();
		$this->render("public/gallery");
	}
	public function student(  )
	{
		$key = (null !== $this->input->get('registration_number')) ? $this->input->get('registration_number') : null;
		$student = $this->student_model->student_by_registration_number( $key )->row();
		$this->data['student'] = $student;
		
		$table_savings 				= $this->services->get_table_config_savings_( 'home/student' );
		$table_savings[ "rows" ] 	= $this->savings_model->savings_( 0, null, null, $student->id )->result();
		$table_savings 				= $this->load->view('uadmin/student/savings_table_public', $table_savings, true);
		$this->data[ "savings" ] 			=  $table_savings;
		
		if( !$this->data['student'] ){
			redirect(base_url('home/'));
		}
		$this->render("public/student");
	}	
	public function registration()
	{
		
		$this->form_validation->set_rules( $this->services->validation_config_regist() );
		if ($this->form_validation->run() === TRUE )
		{
			$gender = ['Laki-laki', 'Perempuan'];
			$data = [
				'name' => strtoupper($this->input->post('name')),
				'gender' => $gender[$this->input->post('gender')],
				'phone' => strtoupper($this->input->post('phone')),
				'address' => strtoupper($this->input->post('address')),
				'parent_name' => strtoupper($this->input->post('parent_name')),
				'parent_job' => strtoupper($this->input->post('parent_job')),
				'ttl' => strtoupper($this->input->post('ttl')),
				'study' => strtoupper($this->input->post('study')),
				'entry_date' => date('d F Y H:i:s'),
				'status' => 'Pendaftar',
				'registration_number' => '-',
			];

			$this->load->library('pdf');

			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle("Pendaftaran Santri");

			$pdf->setPrintHeader(false);
			$pdf->setPrintFooter(false);

			$pdf->SetTopMargin(10);
			$pdf->SetLeftMargin(10);
			$pdf->SetRightMargin(10);
			$pdf->SetAutoPageBreak(true);

			$pdf->SetAuthor('TLS');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();

			$cover[ "title" ] = "Pendaftaran Santri";
			$html = $this->load->view('report/cover', $cover, true);
			$pdf->writeHTML($html, true, false, true, false, '');

			$pdf->AddPage();
			$pdf->SetFont('times', NULL, 9);

			$html =  $this->load->view('report/student', $data, true);
			$pdf->writeHTML($html, true, false, true, false, '');
			$title = str_replace(" ", "_", 'Pendaftaran_Santri');

			$pdf->Output($title . ".pdf", 'I');

			redirect(site_url('home/registration') );
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            if(  !empty( validation_errors() ) || $this->ion_auth->errors() ) $this->session->set_flashdata('alert', $this->alert->set_alert( Alert::DANGER, $this->data['message'] ) );
			
            $alert = $this->session->flashdata('alert');
			$this->data['profile'] = $this->profile_model->profile()->row();
			$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
			$this->render("public/registration");
		}
	}
}