<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit('Ongeldig id.');
}

require_once __DIR__ . '/../../app/conn.php';

$query = 'SELECT * FROM meldingen WHERE id = :id';
$statement = $conn->prepare($query);
$statement->execute([':id' => $id]);

$melding = $statement->fetch();

if (!$melding) {
    http_response_code(404);
    exit('Melding mislukt');
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpark</title>
</head>
<body>
    
   <?php require __DIR__ . '/../header.php'; ?>

<h1>Aanpassen</h1>
<form action="../../app/Http/Controllers/gameController.php" method="post">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="id" value="<?= $id ?>">
    
    
    <div class="form-group">
        <label>Naam</label>
        <p><?= htmlspecialchars($melding['naam'], ENT_QUOTES, 'UTF-8') ?></p>

    </div>
    
    <div class="form-group">
       <label>Platform</label>
         <p><?= htmlspecialchars($melding['platform'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
    
    
    <div class="form-group">
       <label>Genre</label>
         <p><?= htmlspecialchars($melding['genre'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>

  <div class="form-group">
        <label>Release date</label>
        <p><?= htmlspecialchars($melding['release_date'], ENT_QUOTES, 'UTF-8') ?></p>
  </div>
 

    <div class="form-group">
       <label>Status</label>
         <p><?= htmlspecialchars($melding['status'], ENT_QUOTES, 'UTF-8') ?></p>
    </div>
           

    <div class="form-group">
       <label>Beoordeling</label>
         <p><?= htmlspecialchars($melding['beoordeling'], ENT_QUOTES, 'UTF-8') ?></p>
     </div>    
   
     <div class="melding"><button type="submit">Change game</button>
</body>
</html>