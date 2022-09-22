<?php
session_start();
require_once('../class/Operation.php');

if(!isset($_SESSION['login']) || $_SESSION['login']!==true){
header("location:login.php");
}


$id = filter_var($_GET['i'],FILTER_SANITIZE_NUMBER_INT);
//echo $id;


$obj = new operation();
$result =  $obj->getData('product','*',['id'=>$id]);
$rows = $result->fetch(PDO::FETCH_ASSOC);

if($rows['id']==$id){
   $_SESSION['flag']=1;
    header("location:fetch.php");
    exit;
}



$res = $obj->getData('category','*',['id'=>$id]);
$row = $res->fetch(PDO::FETCH_ASSOC);
if($row['userid']==$_SESSION['id']){
$result = $obj->deleteData('category',['id'=>$id]);
if($result!=0){
    header("location:fetch.php");
}
}else{
    echo "Not authorized.";
}

//  "DELETE FROM users WHERE `users`.`id` = 22"?
?>