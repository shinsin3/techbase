<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-24</title>
</head>
<body>
    <?php
        $string = "Hello World";
        $file_name = "m1-24.txt";
        $fp = fopen($file_name,"a");
        fwrite($fp,$string.PHP_EOL);
        fclose($fp);
        echo "書き込み完了";
    ?>
    
</body>
</html>

