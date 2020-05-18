<?php
    //1. 引入程式檔
    include("connMySQL.php");
    
    //2. 加入sql 語法，白話文：從 members 的資料表中選擇所有欄位，並依照 cID 遞增排序
    $sql_query = "SELECT * FROM  student ORDER BY 學號 ASC";

    //3. 使用 mysqli_query() 函式可以在 MySQL 中執行 sql 指令後會回傳一個資源識別碼，否則回傳 False。
    $result = mysqli_query($db_link,$sql_query);
    
    //4. 使用 mysqli_num_rows() 函式來取得資料筆數
    $total_records = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>學生成績的 CRUD 練習</title>
</head>
<body>
<h1 align = "center">學生成績總表</h1>
<p align= "center">目前資料筆數：<?php echo $total_records;?>，<a href='create.php'>新增資料</a></p>

<table border="1" align = "center">
    <tr>
        <th>學號</th>
		<th>班級</th>
        <th>姓名</th>
        <th>國文</th>
        <th>英文</th>
        <th>數學</th>
		<th>平均</th>
        <th>班級名次</th>
		
    </tr>
<?php

while($row_result = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row_result['學號']."</td>";
    echo "<td>".$row_result['班級']."</td>";
    echo "<td>".$row_result['姓名']."</td>";
    echo "<td>".$row_result['國文']."</td>";
	echo "<td>".$row_result['英文']."</td>";
	echo "<td>".$row_result['數學']."</td>";
	echo "<td>".$row_result['平均']."</td>";
	echo "<td>".$row_result['班級名次']."</td>";
    echo "<td><a href='update.php?id=".$row_result['學號']."'>修改</a> ";
    echo "<a href='delete.php?id=".$row_result['學號']."'>刪除</a></td>";
    echo "</tr>";
}
?>	
</table>
</body>
</html>
