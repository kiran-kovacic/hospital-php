<main>
  <h2>Species</h2>
  <table id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th onclick="sortTable(0)">Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($species as $specie) {
     ?>
     <tr>
       <td><?= $specie['species_id'] ?></td>
       <td><?= $specie['species_description'] ?></td>
       <td class="center"><a href="<?= URL ?>Hospital/editSpeciesPage/<?= $specie['species_id'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>Hospital/deleteSpecies/<?= $specie['species_id'] ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table>
</main>
