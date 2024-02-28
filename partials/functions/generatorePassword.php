<?php

    function generaPassword($lunghezzaPassword, $letters , $numbers , $symbol, $consentiDuplicazione ){
        // nuova pass generata
        $newPassword = '';

        // prende tutte le stringhe rendendola una stringa
        $tuttiCaratteri = $letters . $numbers . $symbol;

        // ciclo, 
        while( strlen( $newPassword ) < $lunghezzaPassword ){

            // genera un n. in '$tuttiCaratteri'
            $indiceLettere = rand( 0, strlen( $tuttiCaratteri ) - 1 );

            // controllo della duplicazione
            // $consentiDuplicazione == true verifica se la condizione è consentita 
            // || oppure se non è presente un doppione
            if($consentiDuplicazione == true || !str_contains($newPassword, $tuttiCaratteri[$indiceLettere]) ){
                // viene creata la pass.
                $newPassword .= $tuttiCaratteri[$indiceLettere];
            }

        }

        // restituisce la pass
        return $newPassword;
    }
