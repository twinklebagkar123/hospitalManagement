</div>
           
        </div>
        <!-- start: FOOTER -->
        <!-- end: FOOTER -->

        <!-- start: SETTINGS -->
        <?php include('setting.php'); ?>

        <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
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
    <script src="../vendor/autosize/autosize.min.js"></script>
    <script src="../vendor/selectFx/classie.js"></script>
    <script src="../vendor/selectFx/selectFx.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <?php if(basename($_SERVER['PHP_SELF']) == "laboratory.php") {?>
    <script src="../assets/ckeditor/ckeditor.js"></script>
<?php } ?>
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
            $(document).ready(function() {
			$('#myTable').DataTable();
		});
        });
    </script>
    
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
    
</body>

</html>