<?php 

// accediamo alla sessione
session_start();

if (!isset($_SESSION['password'])) {
    header("Location: index.php");
}


// se la password non è stata creata, portiamo l'utente alla index per crearla
$generatedPassword = $_SESSION['password'];


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
        <h1 class="mb-4">Your new password 💪🏻</h1>

        

        <div class="mb-5 text-center bg-danger text-white p-4 border-2 border border-dark rounded-4">
            <h2 class="mb-4">Password generata:</h2>

            <pre><?php echo $generatedPassword ?></pre>
        </div>

        <a href="./index.php" class="btn btn-primary">Torna indietro</a>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>