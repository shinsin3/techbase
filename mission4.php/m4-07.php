<?php
$dsn = 'mysql:dbname=データベース名;host=ホスト名;';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));


$id = 1;
$name = "山田";
$comment = "こんばんは";
$sql = "UPDATE tbtest SET name=:name,comment=:comment WHERE id=:id";
$stmt = $pdo -> prepare($sql);
$stmt -> bindParam(":name",$name,PDO::PARAM_STR);
$stmt -> bindParam(":comment",$comment,PDO::PARAM_STR);
$stmt -> bindParam(":id",$id,PDO::PARAM_INT);
$stmt -> execute();

$sql = "SELECT * FROM tbtest";
$stmt = $pdo -> query($sql);
$results = $stmt ->fetchAll();
foreach($results as $result){
    echo $result["id"].",";
    echo $result["name"].",";
    echo $result["comment"]."<br>";
}


?>

