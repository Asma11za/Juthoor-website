<?php
session_start();
if (!$_SESSION["SignedIn"]or$_SESSION["role"]=='admin' )
{
    header('Location: index.php');
}
else
{
  if(isset($_POST['save']))
  {
    include 'config.php';
    $fname=$_POST['Fname'];
    $lname=$_POST['Lname'];
    $address=$_POST['Address'];
    $city=$_POST['City'];
    $ID=$_SESSION['UID'];
    $sql = "UPDATE customer SET Fname='$fname', Lname='$lname',Ship_address='$address',City='$city' WHERE Cust_ID=$ID";

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
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title> My Account </title>
<style type = "text/css">

body {'time new roman';}

body{
 margin: 0;
 padding: 0;
 height: 250vh;
 display: flex;
 justify-content: center;
 align-items: center;
 background-image: url(2.jpeg);
 background-repeat: no-repeat;
 background-size : cover;
 
}


.Container{
 width: 650px;
 height: 100%;
 position:absolute;
 display: block;
 top:75%;
 left: 50%;
 transform: translate(-50%,-50%);
 background: rgba(290,290,290,.6);
 padding:30px; 
}

.banner img{width:100%}


input[type=text], input[type=password] {
  width: 97%;
  padding: 12px;
  margin: 6px 0 24px 0 ;
  display: inline-block;
  border: none;
  background:#f5f5f5;
}


.cancelbtn {
margin-top: 5px;
 width: 100%;
 height: 40px;
 border: none;
 background: linear-gradient(to bottom right, pink, green);
 border-radius: 20px;
 cursor: pointer;
 font-size: 16px;
 font-family: 'time new roman';
 font-weight: 600; 
color: #202020;
}

.cancelbtn, .signupbtn {
Float:left;
  width: 50%;
}

button{
 margin-top: 5px;
 width: 100%;
 height: 40px;
 border: none;
 background: linear-gradient(to bottom right, pink, green);
 border-radius: 20px;
 cursor: pointer;
 font-size: 16px;
 font-family: 'time new roman';
 font-weight: 600;
 color: #202020;
}

button:hover {
  opacity: 1;
}


.head{

 font-size: 30px;
 font-family:'time new roman';
 font-weight: 700;
 color: green;
text-align: center;
}


.head1{

 font-size: 16px;
 font-family:'time new roman';
 font-weight: 700;
 color: black;
text-align: center;
}


hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
  }


h5{
  border-inline: 4px dotted green;
  font-size: 15pt;
  color:#1C522B;
}
h3{font-weight:bold; 
color:#2A743D; 
font-size:35pt;
font-family:Serif;
}
.img1 { position: absolute; top: 2%; margin-left: -700px; filter: invert(100%) sepia(0%) saturate(7500%) hue-rotate(336deg) brightness(104%) contrast(104%); }

.fig {position: absolute; top: 14%; color: white; text-align:center; margin-left: -20px;}

</style >

</head>

    <body>

<div class="banner">

<figure>
  <a href="index.php">
<img class="img1" src = "im.svg" height= "100" width="10" >
</a>
<figcaption class="fig"> JUTHOOR </figcaption>
</figure>
</div>

<div class="Container">
<?php
    
     include 'config.php';
     $ID=$_SESSION['UID'];
     $result = $conn->query("Select * from customer where Cust_ID=$ID");
     $row = $result->fetch_assoc();
   

?>

<h3 class="head">Welcome Back! </h3>

<h4 class="head1">Account Information </h4>

<hr>
<form method="post" action="aaccount.php">
<div><label for="Fname" ><b>First Name: </b></label>
<input type="text" placeholder="Enter Your First Name" name="Fname" value="<?php echo $row['Fname'];?>" required>

<label for="Lname" ><b>Last Name: </b></label>
<input type="text" placeholder="Enter Your Last Name" name="Lname" value="<?php echo $row['Lname'];?>" required>
<p><b><center> Delivery Details:</center></b></p>
<label for="add" ><b> Shipping Address:</b></label>
<input type="text"  name="Address" placeholder="Enter Your Shipping Address" value="<?php echo $row['Ship_address'];?>" required>
<center>
<label><b> City:
<select name = "City"> 
<option  selected>Riyadh</option>
<option <?php if($row['City']=='Makkah') echo 'selected';?>>Makkah</option>
<option <?php if($row['City']=='Madinah') echo 'selected';?>>Madinah</option>
<option<?php if($row['City']=='Jeddah') echo 'selected';?>>Jeddah</option>
<option <?php if($row['City']=='Tabuk') echo 'selected';?>>Tabuk</Option>
<option <?php if($row['City']=='Jubail') echo 'selected';?>>Jubail</option>
<option <?php if($row['City']=='Yanbu') echo 'selected';?>>Yanbu</option>
<option <?php if($row['City']=='Eastern Province') echo 'selected';?>>Eastern Province</option>
<option <?php if($row['City']=='Hail') echo 'selected';?>>Hail </option>
<option <?php if($row['City']=='Alqaseem') echo 'selected';?>>Alqaseem </option>
<option <?php if($row['City']=='jazan') echo 'selected';?>>jazan </option> </label></p></center>  </select>
<br></b>
<h5> Don't forget to click on Save Address button , so your Information won't be lost !</label>
</h5>
<br>
<div class="clearfix">
<button   onclick="window.location.href='index.php'"
 type="submit" name="save" class="signupbtn">Save Account</button>
<button  onclick="window.location.href='index.php'"
type="button" class="cancelbtn">Cancel</button>

    </form>

</div>
</form>
</div>

    </body>

</html>