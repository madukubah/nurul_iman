<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends MY_Model
{
  protected $table = "student";

  function __construct() {
      parent::__construct( $this->table );
      parent::set_join_key( 'student_id' );
  }

  /**
   * create
   *
   * @param array  $data
   * @return static
   * @author madukubah
   */
  public function create( $data )
  {
      // Filter the data passed
      $data = $this->_filter_data($this->table, $data);

      $this->db->insert($this->table, $data);
      $id = $this->db->insert_id($this->table . '_id_seq');
    
      if( isset($id) )
      {
        $this->set_message("berhasil");
        return $id;
      }
      $this->set_error("gagal");
          return FALSE;
  }

  /**
   * create_batch
   *
   * @param array  $data
   * @return static
   * @author madukubah
   */
  public function create_batch( $entries )
  {
      $this->db->trans_begin();
      
      $this->db->insert_batch( $this->table , $entries);

      if ($this->db->trans_status() === FALSE)
      {
        $this->db->trans_rollback();

        $this->set_error("gagal");
        return FALSE;
      }

      $this->db->trans_commit();

      $this->set_message("berhasil");
      return TRUE;
  }
  /**
   * update
   *
   * @param array  $data
   * @param array  $data_param
   * @return bool
   * @author madukubah
   */
  public function update( $data, $data_param  )
  {
    $this->db->trans_begin();
    $data = $this->_filter_data($this->table, $data);

    $this->db->update($this->table, $data, $data_param );
    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      $this->set_error("gagal");
      return FALSE;
    }

    $this->db->trans_commit();

    $this->set_message("berhasil");
    return TRUE;
  }
  /**
   * delete
   *
   * @param array  $data_param
   * @return bool
   * @author madukubah
   */
  public function delete( $data_param  )
  {
    //foreign
    //delete_foreign( $data_param. $models[]  )
    if( !$this->delete_foreign( $data_param, [ 'savings_model', 'assessment_model' ]) )
    {
      $this->set_error("gagal");//('group_delete_unsuccessful');
      return FALSE;
    }
    //foreign
    $this->db->trans_begin();

    $this->db->delete($this->table, $data_param );
    if ($this->db->trans_status() === FALSE)
    {
      $this->db->trans_rollback();

      $this->set_error("gagal");//('group_delete_unsuccessful');
      return FALSE;
    }

    $this->db->trans_commit();

    $this->set_message("berhasil");//('group_delete_successful');
    return TRUE;
  }

    /**
   * group
   *
   * @param int|array|null $id = id_students
   * @return static
   * @author madukubah
   */
  public function student( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }
      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');
      $this->students(  );
      return $this;
  }

   /**
   * group
   *
   * @param int|array|null $id = id_students
   * @return static
   * @author madukubah
   */
  public function student_by_registration_number( $registration_number  )
  {
      $this->where($this->table.'.registration_number', $registration_number);

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');
      $this->students(  );
      return $this;
  }

  public function search( $key = 'a'  )
  {
     $this->db->select( $this->table.'.*' );
     $this->db->select( "CONCAT( ".$this->table.".registration_number, ' '  ) as _registration_number" );
     $this->db->select( "CONCAT( '".base_url()."uploads/student/' , ".$this->table.".photo  ) as image" );

     $this->db->like( $this->table.'.registration_number', $key, 'both' );
     $this->db->or_like( $this->table.'.name', $key, 'both' );

     return $this->db->get( $this->table );
  }


  public function student_in_ids( $start = 0 , $limit = NULL, $ids = [] )
  { 
    $this->db->select([
      "CONCAT( student.registration_number, ' '  ) as _registration_number",
      "student.id",
      "student.name",
    ]);
    if (isset( $limit ))
    {
      $this->db->limit( $limit );
    }
    $this->db->offset( $start );
    return $this->db->where_in('id', $ids )->get( $this->table );
    // return $this->db->get( $this->table );
  }


  public function student_not_in_ids( $start = 0 , $limit = NULL, $ids = [] )
  { 
    $this->db->select([
      "CONCAT( student.registration_number, ' '  ) as _registration_number",
      "student.id",
      "student.name",
    ]);
    if (isset( $limit ))
    {
      $this->db->limit( $limit );
    }
    $this->db->offset( $start );
    return $this->db->where_not_in('id', $ids )->get( $this->table );
    // return $this->db->get( $this->table );
  }
  

  

  /**
   * students
   *
   *
   * @return static
   * @author madukubah
   */
  public function students( $start = 0 , $limit = NULL, $status = NULL )
  {
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->select( $this->table.'.*');

      $this->select( "CONCAT( ".$this->table.".registration_number, ' '  ) as _registration_number" );
      $this->select( "CONCAT( '".base_url()."uploads/student/' , ".$this->table.".photo  ) as image" );

      if (isset( $status ))
      {
        $this->where($this->table.'.status', $status);
      }

      $this->order_by($this->table.'.registration_number', 'desc');
      return $this->fetch_data();
  }

}
?>
