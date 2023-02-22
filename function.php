<?php

function generatePassword($lenght){

    // Creare un tot di caratteri utilizzabili per la scritta password
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&?';

    $password = '' ;

    for($i = 0; $i < $lenght; $i++){

        // prendo un numero random tra zero e la lunghezza
        $randomIndex = rand(0, strlen($characters) -1);
        // prendo l'iesimo contenuto che sta al posto del numero random
        $password .= $characters[$randomIndex];
    }

    return $password;

};

?>