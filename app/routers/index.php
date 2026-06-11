<?php
//ROUTER PRINCIPAL
//PATTERN: /
//CTRL: pagesController (composite)
//ACTION: home
//pas de use car il ne sera utilisé une fois


if (isset($_GET['users'])):
    include_once '../app/routers/users.php';

elseif (isset($_GET['ingredients'])):
    include_once '../app/routers/ingredients.php';

elseif (isset($_GET['recipes'])):
    include_once '../app/routers/recipes.php';

else:
include_once '../app/controllers/pagesController.php';

\App\Controllers\PagesController\homeAction($conn);

endif;

