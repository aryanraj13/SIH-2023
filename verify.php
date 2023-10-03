<?php

$conn = mysqli_connect("localhost", "root", "", "student_dropout");
$sid = $_POST["schoolId"];
$pw = $_POST["password"];
$sn = $_POST["schoolName"];
$sql = "SELECT pw from school where school_ID = '$sid';";
$result = mysqli_query($conn, $sql);
$data = array();
while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
foreach($data as $d) {
    if ($d['pw'] == $pw) {
        echo "Login succesful!!!";
        $_SESSION['sid'] = $sid;
        $_SESSION['sname'] = $sn;
        header("location: sd.html");
    } else {
        die("Login Unsuccesful!!!");
    }
}
echo json_encode($data);
?>