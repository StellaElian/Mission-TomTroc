<?php 
// Sans session_start :le site oublie tout à chaque fois, présence obligatoire
session_start();
// les données de connexions à la bdd
define('DB_HOST', 'localhost');
define('DB_NAME', 'tomtroc');
define('DB_USER', 'root');
define('DB_PASS', '');