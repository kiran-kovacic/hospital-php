<?php
function getAllPatients()
{
  $db = openDatabaseConnection();

  $sql = "SELECT * FROM `patients`
          INNER JOIN clients ON patients.client_id = clients.client_id
          INNER JOIN species ON patients.species_id = species.species_id
          INNER JOIN gender ON patients.gender_id = gender.gender_id";

  $query = $db->prepare($sql);
  $query->execute();

  $db = null;

  return $query->fetchAll();
}

function getPatient($idP)
{
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `patients` WHERE patient_id = :idP LIMIT 1";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":idP" => $idP
    ));

    $db = null;

    return $query->fetch();
}

function getAllClients()
{
  $db = openDatabaseConnection();

  $sql = "SELECT * FROM `clients`";

  $query = $db->prepare($sql);
  $query->execute();

  $db = null;

  return $query->fetchAll();
}

function getClient($idC)
{
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `clients` WHERE client_id = :idC LIMIT 1";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":idC" => $idC
    ));

    $db = null;

    return $query->fetch();
}

function getAllSpecies()
{
  $db = openDatabaseConnection();

  $sql = "SELECT * FROM `species`";

  $query = $db->prepare($sql);
  $query->execute();

  $db = null;

  return $query->fetchAll();
}

function getSpecie($idS)
{
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM `species` WHERE species_id = :idS LIMIT 1";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":idS" => $idS
    ));

    $db = null;

    return $query->fetch();
}

function createClient()
{
    $firstname = ucwords($_POST["owners_firstname"]);
    $lastname = ucwords($_POST["owners_lastname"]);
    $client_firstname = isset($firstname) ? $firstname : null;
    $client_lastname = isset($lastname) ? $lastname : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;
    if ($client_firstname === null || $client_lastname === null || $phone === null || $email === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "INSERT INTO `clients` (`client_firstname`, `client_lastname`, `client_phone`, `client_Email`)
    VALUES (:client_firstname, :client_lastname, :phone, :email)";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":client_firstname" => $client_firstname,
        ":client_lastname" => $client_lastname,
        ":phone" => $phone,
        ":email" => $email,
    ));
    $db = null;
    return true;
}
function createSpecie()
{
    $Name = ucwords($_POST["specie"]);
    $species = isset($Name) ? $Name : null;
    if ($species === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "INSERT INTO `species` (`species_description`)
    VALUES (:species)";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":species" => $species
    ));
    $db = null;
    return true;
}
function createPatient()
{
    $petName = ucwords($_POST["pet_name"]);
    $patient_name = isset($petName) ? $petName : null;
    $client = isset($_POST["client"]) ? $_POST["client"] : null;
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : null;
    $specie = isset($_POST["specie"]) ? $_POST["specie"] : null;
    $message = isset($_POST["message"]) ? $_POST["message"] : null;
    if ($patient_name === null || $client === null || $gender === null || $specie === null || $message === null) {
        return false;
        exit();
    }
    $db = openDatabaseConnection();
    $sql = "INSERT INTO `patients` (`patient_name`, `gender_id`, `species_id`, `client_id`, `patient_status`)
    VALUES (:patient_name, :gender, :specie, :client, :message)";
    $query = $db->prepare($sql);
    $query->execute(array(
        ":patient_name" => $patient_name,
        ":client" => $client,
        ":gender" => $gender,
        ":specie" => $specie,
        ":message" => $message,
    ));
    $db = null;
    return true;
}

function deleteClient($idC)
{
    if ($idC === '') {
        return false;
        exit();
    }

    $db = openDatabaseConnection();

    $sql = "DELETE FROM `clients` WHERE client_id = :idC";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":idC" => $idC
    ));

    $db = null;

    return true;
}

function deleteSpecie($idS)
{
    if ($idS === '') {
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "DELETE FROM `species` WHERE species_id = :idS";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":idS" => $idS
    ));

    $db = null;

    return true;
}

function deletePatient($idP)
{
    if ($idP === '') {
        return false;
    }

    $db = openDatabaseConnection();

    $sql = "DELETE FROM `patients` WHERE patient_id = :idP";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":idP" => $idP
    ));

    $db = null;

    return true;
}

function editClient($idC)
{
    $firstname = ucwords($_POST["owners_firstname"]);
    $lastname = ucwords($_POST["owners_lastname"]);
    $client_firstname = isset($firstname) ? $firstname : null;
    $client_lastname = isset($lastname) ? $lastname : null;
    $phone = isset($_POST["phone"]) ? $_POST["phone"] : null;
    $email = isset($_POST["email"]) ? $_POST["email"] : null;

    if ($client_firstname === null || $client_lastname === null || $phone === null || $email === null) {
      return false;
      exit();
  }

    $db = openDatabaseConnection();

    $sql = "UPDATE `clients`
        SET client_firstname = :client_firstname, client_lastname = :client_lastname, client_phone = :phone, client_email = :email
        WHERE client_id = :idC";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":client_firstname" => $client_firstname,
        ":client_lastname" => $client_lastname,
        ":phone" => $phone,
        ":email" => $email,
        ":idC" => $idC,
    ));

    $db = null;
    return true;
}

function editSpecie($idS)
{
    $species_description = isset($_POST["species_description"]) ? $_POST["species_description"] : null;

    if ($species_description === null) {
      return false;
      exit();
  }

    $db = openDatabaseConnection();

    $sql = "UPDATE `species`
        SET species_description = :species_description
        WHERE species_id = :idS";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":species_description" => $species_description,
        ":idS" => $idS,
    ));

    $db = null;
    return true;
}

function editPatient($idP)
{
    $petName = ucwords($_POST["pet_name"]);
    $patient_name = isset($petName) ? $petName : null;
    $client_id = isset($_POST["client_id"]) ? $_POST["client_id"] : null;
    $gender_id = isset($_POST["gender_id"]) ? $_POST["gender_id"] : null;
    $species_id = isset($_POST["specie_id"]) ? $_POST["specie_id"] : null;
    $patient_status = isset($_POST["patient_status"]) ? $_POST["patient_status"] : null;

    if ($patient_name === null || $client_id === null || $gender_id === null || $species_id === null || $patient_status === null) {
      return false;
      exit();
    }

    $db = openDatabaseConnection();

    $sql = "UPDATE `patients`
        SET patient_name = :patient_name, client_id = :client_id, gender_id = :gender_id, species_id = :species_id, patient_status = :patient_status
        WHERE patient_id = :idP";

    $query = $db->prepare($sql);
    $query->execute(array(
        ":patient_name" => $patient_name,
        ":client_id" => $client_id,
        ":gender_id" => $gender_id,
        ":species_id" => $species_id,
        ":patient_status" => $patient_status,
        ":idP" => $idP,
    ));

    $db = null;
    return true;
}
