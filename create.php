<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameSpark</title>
</head>
<body>
    <?php require __DIR__ . '/../header.php'; ?>
    <form action="../../app/Http/Controllers/meldingenController.php" method="post">
    <input type="hidden" name="action" value="create">
    <div class="form-group">
        <label for="naam">Naam</label>
        <input type="text" id="naam" name="naam" required>

    </div>
    
    <div class="form-group">
       <label for="platform">Platform</label>
         <select id="platform" name="platform" required>
              <option value="pc">PC</option>
             <option value="playstation">Playstation</option>
             <option value="nintendo">Nintendo</option>
             <option value="xbox">Xbox</option>
         </select>
    </div>
    
    
    <div class="form-group">
       <label for="genre">Genre</label>
         <select id="genre" name="genre" required>
              <option value="actie">Actie</option>
             <option value="avontuur">Avontuur</option>
             <option value="puzzel">Puzzel</option>
             <option value="rpg">RPG</option>
             <option value="first_person_shooter">First-person shooter</option>
             <option value="third_person_shooter">Third-person shooter</option>
             <option value="vechten">Vechten</option>
             <option value="indie">Indie</option>
             <option value="horror">Horror</option>
             <option value="survival">Survival</option>
         </select>
    </div>

  <div class="form-group">
        <label for="release_date">Release date</label>
        <input type="release_date" id="release_date" name="release_date" required>
  </div>
 

    <div class="form-group">
       <label for="status">Status</label>
         <select id="status" name="status" required>
              <option value="in_bezit">In bezit</option>
             <option value="uitgespeeld">Uitgespeeld</option>
             <option value="speelt_nu">Speelt nu</option>
             <option value="wishlist">Wishlist</option>
         </select>
    </div>
           

    <div class="form-group">
       <label for="beoordeling">Beoordeling</label>
         <select id="beoordeling" name="beoordeling" required>
             <option value=""----></option>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
             <option value="4">4</option>
             <option value="5">5</option>
         </select>
     </div>    
   
     <div class="melding"><button type="submit">Add game</button>
</body>
</html>