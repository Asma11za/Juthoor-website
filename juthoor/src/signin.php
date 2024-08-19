<?php

session_start();

        include 'config.php'; 

        $valid = true; 
        $errors = array(); 
        
        // if form is submitted
        if (isset($_POST["submit"])) {
           var_dump($_POST);
           
            $username = test_input($_POST["username"]);
            $password =  test_input($_POST["password"]);

            if (empty($username)) { 
                $valid = false;
                $errors['username'] = "You must enter your username.";
            } 

            if (empty($password)) { 
                $valid = false;
                $errors['password'] = "You must enter your password.";
             }

            if ($valid) { 
                $sql = "SELECT * FROM customer WHERE username = '" . $username . "' 
                        AND Password = '" . $password . "'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) { 
                    $row = $result->fetch_assoc();
                    $_SESSION["SignedIn"] = true;
                    $_SESSION["username"] = $username;
                    $_SESSION["UID"] = $row['Cust_ID'];
                    if(isset($_POST['remember']))
                    {
                        setcookie("Juthoor_username", $username, time() + (86400 * 30), "/");
                        setcookie("Juthoor_password", $password, time() + (86400 * 30), "/");
                    }
                    header('Location: index.php'); 
                } else {
                    $errors['message'] = "username or password are incorrect.";
                echo "<script>alert('incorrect username or password');</script>";
                }
            }
        }

        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title> sign in </title>
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

 
 span.psw {
     display: block;
     float: none;
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

a:link {
  color: green;
}

/* mouse over link */
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

<h3 class="head">Sign in </h3>

 <h4  class="head1"> Please fill in this form to sign in your account.</h4>

    <hr>
<form action="signin.php" method="post">
        <div>


      <label for="email"><b>Username</b></label>
      <input type="text" placeholder="Enter Email" name="username" value="<?php if(isset($_COOKIE['Juthoor_username'])) echo $_COOKIE['Juthoor_username'];?>">
      <label class="error"><?php if(isset($errors['username'])) echo $errors['username'];?></label><br>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE['Juthoor_password'])) echo $_COOKIE['Juthoor_password'];?>">
      <label class="error"><?php if(isset($errors['password'])) echo $errors['password'];?></label><br>
<Center >
<input type="checkbox" checked="checked" name="remember"> Remember me
      </Center >
 </div>
<br><br>
      <div class="clearfix">
     <button type="submit" name="submit" class="signupbtn">Signin</button>
        <button type="button" 
    onclick="window.location.href='index.php'"
    class="cancelbtn">Cancel</button><br><br>
  <p><b><a href="" target="_blank">Forget Password?</a></b>
     
    </div>
  </form>
</div>


    </body>


</html>