<?php
namespace App\Models\TypesModel;
use \PDO;
function findOneById(PDO $conn, int $id): ?array
{
    $stmt = $conn->prepare("SELECT * FROM types WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}
function findAll(PDO $connexion): array
{
    /* requete SQL */
    $sql = "SELECT name AS category_name, id AS category_id
            FROM types_of_recipes
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    $types = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $types;
}