<?php
include('DbConnect.php');

$username = $_POST['username'];
$password = $_POST['password']; //password is hashed

$SQL = "SELECT * FROM users WHERE username = '$username'";
$exeSQL = mysqli_query($conn, $SQL);
$checkUsername =  mysqli_num_rows($exeSQL);

if ($checkUsername != 0) {
    $arrayu = mysqli_fetch_array($exeSQL);
    if ($arrayu['password'] != $password) {
        $Message = "pw WRONG";
    } else {
        $Message = "Success";
    }
} else {
    $Message = "No account yet";
}

$responseData[] = array("Message" => $Message);
echo json_encode($responseData);
// Header("Refresh:1");