<?php
session_start();
   
   if (!isset($_SESSION["SignedIn"]))
   {
      echo '<script>alert("Cart is empty")</script>';
   }
   else
   {
     
     if(isset($_POST['pay']))
     {
     $name=$_POST['name'];
     $cardno=$_POST['cardno'];
     $cvv=$_POST['cvv'];
     $date=$_POST['exdate'];

  include 'config.php'; 
        $sql = "INSERT INTO payment (Card_name,Card_number,CVV,Exp_date ) 
            VALUES ('". $name ."', '" . $cardno  . "',  '" . $cvv  . "',  '" . $date. "')";
                if ($conn->query($sql) === TRUE) {

                    unset($_SESSION['Cart']);
 header('Location: nnn.php'); 
        }
               
           }
   }

    

?>
<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title>Checkout</title>


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
 background-size : 100%;
 
}


.contain{
 text-align: center;   
justify-content: center;  
align-items: center; 
}

.banner img{width:100%}

.Container{
 width: 450px;
 height: 700px;
 position:absolute;
 display: block;
 top:100%;
 left: 50%;
 
 transform: translate(-50%,-50%);
 background: rgba(255,255,255,.7);
 box-shadow: 0 15px 20px rgba(0,0,0, .2);
 padding:30px; 

}


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

.inp{
  width: 93%;
  padding: 15px;
  margin: 6px 0 24px 0 ;
  display: inline-block;
  border: none;
  background: white;
}

.button{
 margin-top: 5px;
 width: 45%;
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


.img1 { position: absolute; top: 5%; margin-left: -700px; filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(336deg) brightness(104%) contrast(104%); }

.fig {position: absolute; top: 17%; color: white; text-align:center; margin-left: -20px;}



</style>

</head>



<body>


<div class="contain">
<div class="banner">
<div class="Container">

<div class="Header">

<h3 class="Heading">Checkout</h3>
</div>


<img src="pay.png" width = "450" height ="65"/>
 
 <h2>Payment details</h2>

 <form action="shoppingcart.php" method="post">
 <div><label for="name" ><b>Name on Card</b></label>
 <br>
      <input class = "inp" type="text" placeholder="e.g.Reem Almualem" name="name" required>
 </div>
 
 <div><label for="name" ><b>Card Number</b></label>
 
      <input class = "inp" type="tel" placeholder="1111222233334444" name="cardno"  required />
	   </div>
	  <div><label><b>CVV</b></label>
	  <br>
      <input class = "inp" type="tel" placeholder="e.g.111" pattern = "\d{3}"  name="cvv" required /> </div>
	  <br>
	 <div> <label><b>Expiry Date</b></label>
	  <br>
	  <input class = "inp" name ="date" type="month" placeholder= "YYYY-MM" name="exdate" required /> </div>
<center>
 <button class="button" type="submit" name="pay" >Confim</button>
<a href="nnn.html"><button onclick="location.href='nnn.php';" class="button">Apple Pay</button></a>
<br>
<a href="nnn.html"><button onclick="location.href='nnn.php';" class="button">Cash on Delivery</button></a>
 </center>


</form>
</div>

<img class="img1" src = "im.svg" height= "100" width="10"  > 
<figure>
  <a href ="index.php" >
<img class="img1" src = "im.svg" height= "100" width="10"  > </a>

<figcaption class="fig"> JUTHOOR </figcaption> 
</figure>

</div>
</div>
</body>

</html>