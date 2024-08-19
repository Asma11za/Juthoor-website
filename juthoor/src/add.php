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
                $name=$_POST['name'];
                $price=$_POST['price'];
                $type=$_POST['type'];
                $image=$_FILES['image']['name'];
                include 'config.php'; 
                 $sql = "INSERT INTO plants (Plant_name,Plant_type,Price,Image,Quantity_num) 
            VALUES ('". $name ."', '" . $type  . "',  '" . $price  . "',  '" . $image  . "',1)";
                if ($conn->query($sql) === TRUE) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_FILES["image"]["name"]);
                        echo "<script>alert('product added successfully');</script>";
                }

        }
}


?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title> Add Products </title>


<style type = "text/css">


body{
 
 margin: 0;
 padding: 0;
 height: 100vh;
 display: flex;
 justify-content: center;
 align-items: center;
 background-image: url(background.jpeg);
 background-repeat: no-repeat;
 background-size : cover;
 
}


.Container{
 width: 900px;
 height: 100%;
 position:absolute;
 display: block;
 top:90%;
 background: rgba(255,255,255,.7);
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
 margin-top: 30px;
 align-items: center;
 height: 30%;
 width: 90%;
 
 justify-content: space-between;
 display: flex;
 

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
text-align: center;
margin-right: 10px;
 width: 88%;
 float: right;
 
 
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
 padding-top: 5px;
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
input{
        font: 16px system-ui;
        color: #000;
        height: 10%;
        width: 60%;
        padding: 6px 10px;
}
.img1 { position: absolute; top: 5%; margin-left: -700px; filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(336deg) brightness(104%) contrast(104%); }

.fig {position: absolute; top: 17%; color: white; text-align:center; margin-left: -20px;}



</style>

</head>

<body>


<div class="contain">
<div class="banner">


<div class="Container">
<div class="Header">
<h3 class="Heading"> Add New Products </h3>

 </div>
 
 
<form method="post" action="add.php" enctype="multipart/form-data">
 <div class="itm">
 <div class="image">
 </div>
 <div class="ab">

 
<h3 class="title">Product Name:</h3> <input type="text" placeholder=" Product name " name="name" required>
<h3 class="title">Product Price:</h3> <input type="text" placeholder="Product Price " name="price" required><br>
<h3 class="title">Product Image:</h3> <input type="file" accept="image/x-png,image/gif,image/jpeg" placeholder="Product Image " name="image" required><br>
<h3 class="title">Product Type:</h3>
<select name="type">
        <option>Plant</option>
        <option>Care</option>
        <option>Rare</option>
        <option>pots</option>
        <option>Accessories</option>
</select>


 </div>
<br><br><br><br><br><br>
 <h3 class="title">Upload Product Photo:</h3> 
 <img src="plant2.jpeg" style={{ height="300px" }} />
 <div class="counter">

 
 
 </div>
 
 
 
 <div class="pri">
<br><br>




 
 </div>
 </div>
 
  <div class="itm">
 <div class="image">

 </div>
 <div class="about">
  
 
 </div>

<div class="counter">
 <div class="btn">+</div>
 <div class="count">1</div>
 <div class="btn">-</div>
 </div>
 
 <div class="counter">

 
 
 

 </div>

 </div>
 <hr> 
 <div class="checkout">
 <div class="total">
 </div>

<button class="button" type="submit" name="save"> Save </button>

</div>
</form>

 </div>
 <img class="img1" src = "im.svg" height= "100" width="10"  > 
<figure>
<figcaption class="fig"> JUTHOOR </figcaption> 
</figure>
 </div>
 </div>
 



</body>
</html>