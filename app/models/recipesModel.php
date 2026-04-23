<?php

namespace App\Models\RecipesModel;

use \PDO;

function findOneByRand(PDO $conn): array {

    /* requete SQL */ 

    $sql = "SELECT * 
    FROM recipes
    ORDER BY RAND()
    LIMIT 3;";


    $rs = $conn->query($sql);
    //il n y a pas de paramètre inconnu donc query
    return $rs->fetch(PDO::FETCH_ASSOC);
  
    // se trouve dans $randomrecipe
}    

function findAllPopulars(PDO $conn, int $limit = 3): array {

    /* requete SQL */ 

    $sql = "SELECT * 
    FROM recipes
    ORDER BY created_at DESC
    LIMIT :limit;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->execute();
    $popularsRecipes= $rs->fetchAll(PDO::FETCH_ASSOC);
    return $popularsRecipes;

}

function findAllByAuthorId(PDO $conn, int $authorId): array {

    /* requete SQL */ 

    $sql = "SELECT * 
    FROM recipes
    WHERE user_id = :authorId
    ORDER BY created_at DESC
    LIMIT 3;";

    $rs = $conn->prepare($sql);
    $rs->bindValue(':authorId', $authorId, PDO::PARAM_INT);
  
    $rs->execute();
    $authorLatestRecipes = $rs->fetchAll(PDO::FETCH_ASSOC);
    return $authorLatestRecipes;

}
