<main>
  <h2>Patiënts</h2>
  <table id="myTable">
    <thead>
      <tr>
        <th onclick="sortTable(0)">Firstname</th>
        <th onclick="sortTable(1)">Lastname</th>
        <th onclick="sortTable(2)">Phone</th>
        <th onclick="sortTable(3)">Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($clients as $client) {
     ?>
     <tr>
       <td><?= $client['client_firstname'] ?></td>
       <td><?= $client['client_lastname'] ?></td>
       <td><?= $client['client_phone'] ?></td>
       <td><?= $client['client_email'] ?></td>
       <td class="center"><a href="<?= URL ?>Hospital/editClientsPage/<?= $client['client_id']?>">edit</a></td>
       <td class="center"><a href="<?= URL ?>Hospital/deleteClients/<?= $client['client_id']?>">delete</a></td>
     </tr>
    <?php } ?>
    </tbody>
  </table>
</main>
