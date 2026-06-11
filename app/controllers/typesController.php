<?php

namespace App\Controllers\TypesController;
use \PDO;
use \App\Models\TypesModel;
function showAction(PDO $conn, int $id)
{
    include_once '../app/models/typesModel.php';    
    $type = TypesModel\findOneById($conn, $id);
    
    GLOBAL $content, $title;
    $title = $type['name'];
    ob_start();
    include '../app/views/types/show.php';
    $content = ob_get_clean();    
}
