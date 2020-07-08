<?php session_start() ?>

<?php
date_default_timezone_set('europe/paris');
$connexion = mysqli_connect("localhost", "root", "", "ciaracut");


if (isset($_POST['submit']))
{

        if(!empty($_POST['message']))
        {
            $requete2 = "INSERT INTO commentaires (commentaire, nom, date) VALUES ('" . $_POST['message'] . "', '" . $_SESSION['login'] . "','" . date("Y-m-d H:i:s") . "')";
            $query2 = mysqli_query($connexion, $requete2);

            header('Location: livreor.php');
        }
        else
        {
            echo "le champ commentaire est vide";
        }
    
}

?>


<html lang="FR">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="boutique.css">
        <title>Livre d'or</title>




    </head>
    <header><?php
        include("../include/bar-nav.php"); ?></header>
    <body>


        <?php
        
        if (isset($_SESSION['login'])){

            $nom=$_SESSION['nom'];
            $prenom=$_SESSION['prenom'];
            $requete4="SELECT count(id) FROM sauvegarde where nom = '$nom'  and prenom = '$prenom'";
            $requete4Q=mysqli_query($connexion,$requete4);
            $requete4R=mysqli_fetch_all($requete4Q);
            


            if($requete4R[0][0] != 0 or $_SESSION['login'] == 'vanessa')
            {
                ?>
                <form method="POST" action="livreor.php">
                <label>Laisser un commentaire:</label>
                <br/><br/>
                <textarea name="message" rows="6" maxlength="50" cols="50"></textarea>
                <br/><br/>

                <input type="submit" name="submit" value ="Poster">

            </form> 
                <?php
            }
            else
            {
                echo "vous ete pas client vous pouvez pas commenter";
            }

        }
        ?>

<?php
        $requete = "SELECT * FROM commentaires ORDER BY date DESC LIMIT 10";
        $req = mysqli_query($connexion, $requete);
        
        while($row = mysqli_fetch_assoc($req))
        {
        ?>
        <div class="poster">
            <div id="user">
                <p><b><?php echo $row['date']?></b></p>
                <hr>
                <h3><b><?php echo $row['nom']?></b></h3>

                <?php
                if(isset($_SESSION['login'] ) == true && $_SESSION['login'] == 'vanessa'){
                    echo '<a href="../include/deletecommentaire.php?id=', $row['id'], '"><img src="../img/trash.png"/></a>';
                }
                ?>
            </div>
            <div id="messag">
                <p><?php echo $row['commentaire']?></p>
            </div>
        </div>
        <?php
}
?>

    </body>
</html>