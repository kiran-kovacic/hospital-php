<?php

require(ROOT . "model/HospitalModel.php");

function index()
{
	$patients = getAllPatients();

	render("Hospital/index", array(
		'patients' => $patients)
	);
}

function clients()
{
	$clients = getAllClients();

	render("Hospital/clients", array(
		'clients' => $clients)
	);
}

function species()
{
	$species = getAllSpecies();

	render("Hospital/species", array(
		'species' => $species)
	);
}

function create()
{
	$species = getAllSpecies();
	$clients = getAllClients();

	render("Hospital/create", array(
		'species' => $species,
		'clients' => $clients)
	);
}

function createSaveClient()
{
	if (createClient()) {
		header("location:" . URL . "Hospital/create");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function createSavePatient()
{

	if (createPatient()) {
		header("location:" . URL . "Hospital/index");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function createSpeciePage()
{
	render("Hospital/createSpecie");
}

function createSpecies()
{
	if (createSpecie()) {
		header("location:" . URL . "Hospital/create");
		exit();
	} else {
		header("location:" . URL . "error/error_db");
		exit();
	}
}

function deleteClients($idC)
{
    if (deleteClient($idC)) {
        header("location:" . URL . "Hospital/clients");
        exit();
    } else {
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function deleteSpecies($idS)
{
    if (deleteSpecie($idS)) {
        header("location:" . URL . "Hospital/species");
        exit();
    } else {
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function deletePatients($idP)
{
    if (deletePatient($idP)) {
        header("location:" . URL . "hospital/index");
        exit();
    } else {
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function editClientsPage($idC)
{
    $clients = getClient($idC);
    render("Hospital/editClient" , array(
        'clients' => $clients,
    ));
}
function editClients($idC)
{
    if (editClient($idC)) {
        header("location:" . URL . "Hospital/clients");
        exit();
    } else {
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function editSpeciesPage($idS)
{
    $species = getSpecie($idS);
    render("hospital/editSpecie" , array(
        'species' => $species,
    ));
}
function editSpecies($idC)
{
    if (editspecie($idC)) {
        header("location:" . URL . "hospital/species");
        exit();
    } else {
        //er is iets fout gegaan..
        header("location:" . URL . "error/error_delete");
        exit();
    }
}

function editPatientPage($idP)
{
	$patient = getPatient($idP);
	$species = getAllSpecies();
	$clients = getAllClients();

	render("Hospital/editPatient", array(
		'patient' => $patient,
		'species' => $species,
		'clients' => $clients)
	);
}

function editPatients($idP)
{
    if (editPatient($idP)) {
        header("location:" . URL . "Hospital/index");
        exit();
    } else {
        //er is iets fout gegaan..
        header("location:" . URL . "error/error_delete");
        exit();
    }
}
