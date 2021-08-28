<!DOCTYPE html>
<html lang = "ja">
<head>
    <meta charset = "UTF-8">
    <title>m1-20</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "str">
        <input type = "submit" name = "submit">
    </form>
    <?php
            $str = $_POST["str"];
            echo $str;
    ?>
</body>
</html>

<!--$_POST は HTTP POST メソッド で送信された値を取得する変数で既に定義されている。-->        

<!--HTTP POST メソッドでデータを送信する方法は HTMLの <form>タグ を利用する。
<form>タグ のmethod属性 に POST を指定することで、
フォームのパラメーターをサーバーへ送信することが出来る。-->

<!--actionを無指定にするとSubmitで送信される情報は
自己ファイル(フォームを設置したファイル)に投げられる。
actionの中は無記入が推奨される。--