<?php
    require_once __DIR__ . '/../../conn.php' ;

      $naam = trim($_POST['naam'] ?? ' ' );
      $release_date = trim($_POST['release_date'] ?? ' ' );
      

      echo ' Naam: ' . htmlspecialchars($naam) ;
      echo ' Release date: ' . htmlspecialchars($release_date) ;
     
  
     $toegestaneTypes = ['pc', 'playstation', 'nintendo', 'xbox'];
     $platform = $_POST['platform'] ?? ' ' ;  
     
     $toegestaneTypes = ['actie', 'avontuur', 'puzzel','rpg', 'first_person_shooter', 'third_person_shooter', 'vechten', 'indie', 'horror', 'survival'];
     $genre = $_POST['genre'] ?? ' ' ;

     $toegestaneTypes = ['in_bezit', 'uitgespeeld', 'speelt_nu','wishlist',];
     $status = $_POST['status'] ?? ' ' ;

     $toegestaneTypes = ['1', '2', '3','4', '5'];
     $beoordeling = $_POST['beoordeling'] ?? ' ' ;

     

    
     if (!in_array($platform,  $toegestaneTypes , true)) {
         $errors[ ] = 'Kies je platform' ;
     }

    if (!in_array($genre,  $toegestaneTypes , true)) {
         $errors[ ] = 'Kies een genre' ;
     }

     if (!in_array($status,  $toegestaneTypes , true)) {
         $errors[ ] = 'Kies de status van de game' ;
     }

     if (!in_array($beoordeling,  $toegestaneTypes , true)) {
         $errors[ ] = 'Hoeveel sterren geef je deze game?' ;
     }

     $errors = [ ] ;

     if ($attractie === ' ') {
         $errors[ ] = 'Vul a.u.b een attractie in' ;
     }
 
     if ($capaciteit === ' ') {
         $errors[ ] = 'Vul a.u.b de capaciteit in' ;
     }
     
     if ($melder === ' ') {
         $errors[ ] = 'Vul a.u.b uw naam in' ;
     }
     
     if ($errors !== [ ]) {
         http_response_code(422) ;
         echo '<h1>Controleer het formulier nog</h1><ul>' ;

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
    $query = "INSERT INTO meldingen (attractie, capaciteit, melder, type, prioriteit, overig) VALUES ( :attractie,  :capaciteit, :melder, :type, :prioriteit, :overig)" ;

    $statement = $conn->prepare($query) ;

    $statement->execute([
        ":attractie" => $attractie,
        ":capaciteit" => $capaciteit,
        ":melder" => $melder,
        ":type" => $type,
        ":prioriteit" => $prioriteit,
        ":overig" => $overig,  
    ]);
}