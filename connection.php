<?php 
$con = mysqli_connect("localhost", "rama", "1277", "register_login");

//cek connection

if (mysqli_connect_errno()) {
    echo "gagal terhubung ke mysql" . mysqli_connect_error();
    exit();
}
?>