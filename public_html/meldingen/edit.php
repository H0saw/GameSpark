<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    http_response_code(404);
    exit('Ongeldig id.');
}

require_once __DIR__ . '/../../app/conn.php';

$query = 'SELECT * FROM `game data` WHERE id = :id';
$statement = $conn->prepare($query);
$statement->execute([':id' => $id]);

$melding = $statement->fetch();

if (!$melding) {
    http_response_code(404);
    exit('Game niet opgeslagen');
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
<form action="../../app/Http/Controllers/meldingenController.php" method="post">
    <input type="hidden" name="action" value="update">
    <input type="hidden" name="id" value="">
    <input type="hidden" name="id" value="<?= $id ?>">
    
    
    <div class="form-group">
        <label>Naam</label>
        <p><?= htmlspecialchars($melding['naam'], ENT_QUOTES, 'UTF-8') ?></p>

    </div>
    
    <div class="form-group">
       <label for="platform">Platform</label>
            <select id="platform" name="platform" required>
                <?php
                if ($melding['platform']) {
                    ?>
                        <option value="<?php echo $melding['platform']; ?>" selected><?php echo ucfirst($melding['platform']); ?></option>
                    <?php
                } else {
                    ?>
                    <option value="" >-- Selecteer een platform --</option>
                    <?php
                }
                ?>
             
             
             <!-- De label is alleen wat op de formulier voorschijnt, wat tussen haakjes staat is wat wordt voorgegeven in de database, typ het dus ook met een hoofdletter -->
             <option value=""></option>
             <option value="PC">PC</option>
             <option value="Playstation">Playstation</option>
             <option value="Nintendo">Nintendo</option>
             <option value="Xbox">Xbox</option>
         </select>
    </div>
    
    
    
    <div class="form-group">
       <label for="genre">Genre</label>
            <select id="genre" name="genre" required>
                <?php
                if ($melding['genre']) {
                    ?>
                        <option value="<?php echo $melding['genre']; ?>" selected><?php echo ucfirst($melding['genre']); ?></option>
                    <?php
                } else {
                    ?>
                    <option value="" >-- Selecteer een genre --</option>
                    <?php
                }
                ?>
             <option value=""></option>
             <option value="Actie">Actie</option>
             <option value="Avontuur">Avontuur</option>
             <option value="Puzzel">Puzzel</option>
             <option value="RPG">RPG</option>
             <option value="First-person shooter">First-person shooter</option>
             <option value="Third-person shooter">Third-person shooter</option>
             <option value="Vechten">Vechten</option>
             <option value="Indie">Indie</option>
             <option value="Horror">Horror</option>
             <option value="Survival">Survival</option>
         </select>
 </div>

  <div class="form-group">
        <label for="release_date">Release date</label>
        <?= htmlspecialchars($melding['release_date'], ENT_QUOTES, 'UTF-8') ?>
  </div>
 

    <div class="form-group">
       <label for="platform">Status</label>
            <select id="status" name="status" required>
                <?php
                if ($melding['status']) {
                    ?>
                        <option value="<?php echo $melding['status']; ?>" selected><?php echo ucfirst($melding['status']); ?></option>
                    <?php
                } else {
                    ?>
                    <option value="" >-- Selecteer de huidige status --</option>
                    <?php
                }
                ?>
            <option value=""></option>
             <option value="In bezit">In bezit</option>
             <option value="Uitgespeeld">Uitgespeeld</option>
             <option value="Speelt nu">Speelt nu</option>
             <option value="Wishlist">Wishlist</option>
         </select>
     </div>
           

    <div class="form-group">
       <label for="platform">Beoordeling</label>
            <select id="beoordeling" name="beoordeling" required>
                <?php
                if ($melding['beoordeling']) {
                    ?>
                        <option value="<?php echo $melding['beoordeling']; ?>" selected><?php echo ucfirst($melding['beoordeling']); ?></option>
                    <?php
                } else {
                    ?>
                    <option value="" >-- Geef je spel een aantal sterren --</option>
                    <?php
                }
                ?>
          <option value=""></option>
             <option value="1">&#9734;</option>
             <option value="2">&#9734;&#9734;</option>
             <option value="3">&#9734;&#9734;&#9734;</option>
             <option value="4">&#9734;&#9734;&#9734;&#9734;</option>
             <option value="5">&#9734;&#9734;&#9734;&#9734;&#9734;</option>
         </select>  
 </div>    
   
     <div class="melding"><button type="submit"></button>
</body>
</html>