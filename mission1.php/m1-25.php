<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-25</title>
</head>
<body>
    <?php
        $string = "Hello World";
        $file_name = "m1-25.txt";
        $fp = fopen($file_name,"w");
        fwrite($fp,$string.PHP_EOL);
        fclose($fp);
        echo "書き込み成功!";
    ?>    
    
    
</body>
</html>




