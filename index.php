<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");
                $userError = "";
                $passError = "";

                if(isset($_POST['submit'])){
                    $Username = mysqli_real_escape_string($con, $_POST['username']);
                    $Password = mysqli_real_escape_string($con, $_POST['password']);

                    if(empty($Username)){
                        $userError = "Username is required";
                    }
                    if(empty($Password)){
                        $passError = "Password is required";
                    }

                    if(empty($userError) && empty($passError)) {
                        $result = mysqli_query($con, "SELECT * FROM users WHERE Username = '$Username' AND Password = '$Password' ") or die("Select Error");
                        $row = mysqli_fetch_assoc($result);

                        if(is_array($row) && !empty($row)){
                            $_SESSION['valid'] = $row['Lastname'];
                            $_SESSION['firstname'] = $row['Firstname'];
                            $_SESSION['middlename'] = $row['Middlename'];
                            $_SESSION['birthday'] = $row['Birthday'];
                            $_SESSION['contactnumber'] = $row['Contactnumber'];
                            $_SESSION['province'] = $row['Province'];
                            $_SESSION['citymunicipality'] = $row['CityMunicipality'];
                            $_SESSION['Barangay'] = $row['Barangay'];
                            $_SESSION['housenostreet'] = $row['HousenoStreet'];
                            $_SESSION['email'] = $row['Email'];
                            $_SESSION['username'] = $row['Username'];
                            $_SESSION['password'] = $row['Password'];
                            $_SESSION['id'] = $row['Id'];
                            header("Location:home.php");
                            exit(); // Add exit() after header redirect to prevent further execution
                        } else {
                           
                            $errorMessage = "Wrong Username or Password";
                          
                        }
                    }
                }
            ?>
            <header>Login</header>
            <form id="" action="" method="post">
                <div class="field input">
                <label for = "Username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" value="<?php echo $_POST['username'] ?? ''; ?>">
                    <p style="color:red;"><?php echo $userError ?></p>  
                </div>
                <div class="field input">
                <label for = "Password">Password</label>
                    <input type="text" name="password" id="password" autocomplete="off" value="<?php echo $_POST['password'] ?? ''; ?>">  
                    <p style="color:red;"><?php echo $passError ?></p>                    
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required >                  
                </div>
                <?php if(isset($errorMessage)): ?>
                <div class="message">
                    <p><?php echo $errorMessage ?></p>
                </div>
               
                </form>
            <?php endif; ?>




                <div class="links">
                    <center>Don't have an account? <a href="register.php">Sign up Now</a></center>
                </div>
            </form>
        </div>
    </div>

   
</body>
</html>

