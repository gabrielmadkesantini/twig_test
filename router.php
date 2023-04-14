<?php

$page = $_GET['page'] ?? null;

$include = filter_var("{$page}.php", FILTER_SANITIZE_STRING);

if(!file_exists($include)){
 echo "<p>Nothing in the url params</p>";
 die;
}


require($include);
