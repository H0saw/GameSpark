<?php
$bericht = 'Game toegevoegd aan bibliotheek' ; \

header('Location: ../../public_html/meldingen/index.php?bericht=' . $bericht);
exit;

?>

<?php

if (isset($_GET['bericht'])) {
    echo '<p>' . htmlspecialchars($_GET['bericht']) . '</p>';
}

?>

<?php

<?php require_once '../../app/conn.php'; ?>

$query = 'SELECT * FROM meldingen ORDER BY gemeld_op DESC';
$statement = $conn->prepare($query);
$statement->execute();
$meldingen = $statement->fetchAll();

<table>
  <thead>
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Platform</th>
      <th scope="col">Genre</th>
      <th scope="col">Release date</th>
      <th scope="col">Status</th>
      <th scope="col">Beoordeling</th>
      <th scope="col">Datum van toevoeging</th>
      <th scope="col">Acties</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($meldingen as $melding): ?>
      <tr>
         <td><?= htmlspecialchars($melding['naam'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><?= htmlspecialchars($melding['platform'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><?= htmlspecialchars($melding['genre'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><?= htmlspecialchars($melding['release_date'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><?= htmlspecialchars($melding['status'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><?= htmlspecialchars($melding['beoordeling'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><?= htmlspecialchars($melding['datum_van_toevoeging'], ENT_QUOTES, 'UTF-8') ?></td>
         <td><a href="edit.php?id=<?= $melding['id'] ?>">Aanpassen</a></td>
      </tr>
      
  <?php endforeach; ?>
  </tbody>
</table>

<?php if ($meldingen === []): ?>
  <p>Game is nog niet toegevoegd.</p>
<?php else: ?>
  <!-- tabel -->
<?php endif; ?>

<?php if (($_GET['msg'] ?? '') === 'opgeslagen'): ?>
  <p style="padding: .75rem; background: rgb(81, 96, 96); color: rgb(100, 83, 94);">Opgeslagen.</p>
<?php elseif (($_GET['msg'] ?? '') === 'aangepast'): ?>
  <p style="padding: .75rem; background: rgb(87, 96, 96);; color: rgb(100, 83, 94);;">Aangepast.</p>
<?php endif; ?>