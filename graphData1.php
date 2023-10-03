<?php

$conn = mysqli_connect("localhost", "root", "", "student_dropout");
$sql = "SELECT count(*) AS rate FROM student GROUP BY gender;";
$result = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);

?>