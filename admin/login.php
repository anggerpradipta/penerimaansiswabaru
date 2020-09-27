<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin</title>

    <link rel="stylesheet" href="../asset/css/materialize.min.css" />
    <link rel="stylesheet" href="../asset/css/style_login.css" />
    <script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/materialize.min.js"></script>
</head>
<body class="blue-gradient">
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l4 offset-m2 offset-l4 z-depth-4 white" id="panel">
                <h5 class="center-align blue-text">
                    <i class="material-icons medium">account_circle</i><br/>
                </h5>
                <h6  class="center-align blue-text">LOGIN ADMIN</h6>
                <br/>
                <br/>
                <?php
                    ob_start();
                    if (isset($_SESSION['user_pwd_wrong']) == 1) {
                        ?>
                        <p class="user_pwd_wrong red-text">Username atau Password yang anda masukan salah!!!</p>
                <?php
                        session_destroy();
                    }
                ?>
                <form class="row" action="login_proses.php" method="POST">
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text">perm_identity</i>
                        <input type="text" id="username" class="validate" type="text" name="username"  />
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field col s12">
                        <i class="material-icons prefix grey-text">lock_outline</i>
                        <input id="password" class="validate" type="password" name="password" />
                        <label for="password">Password</label>
                    </div>
                    <div class="col s12">
                        <button type="submit" name="login" id="login" class="btn col s12 blue z-depth-0 waves-effect waves-light" >Login</button>
                        
                    </div>
                    <div class="col s12">
                        <br/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#username, #password").keyup(function(){
                $(".user_pwd_wrong").hide();
            });

            $("#login").click(function() {
                var username = $("#username").val();
                var password = $("#password").val();
                if (username === "" || password === "") {
                    alert("Username dan Password Tidak boleh kosong !!!");
                    return false;
                }
            });
        });
    </script>
</body>
</html>
