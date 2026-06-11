<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn): array
{
    $sql = "SELECT r.id, r.name, r.picture, r.description, r.created_at, r.user_id, u.name AS user_name
            FROM recipes r
            JOIN users u ON r.user_id = u.id
            ORDER BY RAND()
            LIMIT 1;";
    $rs = $conn->query($sql);
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAllPopulars(PDO $conn)
{
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value), 1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             GROUP BY r.id, r.name, r.picture, r.description, r.created_at, u.name
             ORDER BY average_rating DESC
            LIMIT 3;";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByUserId(PDO $conn, int $userID)
{
    $sql = "SELECT id, name, picture, description, created_at, user_id
            FROM recipes r
        WHERE user_id = :userID
        ORDER BY created_at DESC
            LIMIT 3;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id)
{
    $sql = "SELECT r.id, r.name, r.picture, r.description, r.prep_time, r.created_at, r.user_id, u.name AS user_name
        FROM recipes r
        JOIN users u ON r.user_id = u.id
        WHERE r.id = :id;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAll(PDO $conn)
{
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value), 1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             GROUP BY r.id, r.name, r.picture, r.description, r.created_at, u.name
             ORDER BY r.created_at DESC;";
    $rs = $conn->query($sql);
    $recipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $recipes;
}

function findAllRecipesByUserId(PDO $conn, int $userID)
{
    $sql = "SELECT r.id AS recipe_id, r.name AS recipe_name, r.picture AS recipe_picture, r.description, r.created_at, u.name AS user_name, ROUND(AVG(rt.value), 1) AS average_rating, COUNT(DISTINCT c.id) AS comment_count
             FROM recipes r
             JOIN users u ON r.user_id = u.id
             LEFT JOIN ratings rt ON r.id = rt.recipe_id
             LEFT JOIN comments c ON r.id = c.recipe_id
             WHERE r.user_id = :userID
             GROUP BY r.id, r.name, r.picture, r.description, r.created_at, u.name
             ORDER BY r.created_at DESC;";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':userID', $userID, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}