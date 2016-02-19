<?php

include "./includes/conn.php";

function question1(string $nom, string $identite_secrete, int $id_super_pouvoir)//:bool
{
    // >>> Require $conn comme connexion PDO avec la DB.
    try
    {
        $sql = "INSERT
        INTO `super_hero`
        (`nom`,
         `identite_secrete`,
         `id_super_pouvoir`)
        VALUES
        ( :nom,
         :identite_secrete,
         :id_super_pouvoir);";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':identite_secrete', $identite_secrete);
        $stmt->bindParam(':id_super_pouvoir', $id_super_pouvoir);
        $stmt->execute();

        return true;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return false;
    }

}