<?php
include "../include/config.php";
$package_category = $_POST['package_category'];
$package_class = $_POST['package_class'];
$sql = "SELECT `tariff_room_name`,`tariff_room_fee`,`tariff_room_id` FROM `tariff_room_info` WHERE `tariff_cat_id` = '$package_category' AND `tariff_class_type_id` = '$package_class';";
$mysqlResult = mysqli_query($con,$sql);
$num=mysqli_num_rows($mysqlResult);
    $allResults = [];
    while($row=mysqli_fetch_array($mysqlResult)){
        $output = array('tariff_room_name' => $row['tariff_room_name'],'tariff_room_fee'=> $row['tariff_room_fee'],'tariff_room_id' => $row['tariff_room_id']);
        array_push($allResults,$output);
    }
    return json_encode($allResults);
?>