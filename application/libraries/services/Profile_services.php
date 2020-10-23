<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_services
{
  const CONTENT_PATH = './uploads/structural/';
  protected $id;
  protected $file_content;
  protected $file_content_old;

  function __construct(){
    $this->id           = 0;
    $this->file_content_old = "";
    $this->file_content = "default.html";
  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function get_table_profile_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'email' => 'Email',
        'phone' => 'Telepon',
        'address' => 'Alamat',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
        array(
          "name" => 'Edit',
          "type" => "modal_form",
          "modal_id" => "edit_",
          "url" => site_url( $_page."edit_profile/"),
          "button_color" => "primary",
          "param" => "id",
          "form_data" => array(
            "id" => array(
              'type' => 'hidden',
              'label' => "id",
            ),
            "email" => array(
              'type' => 'text',
              'label' => "Email",
            ),
            "phone" => array(
                'type' => 'number',
                'label' => "Telepon",
            ),
            "address" => array(
              'type' => 'textarea',
              'label' => "Jalan",
            ),
          ),
          "title" => "Group",
          "data_name" => "name",
        ),
    );
    return $table;
  }

  public function get_table_carousel_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'image' => 'Foto Slider',
        'description' => 'Deskripsi',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
        array(
          "name" => 'Edit',
          "type" => "modal_form_multipart",
          "modal_id" => "edit_",
          "url" => site_url( $_page."edit_carousel/"),
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
            'description' => array(
              'type' => 'textarea',
              'label' => "Deskripsi",
            ),
            "image_old" => array(
              'type' => 'hidden',
              'label' => "Foto",
            ),
          ),
          "title" => "Group",
          "data_name" => "name",
        ),
    );
    return $table;
  }

  public function get_table_logo_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'image' => 'Logo',
        'description' => 'Deskripsi',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
        array(
          "name" => 'Edit',
          "type" => "modal_form_multipart",
          "modal_id" => "edit_",
          "url" => site_url( $_page."edit_logo/"),
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
            'description' => array(
              'type' => 'textarea',
              'label' => "Deskripsi",
            ),
            "image_old" => array(
              'type' => 'hidden',
              'label' => "Foto",
            ),
          ),
          "title" => "Group",
          "data_name" => "name",
        ),
    );
    return $table;
  }

  public function get_table_second_carousel_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'image' => 'Foto Slider',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
        array(
          "name" => 'Edit',
          "type" => "modal_form",
          "modal_id" => "edit_",
          "url" => site_url( $_page."edit_profile/"),
          "button_color" => "primary",
          "param" => "id",
          "form_data" => array(
            "id" => array(
              'type' => 'hidden',
              'label' => "id",
            ),
            "email" => array(
              'type' => 'text',
              'label' => "Email",
            ),
            "phone" => array(
                'type' => 'number',
                'label' => "Telepon",
            ),
            "address" => array(
              'type' => 'textarea',
              'label' => "Jalan",
            ),
          ),
          "title" => "Group",
          "data_name" => "name",
        ),
    );
    return $table;
  }

  public function get_file_upload_config( $name )
  {
    // $name = str_replace( "(" )
    // $filename = "NEWS_".$name."_".time().".html";
    $filename = "PROFILE__".time().".html";
    $upload_path = 'uploads/structural/';

    $config['upload_path'] = './'.$upload_path;
    $config['file_name'] = ''.$filename;

    return $config;
  }

  public function validation_config( ){
    $config = array(
        array(
          'field' => 'summernote',
          'label' => 'Deskripsi',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }

  public function validation_config_profile( ){
    $config = array(
      array(
        'field' => 'email',
        'label' => 'Email',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'phone',
        'label' => 'Telepon',
        'rules' =>  'trim|required',
      ),
      array(
        'field' => 'address',
        'label' => 'ALamat',
        'rules' =>  'trim|required',
      ),
    );
    
    return $config;
  }

  public function validation_config_carousel( ){
    $config = array(
      array(
        'field' => 'id',
        'label' => 'ID',
        'rules' =>  'required',
      ),
    );
    
    return $config;
  }

  public function get_form_data(  )
	{
    $this->load->model(array(
			'mosque_model',
    ));
    $mosque = $this->mosque_model->mosque(  )->row();
    if( $mosque != NULL )
    {
        $this->id               = $mosque->id;
        $this->file_content     = $mosque->file_content;
        $this->file_content_old     = $mosque->file_content_old;
    }
    if( file_exists( Profile_services::CONTENT_PATH . $this->file_content ) )
    {
      $file_content = file_get_contents( Profile_services::CONTENT_PATH . $this->file_content );
    }
    else
    {
      $file_content = "";
    }
		$_data["form_data"] = array(
			"id" => array(
				'type' => 'hidden',
				'label' => "ID",
				'value' => $this->form_validation->set_value('id', $this->id),
			  ),
      "file_content_old" => array(
			  'type' => 'hidden',
			  'label' => "Gambar",
			  'value' => $this->form_validation->set_value( 'file_content_old', $this->file_content_old),
      ),
      "summernote" => array(
			  'type' => 'textarea',
			  'label' => "Profil Mesjid",
			  'value' => $this->form_validation->set_value('image', $file_content  ),
			),
    );
		return $_data;
	}
}
?>
