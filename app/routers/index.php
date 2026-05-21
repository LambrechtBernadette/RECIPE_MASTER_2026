<?php
//ROUTER PRINCIPAL
//PATTERN: /
//CTRL: pagesController (composite)
//ACTION: home
//pas de use car il ne sera utilisé une fois
if (issets($_GET['recipes'])):
    include_once '../app/routers/recipes.php';

else:
include_once '../app/controllers/pagesController.php';

\App\Controllers\PagesController\homeAction($conn);

endif;

