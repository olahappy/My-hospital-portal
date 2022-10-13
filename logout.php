<?php
session_start();

define('ROOT_URL', 'http://localhost/Hospital_portal/');
session_destroy();
header('location: '. ROOT_URL);
die();

?>