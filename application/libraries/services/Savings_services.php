<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Savings_services
{


  function __construct(){

  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  public function get_table_config_( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        '_registration_number' => 'Nomor Induk',
        'name' => 'Nama Lengkap',
        'jan' => 'jan',
        'feb' => 'feb',
        'mar' => 'mar',
        'apr' => 'apr',
        'mei' => 'mei',
        'jun' => 'jun',
        'jul' => 'jul',
        'ags' => 'ags',
        'sep' => 'sep',
        'okt' => 'okt',
        'nov' => 'nov',
        'des' => 'des',
      );
      $table["number"] = $start_number;
    return $table;
  }

  public function get_table_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        '_date' => 'Tanggal',
        'nominal' => 'Nominal',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => 'Edit',
                "type" => "modal_form",
                "modal_id" => "edit_",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "form_data" => $this->get_form_data(  )["form_data"],
                "title" => "Group",
                "data_name" => "name",
              ),
              array(
                "name" => 'X',
                "type" => "modal_delete",
                "modal_id" => "delete_",
                "url" => site_url( $_page."delete/"),
                "button_color" => "danger",
                "param" => "id",
                "form_data" => array(
                  "id" => array(
                    'type' => 'hidden',
                    'label' => "id",
                  ),
                  "student_id" => array(
                    'type' => 'hidden',
                    'label' => "Nominal",
                  ),
                ),
                "title" => "Group",
                "data_name" => "date",
              ),
    );
    return $table;
  }
  public function validation_config( ){
    $config = array(
        array(
          'field' => 'student_id',
          'label' => 'student_id',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'nominal',
          'label' => 'nominal',
          'rules' =>  'trim|required',
        ),
        // array(
        //   'field' => 'date',
        //   'label' => 'date',
        //   'rules' =>  'trim|required',
        // ),
    );
    
    return $config;
  }
  public function get_form_data(  )
	{
    $_data["form_data"] = array(
      "id" => array(
				'type' => 'hidden',
				'label' => "ID",
      ),
      "student_id" => array(
        'type' => 'hidden',
        'label' => "Nominal",
      ),
      "nominal" => array(
        'type' => 'number',
        'label' => "Nominal",
      ),
    );

    return $_data;
  }
}
?>
