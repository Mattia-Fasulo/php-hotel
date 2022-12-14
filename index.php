<?php

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



if (isset($_GET['parking']) && !empty($_GET['parking'])) {
    if ($_GET['parking'] == 'true') {
        $hotels = array_filter($hotels, fn ($value) => $value['parking']);
    } else {
        $hotels = array_filter($hotels, fn ($value) => !$value['parking']);
    };
};
if (isset($_GET['vote']) && !empty($_GET['vote'])) {
    $hotels = array_filter($hotels, fn ($value) => $value['vote'] >= $_GET['vote']);
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700;800&display=swap" rel="stylesheet">
    <!-- bootstrp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- my style -->
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Hotel</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <form class="d-flex mt-5" action="index.php">
                <select name="parking" id="parking" class="form-select w-25 bg-black text-white">
                    <option value="" selected>Parking</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
                <select name="vote" id="vote" class="form-select w-25 bg-black text-white mx-3">
                    <option value="" selected>Vote</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit" class="btn btn-dark">Search</button>
            </form>
            <table class="table table-dark mt-5">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($hotels as $hotel) { ?>
                        <tr>
                            <th scope="row"><?php echo $hotel['name'] ?></th>
                            <td><?php echo $hotel['description'] ?></td>
                            <td><?php echo $hotel['parking'] ?></td>
                            <td><?php echo $hotel['vote'] ?></td>
                            <td><?php echo $hotel['distance_to_center'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>