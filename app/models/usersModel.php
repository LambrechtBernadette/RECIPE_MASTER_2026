<?php

namespace App\Models\UsersModel;
use \PDO;
function findOneByRand(PDO $conn): array {

    /* requete SQL */ 

    $sql = "SELECT * 
    FROM users
    ORDER BY RAND()
    LIMIT 3;";

    $rs = $conn->query($sql);
    $randomUsers = $rs->fetch(PDO::FETCH_ASSOC);
    return $randomUsers;
}
