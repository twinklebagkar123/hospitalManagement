<?php
session_start();
include('include/config.php');
$_SESSION['dlogin']=="";
$login_log_id = $_SESSION['doctor_log_id'];
$date = date("Y-m-d H:i:s");
mysqli_query($con,"UPDATE application_logs  SET logout = '$date' WHERE id = '".$login_log_id."'");
session_unset();
//session_destroy();
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="../../index.html";
</script>
