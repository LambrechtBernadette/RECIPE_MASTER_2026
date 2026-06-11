<?php

namespace App\Models\IngredientsModel;

use \PDO;

function findOneById(PDO $conn, int $id): ?array
{
    $sql = "SELECT *
            FROM ingredients
            WHERE id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();

    return $rs->fetch(PDO::FETCH_ASSOC) ?: null;
}
function findAll(PDO $conn): array
{
    $sql = "SELECT id AS ingredient_id, name AS ingredient_name
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}