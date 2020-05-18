<?php

    $userId = $_GET['id'];

    include ('connMysql.php');

    $sql_query = "DELETE FROM student WHERE 學號 = $userId";

    mysqli_query($db_link,$sql_query);

    $db_link->close();

    header("Location: index1.php");
?>
