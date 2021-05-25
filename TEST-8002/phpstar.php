<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
<!-- 포스트로 받아온 값이 선언되지 않았다고 오류검출을 막아주는 코드 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php 별그리기</title>
</head>

<body>

<h1>데이터 입력받아 화면에 별 그리기</h1>
    <form method="POST" action="phpstar.php">
        값: <input type="text" name="gab"/><br/>
        정삼각형: <input type="radio" name="tri" value = "정삼각형"/><br/>
        좌삼각형: <input type="radio" name="tri" value = "좌삼각형"/><br/>
        우삼각형: <input type="radio" name="tri" value = "우삼각형"/><br/>
        <input type="submit" name="submit"/>
    </form>
    <h4>입력된 값은?</h4>
    <?php 
        echo "값: ".$_POST['gab']."<br/>";
        echo "삼각형 모양: ".$_POST['tri']."<br/>";
        $gab = $_POST['gab'];
        $tri = $_POST['tri'];
        $num = $gab;
        switch ( $tri ) {
            case "정삼각형":
                
                for($i = 0; $i<$num; $i++)
                {
                 for($J = $num - $i; $J > 0; $J--)
                 {
                   echo "&nbsp";
                 }
                 for($q = 0; $q < 2*$i-1; $q++)
                 {
                   echo "*";
                 }
                 echo "<br />\n";
                }
              break;
            case "좌삼각형":
                
                for ($i = 0; $i < $num/2; $i++) {
                for ($j = 0; $j <= $i*2; $j++) {
                    echo "*";
                
                }
                echo "<br />\n";
                
                }
              break;
            default:
            for($i = 0; $i < $num; $i++)  {
                for($j = $num-1; $j > $i; $j--)  {
                    echo "&nbsp";
                }
                for($j = 0; $j <= $i; $j++) {
                    echo "*";
                }
                echo "<br />\n";
                }
          }

    ?>


</body>

</html>
