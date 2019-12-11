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
	}
	public function index()
	{
		$this->data["student_count"] = $this->student_model->record_count() ;
		
		$month_accumulation = $this->savings_model->accumulation( "month", NULL, date("m") )->row();
		$total_accumulation = $this->savings_model->accumulation(  )->row();
		$this->data[ "month_accumulation" ] = ( $month_accumulation != null )? number_format( $month_accumulation->nominal ) : 0 ;
		$this->data[ "total_accumulation" ] = ( $total_accumulation != null )? number_format( $total_accumulation->nominal ) : 0 ;
		
		#################################################################3
		$alert = $this->session->flashdata('alert');
		$this->data["key"] = $this->input->get('key', FALSE);
		$this->data["alert"] = (isset($alert)) ? $alert : NULL ;
		$this->data["current_page"] = $this->current_page;
		$this->data["block_header"] = "Group";
		$this->data["header"] = "Group";
		$this->data["sub_header"] = 'Klik Tombol Action Untuk Aksi Lebih Lanjut';
		$this->render( "uadmin/dashboard/content" );
	}
}
