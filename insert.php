<?php
$conn = mysqli_connect("localhost", "root", "", "student_dropout");
$name = $_POST["name"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$income = $_POST["income"];
$city = $_POST["city"];
$dist = $_POST["district"];
$state = $_POST["state"];
$aadhar = $_POST["aadhaar"];
$sid = $_POST["school"];
$caste = $_POST["caste"];
$class = $_POST["standard"];
$sql = "INSERT INTO `student` VALUES ('$aadhar', '$name', '$age', '$class', '$gender', '$income', '$sid', '$city', '$dist', '$state', '$caste')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Succesfull";
} else {
    echo mysqli_error($conn);
}
mysqli_close($conn);
?>