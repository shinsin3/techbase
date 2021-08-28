<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-13</title>
</head>
<body>
    <?php
        $names = [
            0=>'山田',
            1=>'青木',
            2=>'佐藤',
            3=>'馬場',
            4=>'真壁',
            5=>'北口'
        ];
        foreach($names as $name){
            echo $name."さん　こんにちは";
            echo "<br>";
        }    
        
    ?>    
</body>
</html>

