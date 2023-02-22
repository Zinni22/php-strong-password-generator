<?php

// Creare un tot di caratteri utilizzabili per la scritta password
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&?';

// Creare una stringa vuota di partenza
$password = '' ;
$error = null;

// Per quante volte è la lunghezza inserita in input aggiungere un carattere casuale 
if (
    isset($_GET['lenght']) &&
    // funzione per verificare che sia un numero
    is_numeric($_GET['lenght'])
) {

    // trasformo la stringa in un numero
    $passwordLenght = intval($_GET['lenght']);

    if($passwordLenght < 8){
       $error = 'Valore minimo caratteri: 8';
    }
    else if($passwordLenght > 32){
        $error =  'Valore massimo caratteri: 32';
    }
    else{
        for($i = 0; $i < $passwordLenght; $i++){

        // prendo un numero random tra zero e la lunghezza
        $randomIndex = rand(0, strlen($characters) -1);
        // prendo l'iesimo contenuto che sta al posto del numero random
        $password .= $characters[$randomIndex];
        }

    var_dump($password);
    }
       
}
else{
    echo '<h3> Valore inserito non valido </h3>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>

    <!-- STYLE -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <main>

        <h1>
            PASSWORD GENERATOR
        </h1>

        <!-- FORM RICHIESTA PASSWORD -->
        <div class="form-container">

            <form action="" method="GET">

                <div>
                    <label for="password-lenght">
                        Inserisci la lunghezza della password
                    </label>
                
                    <input 
                        id="password-lenght"
                        type="number" 
                        name="lenght" 
                        placeholder="Lunghezza password"
                        min="8"
                        max="32"
                        required
                    >
                </div>

                <button type="submit">
                    Genera
                </button>

            </form>

        </div>
        
        <!-- MESSAGGI DI ERRORE VALIDAZIONE -->
        <div class="error-container">
            <?php
                if ($error !=null) {
            ?>
                <h2>
                    <?php echo $error; ?>
                </h2>

            <?php
                }
            ?>
        </div>

    </main>

</body>
</html>