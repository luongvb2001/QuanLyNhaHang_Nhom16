<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../../css/login.css">
        <script src="../js/index.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div class="login-page">
            <div class="form">
                <form class="login-form" action='../../controller/Security/login.php' method='POST'>
                    <input type="text" name='txtUsername' placeholder="username"/>
                    <input type="password" name='txtPassword' placeholder="password"/>
                    <button>Login</button>
                </form>
            </div>
        </div>        
    </body>
</html>