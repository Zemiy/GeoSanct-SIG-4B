<?php

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "";
}

switch ($page) {
    case "":
    case "dashboard":
        include "pages/dashboard.php";
        break;
    case "ibadah":
        include "pages/ibadah/ibadah.php";
        break;
    default:
        include "pages/404.php";    
}