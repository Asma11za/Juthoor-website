<?php
session_start();
if(isset($_POST['add']))
{
$items=array("ID"=>$_POST['ID'],"Name"=>$_POST['name'],"Price"=>$_POST['price'],"Image"=>$_POST['image'],"QTY"=>1);
if(!isset($_SESSION['Cart']))
{
 // $_SESSION['Cart']['Product'][]=array();
  $_SESSION['Cart']['Product'][]=$items;
  
}
else
{
  $found=false;  
    for($i=0;$i<count($_SESSION['Cart']['Product']);$i++)
    {
      if($items['ID']==$_SESSION['Cart']['Product'][$i]['ID'])
      {
        $_SESSION['Cart']['Product'][$i]['QTY']+=1;
        $found=true;
        break;
      }
    }
    if(! $found)
 $_SESSION['Cart']['Product'][]=$items;


//var_dump($_SESSION['Cart']);
}
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plant</title>
<meta name = "keywords" content = "PLANTS, PLANT, INDOOR, OUTDOOR">
<meta name = "description" content = "This page should guide the search engines to the fact that its content incudes selling indoor/outdoor plants and its accessories">
<script src=""https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"" crossorigin="anonymous"></script>


<style type = "text/css">
  

.container{ text-align: center;   
justify-content: center;  
align-items: center;	  }

.banner img{width:100%}

 .imgbox {
            display: grid;
            height: 100%;
        }
  .center-fit {
            max-width: 100%;
            max-height: 100vh;
            margin: auto;
        }

.heading {position: absolute; top: 20%; width:100%; text-align:center; font-size:5rem; color: white; font-family: "Georgia","Courier New","Times New Roman","Lucida Console", monospace; font-weight:100;}

.p1 {position: absolute; top: 50%; width:100%; text-align:center; font-size:1.5rem; color: white;}

.btn { boarder:1px; border-color:white;  border-radius: 5px; background: none; padding: 10px 20px; font-size:20px;  font-family:"times"; cursor: pointer; margin:10px; margin-left: -40px; transition: 0.8; position: absolute; overflaw: hidden; top: 60%;}

.btn1 {color: white;}

.btn1:hover {background-color:gray; border-color:gray; border-color: rgba(0, 0, 0, 0.40); transition:0.5s; background-color: rgba(0, 0, 0, 0.40);}

.img1 { position: absolute; top: 8%; margin-left: -700px; filter: invert(35%) sepia(99%) saturate(651%) hue-rotate(79deg) brightness(91%) contrast(83%);}

.fig {position: absolute; top: 20%; color: #2E8B57; text-align:center; margin-left: 655px;}


ul {position: absolute; top: 15%; left:20%; transform: translate(-50%,-50%); display: flex; background: gray; background-color: rgba(0, 0, 0, 0.40); border-radius: 15px; overflow: hidden; box-shadow: 0 0 0 2px grey; }

ul li {list-style: none; width: 80px;  margin:1px; padding:7px;}

ul li a {display: block; text-align: center; color: white; transition: 0.5s; text-decoration: none; font-size: 15px; }


 ul li:hover {background-color: #2E8B57; border-color:#2E8B57; border-color: rgba(0, 0, 0, 0.40); transition:0.5s; }transition:0.5s; }


.search {
  
        position: absolute; top: 15%; left:68%;
        padding-top: 50px;
        background: gray; 
         background-color: rgba(0, 0, 0, 0.40);
 
        overflow: hidden; 
        box-shadow: 0 0 0 2px grey;
    
    
        
        font-size: 22px;
        font-weight: 900;
        text-align: center;
        font-color: white;

    
        margin:1px;
        width: 20%;
        padding: 5px 1px;

        
        transition: transform 250ms ease-in-out;
        font-size: 14px;
        line-height: 18px;
        
 
      background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3Cpath d='M0 0h24v24H0z' fill='none'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-size: 18px 18px;
        background-position: 95% center;
        border-radius: 15px; 
        border: 1px solid #575756;
        transition: all 250ms ease-in-out;
        backface-visibility: hidden;
        transform-style: preserve-3d;}
        
        .search::placeholder {
            color: white;
            letter-spacing: 1.5px;
        }

        .search:hover, .search:focus {
            padding: 12px 0;
            outline: 0;
            border: 1px solid transparent;
            border-bottom: 1px solid #575756;
            border-radius: 0;
            background-position: 100% center;
            
        }
        
        .white-color {
        position: absolute; 
        top: 15%;
        left:90%;
        Color:green;
        font-size:100px;

    }

.header { 
  overflow: hidden;
  background-color: #556B2F;
  padding: 1px 1px;
  Height: 50px;
}

.header p {
  float: center;
  color: white;
  text-align: center;
  padding: 5px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 5px;
  border-radius: 4px;
}

.button {
boarder:1px; border-color:white;  border-radius: 5px; background: none; padding: 5px 10px; font-size:15px;  font-family:"times"; cursor: pointer; margin:5px; margin-left: 490px; transition: 0.8; position: absolute; overflaw: hidden; top:2%;
}

.buttton {
boarder:1px; border-color:white;  border-radius: 5px; background: none; padding: 5px 10px; font-size:15px;  font-family:"times"; cursor: pointer; margin:5px; margin-left: 950px; transition: 0.8; position: absolute; overflaw: hidden; top:2%;
}

.button1 {color: white;}

.button1:hover {background-color:gray; border-color:gray; border-color: rgba(0, 0, 0, 0.40); transition:0.5s; background-color: rgba(0, 0, 0, 0.40);}



.foot { text-align: center;   
justify-content: center;  
align-items: center;  }

.banneer img{width:100%}

.img2 { position: absolute; top: 1%; margin-left: -700px; filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(336deg) brightness(104%) contrast(104%); }

.figgg {position: absolute; top: 15%; color: white; text-align:center; margin-left: 540px;}



#footer {
box-sizing: boarder-box;
font-family: "Georgia","Courier New","Times New Roman","Lucida Console", monospace; 
position: relative;
min-height: 80vh;
padding: 50px 100px;
background-color: black;
justify-content: center;
align-items: center;
flex-direction: column;
  max-width: 100%;

}

.headinng {position: absolute; top: 20%; width:80%; text-align:center; font-size:5rem; color: white; font-family: "Georgia","Courier New","Times New Roman","Lucida Console", monospace; font-weight:50;}

.p2 {position: absolute; top: 90%; width:87%; text-align:center; font-size:1.0rem; color: white;}

.social-links{
margin-left: 10%;
margin-top: 350px;
}

.social-links a{
font-size: 100px;
color: #ffff;
margin-right: 100px;
}

.social-links a:hover{
color: #2E8B57;
}

.ac-center {
display: grid;
grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
gap: 80px;
margin-bottom: 80px;
}

.ac {
text-align: center;
padding-bottom: 16px;
transition: all 500ms ease-in-out;
}

.ac:hover {
Box-shadow: 0 5px 5px rgb(143, 188, 143);
}

.ac .img-cover {
overflow: hidden;

}

.ac img {
transition: all 500ms ease-in-out;
}

.ac:hover img {
transform: scale(1.2);
}


.item-1 {
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 1;
  grid-row-end: 9;
}

.item-2 {
  grid-column-start: 5;
  grid-column-end: 7;
  grid-row-start: 1;
  grid-row-end: 9;
}
.item-3 {
  grid-column-start: 3;
  grid-column-end: 5;
  grid-row-start: 1;
  grid-row-end: 5;
}

.item-4 {
  grid-column-start: 3;
  grid-column-end: 5;
  grid-row-start: 5;
  grid-row-end: 9;
}

.headi { text-align:left; font-size:3rem; color: #2E8B57; font-family: "Lucida Console","Times New Roman", monospace; font-weight:50;}

.bnn { boarder:1px; border-color:#2E8B57;  border-radius: 5px; background: none; padding: 10px 90px; font-size:20px;  font-family:"times"; cursor: pointer;  transition: 0.8;  overflaw: hidden; }

.btnnn {color: #2E8B57;}

.btnnn:hover {background-color:gray; border-color:gray; border-color: rgba(0, 0, 0, 0.40); transition:0.5s; background-color: rgba(0, 0, 0, 0.40);}

.bttn { boarder:1px; border-color:#2E8B57;  border-radius: 5px; background:#2E8B57 ; padding: 10px 30px; font-size:20px;  font-family:"times"; cursor: pointer;  transition: 0.8;  overflaw: hidden;  top: 115%; margin:10px; margin-left: 1200px;  position: absolute; }

.bntt {color: white;}

.bntt:hover {background-color:gray; border-color:gray; border-color: rgba(0, 0, 0, 0.40); transition:0.5s; background-color: rgba(0, 0, 0, 0.40);}



* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

body { background-image: linear-gradient(to right, #999966, rgb(211, 211));
}


</style>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 

</head>

<header class="header">

<p> To Get 15% off your first purchase or </p>
<?php
  if (isset($_SESSION["SignedIn"]))
{
  echo '<a href ="signout.php" > <button class="button button1 ">Sign Out</button></a>';
}
else
{
  echo '<a href ="signup.php" > <button class="button button1 ">Sign up</button></a>
<a href ="signin.php" > <button class="buttton button1 ">Sign in</button></a>';
}
?>


</header>


<body> 
<br><br><br><br><br><br>
<div class="container">  
<div class="banner">

<figure>
  <a href ="index.php" >
<img class="img1" src = "im.svg" height= "100" width="10"  > </a>

<figcaption class="fig"> JUTHOOR </figcaption> 
</figure>

<ul >
    <li ><a href="Plantpage1.php">Plants</a></li>
     <li ><a href="rare.php">Rare Plants</a></li>
    <li><a href="pots.php">Pots</a></li>
     <li><a href="acc.php">Accessories</a></li>
       <li><a href="care.php">Care</a></li>
     
</ul>



 <div class="shopping-links">
<a href="new.php"><i class='fa fa-shopping-cart fa-2x  white-color fa-2xl' ></i></a>
</div>

</div>
</div>

  <section class="section">

    <div class="headi ">
    
    </div>

<br><br><br>

    
<?php 
    include 'config.php';     
     $results = $conn->query("SELECT * FROM Plants where Plant_type='Plant'");

          if ($results->num_rows > 0) {
      $c=0;

  // output data of each row
  while($row = $results->fetch_assoc()) {
  if($c%4==0)
        {
          echo '<div class="ac-center box">';
        }
      echo ' <form action="Plantpage1.php" method="post"><div class="ac">
        <div class="img-cover">
        <a href="productdetails.php?ID='.$row['Plant_ID'].'">
       
          <img class="thumbnail" src="'.$row['Image'].'" alt="" height="300" width="200">
           <input type="hidden" name="ID" value="'.$row['Plant_ID'].'">
          <input type="hidden" name="image" value="'.$row['Image'].'">
          </a>
        </div>
        <p>'.$row['Plant_name'].'</p>
        <input type="hidden" name="name" value="'.$row['Plant_name'].'">
        <div class="rating">
          <i class="bx bxs-star"></i>
          <i class="bx bxs-star"></i>
          <i class="bx bxs-star"></i>
          <i class="bx bxs-star"></i>
          <i class="bx bx-star"></i>
        </div>
        <div class="price">'.$row['Price'].' SR</div>
        <input type="hidden" name="price" value="'.$row['Price'].'">
        <button type="add" name="add" class="bnn btnnn ">Add to Cart</button>
      </div></form>';
      $c++;
        if($c==4)
        {
        echo '</div>';
        $c=0;
        }
  }
}
    
     ?>
    
  
  </section>
   

<section id="footer">
  <div class="foot">
 <div class="banneer">
     
<figure>
<img class="img2" src = "im.svg" height= "100" width="10"  > 

<figcaption class="figgg"> JUTHOOR </figcaption> 


<h1 class="headinng"> Don't Forget To Follow Us!</h1>
</figure>


     <div class="social-links">
         <a href="https://accounts.snapchat.com/accounts/login?continue=%2Faccounts%2Fwelcome"> <i class="fa fa-snapchat"></i></a>
         <a href="https://www.instagram.com"> <i class="fa fa-instagram"></i></a>
         <a href="https://twitter.com"> <i class="fa fa-twitter"></i></a>
         <a href="https://www.facebook.com"> <i class="fa fa-facebook"></i></a>
     </div>
<br><br>
 <hr width="100%;" 
        color="gray" 
        size="1" 
        align="right">

<p class="p2"><strong>&copy;</strong>2023 by JUTHOOR. Powered and secured by Group 2; Web Based Course at <strong>IAU</strong>.</p>

</div>
 </div>
</section>
</body>




</html>
