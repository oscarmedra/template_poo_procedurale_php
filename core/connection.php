<?php
    // comme tu le sais cette partie est reserver pour la connection
    try
    {
        $bd = new PDO('mysql:host=' . HOST . ';dbname=' .DB_NAME , USER, PASS);
    }
    catch (PDOException $e)
    {
        $errors['message'] = $e->getmessage();
    }

    // c'est içi qu'oi doit definir tout nos variable de session ...
    session_start();

    $_SESSION['infos']['connection'] = 'noudrahame97@gmail.com';
    $_SESSION['infos']['prenom'] = 'nouha';
    $_SESSION['infos']['connection'] = 'drame';

    //ce sont des exemple je sais pas si tu comprend ..

?>