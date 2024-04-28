<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "blood";

$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("connection to database failed due to: " . mysqli_connect_error());
}
echo ("connection succ");
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$blood = $_POST['group'];
$district = $_POST['district'];
$state = $_POST['state'];
$nation = $_POST['nation'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$gender = $_POST['gender'];
// if ($_REQUEST['btn'] == "insert") {
$sql = "INSERT INTO blood (FULL_NAME, DOB, BLOODGROUP, DISTRICT, STATE, NATION, HEIGHT, WEIGHT, GENDER) VALUES ('$fullname', '$dob', '$blood', '$district', '$state', '$nation', '$height', '$weight', '$gender');";
if (mysqli_query($conn, "$sql")) {
    header("Location: http://localhost/Kshat_Suraksha/");
    exit;
} else {
    echo ("ERROR: $sql <br> $conn->error");
}
// } 
// else {
//     echo ("ERROR: $sql <br> $conn->error");
// }
$conn->close();

?>