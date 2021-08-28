<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-17</title>
</head>
<body>
    <?php
        
        $num = 2;
        echo"(numが".$num."の時)<br>";
        if($num % 3 == 0 && $num % 5 == 0){
            echo "Fizz<br>";
        }elseif($num % 5 == 0){
            echo "Buzz<br>";
        }elseif($num % 3 == 0){
            echo "FizzBuzz";
        }else{
            echo $num . "<br>";
        }
        
        $num = 225;
        echo"(numが".$num."の時)<br>";
        if($num % 3 == 0 && $num % 5 == 0){
            echo "Fizz<br>";
        }elseif($num % 5 == 0){
            echo "Buzz<br>";
        }elseif($num % 3 == 0){
            echo "FizzBuzz";
        }else{
            echo $num . "<br>";
        }
        
    
    ?>    
</body>
</html>

<!--条件に当てはまるものが複数ある時一番最初に一致した分岐での出力しかされない-->