<?php

    // include il file 'generatorePassword.php' 
    include_once __DIR__ . '/partials/functions/generatorePassword.php';

    // stringhe
    $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $symbol = '!@#$%^&*()-_+=<>?';

    // verifica del 'get lunghezzaPassword'
    if(isset($_GET['lunghezzaPassword'])){

        // se avviene la verifica, recupera 'get lunghezzaPassword 'e 'get consentiDuplicazione'
        $lunghezzaPassword = $_GET['lunghezzaPassword'];
        $consentiDuplicazione = $_GET['consentiDuplicazione'];

        // chiama la funzione 'generaPassword'
        $response = generaPassword ($lunghezzaPassword, $letters , $numbers , $symbol, $consentiDuplicazione);
    }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width =device-width, initial-scale=1.0">
    <title>Strong Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- 
    Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore
    di password (abbastanza) sicure.
    L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

    Milestone 1
    Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà 
    questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
    Scriviamo tutto (logica e layout) in un unico file index.php

    Milestone 2
    Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file 
    functions.php che includeremo poi nella pagina principale


    Milestone 3 (BONUS)
    Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata
    che tramite $_SESSION recupererà la password da mostrare all’utente.

    Milestone 4 (BONUS)
    Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e 
    simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati
    fra loro (es. numeri e simboli, oppure tutti e tre insieme).
    Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
    -->

</head>
<body>
    <div class="container">

        <div class="text-center my-4">
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura</h2>
        </div>


        <form action="index.php" method="get">
            <div class="bg-secondary p-3 d-flex justify-content-between">
                <div>
                    <p>Lunghezza password:</p>
                    <p>Consenti ripetizioni di uno o più caratteri:</p> <br><br>

                    <button class="btn btn-primary" type="submit">Invia</button>
                    <button class="btn btn-dark">Annulla</button>

                    <p class="mt-4">
                        <!-- la password -->
                        La tua password è: <?= $response;  ?>
                    </p>
                </div>

                <div>
                    <input class="bg-secondary" type="number" name="lunghezzaPassword" min="0" max="100"> <br><br>
                
                    <input  class="form-check-input" type="radio" name="consentiDuplicazione" checked>
                    <label for="si">
                        Si
                    </label>

                    <input  class="form-check-input" type="radio" name="consentiDuplicazione">
                    <label for="no">
                        No
                    </label>
                </div>
            </div>
        </form>

    </div>
</body>
</html>