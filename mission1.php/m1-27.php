<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-27</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "str">
        <input type = "submit" name = "submit">
    </form>
    
    <?php
        $str = $_POST["str"];
        $file_name = "m1-27.txt";
        if($str != ""){
        $fp = fopen($file_name,"a");
        fwrite($fp,$str.PHP_EOL);
        fclose($fp);
        echo "書き込み成功！<br>";
        }
        
    if(file_exists($file_name)){
            $lines = file($file_name,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                if($line % 3 === 0 && $line % 5 === 0){
                    echo "FizzBuzz <br>";
                }elseif($line % 3 === 0){
                    echo "Fizz <br>";
                }elseif($line % 5 === 0){
                    echo "Buzz <br>";
                }else{
                    echo $line ."<br>";
                } 
            }
            
    }    
    ?>    
</body>
</html>




