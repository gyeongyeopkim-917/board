<?php

//값이 선언되지 않았다고 오류검출을 막아주는 코드 
error_reporting (E_ALL ^ E_NOTICE);
$conn = mysqli_connect("127.0.0.1:3306", "root", "619619qw", "test-8002");

?>
<?php
    session_start();
                if(isset($_SESSION['userid'])) {
                        echo $_SESSION['userid'];?>님 안녕하세요
                        <button onclick="location.href='logout.php'">로그아웃</button>
                        <br>
        <?php
                }
                else{
        ?>              <button onclick="location.href='/login.php'">로그인 / 회원가입</button>
                        <br>
        <?php }?>


