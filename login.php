<?php 
define('server', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'schoollogin');

$con=new mysqli(server,username,password,dbname);
if($con === false)
{
  die("Error could not connet".$con->connect_error);
}
 
if($_SERVER['REQUEST_METHOD'] == "POST")
				{
                    $username=$_POST['username'];
					$password=$_POST['password'];

                    $sql = "SELECT * FROM adminlogin WHERE username='$username' AND password='$password'";

                    $result = mysqli_query($con, $sql);
            
                    if (mysqli_num_rows($result) === 1) 
                    {
            
                        $row = mysqli_fetch_assoc($result);
            
                        if ($row['username'] === $username && $row['password'] === $password)
                         {
            
                            echo "Logged in!";
                       
                            header("Location: adminpage.html");
            
                            exit();
            
                        }
                        
                    }
                    else
                        {            
                            echo '<script>alert("Login Failed!")</script>';
              
                        }
                }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="loginpage.css">

</head>
<body>
    <h1>WELCOME</h1>
    <form action="" method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Sign in</h3>
            <p>Sign in with your username and password</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="username">Your username</label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <br><br>

            <!-- Password -->
            <label for="pswrd">Your password</label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <!-- sub container for the checkbox and forgot password link -->
            


            <!-- Submit button -->
            <button type="submit">Login</button>

            <!-- Sign up link -->

        </div>

    </form>
</body>
</html>
