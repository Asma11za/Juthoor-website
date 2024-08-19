<?php

session_start();
if( !$_SESSION["SignedIn"]&& !$_SESSION["role"]=='admin')
{
         header('Location: signin_admin.php'); 
}
else
{
        if(isset($_GET['ID']))
{
    include 'config.php';
        $id=$_GET['ID'];
    $sql = "DELETE FROM plants where Plant_ID=$id";


if($conn->query($sql) === TRUE) {
header('Location: edit.php');  
}

}
}

?>