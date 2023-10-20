<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])){


?>




<!DOCTYPE hmtl>
<html>
    <head>
      <title>HOME</title>
      <link rel="stylesheet" type="text/css" href="style3.css.css">
    </head>
    <body>
        <h1>Welcome, <?php echo $_SESSION['name']; ?></h1>
        <a href = "index.html" target="_parent">Please Press Here</a>
       
    </body>

         
    </script>
</html>
<?php
}else{
    header("Location: index.php");
    exit();
}
?>