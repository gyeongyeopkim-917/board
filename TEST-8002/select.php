<?php
// 연결 예시 php 공식페이지 참고
// $mysqli = mysqli_connect("example.com", "user", "password", "database");
// $result = mysqli_query($mysqli, "SELECT 'Please do not use the deprecated mysql extension for new development. ' AS _msg FROM DUAL");
// $row = mysqli_fetch_assoc($result);
// echo $row['_msg'];
include "dbinfo.php";

$sql = "select * from board";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
    echo $row['title'];
    echo $row['description'];
    echo $row['user'];
    echo $row['createdate'].'<br>';
    
}

//var_dump($result->num_rows);

?>
