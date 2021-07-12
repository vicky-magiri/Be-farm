<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email= $_POST['email'];
    $pass = $_POST['pwd'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/signinform.css">
    <title>Be-Farm Login</title>
</head>
<body>
        <div class="header">
            <img src="../Images/default.png" width="100px" height="100px" style="border-radius:50%;" alt="Be-farm">
            <h2><i class="fa fa-user"></i>  Login</h2>
        </div>
        <section class="form">
            <div class="login_container">   
                <div class="row">
                    <div class="col-form">
                        <form method="post" action="../Includes/expertsignin.inc.php ">
                            <label for="email">Username:</label><br>
                            <input type="email" id="Email" required name="email"><br>
                            <label for="pwd">Password:</label><br>
                            <input type="password" id="pwd" required name="pwd"><br><br>
                            <p>Create Account? <a href="signup.php">Sign Up</a></p><br>
                            <div class="btn"><button type="submit" name="login" class="submit">Log in</button></div>
                        </form><br>
                    </div>
                    <?php
                        if(isset($_GET['error'])){
                            if($_GET['error'] == "wronglogin"){
                                echo "<script>Incorrect Log in details</script>";
                            }

                        }
                    ?>
                </div>
                <div class="row">
                    <div class="col-img">

                    </div>
                </div>
            </div>
        </section>
</body>
</html>