<?php
session_start();
include("include/config.php");
$_SESSION['login']=="";
$login_log_id = $_SESSION['admin_log_id'];
$date = date("Y-m-d H:i:s");
$con = mysqli_query($con, "update application_logs set logout='" . $date . "' where id='" . $login_log_id . "'");
session_unset();
session_destroy();
?>
<script language="javascript">
document.location="../../index.html";
</script>
