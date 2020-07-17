
  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>
  <ul class="nav justify-content-end  bg- text-white flex-sm-row">
    <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
    <li class="nav-item"><a class="nav-link text-white active" href="../sources/tarif.php">Tarifs</a></li>
    <li class="nav-item"><a class="nav-link text-white active" href="../sources/livreor.php">Livre d'or</a></li>
    <li class="nav-item"><a class="nav-link text-white active" href="connexion.php">Connexion</a></li>
    <li class="nav-item"><a class="nav-link text-white active" href="inscription.php">Inscription</a></li>
  </ul>


  
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="vanessa")
       {
       
    ?>
    <ul id="menu-deroulant" class="nav justify-content-end  text-white flex-sm-row">
      <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
       <li class="nav-item"><a class="nav-link text-white active" href="../sources/livreor.php">Livre d'or</a></li>
      <li class="nav-item"><a class="nav-link text-white active" href="../sources/tarif.php">Tarifs</a></li>
      <li class="nav-item"><a class="nav-link text-white active" href="../sources/profil.php">Profil</a></li>
      <li class="nav-item"><a class="nav-link text-white active" href="index.php?deconnexion=true">Déconnexion</a></li>
      <li class="list-group-item  bg-dark"><a class="nav-link text-white" href="#">Administrateur</a>
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
      <ul class="nav justify-content-end  text-white flex-sm-row">
        <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white active" href="../sources/tarif.php">Tarifs</a></li>
        <li class="nav-item"><a class="nav-link text-white active" href="../sources/profil.php">Profil</a></li>
        <li class="nav-item"><a class="nav-link text-white active" href="../sources/livreor.php">Livre d'or</a></li>
        <li class="nav-item"><a class="nav-link text-white active" href="index.php?deconnexion=true">Déconnexion</a></li>
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