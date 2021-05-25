<?php
include "dbinfo.php";
?>
<!DOCTYPE>
 
<html>
<head>
        <meta charset='utf-8'>
</head>
 
<body>
<a href="index.php"><h1><strong >김경엽의 게시판 메인으로 가기</strong></h1></a>

        <div align='center'>
        <span>로그인</span>
 
        <form method='post' action='login_process.php'>
                <p>ID: <input name="id" type="text"></p>
                <p>PW: <input name="pw" type="password"></p>
                <input type="submit" value="로그인">
        </form>
        <br />
        <button id="join" onclick="location.href='join.php'">회원가입</button>
 
        </div>
 
 
</body>
 
</html>
