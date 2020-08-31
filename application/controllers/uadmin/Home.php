<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Uadmin_Controller {
	private $services = null;
    private $name = null;
    private $parent_page = 'uadmin';
	private $current_page = 'uadmin/';
	public function __construct(){
		parent::__construct();
		$this->load->model(array(
			'savings_model',
			'student_model',
		));
		$this->load->database();
		$this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

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
		$this->data[ "month_accumulation" ] = ( $month_accumulation != null )? number_format( $month_accumulation->nominal ) : 0 ;
		$this->data[ "total_accumulation" ] = ( $total_accumulation != null )? number_format( $total_accumulation->nominal ) : 0 ;
		$this->data[ "saving_months" ] 		= $this->savings_model->get_total_saving_months( $year )->result();
		$this->data[ "savings_count" ] = count( $this->savings_model->count_savings( date("m"), date("Y") )->result() );
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
}
