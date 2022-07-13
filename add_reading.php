
<?php
$servername ="localhost:3308";
$username ="root";
$password ="";
$dbname ="firesystem";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){ 
    die("Could not connect to db".msql_error());
}

  $input=file_get_contents("https://api.thingspeak.com/channels/1695855/feeds.json?api_key=Y8NNKTUD4SOH5C4C&results=20");

$data=json_decode($input, JSON_OBJECT_AS_ARRAY);

$Temperature=$data["feeds"][1]["field1"];
$Noticifications=$data["feeds"][1]["field4"];
$Flame=$data["feeds"][1]["field4"];
$Time=$data["feeds"][1]["created_at"];

$sql = "INSERT INTO reading (Temperature,Noticifications,Flame,Time)
VALUES ('$Temperature','$Noticifications','$Flame','$Time')";
$query=mysqli_query($conn,$sql);
// Header("Refresh:1");     
?>


<?php include_once('layouts/footer.php'); ?>

