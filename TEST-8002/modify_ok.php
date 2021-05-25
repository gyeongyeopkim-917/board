<?php
    include "dbinfo.php";

	$boardno = $_GET['id'];
    $user = $_POST['user'];
    // $password = $_POST['pw'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $file = $_POST['file'];
    $tmpfile =  $_FILES['file']['tmp_name'];
    $o_name = $_FILES['file']['name'];
    $filename = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
    $folder = "./upload/".$filename;
    move_uploaded_file($tmpfile,$folder);  

    $sql = "update board set user='".$user."', title='".$title."', description='".$description."',file='".$o_name."' where id = '".$boardno."'";
    $result = mysqli_query($conn, $sql);
?>


<script type="text/javascript">alert("수정되었습니다."); </script>
<meta http-equiv="refresh" content="0 url=/read.php?id=<?php echo $boardno; ?>">