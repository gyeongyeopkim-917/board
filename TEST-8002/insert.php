<?php

// $mysqli = mysqli_connect("example.com", "user", "password", "database");
// $result = mysqli_query($mysqli, "SELECT 'Please do not use the deprecated mysql extension for new development. ' AS _msg FROM DUAL");
// $row = mysqli_fetch_assoc($result);
// echo $row['_msg'];
include "dbinfo.php";
$sql = "
    INSERT INTO board 
    (title, description, user, createdate, password,see)
    VALUES (
        '페이징칸늘리기',
        '페이징',
        '김경엽',
        NOW(),
        '123',
        0
        )";

        
        $result = mysqli_query($conn, $sql);
        if ($result === false) {
            echo mysqli_error($conn);
        }//쿼리 에러 검출문
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삽입 test</title>
</head>
<body>
    원하는값 강제 삽입 페이지
</body>
</html>