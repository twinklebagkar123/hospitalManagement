<?php
include('include/header_structured.php');
if (isset($_POST['submit'])) {
  $tcname = $_POST['tariff_cat_name'];


  $query = "INSERT INTO `tariff_category`( `tariff_cat_name`) VALUES ('$tcname')";
  $con->query($query);
  $stat = true;
  if ($stat) {
    echo "<script>alert('Successfully Added.');</script>";
  }
}

?>
<div class="wrap-content container" id="container">
  <!-- start: PAGE TITLE -->
  <div class="container-fluid container-fullw bg-white">
    <div class="row">
      <div class="col-sm-12">
          <h4 class="text-right">DATE : <?php echo date('Y-m-d')?></h4>
      </div>
    </div>
  </div>
</div>
</div>
<!-- start: FOOTER -->
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->

<!-- start: SETTINGS -->
<?php include('include/setting.php'); ?>

<!-- end: SETTINGS -->
</div>
<!-- start: MAIN JAVASCRIPTS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/modernizr/modernizr.js"></script>
<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script src="vendor/autosize/autosize.min.js"></script>
<script src="vendor/selectFx/classie.js"></script>
<script src="vendor/selectFx/selectFx.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="assets/js/main.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="assets/js/form-elements.js"></script>
<script>
  jQuery(document).ready(function() {
    Main.init();
    FormElements.init();
  });
</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>