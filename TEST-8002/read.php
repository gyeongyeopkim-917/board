<?php
   include "dbinfo.php";
	$boardno = $_GET['id'];
	
	$sql = "update board set see = see +1 where id = '".$boardno."'";// 조회수 올리기
	$result = mysqli_query($conn, $sql);

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
    <title>게시판 글 상세 읽기</title>
</head>
<body>
    
<div>
	<h2>제목: <?php echo $result['title']; ?></h2>
	<hr>
		<div id="info">
		작성자:	<?php echo $result['user']; ?> <hr> 작성일: <?php echo $result['createdate']; ?>
		<hr> 조회수: <?php echo $result['see']; ?>
		</div>
		<hr>
		<div id="board_content">
				<h3>본문:</h3>
				 <?php echo  nl2br("$result[description]"); ?> 
				<hr>
		</div>
		<div>
			파일 : <a href="./upload/<?php echo $result['file'];?>" download><?php echo $result['file']; ?></a>
		</div>
	<div>
		
		비밀번호 : <input type="password" name="password" id="pw" value="">
		
		<input type="button"  onclick="modify_ck();" value="">수정
		
		<input type="button"  onclick="delete_ck();" value="">삭제
		
	</div>
	<a href="/index.php">(목록으로 가기)</a>
</div>

<script type="text/javascript ">

	const pass = '<?php echo $result['password'];?>';
	function modify_ck(){
		if(document.querySelector("#pw").value == pass){
        	location.href='modify.php?id=<?php echo $result['id'];?>';
		} else{
			alert('비밀번호 불일치.');
			location.reload();
		}
	}

    function delete_ck(){
		if(document.querySelector("#pw").value == pass){
        if (confirm("정말 삭제 하시겠습니까?? ") == true) {
            location.href = "delete.php?id=<?php echo $result['id']; ?>"
        } else {
            return;
		}}else{
			alert('비밀번호 불일치.');
			location.reload();
		}

    }
</script>
</body>
</html>

