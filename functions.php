<?php

function generatePassword($characterNumber) {
    $passwordCharacters = $_GET['passwordCharacters'];

    // array con tutti i simboli
    $characters = range('A', 'z');

    // generare una lista di N caratteri presi casualmente dall'array appena creato
    
    $generatedPassword = "";

    for($i = 0; $i < $characterNumber; $i++) {

        // sto facendo N iterazioni
        $generatedPassword .= $characters[ rand(0, count($characters) - 1) ];
        
    }

    return $generatedPassword;
}