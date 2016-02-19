<?php

$conn = new PDO('mysql:dbname=PartielPHP;host=127.0.0.1:8889;charset=UTF8', 'root', 'root');

function question1(string $nom, string $identite_secrete, int $id_super_pouvoir)//:bool
{
    try
    {
        $conn = new PDO('mysql:dbname=PartielPHP;host=127.0.0.1:8889;charset=UTF8', 'root', 'root');

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

function question2(string $nom)//:[]
{
    try
    {
        $conn = new PDO('mysql:dbname=PartielPHP;host=127.0.0.1:8889;charset=UTF8', 'root', 'root');

        $sql = "SELECT
        (`id`,
        `nom`,
        `identite_secrete`,
        `id_super_pouvoir`)
        FROM `super_hero`
        WHERE `nom`=".$nom."LIMIT 1";

        return $conn->query($sql);
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return [];
    }
}

function question3(string $nom, string $identite_secrete, int $id_super_pouvoir)//:bool
{
    try
    {
        $conn = new PDO('mysql:dbname=PartielPHP;host=127.0.0.1:8889;charset=UTF8', 'root', 'root');

        $sql="UPDATE `super_hero SET identite_secrete`=".$identite_secrete.", `id_super_pouvoir=`".$id_super_pouvoir." WHERE `nom`=".$nom.";";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return true;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
        return false;
    }
}