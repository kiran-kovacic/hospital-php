<main>
  <h2>Edit clients</h2>
   <form action="<?= URL ?>Hospital/editClients/<?= $clients['client_id']?>" method="post">

     <p>Firstname</p>
     <input required type="text" name="owners_firstname" value="<?= $clients['client_firstname'] ?>">

     <p>Lastname</p>
     <input required type="text" name="owners_lastname" value="<?= $clients['client_lastname'] ?>">

     <p>Phone number</p>
     <input required type="number" name="phone" value="<?= $clients['client_phone'] ?>">

     <p>E-mail</p>
     <input required type="text" name="email" value="<?= $clients['client_email'] ?>"><br>

     <input type="submit" value="Submit">
   </form>
</main>
