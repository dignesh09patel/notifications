<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role_model extends CI_Model {

    public function __construct() {
        parent::__construct();
       // $this->current_session = $this->setting_model->getCurrentSession();
    }

    /**
     * This funtion takes id as a parameter and will fetch the record.
     * If id is not provided, then it will fetch all the records form the table.
     * @param int $id
     * @return mixed
     */
    public function get($id = null) {
        $this->db->select()->from('roles');
        if ($id != null) {
            $this->db->where('roles.id', $id);
        } else {
            $this->db->order_by('roles.id');
        }
        $query = $this->db->get();
        if ($id != null) {
            $result = $query->row_array();
        } else {
            $result = $query->result_array();

            if ($this->session->has_userdata('hospitaladmin')) {
                    $search = in_array(0, array_column($result, 'id'));
                    $search_key = array_search(0, array_column($result, 'id'));
                    if (!empty($search)) {
                        unset($result[$search_key]);
                        $result = array_values($result);
                    }
                
            }
        }

        return $result;
    }

    
   
    public function getPermissions($group_id, $role_id) {
        $sql = "SELECT permission_category.*,IFNULL(roles_permissions.id,0) as `roles_permissions_id`,roles_permissions.can_view,roles_permissions.can_add ,roles_permissions.can_edit ,roles_permissions.can_delete FROM `permission_category` LEFT JOIN roles_permissions on permission_category.id = roles_permissions.perm_cat_id and roles_permissions.role_id= $role_id WHERE permission_category.perm_group_id = $group_id ORDER BY `permission_category`.`id`";
        $query = $this->db->query($sql);

        return $query->result();
    }
    
    public function getInsertBatchdata($to_be_insert = array()){
        if (!empty($to_be_insert)) {
            $this->db->insert_batch('event_permissions', $to_be_insert);
        }
    }

    public function get_events(){
        $query = $this->db->get('notification_events');
        return $query->result_array();
    }
    
    public function count_roles($id) {

        $query = $this->db->select("*")->where("role_id", $id)->get("staff");

        return $query->num_rows();
    }
    
    public function getRoles(){
                 $this->db->where('id!=',0);
        $query = $this->db->get('roles');
         return $query->result_array();
    }
    
    public function permission_category(){
        $query = $this->db->get('permission_category');
         return $query->result_array();
    }
    
    public function add_notification_event($data){
        $this->db->insert('notification_events',$data);
        return $this->db->insert_id();
        
    }
    
    public function insert_roles($data){
        $this->db->insert('role_permission',$data);
        return true;
    }
    
    public function get_sample_data(){
        $result=array();
        $this->db->select('data_date');
        $this->db->group_by('data_date');
       $query =  $this->db->get('sample_data');
       $date = $query->result_array();
       
       foreach($date as $d){
           $result[]= $d['data_date'];
           $this->db->select('data_date,affiliate_id');
           $this->db->where('data_date',$d['data_date']);
           $this->db->group_by('affiliate_id');
           $query1 =  $this->db->get('sample_data');
           $affiliate_id = $query1->result_array();
           foreach($affiliate_id as $a_id){
               $result[]= $a_id['affiliate_id'];
               $this->db->select('request,real_imp,real_net');
               $this->db->where('data_date',$a_id['data_date']);
               $this->db->where('affiliate_id',$a_id['affiliate_id']);
               $query2 =  $this->db->get('sample_data');
              $all = $query2->result_array();
                   $result[]=  $all;
               
           }
       }
       
       
        header('Content-Type: application/json');
        echo json_encode($result,JSON_PRETTY_PRINT);
       exit;
    }
    
    public function get_sample_data1(){
        $data_date =[];
        $affiliate_id = [];
        $encode = [];
         $this->db->select('data_date,affiliate_id,request,real_imp,real_net');
         $query =  $this->db->get('sample_data');
         $all_data = $query->result_array();
         $i=0;
         foreach ($all_data as $a_data){
             ++$i;
            if(!in_array($a_data['data_date'], $data_date)){
                $data_date[] = $a_data['data_date'];
                $d_date = $a_data['data_date'];
            }

            if(!in_array($a_data['affiliate_id'], $affiliate_id)){
                //$encode[][$a_data['affiliate_id']] = array($a_data['request'],$a_data['real_imp'],$a_data['real_net']);
                $affiliate_id[] = $a_data['affiliate_id'];
                $a_id = $a_data['affiliate_id'];
            }
            $encode[$d_date][$a_id]  = array('request'=>$a_data['request'],'real_imp'=>$a_data['real_imp'],'real_net'=>$a_data['real_net']);

            //$encode[] = $a_data['request'];
            
         }
         header('Content-Type: application/json');
         echo json_encode($encode,JSON_PRETTY_PRINT);
      exit;
    }
    
   
    
    public function get_role_permission($id){
        $this->db->select('event_id,roles.name as role_name');
        $this->db->join("roles","roles.id = role_permission.role_id");
        $this->db->where('role_permission.event_id',$id);
        $query= $this->db->get('role_permission');
          $result =  $query->result();
          foreach ($result as $key => $value) {
            $value->permission_category = $this->get_preferences($value->event_id);
        }
         return $result;
    }
    public function get_preferences($id){
        $this->db->select('event_permissions.*,permission_category.name as per_name');
        $this->db->join("notification_events","notification_events.id = event_permissions.eve_id");
        $this->db->join("permission_category","permission_category.id = event_permissions.perm_cat_id");
        $this->db->where('event_permissions.eve_id',$id);
        $query = $this->db->get('event_permissions');
       return $query->result();
       
    }
}

?>