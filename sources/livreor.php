<?php session_start() ?>

<?php
date_default_timezone_set('europe/paris');
$connexion = mysqli_connect("localhost", "root", "", "ciaracut");
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
if (isset($_POST['message']))
{
    $msg=addslashes($_POST['message']);
}

if (isset($_POST['submit']))
{
        if(!empty($_POST['message']))
        {
            $requete2 = "INSERT INTO commentaires (commentaire, nom, date) VALUES ('$msg', '" . $_SESSION['login'] . "','" . date("Y-m-d H:i:s") . "')";
            $query2 = mysqli_query($connexion, $requete2);
            header('Location: livreor.php');
        }
        else
        {
            echo "Le champ commentaire est vide !!";
        }
    
}

?>
<html lang="FR">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/ciaracut">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Livre d'or</title>
    </head>
    <body id="livreor">
    <header class="headeri">
        <?php include("../include/bar-nav.php"); ?>      
    </header>

    <main id="contlivreor">
        <?php
        
        if (isset($_SESSION['login'])){ 
            $requete4="SELECT count(id) FROM sauvegarde WHERE nom = '$nom'  and prenom = '$prenom'";
            $requete4Q=mysqli_query($connexion,$requete4);
            $requete4R=mysqli_fetch_all($requete4Q);
            if($requete4R[0][0] != 0 OR $_SESSION['login'] == 'vanessa')
            {
                ?>
                <form id="comment" method="POST" action="livreor.php">
                <h1 class="title">Le livre or de ciaracut</h1>
                <label for="formGroupExampleInput"><b>Laisser vos commentaires</b></label>
                <div class="form-group">
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <input class="btn btn-light" type="submit" name="submit" value ="Poster"/>
                </form> 
                <?php
            }
            else
            {
                echo "Vous n'êtes pas client vous ne pouvez pas commenter !!";
            }

        }
        ?>

<?php
        $requete = "SELECT * FROM commentaires ORDER BY date DESC LIMIT 10";
        $req = mysqli_query($connexion, $requete);
        ?>
        <div id="containerposter">
        <?php
        while($row = mysqli_fetch_assoc($req))
        {
        ?>
    
        <div class="poster">
            <div id="user">
                <p><b>Date: <?php echo $row['date']?></b></p>
                <hr>
                <h3><b>Nom: <?php echo $row['nom']?></b></h3>
                <hr>
            </div>
            <div id="messag">
                <p>Messages: <?php echo $row['commentaire']?></p>
            </div>
                <hr>
                <?php
  
                if(isset($_SESSION['login'] ) == true && $_SESSION['login'] == 'vanessa'){
                    echo '<a href="../include/deletecommentaire.php?id=', $row['id'], '"><span id="suppcomment" class="material-icons">delete</span></a>';
                }
                ?>
            </div>
            
        

        <?php

}
?>
    </div>

</main>

    </body>
</html>