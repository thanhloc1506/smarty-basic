<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <title> Login </title>
</head>

<body class="container">
    <div class="container-title">
        <h1 class="title-login"> Login page </h1>
    </div>
    <div class="container-form">
        <div class="container-subtitle">
            <p class="container-subtitle_text"> Manament user</p>
        </div>
        <form action="../../controllers/auth.controller.php" Method="post">
            <div class="input-form"> <Input type="Text" name="username" placeholder="Username" required /> </div>
            <div class="input-form"> <input type="password" name="password" placeholder="Password" required /> </div>
            <Input class="btn-form" type="Submit" value="Login" />
        </form>
    </div>
</body>

</html>