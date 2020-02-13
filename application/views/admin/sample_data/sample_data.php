<!-- page content -->
<div class="right_col" role="main">
        <div class="page-title">
            <div class="title_left">
                <h3>Sample Data</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        
       <?php
      
       echo json_encode($sample_data,JSON_PRETTY_PRINT); 

       ?>
  <div class="tab-content">
    <div id="collection_category" class="tab-pane  in active">
             <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Is Active</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                               	
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>  
