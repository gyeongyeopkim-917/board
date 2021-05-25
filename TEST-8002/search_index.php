
<!DOCTYPE html>
<?php
    include "dbinfo.php";

     //페이징 마다 페이지 구현 
     if (isset($_GET["page"]))
     $page = $_GET["page"];
    else    
     $page = 1;
     //index에서 값받아 오기 검색구현
     $category=$_GET['category'];
     $searchform=$_GET['searchform'];

     $sql = "SELECT * FROM board WHERE $category like '%{$searchform}%' ORDER BY id";
     $result = mysqli_query($conn, $sql);

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
    <a href="/index.php" style="float:left;">검색 초기화</a><br>
    <a href="create.php" style="float:left;">글쓰기</a>
    <select name="category">
        <option value="title">제목</option>
        <option value="description">내용</option>
    </select>
    <input type="text" name="searchform" size="40" required="required">
    <input type="submit" value="검색">
    </form>

</div>

    <?php
    
        if($category == 'title'){
            $keyword ='제목';
        }else {
            $keyword = '내용';
        }

    ?>
    <h2><?=$keyword?>에서 '<?=$searchform?>'검색결과 입니다.</h2>
    
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
         //페이징 구현 하기
        $total_record = mysqli_num_rows($result);
        $list = 10;
            $block_count = 10;
            $block_num =ceil($page/$block_count);
            $block_start = (($block_num -1) * $block_count) +1; //블록 시작
        $block_end = $block_start + $block_count -1; // 블록끝 마지막 번호 

        $total_page = ceil($total_record/$list);
        if($block_end > $total_page){
            $block_end = $total_page;
        }
        $total_block = ceil($total_page /$block_count);

        $page_start = ($page -1)*$list;
             
    $sql2 = "SELECT * FROM board WHERE $category like '%{$searchform}%' ORDER BY id DESC LIMIT $page_start,$list";
    $result2 = mysqli_query($conn, $sql2);

        
        $no = mysqli_num_rows($result2)+1; // 쿼리문 row값 구하는 함수 써서 no에 row길이숫자값 저장 -게시물 빵구없이 만들기 위해서
        
    while ($row = mysqli_fetch_array($result2)) {

        $article['id']=$row['id'];
        $article['title']=$row['title'];
        
        $article['description']=$row['description'];
        $article['user']=$row['user'];
        $article['createdate']=$row['createdate'];
        $article['see']=$row['see'];
        $no--;

        
?>
    <tbody>
        <tr>
            <td width="60" style="text-align:center; "><?php echo $no?></td>
            <td width="400" style="text-align:center;"><?php echo "<a href=\"read.php?id={$article['id']}\">{$article['title']}</a>"?></td>
            <td width="120" style="text-align:center;"><?php echo $article['user']?></td>
            <td width="200" style="text-align:center;"><?php echo $article['createdate']?></td>
            <td width="100" style="text-align:center;"><?php echo $article['see']?></td>
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
            echo "<a href='search_index.php?category=$category&searchform=$searchform&page=1'>처음</a>";
        }

        for($i = $block_start; $i <= $block_end; $i++){
            if($page == $i){
                echo "<b> $i </b>";
            } else{
                echo "<a href='search_index.php?category=$category&searchform=$searchform&page=$i'> [$i] </a>";
            }
        }

        if($page >= $total_page){

        }else{
            echo "<a href='search_index.php?category=$category&searchform=$searchform&page=$total_page'> 마지막 </a>";
        }
   
    ?>
</div>

</body>
</html>