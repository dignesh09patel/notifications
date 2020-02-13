<!-- page content -->
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Notification</h3>
            </div>
        </div>
        <div class="clearfix"></div>

  <div class="tab-content">
    <div id="collection_category" class="tab-pane  in active">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>All Notifiction</h2>     
						
                        <div style="float:right">
						
                            <a href="<?php echo base_url()?>admin/admin/add_notification"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Notification</button></a>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Events</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i=0;
                                foreach($events as $event){ 
                                    ++$i;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><a href="event_preferences/<?php echo $event['id']; ?>"> <?php echo $event['event_name']; ?></a></td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>  
