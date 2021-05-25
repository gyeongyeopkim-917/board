
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

           
            <label>
            
            값:<input type="text" name="key_name" id="number" value=" " >
            </label>
            
            <br>
            <label>
               <input type="radio" name="key" value="tri1" onclick="" checked="checked">
                좌삼각형
            </label>
            <label>
                <input type="radio" name="key"  value="tri2" onclick="" >
                정삼각형
            </label>
            <label>
                <input type="radio" name="key" value="tri3" onclick="" >
                우삼각형
            </label>
            <br>
            <button onclick= "printStar();">별 그리기</button>
            
        
        <script>
            
            function printStar () {
                var tritest = document.getElementsByName('key');
                var tri; // 여기에 선택된 radio 버튼의 값이 담기게 된다.
                for(var i=0; i<tritest.length; i++) {
                    if(tritest[i].checked) {
                        tri = tritest[i].value;
                    }
                }
                const star = document.getElementById('number').value;

                switch (tri){

                case  "tri1":
                    var result="";
                    for (let i = 0; i < star; i++) {
                    for (let j = 0; j <= i; j++) {
                    document.write('*')
                    
                    }
                    document.write('<br>');
                    
                    }
                    
                    break;

                case "tri2" :
                    for(let i = 0; i < star; i++)  {
                    for(let j=star; j > i; j--)  {
                        // space
                        document.write('&nbsp');
                    }
                    for(let j=0; j <= i; j++)  {
                        document.write('*');
                    }
                    for(let j=1; j <= i; j++)  {
                        document.write('*');
                    }
                    document.write('<br>');
                    }
                    break;

                case "tri3" :
                    for(let i = 0; i < star; i++)  {
                    for(let j = star-1; j > i; j--)  {
                        document.write('&nbsp');
                    }
                    for(let j = 0; j <= i; j++) {
                        document.write('*');
                    }
                    document.write('<br>');
                    }
                break;
                }
                
            }

    
            
        </script>
        
    </body>
</html>