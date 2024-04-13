<!-- Bootstrap core JavaScript-->
<script src="<?php echo site_url(); ?>public/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo site_url(); ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo site_url(); ?>public/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo site_url(); ?>public/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo site_url(); ?>public/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo site_url(); ?>public/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo site_url(); ?>public/assets/js/demo/chart-pie-demo.js"></script>
    <script>
  // JavaScript for Filtering Table Rows
  $(document).ready(function(){
    $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("table tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>