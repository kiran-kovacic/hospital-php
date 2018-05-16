<main>
  <h2>Edit patient</h2>
  <form action="<?= URL ?>Hospital/editPatients/<?= $patient['patient_id'] ?>" method="post">

    <p>Name of the pet</p>
    <input required type="text" name="pet_name" value="<?= $patient['patient_name'] ?>">

    <p>Name of the owner</p>
    <select required name="client_id">
      <?php foreach ($clients as $client) { ?>
        <option value="<?= $client['client_id'] ?>"><?= $client['client_firstname'] . "&nbsp;" . $client['client_lastname'] ?></option>
      <?php } ?>
    </select>

    <p>Gender of the pet</p>
    <input type="radio" name="gender_id" value="1"><span>Male</span><br>
    <input type="radio" name="gender_id" value="2"><span>Female</span>

    <p>specie</p>
    <select required name="specie_id">
      <?php foreach ($species as $specie) { ?>
        <option value="<?= $specie['species_id'] ?>"><?= $specie['species_description'] ?></option>
      <?php } ?>
    </select>
    <p>Status</p>
    <textarea required name="patient_status" rows="10" cols="50"><?= $patient['patient_status'] ?></textarea><br>

    <input type="submit" value="Submit">
  </form>
</main>
