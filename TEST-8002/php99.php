<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>구구단 출력하기</h1>
    <form method="POST" action="php99.php">
        <li>숫자 입력하기</li>
        <input type="text" name="input"/><br/>
        <input type="submit">
    </form>
<?php
if (isset($_POST['input'])){
    $num = (int)($_POST['input']);
    echo $num."단 입니다.<br/>";
    for($j=1;$j<=9;$j++){
        echo $num." X ".$j." = ".($num*$j)."<br/>";
    }
    echo "<br/>";
}
 
?>

</body>
</html>