<?php 

    session_unset();
    session_destroy();
    header('location : .'); // pour nous amener la page de connection genre formualire d'inscriiption ..
?>