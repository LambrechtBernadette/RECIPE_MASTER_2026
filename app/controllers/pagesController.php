<?php

namespace App\Controllers\PagesController;

use \PDO;
use App\Models\RecipesModel;

function homeAction (PDO $conn)
{

/*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    $randomRecipe = RecipesModel\findOneByrand($conn);
    //on met le namespace devant la fonction

 /* on lance le tampon et on inclu la vue dedans  */
    GLOBAL $title, $content;
    $title = "HOME";
    //car ça ne viens pas de la DB donc comme titre de la page on met Home ou autre
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}



