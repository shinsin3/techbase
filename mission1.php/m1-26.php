<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-26</title>
</head>
<body>
    <?php
        $string = ("Hello World");
        $file_name = "m1-24.txt";
        $fp = fopen($file_name,"a");
        fwrite($fp,$string.PHP_EOL);
        fclose($fp);
        echo "書き込み成功！<br>";
        
        if(file_exists($file_name)){
            $lines = file($file_name,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                echo $line . "<br>";
                }
        }    
    ?>
</body>
</html>

