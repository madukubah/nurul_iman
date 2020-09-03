<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/home/';
	public function __construct(){
		parent::__construct();
		$this->load->model(array(
			'savings_model',
			'student_model',
		));
		$this->load->database();
		// $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

	}
	public function index()
	{
		$months = array('jan' ,'feb' ,'mar' ,'apr' ,'mei' ,'jun' ,'jul' ,'ags' ,'sep' ,'okt' ,'nov' ,'des');
		$year = $this->input->get("year") ? $this->input->get("year") : date('Y');
		$month = $this->input->get("month") ? $this->input->get("month") : date('m');
		
		$month_accumulation = $this->savings_model->accumulation( "month", NULL, date("m") )->row();
		$total_accumulation = $this->savings_model->accumulation(  )->row();

		// $test2 = count( $this->savings_model->count_savings( $month, $year )->result() );
		// echo json_encode( $test2 );die;
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
				'selected' => $year ,
			)
		);
		$form_filter["form"] = $this->load->view('templates/form/plain_form_horizontal', $form_filter, TRUE);
		$this->data[ "form_filter" ] = $this->load->view('uadmin/dashboard/filter_horizontal', $form_filter, TRUE);

		$savings = $this->savings_model->savings_in_year( $year )->row();
		$savings_arr = array();

		if( isset( $savings ) )
		{
			foreach( $months as $month )
			{
				$savings_arr []=  $savings->$month ;
			}
		}else
			foreach( $months as $month )
			{
				$savings_arr []=  0;
			}

		#NORMALIZATION
		$monthly_savings_chart = array(
			'chart_id'=>"chart1",
			'title'=>"Iuran",
			'data_sets' => array(
				(object) array(
					'title' => 'Tahun '.$year,
					'color' => '"rgba(22,255,22,1)"', //merah
					'values'=> $savings_arr,
				),
			),
		);
		$monthly_savings_chart = $this->load->view('uadmin/dashboard/line', $monthly_savings_chart, true);
		$this->data[ "monthly_savings_chart" ] = $monthly_savings_chart;
		
		$this->data[ "active_student_count" ] = $this->student_model->where("status", "1")->record_count() ;
		$this->data[ "non_active_student_count" ] = $this->student_model->where("status", "0")->record_count() ;
		$this->data[ "month_accumulation" ] 	= ( $month_accumulation != null )? number_format( $month_accumulation->nominal ) : 0 ;
		$this->data[ "total_accumulation" ] 	= ( $total_accumulation != null )? number_format( $total_accumulation->nominal ) : 0 ;
		$this->data[ "saving_months" ] 			= $this->savings_model->get_total_saving_months( $year )->result();
		$this->data[ "savings_count" ] 			= count( $this->savings_model->count_savings( date("m"), date("Y") )->result() );
		$this->data[ "savings_count_leftover" ] = $this->data[ "active_student_count" ]  - $this->data[ "savings_count" ];

		$this->data[ "student_payment" ] 	= count($this->savings_model->get_total_saving_months( date('Y'), $month )->result());
		// var_dump((int) $month); die;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Group";
		$this->data["header"] = "Group";
		$this->data["sub_header"] = "Grafik Iuran ".$year;
		$this->render( "uadmin/dashboard/content" );
	}
	public function monthly_savings()
	{
		$year = date('Y');
		$month = $this->input->get("month") ? $this->input->get("month") : date('m');
		$status = $this->input->get("status") ? $this->input->get("status") : 0;

		$page = ($this->uri->segment(5)) ? ($this->uri->segment(5) -  1 ) : 0;
		// echo $status; return;
        //pagination parameter
		$pagination['base_url'] = base_url( $this->current_page ) .'monthly_savings/index';
		
        $pagination['limit_per_page'] = 100;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 5;
		//set pagination
		#################################################################3

		$table["header"] = array(
			'_registration_number' => 'Nomor Induk',
			'name' => 'Nama Lengkap',
		  );
		  $table["number"] = $pagination['start_record'];
		  $table[ "action" ] = array(
				  array(
					"name" => "Detail",
					"type" => "link",
					"url" => site_url( "uadmin/student/" ."detail/"),
					"button_color" => "primary",
					"param" => "id",
				  )
		);
		
		$students = ( $this->savings_model->count_savings( date("m"), date("Y") )->result() );
		// echo json_encode( $students );die;
		$student_counts = $this->student_model->where( "status", 1 )->record_count( );
		$ids = [];
		foreach( $students as $student )
		{
			$ids []= $student->id ;
		}
		if( count( $ids ) )
			if( $status )
				$table[ "rows" ] = ( $this->student_model->student_in_ids( $pagination['start_record'], $pagination['limit_per_page'], $ids )->result() );
			else $table[ "rows" ] = ( $this->student_model->student_not_in_ids( $pagination['start_record'], $pagination['limit_per_page'], $ids )->result() );
		else $table[ "rows" ] = [];

		$pagination['total_records'] = (  $status ) ? count( $ids ) : $student_counts - count( $ids ) ;
		if ($pagination['total_records'] > 0 ) $this->data['pagination_links'] = $this->setPagination($pagination);

		$table = $this->load->view('templates/tables/plain_table', $table, true);
		$this->data[ "contents" ] = $table;

		// return;
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Santri";
		if( $status )
			$this->data["header"] = "Santri Yang Mambayar Bulan Ini";
		else $this->data["header"] = "Santri Yang Belum Mambayar Bulan Ini";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';

		$this->render( "templates/contents/plain_content" );

	}
}
