<?php
include "dbinfo.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>글생성 페이지</title>
</head>
<body>
<a href="index.php"><h1><strong >김경엽의 게시판 메인으로 가기</strong></h1></a>

<h2>글을 게시해주세요!</h2>

<form action="process_create.php" method="POST" enctype="multipart/form-data">
<p>제목:<input type="text" name="title" placeholder="제목을 적어주세요" required></p>

<p>내용:<textarea name="description" rows="10" cols="100"placeholder="본문을 적어주세요" required></textarea></p>

<p>작성자:<input type="text" name="user" placeholder="작성자 이름을 적어주세요" required></p>

<p>파일업로드:<input type="file" name="file" id="file"></p>

<p>비밀번호:<input type="password" id="password1" name="password" value="" class="pw" placeholder="비밀번호 입력" required></p>


<p><input type ="submit"></p>

</form>



<hr>
<h2>작성시간</h2>
<?php
    echo date("Y-m-d H:i:s");  
?>



</body>
</html>
