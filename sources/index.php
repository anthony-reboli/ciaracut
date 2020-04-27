<?php
    session_start();
    unset($_SESSION['num']);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="camping.css">
    <title>Accueil</title>
</head>
<body class="bodya">
  <header class="headeri">
    <?php 
    include("../include/bar-nav.php");
    ?>
    <main id="user">
    <?php
    if (isset($_SESSION['login'])==false)
    {
       echo "<h3>Connectez vous et réservez maintenant";
    }
    elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="admin")
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté.</b></h3>";
       }
       else
       {
        $user = $_SESSION['login'];
            echo "<h3><b>Bonjour <u>$user,</u> vous êtes connecté vous pouvez réserver maintenant.</b></h3>"; 
       }
    }
    ?>
  </header>
  
    
    <main id="logo">
      
    </main>
  
 
 
  <?php
  include("../include/footer.php");
  ?>
  
</body>
</html>