<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "student_dropout";
$conn = mysqli_connect($host, $username, $password, $database);

$sql = "CREATE TABLE `school` (`school_ID` INT NOT NULL , `pw` VARCHAR(15) NOT NULL , `Sc_name` VARCHAR(60) NOT NULL , `City` VARCHAR(30) NULL DEFAULT NULL , `District` VARCHAR(20) NULL DEFAULT NULL , `State` VARCHAR(20) NULL DEFAULT NULL , `TS` INT NOT NULL , `DS` INT NOT NULL, PRIMARY KEY (`school_ID`)) ENGINE = InnoDB;";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Table 1made succesfully";
} else {
    echo "table 1 not created!";
}
$sql = "CREATE TABLE `student` (`aadhar` BIGINT(12) NOT NULL , `name` INT NOT NULL , `class` INT NOT NULL , `gender` INT NOT NULL , `f_income` INT NOT NULL , `School_ID` INT NOT NULL , `city` VARCHAR(20) NOT NULL , `district` VARCHAR(20) NOT NULL , `state` VARCHAR(20) NOT NULL , `caste` VARCHAR(10) NOT NULL , PRIMARY KEY (`aadhar`)) ENGINE = InnoDB;";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "table 2 created";
} else {
    echo "Table 2 could not be created";
}
$sql = "INSERT INTO `school` (`School_ID`, `pw`, `Sc_name`, `City`, `District`, `State`, `TS`, `DS`) VALUES ('111', '111111', 'Mohan Chandel Vidhyalaya', 'Jabalpur', 'Jabalpur', 'Madhya Pradesh', '100', '5');";
$result = mysqli_query($conn, $sql);

$sql = "SELECT * FROM school";
$result = mysqli_query($conn, "SELECT * FROM school");
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row; 
}
echo json_encode($data);
?>