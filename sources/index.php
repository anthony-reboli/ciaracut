<?php
    session_start();
    unset($_SESSION['num']);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">

    <title>Accueil</title>
</head>
<body class="bodya">
    <header class="headeri">
        <?php include("../include/bar-nav.php"); ?>      
    </header>
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
  <h1>Mon actu Faceboock</h1>
    
    <main id="logo">
       <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCiara-cut-103232688121762&tabs=timeline&width=600&height=800&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="600" height="800" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
     

      
    </main>
  <?php

  ?>

  
</body>
</html>