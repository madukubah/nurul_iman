<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends MY_Model
{
  protected $table = "activities";

  function __construct() {
      parent::__construct( $this->table );
      parent::set_join_key( 'menu_id' );
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
   * @param int|array|null $id = id_groups
   * @return static
   * @author madukubah
   */
  public function activity( $id = NULL  )
  {
    $this->select( $this->table . '.*' );
    $this->select( $this->table . '.image AS image_old' );
    $this->select( $this->table . '.date AS _date' );
    $this->select('CONCAT("'.base_url('uploads/activity/').'", "", activities.image) AS image');
    $this->select( $this->table . '.image AS image_old' );
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->activities(  );

      return $this;
  }
 
  /**
   * activities
   *
   *
   * @return static
   * @author madukubah
   */
  public function activities( $start = 0 , $limit = NULL )
  {
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.id', 'asc');
      return $this->fetch_data();
  }
  public function activities_by_organization_id ( $start = 0 , $limit = NULL, $organization_id = NULL )
  {
    $this->select( $this->table . '.*' );
    $this->select( $this->table . '.image AS image_old' );
    $this->select( $this->table . '.date AS _date' );
    $this->select('CONCAT("'.base_url('uploads/activity/').'", "", activities.image) AS image');
    $this->select( $this->table . '.image AS image_old' );
    $this->select( 'organization.name AS organization_name' );
    if (isset($organization_id))
      {
        $this->where($this->table.'.organization_id', $organization_id);
      }

      $this->join(
        'organization',
        'organization.id = activities.organization_id',
        'inner'
      );

      $this->order_by($this->table.'.id', 'desc');

      $this->activities( $start, $limit );

      return $this;
  }

  public function activity_by_file_content( $file_content = NULL )
  {
    $this->select( $this->table . '.*' );
    $this->select( $this->table . '.image AS image_old' );
    $this->select( $this->table . '.date AS _date' );
    $this->select('CONCAT("'.base_url('uploads/activity/').'", "", activities.image) AS image');
    $this->select( $this->table . '.image AS image_old' );
    if (isset($file_content))
      {
        $this->where($this->table.'.file_content', $file_content);
      }
      $this->order_by($this->table.'.id', 'desc');

      $this->activities(  );

      return $this;
  }
}
?>
