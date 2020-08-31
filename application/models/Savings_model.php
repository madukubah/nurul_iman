<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Savings_model extends MY_Model
{
  protected $table = "savings";

  function __construct() {
      parent::__construct( $this->table );
      parent::set_join_key( 'savings_id' );
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
      // echo var_dump( $entries )."<br><br>";die;
      if( empty( $entries ) ) return TRUE;

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
    if( !$this->delete_foreign( $data_param ) )
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
   * @param int|array|null $id = id_savings
   * @return static
   * @author madukubah
   */
  public function saving( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->savings(  );

      return $this;
  }

  /**
   * group
   *
   * @param int|array|null $id = id_savings
   * @return static
   * @author madukubah
   */
  public function count_by_student_id( $student_id = NULL  )
  {
      if (isset($student_id))
      {
        $this->where($this->table.'.student_id', $student_id);
      }

      return $this->record_count();
  }

    /**
   * group
   *
   * @param int|array|null $id = id_savings
   * @return static
   * @author madukubah
   */
  public function accumulation( $group_by = NULL, $student_id = NULL, $month = NULL  )
  {
    $_group = array(
			'month' => $this->table.".month",
			'day' => $this->table.".day",
			'year' => $this->table.".year",
		);
    $this->db->select([
      $this->table.".*",
      "SUM( ".$this->table.".nominal ) as nominal",
      $this->table.".date ",
    ]);
    $this->db->from( "
      ( 
          SELECT 
            a.*,  
            MONTH( a.date ) as _month ,
            YEAR( a.date ) as _year,
            DAY( a.date ) as day
          FROM 
            savings a 
      ) savings
    " );

    if ( isset( $group_by ) )
		{
				$this->db->group_by( $_group[ $group_by ] );
    }
    if (isset($student_id))
    {
      $this->db->where($this->table.'.student_id', $student_id);
    }

    if (isset($month))
    {
      $this->db->where($this->table.'.month', $month);
    }

    $this->db->order_by($this->table.'.date', 'desc');
    return $this->db->get( ) ;
  }
  
  /**
   * savings
   *
   *
   * @return static
   * @author madukubah
   */
  public function savings( $start = 0 , $limit = NULL, $student_id = NULL, $year= null )
  {
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      if (isset($student_id))
      {
        $this->where($this->table.'.student_id', $student_id);
      }
      if (isset($year))
      {
        $this->where($this->table.'.year', $year);
      }
      $this->select($this->table.'.*');
      $this->select($this->table.'.date as _date' );

      $this->offset( $start );
      $this->order_by($this->table.'.date', 'desc');
      return $this->fetch_data();
  }

  public function search( $key = 'a', $year = NULL  )
  {
     $this->db->like( 'student.registration_number', $key, 'both' );
     $this->db->or_like( 'student.name', $key, 'both' );

     return $this->savings_( 0, NULL, $year );
  }

  public function savings_( $start = 0 , $limit = NULL, $year = NULL, $student_id = null )
  {
    // $year || $year = date('Y');
    $this->db->select([
      "CONCAT( student.registration_number, ' '  ) as _registration_number",
      "student.name",
      "student.id as student_id",
      "savings.year",
      "savings.student_id",
      "SUM( CASE WHEN savings.month = 1 THEN  savings.nominal ELSE 0 end ) as jan",
      "SUM( CASE WHEN savings.month = 2 THEN  savings.nominal ELSE 0 end ) as feb ",
      "SUM( CASE WHEN savings.month = 3 THEN  savings.nominal ELSE 0 end ) as mar ",
      "SUM( CASE WHEN savings.month = 4 THEN  savings.nominal ELSE 0 end ) as apr ",
      "SUM( CASE WHEN savings.month = 5 THEN  savings.nominal ELSE 0 end ) as mei ",
      "SUM( CASE WHEN savings.month = 6 THEN  savings.nominal ELSE 0 end ) as jun ",
      "SUM( CASE WHEN savings.month = 7 THEN  savings.nominal ELSE 0 end ) as jul ",
      "SUM( CASE WHEN savings.month = 8 THEN  savings.nominal ELSE 0 end ) as ags ",
      "SUM( CASE WHEN savings.month = 9 THEN  savings.nominal ELSE 0 end ) as sep ",
      "SUM( CASE WHEN savings.month = 10 THEN savings.nominal ELSE 0 end ) as okt ",
      "SUM( CASE WHEN savings.month = 11 THEN savings.nominal ELSE 0 end ) as nov ",
      "SUM( CASE WHEN savings.month = 12 THEN savings.nominal ELSE 0 end ) as des ",
    ]);
    
    $this->db->join( "student","on student.id = savings.student_id", "inner" );
    if ( isset( $year ) )
        $this->db->where( $this->table.'.year', $year);
    if ( isset( $student_id ) )
        $this->db->where( $this->table.'.student_id', $student_id);
    $this->db->group_by( $this->table.".student_id" );
    $this->db->group_by( $this->table.".year" );
    
    if (isset( $limit ))
    {
      $this->db->limit( $limit );
    }
    $this->db->offset( $start );

    return $this->db->get( $this->table );

  }

  public function savings_in_year( $year = NULL )
  {
    $this->db->select([
      "savings.year",
      "SUM( CASE WHEN savings.month = 1 THEN  savings.nominal ELSE 0 end ) as jan",
      "SUM( CASE WHEN savings.month = 2 THEN  savings.nominal ELSE 0 end ) as feb ",
      "SUM( CASE WHEN savings.month = 3 THEN  savings.nominal ELSE 0 end ) as mar ",
      "SUM( CASE WHEN savings.month = 4 THEN  savings.nominal ELSE 0 end ) as apr ",
      "SUM( CASE WHEN savings.month = 5 THEN  savings.nominal ELSE 0 end ) as mei ",
      "SUM( CASE WHEN savings.month = 6 THEN  savings.nominal ELSE 0 end ) as jun ",
      "SUM( CASE WHEN savings.month = 7 THEN  savings.nominal ELSE 0 end ) as jul ",
      "SUM( CASE WHEN savings.month = 8 THEN  savings.nominal ELSE 0 end ) as ags ",
      "SUM( CASE WHEN savings.month = 9 THEN  savings.nominal ELSE 0 end ) as sep ",
      "SUM( CASE WHEN savings.month = 10 THEN savings.nominal ELSE 0 end ) as okt ",
      "SUM( CASE WHEN savings.month = 11 THEN savings.nominal ELSE 0 end ) as nov ",
      "SUM( CASE WHEN savings.month = 12 THEN savings.nominal ELSE 0 end ) as des ",
    ]);
    
    $this->db->join( "student","on student.id = savings.student_id", "inner" );
    if ( isset( $year ) )
        $this->db->where( $this->table.'.year', $year);
    
    $this->db->group_by( $this->table.".year" );

    return $this->db->get( $this->table );
  }
  public function count_savings( $month = NULL, $year = NULL )
  {
    $this->db->select([
      "CONCAT( student.registration_number, ' '  ) as _registration_number",
      "student.id",
      "student.name",
      "savings.year",
      "savings.month",
      "COUNT( * )"
    ]);
    
    $this->db->join( "student","on student.id = savings.student_id", "inner" );
    $this->db->where( $this->table.'.year', $year);
    $this->db->where( $this->table.'.month', $month);
    $this->db->group_by( $this->table.".student_id" );
    $this->db->group_by( $this->table.".month" );

    return $this->db->get( $this->table );
  }
  
  public function get_total_saving_months( $year, $month = null )
  {
    $this->db->select('*');
    $this->db->where('year', $year);
    if($month){
      $this->db->where('month', $month);
    }else {
      $this->db->select('SUM(nominal) as nominal_month');
      $this->db->group_by('month');
    }
    return $this->db->get( $this->table );
  }
}
?>
