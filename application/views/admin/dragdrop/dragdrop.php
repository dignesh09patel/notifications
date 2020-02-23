  
 
        <style>
         #sortable { list-style-type: none; margin: 0; 
            padding: 0; width: 25%; }

         .highlight {
            border: 1px solid red;
            font-weight: bold;
            font-size: 45px;
            background-color: #333333;
         }
         .default {
            background: #cedc98;
            border: 1px solid #DDDDDD;
            color: #333333;
         }
      </style>
      


<!-- page content -->
<div class="right_col" role="main"> 
    <div>
       <ul id = "sortable">
          <?php foreach($product as $pro){ ?>
            <li class = "default" id="prodcut_<?php echo $pro['id'] ?>"><?php echo $pro['name'] ?></li>
          <?php } ?>
       
      </ul>
    </div>
    <div style="clear: both; margin-top: 20px;">
      <input type='button' value='Submit' id='submit'>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

  // Initialize sortable
  $( "#sortable" ).sortable();

  // Save order
  $('#submit').click(function(){
    var product_arr = [];
    // get image ids order
    $('#sortable li').each(function(){
       var id = $(this).attr('id');
       var split_id = id.split("_");
       product_arr.push(split_id[1]);
    });

    // AJAX request
    $.ajax({
      url: '<?php echo base_url('admin/admin/save_product'); ?>',
      type: 'post',
      data: {productids: product_arr},
      success: function(response){
        alert('Save successfully.');
      }
    });
  });
});
</script>

     






