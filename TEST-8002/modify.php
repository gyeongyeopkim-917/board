<?php
    include "dbinfo.php";
	$boardno = $_GET['id'];
    $sql = "select * from board where id = '".$boardno."'";
    $result = mysqli_query($conn, $sql);
	
	$result = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정페이지</title>
</head>
<body>
        
    <div id="board_write">
            <h1><a href="/index.php">메인으로가기</a></h1>
            <h4>글을 수정합니다.</h4>
                <div>
                    <form action="modify_ok.php?id=<?php echo $boardno; ?>" method="POST" enctype="multipart/form-data">
                        <div>
                            <textarea name="title" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $result['title']; ?></textarea>
                        </div>
                       
                        <div>
                            <textarea name="user"  rows="1" cols="55" placeholder="글쓴이" maxlength="100" readonly><?php echo $result['user']; ?></textarea>
                        </div>
                        
                        <div>
                            <textarea name="description"  rows="30" cols="150"placeholder="내용"   required><?php echo $result['description']; ?></textarea>
                        </div>
                        
                        <p>파일업로드:<input type="file" name="file" id="file" value="">기존 파일: <?php echo $result['file']; ?></p>
                        <!-- <div>
                            <input type="password" name="pw"  placeholder="비밀번호"  required />  
                        </div> -->
                        <div>
                            <button type="submit">수정하기</button>
                        </div>
                    </form>
                </div>
    </div>

</body>
</html>