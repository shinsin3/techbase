<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-23</title>
</head>
<body>
    <?php
        $human = 
        array("Ken","Alice","Judy","BOSS","Bob");
        foreach($human as $person){
            if($person == "BOSS"){
                echo "Good moring ". $person ."!<br>";
            }else{
                echo "Hi! " .$person ."<br>";
            }
        }
    ?>    
</body>
</html>

