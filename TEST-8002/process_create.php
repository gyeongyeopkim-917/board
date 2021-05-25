<?php
// var_dump($_POST);
include "dbinfo.php";

    $sql2="alter table board auto_increment =1";
    mysqli_query($conn,$sql2);

    $tmpfile =  $_FILES['file']['tmp_name'];
    $o_name = $_FILES['file']['name'];
    $filename = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
    $folder = "./upload/".$filename;
    move_uploaded_file($tmpfile,$folder);   

    $sql ="
        INSERT INTO board
            (title, description, user, createdate, password,see,file)
            VALUES(
                '{$_POST['title']}',
                '{$_POST['description']}',
                '{$_POST['user']}',
                NOW(),
                '{$_POST['password']}',
                0,
                '{$o_name}'
            )
            ";
            //echo $sql;
    $result = mysqli_query($conn,$sql);
    // var_dump($result);

    
    if($result === false){
        echo '실패';
        return;
    } else {
        echo "<script> alert('글작성이 완료 되었습니다. 게시판으로 이동합니다.'); 
        location.href='/index.php';
        </script>";
        return;
    }
    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <hr>
            <h2>지금시간</h2>
            <?php
                echo date("Y-m-d H:i:s");  
            ?>
</body>
</html>
