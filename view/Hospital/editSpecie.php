<main>
  <h2>Edit specie</h2>
  <form action="<?= URL ?>Hospital/editSpecies/<?= $species['species_id'] ?>" method="post">
    <input type="text" name="species_description" value="<?= $species['species_description'] ?>">
    <input type="submit" name="" value="Submit">
  </form>
</main>
