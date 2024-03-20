<?php

function generatePassword($characterNumber, $containsNumbers, $containsLetters, $containsSymbols, $uniCharacters) {

    // array con tutti i simboli
    // $characters = range('A', 'z');
    
    $letters = [...range('A', 'Z'), ...range('a', 'z')];
    $numbers = range(0,9);
    $symbols = ["!", "@", "#", "$", "%", "&", "*", "?", "+", "-", "=", "/", "[", "]", "{", "}", "(", ")", "^", "~"];

    
    // in base ai valori delle flag $containsNumbers, $containsLetters, $containsSymbols
    // unisco gli array tra di loro

    $characters = [];
    
    if($containsNumbers) {
        $characters = array_merge($characters, $numbers);
    }

    if($containsLetters) {
        $characters = array_merge($characters, $letters);
    }

    if($containsSymbols) {
        $characters = array_merge($characters, $symbols);
    }

    // controllo che sia stata selezionata almeno un'opzione
    if(!($containsNumbers && $containsLetters && $containsSymbols)) {
        // se tutti sono false
        header("Location: index.php?error=no-options");
    }

    
    // var_dump($characters);    
    
    // generare una lista di N caratteri presi casualmente dall'array appena creato
    $generatedPassword = "";

    while(strlen($generatedPassword) < $characterNumber) {

        if($uniCharacters) {
            // se è richiesto che ci siano caratteri univoci, faccio un controllo prima di inserire il carattere
            // se è già presente, non lo inserisco
            
            // genero carattere casuale
            $randomChar = $characters[rand(0, count($characters) - 1)];

            // controllo se il carattere casuale è già presente
            if(!str_contains($generatedPassword, $randomChar)) {
                $generatedPassword .= $randomChar;
            }
        } else {
            $randomChar = $characters[rand(0, count($characters) - 1)];

            $generatedPassword .= $randomChar;
        }
        

        
    }

    return $generatedPassword;
}
