<?php

use App\Controllers\IngredientsController;

include '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients'] ?? ''):
    case 'show':
        IngredientsController\showAction($conn, (int) ($_GET['id'] ?? 0));
        break;
    default:
        include_once '../app/controllers/pagesController.php';
        \App\Controllers\PagesController\homeAction($conn);
        break;
endswitch;
