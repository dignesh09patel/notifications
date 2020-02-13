<!-- page content -->
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Presferences</h3>
            </div>
        </div>
        <div class="clearfix"></div>

   <div class="tab-content">
        <div id="collection_category" class="tab-pane  in active">
            <div class="row">
          
                
                  <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Roles</th>
                                        <th>Permission</th>
                                        <th>Can send</th>
                                        <th>Can Not send</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($role_permission as $key => $value) { ?>
                                        <tr>
                                            <th><?php echo $value->role_name; ?></th>
                                            <?php
                                            if (!empty($value->permission_category)) { ?>
                                            <td>
                                            <?php echo $value->permission_category[0]->per_name ?></td>
                                              <td>
                                                    <?php
                                                    if ($value->permission_category[0]->can_send == 1) {
                                                        ?>
                                                        <label class="">
                                                            <input type="checkbox" <?php echo set_checkbox("can_send-perm_" . $value->permission_category[0]->id, $value->permission_category[0]->id, ($value->permission_category[0]->can_send == 1) ? TRUE : FALSE); ?>> 
                                                        </label> 

                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                 <td>
                                                    <?php
                                                    if ($value->permission_category[0]->can_not_send == 1) {
                                                        ?>
                                                        <label class="">
                                                            <input type="checkbox" <?php echo set_checkbox("can_not_send-perm_" . $value->permission_category[0]->id, $value->permission_category[0]->id, ($value->permission_category[0]->can_not_send == 1) ? TRUE : FALSE); ?>> 
                                                        </label> 

                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                
                                        <?php    }
                                                ?>
                                        </tr>   
                                        <?php
                                        if (!empty($value->permission_category) && count($value->permission_category) > 1) {
                                            unset($value->permission_category[0]);
                                            foreach ($value->permission_category as $new_feature_key => $new_feature_value) {
                                                ?>
                                                  <tr>
                                                    <td></td>
                                                    <td>
                                                         <?php echo $new_feature_value->per_name ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($new_feature_value->can_send == 1) {
                                                            ?>
                                                            <label class="">
                                                                <input type="checkbox" <?php echo set_checkbox("can_view-perm_" . $new_feature_value->id, $new_feature_value->id, ( $new_feature_value->can_send == 1) ? TRUE : FALSE); ?>> 
                                                            </label> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($new_feature_value->can_not_send == 1) {
                                                            ?>
                                                            <label class="">
                                                                <input type="checkbox" <?php echo set_checkbox("can_not_send-perm_" . $new_feature_value->id, $new_feature_value->id, ( $new_feature_value->can_not_send == 1) ? TRUE : FALSE); ?>> 
                                                            </label> 
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                  </tr> 
                                            <?php } 
                                        } ?>    
                                    <?php  }
                                   ?>
                                </tbody>
                  </table>            

            </div>   
        </div> 
   </div>  
</div>        
      