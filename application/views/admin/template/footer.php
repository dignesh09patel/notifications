    </div>
  <!-- /#wrapper -->
  <!-- Bootstrap core JavaScript -->

  <script src="<?php echo base_url()?>css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src = "<?php echo base_url('css/');?>jquery-1.10.2.js"></script>
  <script src = "<?php echo base_url('css/');?>jquery-ui.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
 <script>
         $(function() {
            $( "#sortable-4" ).sortable({
               placeholder: "highlight"
            });
         });
      </script>
</body>

</html>