<?php
namespace App\Controllers\RecipesController;

use \PDO;
use \App\Models\RecipesModel;
function showAction(PDO $conn, int $id)
{
    include_once '../app/models/recipesModel.php';    
    $recipe = RecipesModel\findOneById($conn, $id);
    
    GLOBAL $content, $title;
    $title = $recipe['name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();    
}

function indexAction(PDO $conn)
{
    include_once '../app/models/recipesModel.php';    
    $recipes = RecipesModel\findAll($conn);
    
    GLOBAL $content, $title;
    $title = "Recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();    
}

function categoryAction(PDO $conn, int $categoryId)
{
    include_once '../app/models/recipesModel.php';
    include_once '../app/models/typesModel.php';
    $recipes = RecipesModel\findAllByCategoryId($conn, $categoryId);
    $category = \App\Models\TypesModel\findOneById($conn, $categoryId);
    $categoryName = $category['name'] ?? 'Recettes';

    GLOBAL $content, $title;
    $title = $categoryName;
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}
 