<?php /* Smarty version 2.6.31, created on 2021-10-06 17:47:34
         compiled from auth/login.tpl */ ?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
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
        <form action="../../../controllers/auth/login.php" Method="post">
            <div class="input-form"> <Input type="Text" name="username" placeholder="Username" required /> </div>
            <div class="input-form"> <input type="password" name="password" placeholder="Password" required /> </div>
            <Input class="btn-form" type="Submit" value="Login" />
        </form>
    </div>
</body>

</html>