<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="main">
        <div class="div-content">
            <h1>Login</h1>
            <div class="div-box">
                <form action="" method="form">
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div>
                        <input type="submit" name="submit" value="Register">
                    </div>
                </form>

                <?php 
                    if(isset($_POST['submit'])) {
                        $email = htmlspecialchars($_POST['email']);
                        $password = htmlspecialchars($_POST['password']);
                        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

                        $query = mysqli_query($con, "SELECT email FROM users WHERE email='$email");
                        $count = mysqli_num_rows($query);

                        if($count > 0) {
                            echo "tidak bisa register . email belum terdaftar";
                        } 
                        else {
                            $queryInsert = mysqli_query($con, "INSERT INTO users (email, password) VALUES('$email','$encryptedPassword')");

                            if($queryInsert) {
                                echo "sukses register";
                            }
                        }

                        
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>