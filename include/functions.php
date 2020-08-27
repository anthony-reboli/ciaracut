<?php

session_start();


// PARTIE UTILISATEURS

class userpdo
{

    private $id     = '';
    public  $login  = '';
    public  $nom    = '';
    public  $prenom = '';
    public  $email  = '';
    public  $pass1  = '';
    public  $pass2  = '';
    public  $date   = '';
    public  $tel   = '';


    function connectdb()
    {

        $base = new PDO('mysql:host=localhost;dbname=ciaracut', 'root', '');
        return $base;
    }

    public function register($login, $nom, $prenom, $email, $pass1, $pass2, $date, $tel)
    {
        
        $user = $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$login'");
        $etat = $user->rowCount();
        

        if ($pass1 != $pass2 || strlen($pass1) < 5)
        {
            if ($pass1 != $pass2)
            {
                $msg = "Mots de passes rentrés différents";
                
            }
            if (strlen($pass1) < 5)
            {
                $msg = "Mot de passe trop court";
            }

        }
        else
        {
            if ($etat == 0)
            {
                
                $hash = password_hash($pass1, PASSWORD_BCRYPT, ['cost' => 12]);
                $requser = $this->connectdb()->query("INSERT INTO utilisateurs VALUES(NULL, '$login', '$nom', '$prenom','$email','$hash','$date','$tel', NULL, NULL)");
                
                $msg = "ok";
            }
            else
            {
                $msg = "login déjà existant";
            }
        }

        return $msg;
    }


    public function connect($login, $pass1)
    {
        $user = $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$login'");
        $donnees = $user->fetch();

        if (password_verify($pass1, $donnees['password']))
        {
            $this->id = $donnees['id'];
            $this->login = $login;
            $this->nom = $donnees['nom'];
            $this->prenom = $donnees['prenom'];
            $this->email = $donnees['email'];
            $this->pass1 = $donnees['pass1'];
            $this->date = $donnees['date'];
            $_SESSION['login'] = $login;
            $_SESSION['pass1'] = $pass1;
            $msg = "ok";
        }
        else
        {
            $msg = "Login ou mot de passe incorrect";
        }

        return $msg;
    }

    public function disconnect()
    {
        session_destroy();
        header('location: index.php');
    }

    public function delete()
    {
        if (isset($_SESSION['login']))
        {
            include('connect.php');
            $login = $_SESSION['login'];
            $del = $this->connectdb()->query("DELETE FROM utilisateurs WHERE login='$login'");
            session_destroy();
        }

    }

    public function update($login, $nom, $prenom, $email, $pass1, $tel)
    {


        $log = $_POST['login'];
        $log2 = $_SESSION['login'];
        

       
            $user = $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$log2'");

            $etat = $user->rowCount();
        
            
            if ($etat > 0)
            {
                $msg = "erreur";
            }
        
            if (strlen($pass1) >= 5 &&  $etat == 1)
            {
                
                $verif= $this->connectdb()->query("SELECT login FROM utilisateurs WHERE login='$log'");
                $verif2 = $verif->rowCount();
                

                if ($verif2 == 0)
                {

                

                
                $hash= password_hash($_POST["pass"], PASSWORD_DEFAULT, array('cost' => 12));
                $update = $this->connectdb()->query("UPDATE utilisateurs SET login='$login', nom='$nom', prenom='$prenom', email='$email', password='$hash' , tel='$tel' ,fiche= NULL, datefiche= NULL WHERE login='$log2'");
                var_dump($update);

                $this->login = $log;
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->email = $email;
                $this->password = $pass1;
                $this->tel = $tel;
                echo "Le changement a bien été effectué!";

                session_unset();
                header('location:index.php');

                }

                else
                {
                    echo "Le login est déjà existant";
                }

                

                
            }
            else
            {
                $msg = "erreur2";
            }

        
        return $msg;
    }


    /**
     * @return array|string
     */
    public function getAllInfos()
    {
        if (isset($_SESSION['login']))
        {
            $tab = [];
            $login = $_SESSION['login'];
            $infos = $this->connectdb()->query("SELECT *FROM utilisateurs WHERE login='$login'");

            while ($parameter = $infos->fetch())
            {
                array_push($tab, $parameter);
            }


            return $tab;
        }
        else
        {

            return "Aucun utilisateur n'est connecté";
        }
    }

    public function refresh()
    {


        $login = $_SESSION['login'];
        $queryuser = $this->connectdb()->query("SELECT * FROM utilisateurs WHERE login='$login'");
        $donnees = $queryuser->fetch();

        $this->id = $donnees['id'];
        $this->login = $donnees['login'];
        $this->nom = $donnees['nom'];
        $this->prenom = $donnees['prenom'];
        $this->email = $donnees['email'];
        $this->pass1 = $donnees['pass1'];
        $this->date = $donnees['date'];
        $this->tel = $donnees['tel'];

    }


}