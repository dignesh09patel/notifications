<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Notification</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New Notification</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php if (!empty($error)) { ?>
                            <div class="alert alert-danger">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                        <br />
                        <?php echo form_open_multipart('admin/admin/add_notification','class="form-horizontal form-label-left"'); ?> 
                                
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Notification Event Name <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input class="form-control col-md-7 col-xs-12"  name="notification_eve_name"  value="<?php echo set_value('notification_eve_name', $this->input->post('notification_eve_name')); ?>"  type="text">
                                <div class="text-danger"><?php echo form_error('notification_name'); ?></div>
                            </div>
                        </div>    
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Event Roles
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <?php foreach($roles as $role){ ?>
                                    
                                     <input  name="role[]"  value="<?php echo $role['id']?>" type="checkbox"> <?php echo $role['name']?>

                                <?php } ?>
                            </div>
                        </div>  
                        
                         <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Event Permission
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <table class="table table-stripped">
                                   <thead>
                                       <tr>
                                            <th>Events</th>
                                           <th>Send</th>
                                           <th>Don't Send</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                        <?php foreach($permissions as $permission){ ?>
                                       <tr>
                                              <input type="hidden" name="per_cat[]" value="<?php echo $permission['id']; ?>" />
                                              <th><?php echo $permission['name']; ?></th>
                                              <td><input type="checkbox" name="<?php echo "can_send-perm_" . $permission['id']; ?>" class="checkbox" value="<?php echo $permission['id']; ?>"></td>
                                              <td><input type="checkbox" name="<?php echo "can_not_send-perm_" . $permission['id']; ?>"  class="checkbox" value="<?php echo $permission['id']; ?>"></td>
                                       </tr>
                                        <?php } ?>
                                   </tbody>
                                </table>
                            </div>    
                                
                         </div>     
                             
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo base_url()?>admin/admin/notification"> <button type="button" class="btn btn-primary">Cancel</button></a>
                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    