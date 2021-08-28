<?php
$dsn = 'mysql:dbname=データベース名;host=ホスト名;';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = $pdo -> prepare("INSERT INTO tbtest (name,comment) VALUE (:name,:comment)");
$sql -> bindParam(":name", $name,PDO::PARAM_STR);
$sql -> bindParam(":comment",$comment,PDO::PARAM_STR);
$name = "人間";
$comment = "こんにちは";
$sql -> execute();
?>


