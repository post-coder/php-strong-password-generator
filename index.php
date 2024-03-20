<?php 

include './functions.php';

// preparo una variabile che conterrà il numero di caratteri (se indicato)
$passwordLength = null;

$containsNumbers = false;
if(isset($_GET['contains-numbers']) && $_GET['contains-numbers']) {
    $containsNumbers = true;
}

// il codice sopra lo posso riassumere con un ternario
$containsLetters = isset($_GET['contains-letters']) && $_GET['contains-letters'] ? true : false;
$containsSymbols = isset($_GET['contains-symbols']) && $_GET['contains-symbols'] ? true : false;
$uniCharacters = isset($_GET['uni-character']) && $_GET['uni-character'] ? true : false;

// controllo se è settato il parametro 
if (isset($_GET['passwordCharacters']) && $_GET['passwordCharacters'] != '' ) {



    $generatedPassword = generatePassword($_GET['passwordCharacters'], $containsNumbers, $containsLetters, $containsSymbols, $uniCharacters);

    // apriamo la sessione
    session_start();

    // creare la variabile di sessione
    $_SESSION['password'] = $generatedPassword;

    // effettuiamo il redirect
    header('Location: new-password.php');

    // sovrascrivo la variabile con il numero di caratteri
    $passwordLength = $_GET['passwordCharacters'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Strong Password Generator</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    
    <div class="container py-5">
        <?php
        if(isset($_GET['error'])) {

            if($_GET['error'] == 'no-options') {
                ?>
                <div class="alert alert-warning" role="alert">
                    Specifica almeno un tipo di carattere da includere.
                </div>
                <?php
            }

        }
        ?>

        <h1>Strong Password Generator</h1>

        <form class="mb-5">

            <div class="row row-cols-2 mb-4">
                <div class="col">

                    <label for="passwordCharacters">Numero di caratteri</label>
                    <input 
                        name="passwordCharacters" 
                        id="passwordCharacters" 
                        type="number" 
                        placeholder="N°"
                        min="6"
                        max="10"
                        value="<?php echo $passwordLength ?>"
                    >

                </div>

                <div class="col">

                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="contains-numbers" name="contains-numbers" autocomplete="off" value="true" <?php echo $containsNumbers ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary" for="contains-numbers">Comprendi numeri</label>

                    <input type="checkbox" class="btn-check" id="contains-letters" name="contains-letters" autocomplete="off" value="true" <?php echo $containsLetters ? 'checked' : '' ?> >
                    <label class="btn btn-outline-primary" for="contains-letters">Comprendi lettere</label>

                    <input type="checkbox" class="btn-check" id="contains-symbols" name="contains-symbols" autocomplete="off" value="true" <?php echo $containsSymbols ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary" for="contains-symbols">Comprendi simboli</label>

                    <input type="checkbox" class="btn-check" id="uni-character" name="uni-character" autocomplete="off" value="true" <?php echo $uniCharacters ? 'checked' : '' ?>>
                    <label class="btn btn-outline-primary" for="uni-character">Caretteri univoci</label>
                </div>

                </div>
            </div>
            

            <button class="btn btn-primary" type="submit">Genera</button>

        </form>

        
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>