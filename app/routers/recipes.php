<?php
use \App\Controllers\RecipesController;
use \App\Controllers\IngredientsController;
include '../app/controllers/recipesController.php';
include '../app/controllers/ingredientsController.php';
switch ($_GET['recipes']):
    case 'show':
        RecipesController\showAction($conn, $_GET['id']);
        break;
    case 'ingredient':
        IngredientsController\showAction($conn, $_GET['id']);
        break;
    default: 
        RecipesController\indexAction($conn);
        break;
endswitch;
