<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m2-04</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "str">
        <input type = "submit" name = "submit">
    </form>
    
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $file_name = "m2-04.txt";
        $str = $_POST["str"];
        if($str != ""){
            if($str == "完成！"){
                echo "おめでとう！<br>";
            }else{    
                echo $str . "を受け付けました<br>";
            }
        $fp = fopen($file_name,"a");
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
        echo "書き込み成功！<br>";
        }    
        
    if(file_exists($file_name)){
            $lines = file($file_name,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                echo $line ."<br>";
            }
            
    }    
        
    ?>    
</body>
</html>

 
    
    
    