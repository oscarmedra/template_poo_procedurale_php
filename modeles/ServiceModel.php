<?php
    class Message extends ServiceModel{
        var $table = 'message';
    }

    /*
        si j'ai une autre table je vais tout simplement faire 

        class Message extends ServiceModel{ 
        {
            var $table = 'user';
        }

        class Cours = extends ServiceModel
        {
            var $table = 'cours';
        }



        **** le service model correpond a celle qui se trouve dans core ***

        $cours = new Cours();
        $user = new User();

        => get recupere tout les element
        => add ajoute un element
        =>delete supprime un element
        =>edit modifie un element .

    */

    $message = new Message(); // pour l'instant nous n'avons que message 
?>