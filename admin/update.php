
<?php
session_start();

include 'config/conn.php';

if(isset($_POST['action'])){
if (($_POST['action'])=="status") 
{
$sql="update album set status='".$_POST["stat"]."' where id='".$_POST["id"]."' ";
$conn->query($sql);
}
if (($_POST['action'])=="type") 
{
    $sql="update album set type='".$_POST["typ"]."' where id='".$_POST["id"]."' ";
    $conn->query($sql);
    
}
}
?>