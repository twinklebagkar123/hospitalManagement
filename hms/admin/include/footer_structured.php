</div>
</div>
<?php include('include/footer.php'); ?>
<!-- end: FOOTER -->

<!-- start: SETTINGS -->
<?php include('include/setting.php'); ?>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/modernizr/modernizr.js"></script>
<script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../vendor/switchery/switchery.min.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="../vendor/maskedinput/jquery.maskedinput.min.js"></script>
<script src="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="../vendor/autosize/autosize.min.js"></script>
<script src="../vendor/selectFx/classie.js"></script>
<script src="../vendor/selectFx/selectFx.js"></script>
<script src="../vendor/select2/select2.min.js"></script>
<script src="../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- start: CLIP-TWO JAVASCRIPTS -->
<script src="../assets/js/main.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- start: JavaScript Event Handlers for this page -->
<script src="../assets/js/form-elements.js"></script>
<script>
    jQuery(document).ready(function() {
        Main.init();
        FormElements.init();
			$('#myTable').DataTable();
        
    });
    
</script>
</body>

</html>