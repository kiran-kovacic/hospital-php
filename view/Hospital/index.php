<main>
  <h2>Patiënts</h2>
  <table id="myTable">
    <thead>
      <tr>
        <th onclick="sortTable(0)">Name</th>
        <th onclick="sortTable(1)">Species</th>
        <th onclick="sortTable(2)">Gender</th>
        <th onclick="sortTable(3)">Status</th>
        <th onclick="sortTable(4)">Client</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($patients as $patient) {
     ?>
     <tr>
       <td><?= $patient['patient_name'] ?></td>
       <td><?= $patient['species_description'] ?></td>
       <td><?= $patient['gender_description'] ?></td>
       <td><?= $patient['patient_status'] ?></td>
       <td><?= $patient['client_firstname'] . " " . $patient['client_lastname'] ?></td>
       <td class="center"><a href="<?= URL ?>Hospital/editPatientPage/<?= $patient['patient_id'] ?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>Hospital/deletePatients/<?= $patient['patient_id'] ?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table>
</main>
