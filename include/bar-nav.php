<head><script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/ciaracut.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
  <?php
    if (isset($_SESSION['login'])==false)
    {
    ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Ciaracut</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sources/livreor.php">Livre d'or</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                    </li>

                </ul>
            </div>
        </nav>


  
     <?php
    }
     elseif(isset($_SESSION['login'])==true)

    {
       if($_SESSION['login'] =="vanessa")
       {
       
    ?>
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand" href="#">Ciaracut</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                   <ul id="menu-deroulant" class="nav justify-content-end bg-secondary text-white">
                       <li class="nav-item active">
                           <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="../sources/livreor.php">Livre d'or</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="profil.php">Profil</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="index.php?deconnexion=true">Déconnexion</a>
                       </li>

                       <li class="nav-item">
                           <a class="nav-link" href="#">Administrateur</a>
                           <ul class="list-group">
                               <li class="list-group-item"><a class="nav-link active" href="../sources/client.php">Mes clients</a><li>
                               <li class="list-group-item"><a class="nav-link active" href="../sources/planning.php">Mon Agenda</a></li>
                               <li class="list-group-item"><a class="nav-link active" href="../sources/boutiqueprestation.php">Boutique/Paiement</a>
                               <li class="list-group-item"><a class="nav-link active " href="../sources/stock.php">Mon stock</a></li>
                           </ul>

                       </li>

                       </li>

                   </ul>
               </div>
           </nav>











     <?php
                
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      session_destroy();
                      header("location:../sources/index.php");
                   }
                }
     
    }
    else
    {   
    ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Ciaracut</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../sources/livreor.php">Livre d'or</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?deconnexion=true">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>

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




