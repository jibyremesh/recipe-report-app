<?php
    session_start();
    include_once 'database.php';
    if (isset($_POST['submit'])) {
        $name =  $_POST['username'];
        $error = "username/password incorrect";
        $stmt = $pdo->prepare('SELECT * FROM users where username=:username and password=:password');
        $values = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];  
        $stmt->execute($values);
        if ($stmt->rowCount() > 0) {
            $_SESSION["username"] = $name;
            header('Location: recipeSelectionForm.php');
        }
        else {
            $_SESSION["error"] = $error;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>GoodFood</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/common.css">
    <link rel="stylesheet" href="style/login.css">
</head>
<body class="flex-center">
    <div class="outer-wrapper">
        <div class="login-container">
            <div class="inner-wrapper">
                <form action="login.php" method="POST">
                    <h1 class="logo">GoodFood</h1>
                    <div class="form-container">
                        <input type="text" name="username" placeholder="User Name" />
                    </div>
                    <div class="form-container">
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="form-container">
                        <input type="submit" name="submit" class="btn-login" value="Login">
                    </div>
                    <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span class='error'>$error</span>";
                    }
                ?>  
                </form>
            </div>
        </div>
    </div>

</body>
</html>