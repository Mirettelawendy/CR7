<!DOCTYPE hmtl>
<html>
    <head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="style3.css.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <h2>LOGIN</h2>
           <?php if(isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>

                <?php  }?>

            <label>Username</label>
          <input type="text" name="uname" placeholder="Username"><br>
          <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>

        <button type="submit">Login</button>
        <a href="signup.php" class="link-1">dont have an account? Register here</a>

        </form>
    </body> 
</html>