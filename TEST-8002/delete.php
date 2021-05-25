<?php
    include "dbinfo.php";
    

	$boardno = $_GET['id'];

    // if ($password == $result[password]) {
        $sql = "delete from board where id = '".$boardno."'";
        $result = mysqli_query($conn, $sql);
//     }else{
//         echo "<script> alert('비밀번호가 일치하지 않습니다..'); 
//         history.back();
//         </script>";
//     }
?>


<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0; url=/index.php" />
