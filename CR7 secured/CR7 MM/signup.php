<!DOCTYPE hmtl>
<html>
    <head>
        <title>SIGN UP</title>
        <link rel="stylesheet" type="text/css" href="style3.css.css">
    </head>
    <body>
        <form action="signup-check.php" method="post">
            <h2>SIGN UP</h2>
           <?php if(isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>

                <?php  }?>
                <label>Name</label>
                <?php if(isset($_GET['name'])) { ?>
                
                <input type="text" 
                       name="uname" 
                       placeholder="Name"
                       value="<?php echo $_GET['name']; ?>"
                       ><br>
                
                <?php  }else{?>
                    <input type="text" 
                           name="uname" 
                           placeholder="Name"><br>
                    <?php }?>
                    <label>Username</label>
                    <?php if(isset($_GET['uname'])) { ?>
                    <input type="text" 
                          name="uname" 
                          placeholder="Username"
                          value="<?php echo $_GET['uname']; ?>"
                       ><br>
                
                <?php  }else{?>
                    <input type="text" 
                           name="uname" 
                           placeholder="Name"><br>
                    <?php }?>

                    <label>Password</label>
                   
                    <input type="password" 
                          name="password" 
                          placeholder="Password"><br>
                   <label>Verify Password</label>
                <input type="password"
                      name="re_password" 
                      placeholder="Re_Password"><br>

        <button type="submit">Sign Up</button>
        <a href="index.php" class="link-1">Already have an account? </a>

        </form>
    </body> 
</html>