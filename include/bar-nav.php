<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
</head>
  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  <ul class="nav justify-content-end bg-secondary text-white">
    <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link text-white active" href="../sources/livreor.php">Livre d'or</a></li>
    <li class="nav-item"><a class="nav-link active" href="connexion.php">Connexion</a></li>
    <li class="nav-item"><a class="nav-link active" href="inscription.php">Inscription</a>
  </ul>


  
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="vanessa")
       {
       
    ?>
    <ul id="menu-deroulant" class="nav justify-content-end bg-secondary text-white">
      <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
      <li class="nav-item"><a class="nav-link text-white active" href="../sources/livreor.php">Livre d'or</a></li>
      <li class="nav-item"><a class="nav-link active" href="../sources/profil.php">Profil</a></li>
      <li class="nav-item"><a class="nav-link active" href="index.php?deconnexion=true">Déconnexion</a></li>
      <li class="list-group-item active bg-secondary"><a href="#">Administrateur</a>
    <ul class="list-group">
      <li class="list-group-item"><a class="nav-link active" href="../sources/client.php">Mes clients</a><li>
      <li class="list-group-item"><a class="nav-link active" href="../sources/planning.php">Mon Agenda</a></li>
      <li class="list-group-item"><a class="nav-link active" href="../sources/boutiqueprestation.php">Boutique/Paiement</a>
      <li class="list-group-item"><a class="nav-link active " href="../sources/stock.php">Mon stock</a></li>
    </ul>
  </li>

  </li>
</ul>
    

    

    
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:../sources/index.php");
                   }
                }
     
    }
    else
    {   
    ?>
      <ul class="nav justify-content-end bg-secondary text-white">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="../sources/profil.php">Profil</a></li>
        <li class="nav-item"><a class="nav-link text-white active" href="../sources/livreor.php">Livre d'or</a></li>
        <li class="nav-item"><a class="nav-link active" href="index.php?deconnexion=true">Déconnexion</a></li>
      </ul>
     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:../sources/index.php");
                   }
                }
    
    }
      
  }
             
    ?>