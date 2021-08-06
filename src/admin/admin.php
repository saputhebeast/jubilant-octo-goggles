<?php
    session_start();
    
    if(isset($_SESSION['first_name'])){
        header('Location: admin-dashboard.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="../styles/admin/admin.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body>
    <style>
        .heading{
            margin-top: 50px;
        }
        .form-holder{
            margin-top: 10%;
        }
        .submit a:hover{
            text-decoration: none;
        }
        .login{
            margin-top: 10px;
        }
        .login .btn{
            width: 100%;
        }
    </style>
    <div class="container heading">
        <h1 class="text-center">Admin Login</h1>
    </div>
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
                        <form action="admin-login.php" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
                                <div class="login col-12 text-center">
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