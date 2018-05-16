<main>
  <h2>Create clients</h2>
  <form action="<?= URL ?>Hospital/createSaveClient" method="post">

    <p>Firstname</p>
    <input required type="text" name="owners_firstname">

    <p>Lastname</p>
    <input required type="text" name="owners_lastname">

    <p>Phone number</p>
    <input required type="number" name="phone">

    <p>E-mail</p>
    <input required type="text" name="email"><br>

    <input type="submit" value="Submit">
  </form>

  <h2>Create patient</h2>
  <form action="<?= URL ?>Hospital/createSavePatient" method="post">

    <p>Name of the pet</p>
    <input required type="text" name="pet_name">

    <p>Name of the owner</p>
    <select required name="client">
      <?php foreach ($clients as $client) { ?>
        <option value="<?= $client['client_id'] ?>"><?= $client['client_firstname'] . "&nbsp;" . $client['client_lastname'] ?></option>
      <?php } ?>
    </select>

    <p>Gender of the pet</p>
    <input type="radio" name="gender" value="1" checked><span>Male</span><br>
    <input type="radio" name="gender" value="2"><span>Female</span>

    <p>specie</p>
    <select required name="specie">
      <?php foreach ($species as $specie) { ?>
        <option value="<?= $specie['species_id'] ?>"><?= $specie['species_description'] ?></option>
      <?php } ?>
    </select>
    <p><a href="<?= URL ?>Hospital/createSpeciePage">+ add specie</a></p>

    <p>Status</p>
    <textarea required name="message" rows="10" cols="50" placeholder="piepen, blaffen etc."></textarea><br>

    <input type="submit" value="Submit">
  </form>
</main>
