<?php
session_start();
if( !$_SESSION["SignedIn"]&& !$_SESSION["role"]=='admin')
{
         header('Location: signin_admin.php'); 
}
else
{
        if(isset($_POST['save']))
        {
              
                $id=$_POST['ID'];
                $name=$_POST['pname'];
                $price=$_POST['price'];
                include 'config.php';
                 $sql = "UPDATE plants SET Plant_name='$name', Price='$price' WHERE plant_ID=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Record updated successfully');</script>";
} else {
  echo "<script>alert('Error updating record');</script>";
}
        }
}

?>
<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title> Edit Products </title>



<style type = "text/css">


body{
 
 margin: 0;
 padding: 0;
 height: 100vh;
 display: flex;
 justify-content: center;
 align-items: center;
 background-image: url(background.jpeg);

 background-size : cover;
 
}


.Container{
 width: 900px;
 height: 100%;
 position:absolute;
 display: block;
 top:90%;

 left: 50%;
 box-shadow: 0 15px 20px rgba(0,0,0, .2);
 transform: translate(-50%,-50%);
 padding:30px; 
}

.contain{
 text-align: center;   
justify-content: center;  
align-items: center; 
}

.banner img{width:100%}


.Header{
 margin: auto;
 width: 90%;
 height: 15%;
 display: flex;
 justify-content: space-between;
 align-items: center;
 
}
.Heading{

 font-size: 30px;
 font-family: 'Open Sans';
 font-weight: 700;
 color: green;

}
.Action{
 position:center;
 font-size: 14px;
 font-weight: 600;
 font-family: 'Open Sans';
 color: green; 

}

.counter{

 display: flex;
 width: 15%;
 
 align-items: left;
 justify-content: space-between;

 
}
.btn{font-family: ‘Open Sans’;
 width: 40px;
 height: 40px;
 justify-content: center;
 background-color: #d9d9d9;
 display: flex;
 border-radius: 50%;
 align-items: center;
 font-size: 20px;
 color: #202020;
 font-weight: 900;
 cursor: pointer;
}
.count{
 font-weight: 900;
font-size: 20px;
 font-family: ‘Open Sans’;
 color: #202020;

 
}



.itm{
 margin: auto;
 align-items: center;
 height: 30%;
 width: 90%;
 padding-left: 50px;
 padding-right: 50px;
 justify-content: space-between;
 display: flex;
     background: rgba(255,255,255,.7);
 

}
.image{text-align: center;
 width: 15%;
 
}
.abt{
 height: 100%;
}
.title{ font-family: ‘Open Sans’;
 padding-top: 50px;
 color: #202020;
 line-height: 10px;
font-weight: 800;
 font-size: 20px;
 
 
}

.pri{
 height: 100%;
 text-align: right;
}
.amount{
 padding-top: 60px;
 font-size: 20px;
 font-family: ‘Open Sans’;
 font-weight: 800;
 color: #202020;
}


hr{margin-right: 5%;
 width: 66%;
 float: right;
 
}
.checkout{margin-right: 30%;

 float: right;
  width: 28%;
}

.items{
 font-size: 16px;
 font-family: 'Open Sans';
 font-weight: 500;
 
 
 color: #909090;
 line-height: 10px;
}
.amount2{
font-weight: 900;
 color: #202020; font-size: 20px;
 font-family: 'Open Sans';
 
}
.remove{
color: #E44C4C;
 cursor: pointer;
 padding-top: 20px;
 font-size: 14px;
 font-family: ‘Open Sans’;
 font-weight: 600;
 
}

.tax{
font-size:22px;
font-family:'Open Sans';
font-weight:700;
color: #202020;




}
.button{
 margin-top: 5px;
 width: 100%;
 height: 40px;
 border: none;
 background: linear-gradient(to bottom right, pink, green);
 border-radius: 20px;
 cursor: pointer;
 font-size: 16px;
 font-family: 'Open Sans';
 font-weight: 600;
 color: #202020;
}

form {
        width: 300px;
        height: 44px;
        border-radius: 5px;
        display:flex;
        flex-direction:row;
        align-items:center;
}

input{
        font: 16px system-ui;
        color: #000;
        height: 10%;
        width: 100%;
        padding: 6px 10px;
}
.img1 { position: absolute; top: 5%; margin-left: -700px; filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(336deg) brightness(104%) contrast(104%); }

.fig {position: absolute; top: 17%; color: white; text-align:center; margin-left: -20px;}

.rm
{

        margin-top: 20px;
}

</style>

<form id="form" role="search">
  <input type="search" id="query" name="q"
   placeholder="Search a product"
   aria-label="Search through site content">
  <button>Search</button>

</form>

</head>


<body>


<div class="contain">
<div class="banner">


<div class="Container">
<div class="Header">
<h3 class="Heading"> Edit Products </h3>



 </div>

 <?php

 include 'config.php';     
     $results = $conn->query("SELECT * FROM Plants order by Plant_type");

     if ($results->num_rows > 0) {
      
  // output data of each row
  while($row = $results->fetch_assoc()) {
        echo ' <div class="itm">
 <div class="image">
 <img src="'.$row['Image'].'" style={{ height="170px" }} />
 </div>
 <div class="ab">

 <h3 class="title">'.$row['Plant_name'].'</h3>
  <form action="edit.php" method="post">
<input type="text" placeholder=" Edit Name " name="pname" value="'.$row['Plant_name'].'">
 <input type="hidden"  name="ID" value="'.$row['Plant_ID'].'">
 </div>
 
 <div class="counter">
 <div class="btn">+</div>
 <div class="count">1</div>
 <div class="btn">-</div>
 
 </div>
 
 
 <a class="rm" href="delete.php?ID='.$row['Plant_ID'].'"> Delete Product </a>
 <div class="pri">
<br><br><br>
 <div class="amount"> '.$row['Price'].' SAR </div>
<input type="text" placeholder=" Edit Price " name="price" value="'.$row['Price'].'">
<input type="submit" name="save"  class="button" value="Edit">
<br>
 


 
 </div>
 </div></form>';
    
  }
}


 ?>


 

 <hr> 
 <div class="checkout">
 <div class="total">
 </div>
<br><br><br>
<button class="button" type="submit" name="save"> Save Changes </button>

</div>

 </div>
 <img class="img1" src = "im.svg" height= "100" width="10"  > 
<figure>
<figcaption class="fig"> JUTHOOR </figcaption> 
</figure>
 </div>
 </div>
 



</body>
</html>