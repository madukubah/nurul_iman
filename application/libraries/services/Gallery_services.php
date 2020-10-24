<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gallery_services
{


  function __construct(){

  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function get_table_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        '_order' => 'Urutan',
        'image' => 'Foto',
        'description' => 'Preview',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => 'Edit',
                "type" => "modal_form_multipart",
                "modal_id" => "edit_",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "form_data" => array(
                    "id" => array(
                        'type' => 'hidden',
                        'label' => "id",
                    ),
                    "image" => array(
                      'type' => 'file',
                      'label' => "Foto",
                    ),
                    "image_old" => array(
                      'type' => 'hidden',
                      'label' => "Foto",
                    ),
                    "organization_id" => array(
                      'type' => 'hidden',
                      'label' => "organization_id",
                    ),
                    "name" => array(
                      'type' => 'hidden',
                      'label' => "organization_id",
                    ),
                    "description" => array(
                        'type' => 'text',
                        'label' => "Preview",
                    ),
                    "_order" => array(
                      'type' => 'number',
                      'label' => "Urutan",
                    ),
                ),
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
                  "organization_id" => array(
                    'type' => 'hidden',
                    'label' => "organization_id",
                  ),
                  "image_old" => array(
                    'type' => 'hidden',
                    'label' => "foto",
                  ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
    );
    return $table;
  }
  public function validation_config( ){
    $config = array(
        array(
          'field' => 'name',
          'label' => 'name',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'description',
          'label' => 'description',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }
}
?>
