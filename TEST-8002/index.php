
<!DOCTYPE html>
<?php
    include "dbinfo.php";

    $sql = "SELECT * FROM board ORDER BY id DESC;";
    $result = mysqli_query($conn, $sql);

     //페이징 마다 페이지 구현 
     if (isset($_GET["page"]))
     $page = $_GET["page"];
    else    
     $page = 1;

        $total_record = mysqli_num_rows($result);
        $list = 10;
            $block_count = $total_record;
            $block_num =ceil($page/$block_count);
            $block_start = (($block_num -1) * $block_count) +1; //블록 시작
        $block_end = $block_start + $block_count -1; // 블록끝 마지막 번호 

        $total_page = ceil($total_record/$list);
        if($block_end > $total_page){
            $block_end = $total_page;
        }
        $total_block = ceil($total_page /$block_count);
        
        $page_start = ($page -1)*$list;


    //페이징 구현 하기
    $sql2 = "SELECT * FROM board ORDER BY id DESC LIMIT $page_start,$list";
    $result2 = mysqli_query($conn, $sql2);
    
   

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 메인 페이지</title>
    <style>
    table, th,td {
      border:1px solid #ccc;
      border-left :none;
        border-right:none;
      border-collapse: collapse;
    }
    td {
        border-left :none;
        border-right:none;
    }
    th, td { padding:10px 20px; }
  </style>
</head>
<body>

<h1>김경엽 게시판</h1>
<hr> 
<!-- 검색기능구현 -->
<div id="search" style="text-align:right;">
    
    <form action="search_index.php" method="get">

    <a href="create.php" style="float:left;">글쓰기</a>

    <select name="category">
        <option value="title">제목</option>
        <option value="description">내용</option>
    </select>
    <input type="text" name="searchform" size="40" required="required">
    <input type="submit" value="검색">
    </form>

</div>
<div>
<table>
    <thead>
        <tr>
            <th width="60">번호</th>
            <th width="400">제목</th>
            <th width="120">작성자</th>
            <th width="200">작성일시</th>
            <th width="100">조회수</th>
            <th width="50">파일</th>
        </tr>
    </thead>
<?php
        $no = mysqli_num_rows($result2)+1; // 쿼리문 row값 구하는 함수 써서 no에 row길이숫자값 저장 -게시물 빵구없이 만들기 위해서

    while ($row = mysqli_fetch_array($result2)) {
       
        $article['id']=$row['id'];
        $article['title']=$row['title'];
        
        $article['description']=$row['description'];
        $article['user']=$row['user'];
        $article['createdate']=$row['createdate'];
        $article['see']=$row['see'];
        $article['file']=$row['file'];
        $no--;

        
?>
    <tbody>
        <tr>
            <td width="60" style="text-align:center; "><?php echo $article['id']?></td>
            <td width="400" style="text-align:center;"><?php echo "<a href=\"read.php?id={$article['id']}\">{$article['title']}</a>"?></td>
            <td width="120" style="text-align:center;"><?php echo $article['user']?></td>
            <td width="200" style="text-align:center;"><?php echo $article['createdate']?></td>
            <td width="100" style="text-align:center;"><?php echo $article['see']?></td>
            <td width="50" style="text-align:center;"><a href="./upload/<?php echo $article['file'];?>" download><?php echo $article['file']?></a></td>
        </tr>
    </tbody>
   <?php
    }
    ?>

</table>
</div>
<div id="page_num" style="text-align:center;">
    <?php
        if ($page <=1){

        }else{
            echo "<a href='index.php?page=1'>처음</a>";
        }

        for($i = $block_start; $i <= $block_end; $i++){
            if($page == $i){
                echo "<b> $i </b>";
            } else{
                echo "<a href='index.php?page=$i'> [$i] </a>";
            }
        }

        if($page >= $total_page){

        }else{
            echo "<a href='index.php?page=$total_page'> 마지막 </a>";
        }
    ?>
</div>


</body>
</html>