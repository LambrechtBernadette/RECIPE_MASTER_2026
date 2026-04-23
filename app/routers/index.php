<?php
//ROUTE PAR DEFAUT
//PATTERN: /
//CTRL: pagesController (composite)
//ACTION: home
//pas de use car il ne sera utilisé une fois


include_once '../app/controllers/pagesController.php';

\App\Controllers\PagesController\homeAction($conn,3);

