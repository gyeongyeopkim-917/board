<?php
include "dbinfo.php";


    $id=$_POST['id'];
    $pw=$_POST['pw'];
    $name=$_POST['name'];

    $date = date('Y-m-d H:i:s');
    
    //입력받은 데이터를 DB에 저장
    $sql = "insert into member (id, pw, name) values ('$id', '$pw', '$name')";
     echo $sql;
    $result = mysqli_query($conn, $sql);

    //저장이 됬다면 (result = true) 가입 완료
    if($result === true) {
    ?>      <script>
            alert('가입 되었습니다.');
            location.replace("login.php");
            </script>

<?php   }
    else{
?>              <script>
                    
                    alert("fail");
            </script>
<?php   }
    mysqli_close($conn);
?>
