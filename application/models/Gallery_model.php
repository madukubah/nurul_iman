<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends MY_Model
{
  protected $table = "gallery";

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
    //foreign
    //delete_foreign( $data_param. $models[]  )
    if( !$this->delete_foreign( $data_param, ['menu_model'] ) )
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
   * @param int|array|null $id = id_groups
   * @return static
   * @author madukubah
   */
  public function gallery( $id = NULL  )
  {
      if (isset($id))
      {
        $this->where($this->table.'.id', $id);
      }

      $this->limit(1);
      $this->order_by($this->table.'.id', 'desc');

      $this->galleries(  );

      return $this;
  }
 
  /**
   * galleries
   *
   *
   * @return static
   * @author madukubah
   */
  public function galleries( $start = 0 , $limit = NULL )
  {
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );
      $this->order_by($this->table.'.id', 'desc');
      return $this->fetch_data();
  }

  public function gallery_by_organization_id( $organization_id = NULL, $type = 1, $desc = NULL, $start = 0 , $limit = NULL, $name = NULL )
  {
    $this->select($this->table . '.*');
    $this->select( $this->table . '.file AS image_old' );
    $this->select('CONCAT("'.base_url('uploads/gallery/').'", "", gallery.file) AS image');
    $this->select( 'organization.name AS organization_name' );
    if (isset($organization_id))
      {
        $this->where($this->table.'.organization_id', $organization_id);
      }
      if (isset($type))
      {
        $this->where($this->table.'.type', $type);
      }
      $this->join(
        'organization',
        'organization.id = gallery.organization_id',
        'inner'
      );
      $this->order_by($this->table.'.id', 'desc');
      if( $type == 1 ){
        $this->limit(1);
      }
      if($desc){
        $this->where($this->table.'.description', $desc);
      }
      if($name){
        $this->where($this->table.'.name', $name);
      }
      if (isset( $limit ))
      {
        $this->limit( $limit );
      }
      $this->offset( $start );

      $this->galleries( $start, $limit );

      return $this;
  }

}
?>
