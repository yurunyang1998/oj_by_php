<?php
/**
 * Created by PhpStorm.
 * User: yurunyang
 * Date: 2017/11/11
 * Time: 21:51
 */
$accout = $_POST['accout'];
$passward = $_POST["passward"];
$conn = new mysqli('localhost','root','root','oj');
$query = "select * from user where account=$accout";
$result = $conn->query($query);
$row = $result->fetch_row();
if($passward == $row[1])
{
    echo "login seccessful";
}
else
{
    echo "passward error";
}
header("refresh:2,url=index.html");
?>


