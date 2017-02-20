<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.css">
    <title>Document</title>
</head>
<body>
<?php

$token = 'token'.md5('data'.date('i'));

?>
    <div class="container">


        <div style=" background-color: grey ;margin-top: 150px; padding: 50px 20px" class="col-md-6 col-md-offset-3">
            <h1 style="color: white ;text-align: center">Login</h1>
            <form action="http://localhost/own_framework/login/" method="post">
                <input type="text" name="email" placeholder="email" class="form-control"> <br>
                <input type="password" name="password" placeholder="password" class="form-control">
                <input type="hidden" name="login" value="true">
                <input type="hidden" name="token" value="<?php echo $token; ?>"> <br>
                <input type="submit" name="login" style="" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>