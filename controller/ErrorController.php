<?php

function error_404()
{
	echo "404 - De gevraagde route is niet beschikbaar. Controleer je controller en action naam";
}

function error_db()
{
	echo "Er iets verkeerd gegaan met je query, zoek het uit!";
}

function error_delete()
{
	echo "Het liedje weigert verwijderd te worden!";
}