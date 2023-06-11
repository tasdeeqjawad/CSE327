<?php
session_start();
include_once('connect.php');

$error = false;

//get user inputs and sanitize

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $username = htmlspecialchars(strip_tags($username));
    $username = strip_tags($username);

    $password = trim($_POST['password']);
    $password = htmlspecialchars(strip_tags($password));
    $password = strip_tags($password);

    if (endsWith($username, "@northsouth.edu")) {
        echo "Proceed";
    }

    
//password validation
    if(empty($password)){
        $error = true;
        $errorPassword = 'Please enter password';
    }elseif(strlen($password)< 8){
        $error = true;
        $errorPassword = 'Enter strong password';
    }

//Check password and username to log in
    if(!$error){                                                      
        $password = md5($password);
        $sql = "select * from users where username='$username' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count==1 && $row['password'] == $password){   

            $_SESSION['username'] = $row['username'];
            header('location: display.php'); 
            $_SESSION["authenticate"] = "success";     
                              
        }else{
            $errorMsg = 'Invalid Username or Password';                
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log in</title>
  <link rel="stylesheet" type="text/css" href="./css/style2.css">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<style>
.menu{
    width: 50px;
    float: left;
    height: 1100px;
	color: #ff7300;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}
ul li{
    list-style: none;
    margin-right: 180px;
    margin-top: 25px;
    font-size: 37px;
}
ul li a{
    text-decoration: none;
    color: #ff7300;
    font-family: Georgia;
    font-weight: bold;
    transition: 0.9s ease-in-out;
}
ul li a:hover{
    color: #ffffff;
}

    </style>
<body class="align">
<div class="menu">
                <ul>
                    <li><a href="./Index.html">Home</a></li>
                </ul>
            </div>
  <div class="grid align__item">
    <div class="register">
    <img class="site__logo" src=".png" width="200" height="140">
        <h2>Log in</h2>
      <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                <br>
                <?php

                    // Display error Invalid Username or Password

                    if(isset($errorMsg)){
                        ?>
                        <div>    
                            <?php echo $errorMsg; ?>
                        </div>
                        <?php
                    }
                ?>
                    <input class="form__field" type="text" name="username"  autocomplete="off" placeholder="USERNAME"> 
                    <input class="form__field" type="password" name="password"  autocomplete="off" placeholder="PASSWORD">

                    <!-- Display errors regarding password -->
                    
                    <span ><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
                <div>
                	<br>
                	<input class="form__field"  type="submit" name="login" value="Log In">
                </div>    
            </form>
      <p>Haven't an accout? <a href="./Registration.php">Register</a></p>
    </div>
  </div>
</body>
</html>
