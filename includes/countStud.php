<?php
include_once '../connection/Config.php';



    /*$sql = "SELECT * FROM `tbl_student_school_details`WHERE stud_type = ?";
    $mysqliStatus = $con->query($sql);
    $rows_count_value = mysqli_num_rows($mysqliStatus);
    echo $rows_count_value;*/


    $sql = "SELECT * FROM tbl_student_info";
    $mysqliStatus = $con->query($sql);
    $rows_count_value = mysqli_num_rows($mysqliStatus);
    echo $rows_count_value;

$con->close();
?>