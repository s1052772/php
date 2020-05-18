<?php
//先檢查請求來源是否是我們上面創建的 form
if (isset($_POST["action"])&&($_POST["action"] == "add")) {

    //引入檔，負責連結資料庫
    include("connMySQL.php");

    //取得請求過來的資料
    $id = $_POST["學號"];
    $class = $_POST['班級'];
    $name  = $_POST['姓名'];
	$ch  = $_POST['國文'];
	$en  = $_POST['英文'];
	$ma  = $_POST['數學'];
	
    //資料表查訪指令，請注意 "" , '' 的位置
    //INSERT INTO 就是新建一筆資料進哪個表的哪個欄位
    $sql_query = "INSERT INTO student (學號, 班級, 姓名, 國文, 英文, 數學) VALUES ('$id', 
'$class','$name','$ch','$en','$ma')";

    //對資料庫執行查訪的動作
    mysqli_query($db_link,$sql_query);

    //導航回首頁
    header("Location: index1.php");
}
?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>新增學生成績</title>
</head>
<body>
<form action="" method="post" name="formAdd" id="formAdd">
學號：<input type="text" name="學號" id="學號"><br/>
班級：<input type="text" name="班級" id="班級"><br/>
姓名：<input type="text" name="姓名" id="姓名"><br/>
國文成績：<input type="text" name="國文" id="國文"><br/>
英文成績：<input type="text" name="英文" id="英文"><br/>
數學成績：<input type="text" name="數學" id="數學"><br/>
<input type="hidden" name="action" value="add">
<input type="submit" name="button" value="新增資料">
<input type="reset" name="button2" value="重新填寫">
</form>
</body>
</html>
