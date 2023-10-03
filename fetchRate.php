<?php

$conn = mysqli_connect("localhost", "root", "", "student_dropout");
$sql = "SELECT 100*SUM(DS)/SUM(TS) AS Rate FROM school GROUP BY State;";
$result = mysqli_query($conn, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);

?>