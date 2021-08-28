<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m3-05</title>
</head>    
<body>
    
    
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $date = date("Y/m/d H:i:s");
        $hidden_number = $_POST["hidden_number"];
        $name = $_POST["name"];
        $str = $_POST["str"];
        $str_pass = $_POST["str_pass"];
        $delete_number = $_POST["number"];
        $delete_pass = $_POST["delete_pass"];
        $edit_number = $_POST["edit_number"];
        $edit_pass = $_POST["edit_pass"];
        $per_name = "";
        $per_str = "";
        $file_name = "m3-05.txt";
        
    /* 送信*/    
        if($_POST = "add"){
            if($name != "" && $str != "" && $hidden_number != "" && $str_pass != ""){
                $lines = file($file_name,FILE_IGNORE_NEW_LINES);
                $fp = fopen($file_name, 'w');
                foreach($lines as $line){
                    $line_explode = explode("<>",$line);
                        if($line_explode[0] != $hidden_number){
                            fwrite($fp,$line.PHP_EOL);
                        }else{
                            fwrite($fp,$hidden_number."<>".$name."<>".$str."<>".$date."<>".$str_pass."<>".PHP_EOL);
                        }
                }fclose($fp);  
            }elseif($name != "" && $str != "" && $str_pass != ""){
                $fp = fopen($file_name, 'r+');
                flock($fp, LOCK_EX);
                $count = 0;
                while (fgets($fp) !== false) {
                    $count++;
                }
                $next = $count + 1;
                fwrite($fp,$next."<>".$name."<>".$str."<>".$date."<>".$str_pass."<>".PHP_EOL);
                flock($fp, LOCK_UN);
                fclose($fp);
            }$hidden_number = "";
            
        }  
        
    /* 削除*/         
        if($_POST = "delete"){
            if($delete_number != "" && $delete_pass != ""){
                $lines = file($file_name,FILE_IGNORE_NEW_LINES);
                $fp = fopen($file_name, 'w');
                foreach($lines as $line){
                    $line_explode = explode("<>",$line);
                    if($line_explode[0] != $delete_number){
                        fwrite($fp,$line.PHP_EOL);
                    }else{
                        if($line_explode[4] != $delete_pass){
                            fwrite($fp,$line.PHP_EOL);
                            }                
                        }
                }fclose($fp); 
            }    
        }        
    
    /* 編集*/
        if($_POST = "edit"){
            if($edit_number != "" && $edit_pass != ""){
                $lines = file($file_name,FILE_IGNORE_NEW_LINES);
                $fp = fopen($file_name, 'r+');
                $max_line = "0";
                foreach($lines as $line){
                    $line_explode = explode("<>",$line);
                    if($line_explode[0] == $edit_number){
                        if($line_explode[4] == $edit_pass){
                        $hidden_number = $line_explode[0];
                        $per_name = $line_explode[1];
                        $per_str = $line_explode[2];
                        }else{
                        $hidden_number = "";
                        $per_name = "";
                        $per_str = "";
                        }
                    }
                }
            }
        }    

    ?>
    
    <form action = "" method = "post">
        新規投稿<input type = "hidden" name = "hidden_number" value = "<?php echo $hidden_number; ?>"/><br>
        名前&emsp;&emsp;&emsp;<input type = "text" name = "name" value = "<?php echo $per_name; ?>"/><br>
        コメント&emsp;<input type = "text" name = "str" value = "<?php echo $per_str; ?>"/><br>
        パスワード<input type = "text" name = "str_pass"><br>
        <input type = "submit" name = "add"><br><br>
        投稿削除<br>
        削除対象番号<input type = "text" name = "number"><br>
        パスワード&emsp;<input type = "text" name = "delete_pass"><br>
        <input type = "submit" name = "delete" value = "削除"><br><br>
        投稿編集<br>
        編集対象番号<input type = "text" name = "edit_number"><br>
        パスワード&emsp;<input type = "text" name = "edit_pass"><br>
        <input type = "submit" name = "edit" value = "編集"><br>
    </form>
    
    <?php
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


