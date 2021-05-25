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

        <div align="center">
                <p>회원가입</p>
                <form method="post" action="join_process.php" onsubmit="return test();">
                        <p>이름: <input type="text" name="name" id="name"required="required"></p>
                        <p>ID: <input type="text" name="id"id="id"required="required"></p>
                        <p>PW: <input type="password" name="pw"id="pw"required="required"></p>
                        <p>PW_chk: <input type="password" name="pw2"id="pw2"required="required"></p>
                        <input type="submit"  value="회원가입 신청하기">
                </form>
        </div>
    <script type="text/javascript">
    //회원가입 유효성 검사 
function test() {
    
    var name = document.getElementById('name').value;
    var id = document.getElementById('id').value;
    var p1 = document.getElementById('pw').value;
    var p2 = document.getElementById('pw2').value;

    if( p1 != p2 ) {
    alert("비밀번호가 일치 하지 않습니다");
    return false;
    }else if(p1.length > 5){
        alert("비밀번호는 4자리 이하로 설정!");
        return false;
    }else if(name.length>10){
        alert("이름은 10자리 미만으로 설정!");
        return false;
    }else if(id.length>8){
        alert("아이디는 8자리 미만으로 설정!");
        return false;
    }else{
    alert("완벽합니다!");
    return true;
    }
}
</script>
</body>
</html>

