<?php

namespace App\Controllers\IngredientsController;
use \PDO;
use function \App\Models\IngredientsModel\findOneById;
function showAction(PDO $conn, int $id)
{
    include_once '../app/models/ingredientsModel.php';    
    $ingredient = findOneById($conn, $id);
    
    GLOBAL $content, $title;
    $title = $ingredient['name'] ?? 'Ingredient';
    ob_start();
    include '../app/views/ingredients/show.php';
    $content = ob_get_clean();    
}
