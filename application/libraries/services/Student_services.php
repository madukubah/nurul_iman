<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student_services
{
	protected $id;
	protected $registration_number;
	protected $name;
	protected $ttl;
	protected $address;
	protected $parent_name;
	protected $phone;
	protected $gender;
	protected $entry_date;
	protected $parent_job;
	protected $study;
  protected $status;
  protected $student_id;
  protected $description;
  

  function __construct(){
        $this->id = "";
        $this->registration_number = "";
        $this->name= "";
        $this->ttl= "";
        $this->address= "";
        $this->parent_name= "";
        $this->phone= "";
        $this->gender= "";
        $this->entry_date= date("m/d/Y");
        $this->parent_job= "";
        $this->study= "";
        $this->status= "";
        $this->student_id= "";
        $this->description= "";
  }

  public function __get($var)
  {
    return get_instance()->$var;
  }
  
  public function get_photo_upload_config( $name = "_")
  {
    $name = str_replace( " ", "_", $name );
    $filename = "student_" . $name . "_" . time();
    $upload_path = 'uploads/student/';

    $config['upload_path'] = './' . $upload_path;
    $config['image_path'] = base_url() . $upload_path;
    $config['allowed_types'] = "gif|jpg|png|jpeg";
    $config['overwrite'] = "true";
    $config['max_size'] = "2048";
    $config['file_name'] = '' . $filename;

    return $config;
  }

  public function get_table_config( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        '_registration_number' => 'Nomor Induk',
        'name' => 'Nama Lengkap',
        'address' => 'Alamat',
        'ttl' => 'Tempat Tanggal Lahir',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => "Detail",
                "type" => "link",
                "url" => site_url($_page."detail/"),
                "button_color" => "primary",
                "param" => "id",
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
                  "photo" => array(
                    'type' => 'hidden',
                    'label' => "photo",
                  ),
                ),
                "title" => "Group",
                "data_name" => "name",
              ),
    );
    return $table;
  }

  public function get_table_config_savings( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        '_registration_number' => 'Nomor Induk',
        'name' => 'Nama Lengkap',
      );
      $table["number"] = $start_number;
      $table[ "action" ] = array(
              array(
                "name" => "Detail",
                "type" => "link",
                "url" => site_url($_page."student/"),
                "button_color" => "primary",
                "param" => "id",
              ),
    );
    return $table;
  }
  public function get_table_config_savings_( $_page, $start_number = 1 )
  {
      $table["header"] = array(
        'year' => 'Tahun',
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
      $table[ "action" ] = array(
          array(
            "name" => 'Edit Iuran',
            "type" => "modal_form",
            "modal_id" => "edit_",
            "url" => site_url( "uadmin/savings/edit_yearly/"),
            "button_color" => "primary",
            "param" => "id",
            "form_data" => array(
                "student_id" => array(
                  'type' => 'hidden',
                  'label' => "ID",
                ),
                "year" => array(
                  'type' => 'hidden',
                  'label' => "Tahun",
                ),
                "jan" => array(
                  'type' => 'number' ,
                  'label' => "Januari" ,
                ),
                "feb" => array(
                  'type' => 'number' ,
                  'label' => "Februari" ,
                ),
                "mar" => array(
                  'type' => 'number' ,
                  'label' => "Maret" ,
                ),
                "apr" => array(
                  'type' => 'number' ,
                  'label' => "April" ,
                ),
                "mei" => array(
                  'type' => 'number' ,
                  'label' => "Mei" ,
                ),
                "jun" => array(
                  'type' => 'number' ,
                  'label' => "Juni" ,
                ),
                "jul" => array(
                  'type' => 'number' ,
                  'label' => "Juli" ,
                ),
                "ags" => array(
                  'type' => 'number' ,
                  'label' => "Agustus" ,
                ),
                "sep" => array(
                  'type' => 'number' ,
                  'label' => "September" ,
                ),
                "okt" => array(
                  'type' => 'number' ,
                  'label' => "Oktober" ,
                ),
                "nov" => array(
                  'type' => 'number' ,
                  'label' => "November" ,
                ),
                "des" => array(
                  'type' => 'number' ,
                  'label' => "Desember" ,
                ),
            ),
            "title" => "Edit Iuran",
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
          'field' => 'ttl',
          'label' => 'ttl',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'address',
          'label' => 'address',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }

  public function validation_config_regist( ){
    $config = array(
        array(
          'field' => 'name',
          'label' => 'Nama Lengkap',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'ttl',
          'label' => 'Tempat, Tanggal Lahir',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'address',
          'label' => 'Alamat',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'gender',
          'label' => 'Jenis Kelamin',
          'rules' =>  'required',
        ),
        array(
          'field' => 'phone',
          'label' => 'Telepon',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'parent_name',
          'label' => 'Nama Orang Tua/Wali',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'parent_job',
          'label' => 'Pekerjaab Orang Tua/Wali',
          'rules' =>  'trim|required',
        ),
        array(
          'field' => 'study',
          'label' => 'Pendidikan',
          'rules' =>  'trim|required',
        ),
    );
    
    return $config;
  }

  /**
	 * get_form_data
	 *
	 * @return array
	 * @author madukubah
	 **/
	public function get_form_data( $student_id = NULL )
	{
		if( isset( $student_id ) )
		{
      $student 				              = $this->student_model->student( $student_id )->row();
      $this->id                     = $student->id;
      $this->registration_number    = $student->registration_number;
      $this->name                   = $student->name;
      $this->ttl                    = $student->ttl;
      $this->address                = $student->address;
      $this->parent_name            = $student->parent_name;
      $this->phone                  = $student->phone;
      $this->gender                 = $student->gender;
      $this->entry_date             = date( 'm/d/Y', strtotime( $student->entry_date ) ) ;
      $this->parent_job             = $student->parent_job;
      $this->study                  = $student->study;
      $this->status                  = $student->status;
		}


		$_data["form_data"] = array(
			"id" => array(
				'type' => 'hidden',
				'label' => "ID",
				'value' => $this->form_validation->set_value('id', $this->id),
        ),
        "status" => array(
          'type' => 'select',
          'label' => "Status",
          'options' => [ 1 => 'Aktif', 0 => 'Non Aktif' ],
          'selected' => $this->form_validation->set_value('status', $this->status),			  
        ),
      "registration_number" => array(
        'type' => 'text',
        'label' => "Nomor Induk",
        'value' => $this->form_validation->set_value('registration_number', $this->registration_number),
      ),
			"name" => array(
			  'type' => 'text',
			  'label' => "Nama Lengkap",
			  'value' => $this->form_validation->set_value('name', $this->name),
			),
			"ttl" => array(
			  'type' => 'text',
			  'label' => "Tempat, Tanggal Lahir",
			  'value' => $this->form_validation->set_value('ttl', $this->ttl),
      ),
      "study" => array(
			  'type' => 'text',
			  'label' => "Pendidikan",
			  'value' => $this->form_validation->set_value('study', $this->study),
			),
			"address" => array(
				'type' => 'text',
				'label' => "Alamat",
				'value' => $this->form_validation->set_value('address', $this->address),			  
      ),
			"parent_name" => array(
				'type' => 'text',
				'label' => "Nama Orang Tua / Wali",
				'value' => $this->form_validation->set_value('parent_name', $this->parent_name),			  
      ),
      "parent_job" => array(
				'type' => 'text',
				'label' => "Pekerjaan Orang Tua / Wali",
				'value' => $this->form_validation->set_value('parent_job', $this->parent_job),			  
      ),
      "phone" => array(
				'type' => 'text',
				'label' => "No HP",
				'value' => $this->form_validation->set_value('phone', $this->phone),			  
      ),
      "gender" => array(
				'type' => 'select',
        'label' => "Jenis Kelamin",
        'options' => [ 1 => 'Laki-laki', 0 => 'perempuan' ],
				'selected' => $this->form_validation->set_value('gender', $this->gender),			  
      ),
      "entry_date" => array(
				'type' => 'date',
				'label' => "Tanggal Masuk",
				'value' => $this->form_validation->set_value('entry_date', $this->entry_date ),			  
      ),
      "photo" => array(
				'type' => 'file',
				'label' => "Foto",
			),
    );
		return $_data;
  }

  public function get_form_assessment(  )
	{

		$_data["form_data"] = array(
			"id" => array(
				'type' => 'hidden',
				'label' => "ID",
      ),
      "student_id" => array(
				'type' => 'hidden',
				'label' => "ID",
      ),
      "knowledge" => array(
				'type' => 'number',
				'label' => "Pengetahuan",
      ),
      "attitude" => array(
				'type' => 'number' ,
				'label' => "Sikap" ,
      ),
      "class" => array(
				'type' => 'text',
				'label' => "Kelas",
      ),
      "description" => array(
        'type' => 'textarea',
        'label' => "Keterangan",
      ),
    );
		return $_data;
  }

  public function get_form_savings(  )
	{

		$_data["form_data"] = array(
      "student_id" => array(
				'type' => 'hidden',
				'label' => "ID",
      ),
      "year" => array(
				'type' => 'number',
				'label' => "Tahun",
      ),
      "jan" => array(
				'type' => 'number' ,
				'label' => "jan" ,
      ),
      "feb" => array(
				'type' => 'number' ,
				'label' => "feb" ,
      ),
      "mar" => array(
				'type' => 'number' ,
				'label' => "mar" ,
      ),
      "apr" => array(
				'type' => 'number' ,
				'label' => "apr" ,
      ),
      "mei" => array(
				'type' => 'number' ,
				'label' => "mei" ,
      ),
      "jun" => array(
				'type' => 'number' ,
				'label' => "jun" ,
      ),
      "jul" => array(
				'type' => 'number' ,
				'label' => "jul" ,
      ),
      "ags" => array(
				'type' => 'number' ,
				'label' => "ags" ,
      ),
      "sep" => array(
				'type' => 'number' ,
				'label' => "sep" ,
      ),
      "okt" => array(
				'type' => 'number' ,
				'label' => "okt" ,
      ),
      "nov" => array(
				'type' => 'number' ,
				'label' => "nov" ,
      ),
      "des" => array(
				'type' => 'number' ,
				'label' => "des" ,
      ),
    );
		return $_data;
  }
  
}
?>
