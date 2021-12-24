<?php
    if (($_SERVER['SERVER_ADDR'] == 'localhost') || ($_SERVER['SERVER_ADDR'] == '127.0.0.1') || ($_SERVER['SERVER_ADDR'] == '::1'))
    {
        if (file_exists('C:/xampp1/htdocs/SYLLA'))
        {
            define('ROOT', 'C:/xampp1/htdocs/SYLLA/');
        }
        else
        {
            //pointe ton environnement de travaille ...
        }

        require_once(ROOT . 'core/config_dev.php');
    }
    else
    {
        //pour une utilisation ulterieur ...
        require_once(ROOt . 'core/config.php');
        // en cas d'herbergement ...
    }

    require_once(ROOT . 'core/ServiceModel.php'); // notre ServiceModel .
    require_once(ROOT . 'modeles/ServiceModel.php');// celle qui contient nos classe .

    /*-----------------------------------------------------*/

    if(isset($errors) && !empty($errors)) // on vas creer une page error
    {
        require_once(ROOT . 'vues/pages/error.php');
    }
    else if(isset($_GET['p']) && file_exists(ROOT . 'controlleur/'. $_GET['p']. '.php'))
    {
        /*
            c'est içi la partie la plus important 
            on peut chargé tout les page a travers le repertoire controlleur 
            par exemple pour message 
            on vas j'ai creer un fichier php dans controlleur qui me permet 
            d'appeler les fonctionnalité d'un message genre ajout
            modificatiuon suppresion a travers le fichier index de message .

            le p => indique la page 

            on prend une exemple si j'avait une autre genre etablishement 

            je vais creer le dossier etablishement a coté de message 
            je met ajout modifier et supprimer 

            et je passe par le controlleur pour l'appeler tu voit le procedé
        */
        require_once(ROOT. 'core/connection.php'); // j'effecture la connection la base de donée .
        require_once(ROOT . 'controlleur/'. $_GET['p']. '.php'); // je recupere la page que je veut 
    }
    else
    {   
        // cette partie ne s'xecute qu'en ligne ...
        require_once(ROOT. 'core/connection.php');

        $_SESSION['infos']['connection'] = "noudrahame97@gmail.com";

        require_once(ROOT . 'vues/index.php');
    }
?>