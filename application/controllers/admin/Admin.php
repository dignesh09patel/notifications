<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('Customlib');
        $this->load->model('role_model');
    }

    function unauthorized() {
        $data = array();
        $this->load->view('layout/header', $data);
        $this->load->view('unauthorized', $data);
        $this->load->view('layout/footer', $data);
    }


    public function dashboard() {
      
        $role = $this->customlib->getStaffRole();
        $role_id = json_decode($role)->id;
        $role_name = json_decode($role)->name;
        
        $staffid = $this->customlib->getStaffID();

     
       $tot_roles = $this->role_model->get();
        foreach ($tot_roles as $key => $value) {
            if ($value["id"] != 1) {
                $count_roles[$value["name"]] = $this->role_model->count_roles($value["id"]);
            }
        }
     
        $data["roles"] = $count_roles;

        $data['main_content'] = 'admin/dashboard/dashboard';
        $data['title'] = 'Admin Dashboard';	
        $this->load->view('admin/template/template', $data);
        
    }

    public function add_notification(){
        $data['main_content'] = 'admin/notification/add_notification';
        $data['title'] = 'Notification Event';
        $data['roles'] = $this->role_model->getRoles();
        $data['permissions'] = $this->role_model->permission_category();
        $this->form_validation->set_rules('notification_eve_name', 'Notification Event Name', 'required');
		
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('admin/template/template',$data);	
        }else{
            $data = array( 
                  'event_name'     =>  $_POST['notification_eve_name'],
              ); 
            $perm_category = array('can_send', 'can_not_send');
            $roles  = $this->input->post('role');
           
            $event_id = $this->role_model->add_notification_event($data);     
                if(!empty($event_id)){
                    $per_cat_post = $this->input->post('per_cat');
                    foreach($roles as $role){
                        $role_data =array(
                            'role_id'  => $role,
                            'event_id' => $event_id
                        );
                       $this->role_model->insert_roles($role_data);
                    }
                    foreach ($per_cat_post as $per_cat_post_key => $per_cat_post_value) {
                            $insert_data = array();
                            $ar = array();
                        foreach ($perm_category as $per_key => $per_value) {
                            $chk_val = $this->input->post($per_value . "-perm_" . $per_cat_post_value);
                             if (isset($chk_val)) {
                                $insert_data[$per_value] = 1;
                            } else {
                                $ar[$per_value] = 0;
                            }
                        }
                        if (!empty($insert_data)) {  
                          $insert_data['perm_cat_id'] = $per_cat_post_value;
                          $insert_data['eve_id'] = $event_id;
                          $to_be_insert[] = array_merge($ar, $insert_data);
                        } 
                    }
                   
                     $this->role_model->getInsertBatchdata($to_be_insert);
                 
                   return  redirect('admin/admin/notification');
                }
            
        }
    }
    
     public function notification(){
        $data['main_content'] = 'admin/notification/notifications';
        $data['title'] = 'Notification';	
	$data['events'] = $this->role_model->get_events();
       
        $this->load->view('admin//template/template', $data);
     }
     
     public function sample_data(){
         
        $data['main_content'] = 'admin/sample_data/sample_data';
        $data['title'] = 'Sample Data';	
        
	$sample_data = $this->role_model->get_sample_data();
        $data['sample_data']               = $sample_data;
        $this->load->view('admin//template/template', $data);
     }
     
      public function sample_data1(){
         
        $data['main_content'] = 'admin/sample_data/sample_data';
        $data['title'] = 'Sample Data';	
        $sample_data = $this->role_model->get_sample_data1();
	
        $data['sample_data']               = $sample_data;
        $this->load->view('admin//template/template', $data);
     }
     
     public function event_preferences($id){
        $data['main_content'] = 'admin/notification/preferences';
        $data['title'] = 'Preferences';	
        
        //$data['preferences'] = $this->role_model->get_preferences($id);
	$role_permission = $this->role_model->get_role_permission($id);
        $data['role_permission'] = $role_permission;
        $this->load->view('admin//template/template', $data);
     }
}

?>