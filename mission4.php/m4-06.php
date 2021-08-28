<?php
$dsn = 'mysql:dbname=データベース名;host=ホスト名;';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = "SELECT * FROM tbtest";
$stmt = $pdo -> query($sql);
$results = $stmt ->fetchAll();
foreach($results as $result){
    echo $result["id"].",";
    echo $result["name"].",";
    echo $result["comment"]."<br>";
}

?>

