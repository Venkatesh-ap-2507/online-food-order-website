<?php


require('C:\xampp\htdocs\food-order\config\constants.php');


extract($_POST);


$sql = "INSERT into tbl_contact (name,email,mobile,message,created_date) VALUES('" . $name . "','" . $email . "','" . $mobile . "','" . $message . "','" . date('Y-m-d') . "')";


$success = $conn->query($sql);


if (!$success) {
    die("Couldn't enter data: ".$mysqli->error);
}


echo "Thank You For Contacting Us ";


$conn->close();


?>