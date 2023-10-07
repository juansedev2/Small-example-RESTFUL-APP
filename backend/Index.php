<?php
require 'vendor/autoload.php';
require "./src/core/Bootstrap.php";
#Allow CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
require "./src/routes/Api.php";