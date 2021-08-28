<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m3-04</title>
</head>    
<body>
    
    
    <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $date = date("Y/m/d H:i:s");
        $name = $_POST["name"];
        $str = $_POST["str"];
        $delete_number = $_POST["number"];
        $fix_number = $_POST['fix_number'];
        $per_name = "";
        $per_str = "";
        $file_name = "m3-04.txt";
        $hidden_number = $_POST['hidden_number'];
        
    /* 送信*/    
        if($_POST = "add"){
            if($name != "" && $str != "" && $hidden_number != ""){
                $lines = file($file_name,FILE_IGNORE_NEW_LINES);
                $fp = fopen($file_name, 'w');
                foreach($lines as $line){
                    $line_explode = explode("<>",$line);
                        if($line_explode[0] != $hidden_number){
                            fwrite($fp,$line.PHP_EOL);
                        }else{
                            fwrite($fp,$hidden_number."<>".$name."<>".$str."<>".$date.PHP_EOL);
                        }$hidden_number = "";
                }fclose($fp);  
            }elseif($name != "" && $str != ""){
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
    
    /* 編集*/
        if($_POST = "edit"){
            if($fix_number != ""){
                $lines = file($file_name,FILE_IGNORE_NEW_LINES);
                $fp = fopen($file_name, 'r+');
                $max_line = "0";
                foreach($lines as $line){
                    $line_explode = explode("<>",$line);
                    if($line_explode[0] > $max_line){
                        $max_line = $line_explode[0];
                    }
                    if($line_explode[0] == $fix_number){
                        $hidden_number = $line_explode[0];
                        $per_name = $line_explode[1];
                        $per_str = $line_explode[2];
                    }
                }
            }
        }    

    ?>
    
    <form action = "" method = "post">
        名前<input type = "hidden" name = "hidden_number" value = "<?php echo $hidden_number; ?>"/><br>
        <input type = "text" name = "name" value = "<?php echo $per_name; ?>"/><br>
        <input type = "text" name = "str" value = "<?php echo $per_str; ?>"/><br>
        <input type = "submit" name = "add"><br>
        <p>削除対象番号</p><input type = "text" name = "number" placeholder = "削除対象番号"><br>
        <input type = "submit" name = "delete" value = "削除"><br>
        <p>編集対象番号</p><input type = "text" name = "fix_number" placeholder = "編集対象番号"><br>
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




