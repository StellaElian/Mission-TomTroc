<?php 
// Sans session_start :le site oublie tout à chaque fois, présence obligatoire
session_start();

// Ici on met les constantes utiles et tout ce qui sert à configurer. 
define('TEMPLATE_VIEW_PATH', '../views/'); // Le chemin vers les templates de vues.
define('MAIN_VIEW_PATH', TEMPLATE_VIEW_PATH . 'main.php'); // Le chemin vers le template principal.
// les données de connexions à la bdd
define('DB_HOST', 'localhost');
define('DB_NAME', 'tomtroc');
define('DB_USER', 'root');
define('DB_PASS', '');