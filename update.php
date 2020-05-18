 <?php
 include "connMySQL.php";

 $userID = $_GET['id'];
 
 //請注意，這邊因為 $userID 本身是 integer，所以可以不用加 ''
 $sql_getDataQuery = "SELECT * FROM student WHERE 學號 = $userID";

 $result = mysqli_query($db_link, $sql_getDataQuery);

 $row_result = mysqli_fetch_assoc($result);
 
	$id = $row_result["學號"];
    $class = $row_result['班級'];
    $name  = $row_result['姓名'];
	$ch  = $row_result['國文'];
	$en  = $row_result['英文'];
	$ma  = $row_result['數學'];
?>
<?php
 if (isset($_POST["action"]) && $_POST["action"] == 'update') {

   
    $class = $_POST['班級'];
    $name  = $_POST['姓名'];
	$ch  = $_POST['國文'];
	$en  = $_POST['英文'];
	$ma  = $_POST['數學'];

     $sql_query = "UPDATE student SET  班級 = '$class',  姓名 = '$name' , 國文 = '$ch' ,英文 = '$en',數學 = '$ma'  WHERE 學號 = $userID";

	mysqli_query($db_link,$sql_query);
     $db_link->close();
     header('Location: index1.php');
 }
 ?>

<html>

 <head>
     <meta charset="UTF-8" />
     <title>修改會員資料</title>
 </head>
 <body>

 <form action="" method="post" name="formAdd" id="formAdd">
      
     學號：<?php echo $id;?><br/>
	 班級：<input type="text" name="班級" id="班級"><br/>
	 姓名：<input type="text" name="姓名" id="姓名"><br/>
	 國文成績：<input type="text" name="國文" id="國文"><br/>
	 英文成績：<input type="text" name="英文" id="英文"><br/>
	 數學成績：<input type="text" name="數學" id="數學"><br/>
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="修改資料">
 </form>
 </body>
 </html>
