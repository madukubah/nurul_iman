<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activities_services
{
  const CONTENT_PATH = './uploads/activity/';
  protected $id;
  protected $organization_id;
  protected $name;
  protected $date;
  protected $image;
  protected $image_old;
  protected $preview;
  protected $file_content;

  function __construct(){
    $this->id           = 0;
    $this->organization_id  = 0;
    $this->name        = "";
    $this->user_id      = "";
    $this->date        = "";
    $this->preview        = "-";
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
    $filename = "ACTIVITY__".time().".html";
    $upload_path = 'uploads/activity/';

    $config['upload_path'] = './'.$upload_path;
    $config['file_name'] = ''.$filename;

    return $config;
  }

  public function get_table_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'name' => 'Nama Kegiatan',
        '_date' => 'Tanggal',
        'preview' => 'Preview',
        'image' => 'Foto',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => 'Edit',
                "type" => "link",
                "url" => site_url( $_page."edit/"),
                "button_color" => "primary",
                "param" => "id",
                "get" => "?organization_id=",
                "param_get" => "organization_id",
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
                    'label' => "Kegiatan Organisasi",
                  ),
                  "image_old" => array(
                    'type' => 'hidden',
                    'label' => "Nama Group",
                  ),
                  "file_content" => array(
                      'type' => 'hidden',
                      'label' => "Nama Group",
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
          'field' => 'summernote',
          'label' => 'Deskripsi',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }
  public function get_form_data( $organization_id = NULL, $activity_id = NULL )
	{
    $this->organization_id  = $organization_id;
    $this->load->model(array(
			'activities_model',
    ));
    if( $activity_id != NULL )
    {
        $activity = $this->activities_model->activity( $activity_id )->row();
        $this->id               = $activity->id;
        $this->organization_id  = $activity->organization_id;
        $this->name             = $activity->name;
        $this->date             = $activity->date;
        $this->image            = $activity->image;
        $this->image_old        = $activity->image_old;
        $this->preview          = $activity->preview;
        $this->file_content     = $activity->file_content;
    }
    $this->load->model(array(
			'organization_model',
    ));
    // try {
    //   $file_content = file_get_contents( News_services::CONTENT_PATH . $this->file_content );
    // }
    // catch (InvalidArgumentException $e) {
    //   $file_content = "";
    // }
    // finally {
    //     //optional code that always runs
    // }
    if( file_exists( Activities_services::CONTENT_PATH . $this->file_content ) )
    {
      $file_content = file_get_contents( Activities_services::CONTENT_PATH . $this->file_content );
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
			"organization_id" => array(
			  'type' => 'hidden',
			  'label' => "Organisasi",
			  'selected' =>  $this->organization_id,
			),
			"name" => array(
			  'type' => 'text',
			  'label' => "Nama Kegiatan",
			  'value' => $this->form_validation->set_value('name', $this->name),

			),
			"date" => array(
			  'type' => 'date',
			  'label' => "Tanggal Kegiatan",
			  'value' => $this->form_validation->set_value('name', $this->date),
      ),
      "file_content" => array(
			  'type' => 'hidden',
			  'label' => "user_id",
			  'value' => $this->form_validation->set_value('file_content', $this->file_content ),
      ),
      "file_image" => array(
			  'type' => 'hidden',
			  'label' => "user_id",
			  'value' => $this->form_validation->set_value( 'image', $this->image  ),
			),
			"image" => array(
			  'type' => 'file',
			  'label' => "Gambar",
			  'value' => $this->form_validation->set_value( 'image', $this->image),
      ),
      "image_old" => array(
			  'type' => 'hidden',
			  'label' => "Gambar",
			  'value' => $this->form_validation->set_value( 'image_old', $this->image_old),
      ),
      "preview" => array(
			  'type' => 'textarea',
			  'label' => "Konten Preview",
			  'value' => $this->form_validation->set_value('preview', $this->preview  ),
			),
      "summernote" => array(
			  'type' => 'textarea',
			  'label' => "Konten",
			  'value' => $this->form_validation->set_value('image', $file_content  ),
			),
    );
		return $_data;
	}
}
?>
