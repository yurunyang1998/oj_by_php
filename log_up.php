<?php
/**
 * Created by PhpStorm.
 * User: yurunyang    这是注册的
 * Date: 2017/11/11
 * Time: 19:52
 */
$url = "index.html";
header("Content-type: text/html; charset=utf-8");
$account  = $_POST['accout'];
$password = $_POST['passward'];
if(strlen($account)!=9)
{
    echo "账户长度要求为9位";
    header("refresh:2,url=$url");
    exit;

}

if(strlen($password)<6 || strlen($password)>10 )
{
    echo "密码要求大于6位且小于10位";
    header("refresh:2,url=$url");
    exit;
}


$conn = new mysqli('localhost','root','root','oj');
//$data = time();
$query ="INSERT INTO user set account=$account,passward='$password'";
//$query = " into user(accout,passward) values($account,$password)";
$wheaterexit = "select * from user where account=$account limit 1";

$result = $conn->query($wheaterexit);
// print_r($result);

if($result->num_rows>0)
{
    echo "account exited;";
    header("refresh:3,url=$url");
    exit;
}


if($conn->query($query))
{
    echo "register successful !";
    //header("refresh:3,url=$url");
}

else
    {
        echo "sorry,register fall.";
        //header("location:http://localhost:63342/online%20judgd%20by%20php/moban1325/moban1325/index.html?_ijt=21noarnc1u350slf71dk3e22lk");
    }
header("refresh:3,url=$url");
