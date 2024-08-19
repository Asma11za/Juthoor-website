<?php
session_start();
if(isset($_POST['checkout']))
{

    if(isset( $_SESSION["SignedIn"]))
    {
    if(!empty($_POST['QTY']))
     {
        $QTY=array();
        $QTY=explode("-",$_POST['QTY']);
        if(isset($_SESSION['Cart']['Product']))
        {
            for($i=0;$i<count($_SESSION['Cart']['Product']);$i++)
    {
              $_SESSION['Cart']['Product'][$i]['QTY']=$QTY[$i];
              $_SESSION['Cart']['Product'][$i]['Price']*=$QTY[$i];
                include 'config.php'; 

                 $sql = "INSERT INTO shoppingcart (Pname,Quantity_num,Total,Cust_ID,Plant_ID) 
            VALUES ('". $_SESSION['Cart']['Product'][$i]['Name'] ."', '" . $_SESSION['Cart']['Product'][$i]['QTY']  . "',  '" . $_SESSION['Cart']['Product'][$i]['Price']  . "',  '" . $_SESSION["UID"]  . "','".$_SESSION['Cart']['Product'][$i]['ID']."')";

        if ($conn->query($sql) === TRUE) {

        }
             
    }

     header('Location: shoppingcart.php'); 
        }
     }   
}

else
{
    echo '<script>alert("Please Login to your account")</script>';
}
}

?>
<!DOCTYPE html>

<html>
<head>
<meta charset = "utf-8">
<title>Shopping Cart</title>


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
 font-size: 14px;
 font-weight: 600;
 font-family: 'Open Sans';
 color: green; 
 border-bottom: 2px solid green;
 cursor: pointer;

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
.remove{
color: #E44C4C;
 cursor: pointer;
 padding-top: 5px;
 font-size: 14px;
 font-family: ‘Open Sans’;
 font-weight: 600;
 
}

hr{margin-right: 5%;
 width: 66%;
 float: right;
 
}
.checkout{margin-right: 5%;

 float: right;
  width: 28%;
}
.total{ justify-content: space-between;
 width: 100%;
 display: flex;

}
.total2{
 font-weight: 700;
 color: #202020; 
 font-size: 20px;
 font-family: 'Open Sans';
 
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

.img1 { position: absolute; top: 5%; margin-left: -700px; filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(336deg) brightness(104%) contrast(104%); }

.fig {position: absolute; top: 17%; color: white; text-align:center; margin-left: -20px;}



</style>

</head>



<body>


<div class="contain">
<div class="banner">


<div class="Container">
<div class="Header">
<h3 class="Heading">Shopping Cart</h3>
<h5 class="Action"><a href="deletecart.php">Remove all</a></h5>

 </div>
 
 
<?php

if(isset($_SESSION['Cart']['Product']))
{
    for($i=0;$i<count($_SESSION['Cart']['Product']);$i++)
    {
        $ID=$_SESSION['Cart']['Product'][$i]['ID'];
            
                echo '  <form action="new.php" method="post"><div class="itm">
 <div class="image">
 <img src="'.$_SESSION['Cart']['Product'][$i]['Image'].'" style={{ height="170px" width="170px" }} />

 </div>
 <div class="about">
 <h3 class="title">'.$_SESSION['Cart']['Product'][$i]['Name'].'</h3>
 
 </div>
 
 <div class="counter">';
 echo "<div class='btn' onclick='setQTY($ID,1)'>+</div> ";

 echo'<div class="count qty" id="item'.$_SESSION['Cart']['Product'][$i]['ID'].'">'.$_SESSION['Cart']['Product'][$i]['QTY'].'</div>';
 echo "<div class='btn' onclick='setQTY($ID,0)'>-</div>";
 echo '
 
 </div>
 
 
 
 <div class="pri">
 <div class="amount"><span class="price" id="price'.$ID.'">'.$_SESSION['Cart']['Product'][$i]['Price'].'</span><span> SAR</span></div>
 <span style="display:none;"  id="hprice'.$ID.'">'.$_SESSION['Cart']['Product'][$i]['Price'].'</span>
 <div class="remove"><a href="deleteItem.php?index='.$i.'"><u>Remove</u></a></div>
 
 
 </div>
 </div></form>';
            
            
    }
    
}

else
{
    echo '<script>alert("Cart is empty")</script>';
}

?>
 
  

 <hr> 
 <div class="checkout">
 <div class="total">
 <div>
 <!--<div class="tax">Tax 15%</div>-->
 <div class="total2">Total</div>
 <div class="items"><?php if(isset($_SESSION['Cart']['Product'])) echo count($_SESSION['Cart']['Product'])." Items"; ?></div>
 </div>
 <div>
 <!--<div class="amount2">123</div>-->
 <div class="amount2" id="totalnet"></div>
 </div>
 </div>
 <form action="new.php" method="post">
    <input type="hidden" name="QTY" id="qty" value="">
 <button class="button" type="submit" name="checkout">Checkout</button>
</form>
 </div>
 

 </div>
 <img class="img1" src = "im.svg" height= "100" width="10"  > 
<figure>
  <a href ="index.php" >
<img class="img1" src = "im.svg" height= "100" width="10"  > </a>

<figcaption class="fig"> JUTHOOR </figcaption> 
</figure>
 </div>
 </div>
 
<script type="text/javascript">
    function setitemQTY() {
         var qty=document.getElementsByClassName("qty");
var qty2='';
         for (var i =0;i< qty.length ; i++) {
           qty2=qty2+qty[i].innerHTML+"-";

     }
     qty2=qty2.substring(0, qty2.length-1);
            document.getElementById('qty').value=qty2;
    }
    
    function setQTY(id,op) {

       if(op==1)
       {
       var qty=Number.parseFloat(document.getElementById("item"+id).innerHTML);
       qty++;
       document.getElementById("item"+id).innerHTML=qty;
       var price=Number.parseFloat(document.getElementById("hprice"+id).innerHTML)*qty;
       document.getElementById("price"+id).innerHTML=price.toFixed(2);
       GetTotal();
       setitemQTY();

        }
        if(op==0)
        {
            var qty=Number.parseFloat(document.getElementById("item"+id).innerHTML);
            if(qty>1)
            qty--;
             document.getElementById("item"+id).innerHTML=qty;
              var price=Number.parseFloat(document.getElementById("hprice"+id).innerHTML)*qty;
       document.getElementById("price"+id).innerHTML=price.toFixed(2);
            GetTotal();
            setitemQTY();
        }


    }
  function GetTotal() {
      var amount=document.getElementsByClassName("price");
var net=0;

for (var i =0;i< amount.length ; i++) {
    net+=Number.parseFloat(amount[i].innerHTML);
}

document.getElementById("totalnet").innerHTML=net.toFixed(2);
  }

  GetTotal();
 setitemQTY();

</script>


</body>
</html>