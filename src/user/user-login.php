<?php
    session_start();
    require "../resources/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        .form-holder{
            margin-top: 50%;
            margin-bottom: 50%;
        }
        .submit a:hover{
            text-decoration: none;
        }
    </style>
    <?php require "header.php"?>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body">
                        <div class="col col-12">
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="alert alert-danger text-center"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                        </div>
                        <form action="user-login-submit.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-12 text-left">
                                    <input type="checkbox" onclick="showHidePassword()"> Show Password
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 text-left">
                                    <a class="btn btn-link" href="user-signup.php">Don't Have Account</a>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="submit" class="btn btn-primary" value=" Login " />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showHidePassword(){
            var val = document.getElementById('password');
            if (val.type === 'password') {
                val.type = 'text';
            }else{
                val.type = 'password';
            }
        }
    </script>
</body>
</html>