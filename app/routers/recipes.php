<?php
use \App\Controllers\RecipesController;
include '../app/controllers/recipesController.php';
switch ($_GET['recipes']):
    case 'show':
        RecipesController\showAction($conn, $_GET['id']);
        break;
    default:
        break;
endswitch;
