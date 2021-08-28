<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m3-01</title>
</head>    
<body>
    <form action = "" method = "post">
        <input type = "text" name = "name" placeholder = "名前"><br>
        <input type = "text" name = "str" placeholder = "コメント"><br>
        <input type = "submit" name = submit><br>
    </form>
    
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $date = date("Y/m/d H:i:s");
        $name = $_POST["name"];
        $str = $_POST["str"];
        $file_name = "m3-01.txt";
        if ($name != "" && $str != ""){
            $fp = fopen($file_name, 'r+');
            flock($fp, LOCK_EX);
            $count = 0;
            while (fgets($fp) !== false) {
                $count++;
            }
            $next = $count + 1;
            fwrite($fp,$next."<>".$name."<>".$str."<>".$date.PHP_EOL);
            flock($fp, LOCK_UN);
            fclose($fp);
        }
        

    ?>
</body>    
</html>

