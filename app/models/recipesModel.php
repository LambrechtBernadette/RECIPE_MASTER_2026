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
    $rs->closeCursor();
    unset($rs);
    // se trouve dans $randomrecipe
}    

