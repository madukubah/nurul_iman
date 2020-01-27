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
