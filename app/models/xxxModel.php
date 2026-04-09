<?php


function findAll(PDO $connexion) {
    /* requete SQL */ 
    $sql = "SELECT * FROM xxx";
    $rs = $connexion->query($sql);
    $xxx = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    unset($rs);
    return $xxx;
       
}

function findByID(PDO $connexion, int $id) {  
    /* requete SQL */
   
   // return $xxx;
}