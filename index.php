<?php

// Definizione di un array di hotel con le relative informazioni
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<title>PHP Hotel</title>

<body>

<div class="container mt-5">
    <div class="title">
        <h1>Lista di Hotel</h1>
    </div>

    <!-- Form per filtrare gli hotel -->

    
    <form action="index.php" method="GET" class="mt-5">
        <div class="form-check m-3">
            <h5>Filtra gli hotel </h5>
            <div>
                <!--hotel con parcheggio -->
                <input class="form-check-input" type="checkbox" name="parking" id="parking" value="true">
                <label class="form-check-label" for="parking">
                    Mostra solo hotel con parcheggio
                </label>
            </div>
            <div>
                <!--hotel con voto maggiore di 3 -->
                <input class="form-check-input ms-5" type="checkbox" name="vote" id="vote" value="true">
                <label class="form-check-label" for="vote">
                    Hotel con 3 stelle in sù
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary m-3">Filtra</button>
    </form>

    <!-- Tabella -->
    <table class="table table-bordered border-primary">
        <thead>
            <!-- Intestazione della tabella -->
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Distanza dal centro</th>
                <th scope="col">Voto</th>
            </tr>
        </thead>

        <!-- Corpo della tabella -->
        <tbody>
            <?php
            // Cicla attraverso l'array $hotels per generare le righe della tabella
            foreach ($hotels as $hotel) {

                //  hotel senza parcheggio se il checkbox "parcheggio" è selezionato
                if (isset($_GET['parking']) && $_GET['parking'] == 'true' && !$hotel["parking"]) {
                    continue; // Salta questo hotel
                }
                //hotel con voto <= 3 se il checkbox "voto" è selezionato
                if (isset($_GET['vote']) && $_GET['vote'] == 'true' && $hotel["vote"] <= 3) {
                    continue; // Salta questo hotel
                }
            ?>
                <tr>

                    <th scope="row"><?php echo $hotel["name"]; ?></th>

                    <td><?php echo $hotel["description"]; ?></td>

                    <td>
                        <?php
                        // Controlla se l'hotel ha il parcheggio
                        if ($hotel["parking"] === true) {
                            echo "Disponibile";
                        } else {
                            echo "Non disponibile";
                        }
                        ?>
                    </td>

                    <td><?php echo $hotel["distance_to_center"]; ?> km</td>

                    <td><?php echo $hotel["vote"]; ?></td>
                </tr>
            <?php }  ?>
        </tbody>
    </table>
    </div>

    <!-- Inclusione dei file JavaScript di Bootstrap e delle sue dipendenze -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>