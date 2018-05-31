<?php
try
{
    $bdd = new PDO("mysql:host=localhost:8889;dbname=database_music", 'root', 'root');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>
