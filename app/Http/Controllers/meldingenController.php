<?php
    require_once __DIR__ . '/../../conn.php' ;

      $naam = trim($_POST['naam'] ?? ' ' );
      $release_date = trim($_POST['release_date'] ?? ' ' );
      

      echo ' Naam: ' . htmlspecialchars($naam) ;
      echo ' Release date: ' . htmlspecialchars($release_date) ;
      
      
     $toegestanePlatforms = ['pc', 'playstation', 'nintendo', 'xbox'];
     $platform = $_POST['platform'] ?? ' ' ;  
     
     $toegestaneGenres = ['actie', 'avontuur', 'puzzel','rpg', 'first-person shooter', 'third-person shooter', 'vechten', 'indie', 'sport', 'horror', 'survival'];
     $genre = $_POST['genre'] ?? ' ' ;

     $toegestaneStatus = ['in_bezit', 'uitgespeeld', 'speelt_nu','wishlist',];
     $status = $_POST['status'] ?? ' ' ;

     $toegestaneBeoordelingen = ['1', '2', '3','4', '5'];
     $beoordeling = $_POST['beoordeling'] ?? ' ' ;

     
     echo ' Platform: ' . htmlspecialchars($platform) ;
     echo ' Genre: ' . htmlspecialchars($genre) ;
     echo ' Status: ' . htmlspecialchars($status) ;
     echo ' Beoordeling: ' . htmlspecialchars($beoordeling) ;
     
     
     
     
     $errors = [ ] ;

    
     if (!in_array($platform,  $toegestanePlatforms , true)) {
         $errors[ ] = 'Kies je platform' ;
     }

    if (!in_array($genre,  $toegestaneGenres , true)) {
         $errors[ ] = 'Kies een genre' ;
     }

     if (!in_array($status,  $toegestaneStatus , true)) {
         $errors[ ] = 'Kies de status van de game' ;
     }

     if (!in_array($beoordeling,  $toegestaneBeoordelingen , true)) {
         $errors[ ] = 'Hoeveel sterren geef je deze game?' ;
     }

     
     if ($errors !== [ ]) {
         http_response_code(422) ;
         echo '<h1>Controleer de gegevens</h1><ul>' ;

         foreach ($errors as $error) {
               echo '<li>' . htmlspecialchars($error) . '</li>' ;

         }
         echo '</ul>' ;
         exit;


     }


if ($_SERVER[ 'REQUEST_METHOD' ] !== 'POST') {
    http_response_code(405) ; 
    exit( ' Deze pagina accepteert alleen POST-requests') ;

}

if ($errors === []) {
    $query = "INSERT INTO `game data` (naam, platform, genre, `release date`, status, beoordeling) VALUES ( :naam, :platform, :genre, :release_date, :status, :beoordeling)" ;

    $statement = $conn->prepare($query) ;

    $statement->execute([
        ":naam" => $naam,
        ":platform" => $platform,
        ":genre" => $genre,
        ":release_date" => $release_date,
        ":status" => $status,
        ":beoordeling" => $beoordeling,  
    ]);
}