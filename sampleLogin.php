<?php
session_start();
?>
<html>
    <head>

        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <link href="adminCSS.css" rel="stylesheet" type="text/css"/>

        <script src="check.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container-fluid">
        <form id="login-form" action="validatelogin.php" method="POST" role="form" style="display: block">

            <div class="form-group">
                <input type="text" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-login" id="login" name="login" value="Login">
                    </div>
                </div>
            </div>

        </form>
        </div>
    </body>
</html>