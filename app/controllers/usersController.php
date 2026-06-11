<?php
namespace App\Controllers\UsersController;

use \PDO;

use App\Models\UsersModel;
use App\Models\RecipesModel;

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/usersModel.php';
    include_once '../app/models/recipesModel.php';
    $user = UsersModel\findOneById($conn, $id);
    $recipes = RecipesModel\findAllRecipesByUserId($conn, $id);
    
    GLOBAL $content, $title;
    $title = $user['name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();    
}

function indexAction(PDO $conn)
{
    include_once '../app/models/usersModel.php';    
    $users = UsersModel\findAll($conn);
    
    GLOBAL $content, $title;
    $title = "Utilisateurs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();    
}
