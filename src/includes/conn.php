<?php
try
{
    $conn = new PDO('mysql:dbname=PartielPHP;host=127.0.0.1:8889;charset=UTF8', 'root', 'root');
}
catch (PDOException $e)
{
    echo 'Connexion échouée : '.$e->getMessage();
}