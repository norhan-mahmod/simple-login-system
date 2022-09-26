<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $emails=[];
        $passwords=[];
        $msg;
        $error;
        $pattern="/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(!isset($_POST["email"])){
                $error="you have to enter the email";
            }else if(!preg_match($pattern,$_POST["email"])){
                $error="invalid email the email should be like example@google.com";
            }else{
                $emails[count($emails)]=$_POST["email"];
                $passwords[count($passwords)]=$_POST["password"];
                $msg="you are logged in , welcome ". $_POST["email"];
            }
        }
    ?>
    <!-- login section -->
    <section class="body row justify-content-center align-content-center">
        <div class="loginform col-4 text-center">
            <h1 class="m-5 pt-2">Sign in</h1>
            <form method="post">
                <input type="text" name="email" class="shadow-lg p-3 mb-3 bg-body input p-4 border-0 w-75" placeholder="email"
                    value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" required>
                <input type="password" name="password" class="shadow-lg p-3 mb-4 bg-body input p-4 border-0 w-75" placeholder="password" 
                    value="<?php if(isset($_POST["password"])) echo $_POST["password"]; ?>" required>
                <input type="submit"  class="btn px-5 py-2" value="sign in">
            </form>
            <p class="parag my-5 text-danger"><?php if(isset($error)) echo $error ?></p>
            <p class="parag my-5 text-success"><?php if(isset($msg)) echo $msg ?></p>

            <div class="h-25">
                <p>Or login with</p>
                <div class="row justify-content-center">
                    <div class="icon col-2 rounded-circle m-2"><a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f text-primary fa-lg pt-4"></i></a></div>
                    <div class="icon col-2 rounded-circle m-2"><a href="https://www.google.com/webhp?hl=en&sa=X&ved=0ahUKEwjXouHj2Jn6AhXDgP0HHQWVDRQQPAgI" target="_blank"><i class="fa-brands fa-google text-danger fa-lg pt-4"></a></i></div>
                    <div class="icon col-2 rounded-circle m-2"><a href="https://twitter.com/i/flow/login" target="_blank"><i class="fa-brands fa-twitter text-primary fa-lg pt-4"></i></a></div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>