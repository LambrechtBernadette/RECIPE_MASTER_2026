<?php

namespace App\Controllers\PagesController;

use \PDO;
use App\Models\RecipesModel;
use App\Models\UsersModel;


function homeAction (PDO $conn, int $limit = 3)
{

/*  on va cherhcer  la fonction dans le dossier models */
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/usersModel.php';
    $randomRecipe = RecipesModel\findOneByrand($conn);
    
    //on met le namespace devant la fonction
    $popularsRecipes= RecipesModel\findAllPopulars($conn);
    $randomUsers = UsersModel\findOneByRand($conn);
    $randomUsersLatestRecipes = RecipesModel\findAllByAuthorId($conn, $randomUsers['id']); 
    
    
    
 /* on lance le tampon et on inclu la vue dedans  */
    GLOBAL $title, $content;
    $title = "HOME";
    //car ça ne viens pas de la DB donc comme titre de la page on met Home ou autre
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}



