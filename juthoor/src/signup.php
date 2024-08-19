<?php

session_start();
   
   include 'config.php'; 

    $valid = true; 
    $errors = array(); 
    

    if (isset($_POST["submit"])) {
      // test user input
      $username = test_input($_POST["username"]);
      $password =  test_input($_POST["psw"]);
      $email = test_input($_POST["email"]);
      $phone = test_input($_POST["phone"]);
      $psw_repeat=test_input($_POST["psw-repeat"]);


      if (empty($username)) { 
            $valid = false;
            $errors['username'] = "You must enter a username.";
        } else if (userExists($username)) { 
        $valid = false;
            $errors['username'] = "Username exists. Choose a different username.";
        }

        if (empty($password)) {
            $valid = false;
            $errors['password'] = "You must enter a password.";
         }

         if (empty($psw_repeat)) { 
            $valid = false;
            $errors['psw_repeat'] = "You must repeat a password.";
         }
         else
         {
            if($password!=$psw_repeat)
            {
                $valid = false;
            $errors['psw_repeat'] = "Password does not match";
            }
         }

         if (empty($phone)) { 
            $valid = false;
            $errors['phone'] = "You must enter a phone number.";
         }

        if (empty($email)) { 
            $valid = false;
            $errors['email'] = "You must enter your email address.";
         } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $valid = false;
            $errors['email'] = "You must enter a valid email address.";
         }


      if ($valid) { 

        $sql = "INSERT INTO customer (Username,Email, Password,Phone_Number) 
            VALUES ('". $username ."', '" . $email  . "',  '" . $password  . "',  '" . $phone  . "')";

        if ($conn->query($sql) === TRUE) {
          $_SESSION["SignedIn"] = true;
          $_SESSION["username"] = $username;
            header('Location: signin.php'); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

      }
    }

 
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
        return $data;
    }

    
    function userExists($username) {
      $sql = "SELECT * FROM customer WHERE Username = '" . $username . "'";
      global $conn;
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        return true;
      } else {
        return false;
      }
    }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title> Sign Up </title>
<style type = "text/css">


body {'time new roman';}

body{
 margin: 0;
 padding: 0;
 height: 250vh;
 display: flex;
 justify-content: center;
 align-items: center;
 background-image: url(2.jpg);
 background-repeat: no-repeat;
 background-size : cover;
 
}


.Container{
 width: 650px;
 height: 100%;
 position:absolute;
 display: block;
 top:70%;
 left: 50%;
 transform: translate(-50%,-50%);
 background: rgba(290,290,290,.6);
 padding:30px; 
}


input[type=text], input[type=password] , [type=tel]{
  width: 97%;
  padding: 12px;
  margin: 6px 0 3px 0 ;
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
 font-weight: 600; color: #202020;
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
  margin-bottom: 25px;}

 a:link {
  color: green;
}


a:hover {
  color: hotpink;
}

.error
{
    color: red;
}

</style >

</head>


    <body>

<div class="Container">

<h3 class="head">Sign Up </h3>

 <h4  class="head1"> Please fill in this form to create an account.</h4>

    <hr>
<form action="Signup.php" method="post">
        <div><label for="name" ><b>Username </b></label>
      <input type="text" placeholder="Enter your Username " name="username" >
      <label class="error"><?php if(isset($errors['username'])) echo $errors['username'];?></label><br>


     <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" >
      
      <label class="error"><?php if(isset($errors['email'])) echo $errors['email'];?></label><br>
<label for="phone"><b>Phone Number:</b></label>
 

<input type="tel" id="phone" placeholder="Enter Phone Number " name="phone">
        <label class="error"><?php if(isset($errors['phone'])) echo $errors['phone'];?></label><br>
        <label class="error"></label><br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" >
       <label class="error"><?php if(isset($errors['password'])) echo $errors['password'];?></label><br>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" >
       <label class="error"><?php if(isset($errors['psw_repeat'])) echo $errors['psw_repeat'];?></label><br>
      


  
      </label>
 <p>
      <p>By creating an account you agree to our.

<b><a href="default.asp" target="_blank">Terms & Privacy</a></b></p>



<br><br>
      <div class="clearfix">
     <button type="submit" class="signupbtn" name="submit">Sign Up</button>
        <button type="button" 
    
    onclick="window.location.href='index.php'"
    class="cancelbtn">Cancel</button>
   </form>
     
    </div>
  </form>
</div>


    </body>


</html>