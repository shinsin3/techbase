<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m3-03</title>
</head>    
<body>
    <form action = "" method = "post">
        <input type = "text" name = "name" placeholder = "名前"><br>
        <input type = "text" name = "str" placeholder = "コメント"><br>
        <input type = "submit" name = "add"><br>
        <input type = "text" name = "number" placeholder = "削除対象番号"><br>
        <input type = "submit" name = "delete" value = "削除"><br>
    </form>
    
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $date = date("Y/m/d H:i:s");
        $name = $_POST["name"];
        $str = $_POST["str"];
        $delete_number = $_POST["number"];
        $file_name = "m3-03.txt";
        
        
    /* 送信*/    
        if($_POST = "add"){
            if($name != "" && $str != ""){
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
        }  
        
        
        
    /* 削除*/         
        if($_POST = "delete"){
            if($delete_number != ""){
                $lines = file($file_name,FILE_IGNORE_NEW_LINES);
                $fp = fopen($file_name, 'w');
                foreach($lines as $line){
                    $line_explode = explode("<>",$line);
                        if($line_explode[0] != $delete_number){
                            fwrite($fp,$line.PHP_EOL);
                        }
                     
                }fclose($fp); 
            }    
        }    
        
                
        
    /* ブラウザ反映*/     
        if(file_exists($file_name)){
            $lines = file($file_name,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                $lines_explode = explode("<>",$line);
                foreach($lines_explode as $line_explode){
                echo " " .$line_explode;
                }echo '<br>';
            }
        }       

    ?>
</body>    
</html>






