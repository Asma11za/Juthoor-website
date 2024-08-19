<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title>Confirmation</title>


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
 height: 450px;
 position:absolute;
 display: block;
 top:70%;
 left: 50%;
 
 transform: translate(-50%,-50%);
 background: rgba(255,255,255,.7);
 box-shadow: 0 15px 20px rgba(0,0,0, .2);
 padding:30px; 

}


.Header{
 margin: auto;
 width: 100%;
 height: 15%;
 display: flex;
 justify-content: space-between;
 align-items: center;
 
}
.Heading{

 font-size: 20px;
 font-family: 'Open Sans';
 color: green;
 top:150%;
 margin-top:150px;
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

.symbol{
position: absolute;
top: 5%;
align-items:center;
margin-left: -35px;

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

<img class ="symbol" src="iconn.png" width="10" height="210">

</div>
<h1 class="Heading">Your order has been received</h1>
<p>Thank you for your purchase!</p>
<p>Your order ID: 111555ARSM</p>

<a href="index.php"><button class="button">Continue Shopping</button></a>
</div>

<img class="img1" src = "im.svg" height= "100" width="10"  > 
<figure>
<figcaption class="fig"> JUTHOOR </figcaption> 
</figure>


</div>
</div>
</body>
